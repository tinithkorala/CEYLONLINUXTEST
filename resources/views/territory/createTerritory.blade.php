@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Territory Create</h2> 

    <form action="{{ route('territory.store') }}" method="POST">
        @csrf
        <div class="mb-3">
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
        <div class="mb-3">
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
        <div class="mb-3">
            <label for="territoryCode" class="form-label">Territory Code</label>
            <input type="text" class="form-control" id="territoryCode" name="territoryCode" value="{{ $concat_id }}" readonly>
            @error('territoryCode')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <div class="mb-3">
            <label for="territoryName" class="form-label">Territory Name</label>
            <input type="text" class="form-control" id="territoryName" name="territoryName">
            @error('territoryName')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection