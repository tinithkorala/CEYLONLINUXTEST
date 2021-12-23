@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Purchase Order Create</h2> 

    <form action="{{ route('purchaseOrder.store') }}" method="POST">
        @csrf
        {{-- form header start --}}

            {{-- first row start --}}
            <div class="row mt-2">

                <div class="col-md-3">
                    <label for="zoneCode" class="form-label">Zone</label>
                    <select class="form-select form-select-sm" name="zone" id="zone">
                        <option value="" readonly>Select Zone</option>
                        @foreach ($allZones as $zone)
                            <option value="{{ $zone->id }}">{{ $zone->zone_code }}</option>    
                        @endforeach
                    </select>
                    @error('zone')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="region" class="form-label">Region</label>
                    <select class="form-select form-select-sm" name="region" id="region">
                        <option value="" readonly>Select Region</option>
                        @foreach ($allRegions as $region)
                            <option value="{{ $region->id }}">{{ $region->region_code }}</option>    
                        @endforeach
                    </select>
                    @error('region')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="territory" class="form-label">Territory</label>
                    <select class="form-select form-select-sm" name="territory" id="territory">
                        <option value="" readonly>Select Territory</option>
                        @foreach ($allTerritory as $territory)
                            <option value="{{ $territory->id }}" {{ (old('territory') == $territory->id ? "selected" : "") }} >{{ $territory->territory_code }}</option>    
                        @endforeach

                    </select>
                    @error('territory')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="distributor" class="form-label">Distributor</label>
                    <select class="form-select form-select-sm" name="distributor" id="distributor">
                        <option value="" readonly>Select Distributor</option>
                        @foreach ($allUsers as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>    
                        @endforeach
                    </select>
                    @error('distributor')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

            </div>
            {{-- first row end --}}

            {{-- second row start --}}
            <div class="row mt-2">

                <div class="col-md-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="text" class="form-control" id="datepicker" name="date" value="{{ date('Y-m-d') }}">
                    @error('date')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="poNumber" class="form-label">PO No</label>
                    <input type="text" class="form-control" id="poNumber" name="poNumber" value="{{ $concat_id }}" readonly>
                    @error('poNumber')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="remark" class="form-label">Remark</label>
                    <input type="text" class="form-control" id="remark" name="remark" value="">
                    @error('remark')
                        <small class="fw-bold text-danger">{{ $message }}</small>    
                    @enderror
                </div>

            </div>
            {{-- second row end --}}

        {{-- form header end --}}



        <button type="submit" class="btn btn-success mt-4">Save</button>
    </form>

    
</div>

<script>
    $( function() {
  
        $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
        });

    } );
</script>
@endsection