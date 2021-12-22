@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Zone Create</h2> 

    <form action="{{ route('zone.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="zoneCode" class="form-label">Zone Code</label>
            <input type="text" class="form-control" id="zoneCode" name="zoneCode" aria-describedby="zoneCode" readonly value="{{ $concat_id }}">
            @error('zoneCode')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <div class="mb-3">
            <label for="zoneLongDescription" class="form-label">Zone Long Description</label>
            <input type="text" class="form-control" id="zoneLongDescription" name="zoneLongDescription">
            @error('zoneLongDescription')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <div class="mb-3">
            <label for="zoneShortDescription" class="form-label">Short Description</label>
            <input type="text" class="form-control" id="zoneShortDescription" name="zoneShortDescription">
            @error('zoneShortDescription')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection