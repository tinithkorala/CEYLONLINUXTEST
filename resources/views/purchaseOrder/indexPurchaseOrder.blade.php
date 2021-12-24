@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Purchase Order Create</h2> 

    <form action="{{ route('purchaseOrder.store') }}" method="POST">
        @csrf
        {{-- form header start --}}

            {{-- first row start --}}
            <div class="row mt-2">

                

                <div class="col-md-2">
                    <label for="region" class="form-label">Region</label>
                    <select class="form-select form-select-sm" name="region" id="region" onchange="getGridData();">
                        <option value="" readonly>Select Region</option>
                        @foreach ($allRegions as $region)
                            <option value="{{ $region->id }}">{{ $region->region_code }}</option>    
                        @endforeach
                    </select>
                    @error('region')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="territory" class="form-label">Territory</label>
                    <select class="form-select form-select-sm" name="territory" id="territory" onchange="getGridData();">
                        <option value="" readonly>Select Territory</option>
                        @foreach ($allTerritory as $territory)
                            <option value="{{ $territory->id }}" {{ (old('territory') == $territory->id ? "selected" : "") }} >{{ $territory->territory_code }}</option>    
                        @endforeach

                    </select>
                    @error('territory')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="poNumber" class="form-label">PO NO</label>
                    <select class="form-select form-select-sm" name="poNumber" id="poNumber" onchange="getGridData();">
                        <option value="" readonly>Select PO NO</option>
                        @foreach ($allPoList as $po)
                            <option value="{{ $po->id }}">{{ $po->po_number }}</option>    
                        @endforeach
                    </select>
                    @error('poNumber')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="fromDate" class="form-label">From Date</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="datepicker" name="fromDate" placeholder="YYYY-MM-DD" onchange="getGridData();">
                    </div>
                    @error('fromDate')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="toDate" class="form-label">To Date</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="datepicker2" name="toDate" placeholder="YYYY-MM-DD" onchange="getGridData();">
                    </div>
                    @error('toDate')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

                

            </div>
            {{-- first row end --}}

        {{-- form header end --}}

        {{-- form grid start --}}

        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Region</th>
                    <th scope="col">Territory</th>
                    <th scope="col">Distributor</th>
                    <th scope="col">PO NUMBER</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tbody">
                
            </tbody>
        </table>
        
        {{-- form grid start --}}

        {{-- <input type="hidden" name="row_count" value="{{ $key }}"> --}}

        <button type="submit" class="btn btn-success mt-4">Save</button>
    </form>

    
</div>

<script>
    $( function() {
  
        $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
        });

        $( "#datepicker2" ).datepicker({
        dateFormat: "yy-mm-dd"
        });

    } );
</script>

<script>
    function getGridData() {

        let region = document.getElementById("region").value;
        let territory = document.getElementById("territory").value;
        let poNumber = document.getElementById("poNumber").value;
        let fromDate = document.getElementById("datepicker").value;
        let toDate = document.getElementById("datepicker2").value;

        $.ajax({
            url: "{{ route('purchaseOrder.poList') }}",
            type: "GET",
            data:{ 
                _token:'{{ csrf_token() }}',
                region: region,
                territory: territory,
                poNumber: poNumber,
                fromDate:fromDate,
                toDate:toDate
             
            },
            success: function(data){
                console.log(data);
                var str = "";

                var json_value = JSON.parse(data);

                for (var i=0; i < json_value.length; i++) {

                    let po_number = json_value[i].po_number;
                    let region_name = json_value[i].region_name;
                    let territory_name = json_value[i].territory_name;
                    let name = json_value[i].name;
                    let date = json_value[i].po_date;
                    let total_amount = json_value[i].total_amount;
                    let timeAmPm = json_value[i].timeAmPm;

                    let id = json_value[i].id;

                    str +=  "<tr>"+
                                "<td>"+region_name+"</td>"+
                                "<td>"+territory_name+"</td>"+
                                "<td>"+name+"</td>"+
                                "<td>"+po_number+"</td>"+
                                "<td>"+date+"</td>"+
                                "<td>"+timeAmPm+"</td>"+
                                "<td>"+total_amount.toFixed(2)+"</td>"+
                                "<td><a href='{{ route('purchaseOrder.show', ['purchaseOrder' => '14']) }}' type='button' class='btn btn-secondary btn-sm'>View</a></td>"
                            "</tr>";

                }
                console.log(str);
                $('#tbody').html(str);
            }
        });
        

    }

    function timeFromartAmPm() {

    }
</script>
    
@endsection