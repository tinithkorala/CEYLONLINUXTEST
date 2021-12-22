@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Zone Edit</h2> 

    <form action="{{ route('zone.update', ['zone' => $zone->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="zoneCode" class="form-label">Zone Code</label>
            <input type="text" class="form-control" id="zoneCode" name="zoneCode" aria-describedby="zoneCode" readonly value="{{ $zone->zone_code }}">
            @error('zoneCode')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <div class="mb-3">
            <label for="zoneLongDescription" class="form-label">Zone Long Description</label>
            <input type="text" class="form-control" id="zoneLongDescription" name="zoneLongDescription" value="{{ $zone->zone_long_description }}">
            @error('zoneLongDescription')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <div class="mb-3">
            <label for="zoneShortDescription" class="form-label">Short Description</label>
            <input type="text" class="form-control" id="zoneShortDescription" name="zoneShortDescription" value="{{ $zone->zone_short_description }}">
            @error('zoneShortDescription')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection