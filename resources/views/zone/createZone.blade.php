@extends('layouts.app')


@section('content')
<div class="container">
    <h2 class="text-center  mb-5 form-heading">Zone Create</h2> 

    <form action="{{ route('zone.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <div class="col-md-3 ms-md-auto text-end">
                <label for="zoneCode" class="form-label">Zone Code</label>
            </div>
            <div class="col-md-3 me-md-auto">
                <input type="text" class="form-control" id="zoneCode" name="zoneCode" aria-describedby="zoneCode" readonly value="{{ $concat_id }}">
                @error('zoneCode')
                    <small class="fw-bold text-danger text-left">{{ $message }}</small>    
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-3 ms-md-auto text-end">
                <label for="zoneLongDescription" class="form-label">Zone Long Description</label>
            </div>
            <div class="col-md-3 me-md-auto">
                <input type="text" class="form-control" id="zoneLongDescription" name="zoneLongDescription">
                @error('zoneLongDescription')
                    <small class="fw-bold text-danger text-left">{{ $message }}</small>    
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-3 ms-md-auto text-end">
                <label for="zoneShortDescription" class="form-label">Short Description</label>
            </div>
            <div class="col-md-3 me-md-auto">
                <input type="text" class="form-control" id="zoneShortDescription" name="zoneShortDescription">
                @error('zoneShortDescription')
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