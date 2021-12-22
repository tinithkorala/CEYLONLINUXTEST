@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Region Edit</h2> 

    <form action="{{ route('region.update', ['region' => $region->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="zoneCode" class="form-label">Zone</label>
            <select class="form-select form-select-sm" name="zone" id="zone">
                <option value="" readonly>Select Zone</option>
                @foreach ($allZones as $zone)
                    <option value="{{ $zone->id }}" {{ $zone->id == $region->zone_id ? "selected" : "" }} >{{ $zone->zone_code }}</option>    
                @endforeach
            </select>
            @error('zone')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <div class="mb-3">
            <label for="regionCode" class="form-label">Region Code</label>
            <input type="text" class="form-control" id="regionCode" name="regionCode" value="{{ $region->region_code }}" readonly>
            @error('regionCode')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <div class="mb-3">
            <label for="regionName" class="form-label">Region Name</label>
            <input type="text" class="form-control" id="regionName" name="regionName" value="{{ $region->region_name }}">
            @error('regionName')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection