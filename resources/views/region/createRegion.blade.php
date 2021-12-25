@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center  mb-5 form-heading">Region Create</h2> 

    <form action="{{ route('region.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <div class="col-md-3 ms-md-auto text-end">
                <label for="zoneCode" class="form-label">Zone</label>
            </div>
            <div class="col-md-3 me-md-auto">
                <select class="form-select" name="zone" id="zone">
                    <option value="" readonly>Select Zone</option>
                    @foreach ($allZones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->zone_code }}</option>    
                    @endforeach
                </select>
                @error('zone')
                    <small class="fw-bold text-danger text-left">{{ $message }}</small>    
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-3 ms-md-auto text-end">
                <label for="regionCode" class="form-label">Region Code</label>
            </div>
            <div class="col-md-3 me-md-auto">
                <input type="text" class="form-control" id="regionCode" name="regionCode" value="{{ $concat_id }}" readonly>
                @error('regionCode')
                    <small class="fw-bold text-danger text-left">{{ $message }}</small>    
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-3 ms-md-auto text-end">
                <label for="regionName" class="form-label">Region Name</label>
            </div>
            <div class="col-md-3 me-md-auto">
                <input type="text" class="form-control" id="regionName" name="regionName">
                @error('regionName')
                    <small class="fw-bold text-danger text-left">{{ $message }}</small>    
                @enderror
            </div>
        </div>
        <div class="col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
@endsection