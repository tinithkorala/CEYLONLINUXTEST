<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrderHeader;
use App\Models\Region;
use App\Models\Territory;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function create() {

        $allZones = Zone::all();
        $allRegions = Region::all();
        $allTerritory = Territory::all();
        $concat_id = $this->generatePOCode();
        $allUsers = DB::select("SELECT * FROM users WHERE usertype = '1' ");

        return view('purchaseOrder.createPurchaseOrder')->with('allZones', $allZones)
                                                        ->with('allRegions', $allRegions)
                                                        ->with('allTerritory', $allTerritory)
                                                        ->with('allUsers', $allUsers)
                                                        ->with('concat_id', $concat_id);

    }

    public function store(Request $request) {

        $validated = $request->validate([
            'zone' => 'required',
            'region' => 'required',
            'territory' => 'required',
            'distributor' => 'required',
            'date' => 'required',
            'poNumber' => 'required'
        ]);

        $po_code = $this->generatePOCode();

        $header_id = PurchaseOrderHeader::create([
                        'zone_id' => $request->input('zone'),
                        'region_id' => $request->input('region'),
                        'territory_id' => $request->input('territory'),
                        'user_id' => $request->input('distributor'),
                        'po_date' => $request->input('date'),
                        'po_number' => $po_code,
                        'remark' => $request->input('remark'),
                    ]);

        echo $header_id->id;

    }

    public function generatePOCode() {

        $max_id_result = DB::select('SELECT MAX(id) as id FROM purchase_order_headers');
        $current_max_id = $max_id_result[0]->id;
        $auto_generated_max_id = DB::select("SELECT id, LPAD(id,5,'0') as Num FROM purchase_order_headers WHERE id = '$current_max_id'");
        // dd(count($auto_generated_max_id));
        if(count($auto_generated_max_id) == 0) {

            $concat_id = 'TEPO-00001';

        }else {

            $incremented_id = str_pad(intval($auto_generated_max_id[0]->Num) + 1, strlen($auto_generated_max_id[0]->Num), '0', STR_PAD_LEFT);
            $concat_id = 'TEPO-'.$incremented_id;

        }

        return $concat_id;

    }
}
