@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Create</h2> 

    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="skuId" class="form-label">SKU ID</label>
            <input type="text" class="form-control" id="skuId" name="skuId" value="{{ $concat_id }}" readonly>
            @error('skuId')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="skuCode" class="form-label">SKU Code</label>
            <input type="text" class="form-control" id="skuCode" name="skuCode">
            @error('skuCode')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="skuName" class="form-label">SKU Name</label>
            <input type="text" class="form-control" id="skuName" name="skuName">
            @error('skuName')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="mrp" class="form-label">MRP</label>
            <input type="text" class="form-control" id="mrp" name="mrp">
            @error('mrp')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="distributorPrice" class="form-label">Distributor Price</label>
            <input type="text" class="form-control" id="distributorPrice" name="distributorPrice">
            @error('distributorPrice')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>
        <div class="mb-3">
            <label for="weightVolume" class="form-label">Weight/Volume</label>
            <input type="text" class="form-control" id="weightVolume" name="weightVolume">
            @error('weightVolume')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
            <select class="form-select form-select-sm" name="unit" id="unit" >
                <option value="" readonly>Select</option>
                <option value="Kg">Kg</option>    
                <option value="g">g</option>    
                <option value="ml">ml</option>    
                <option value="Packet">Packet</option>    
            </select>
            @error('unit')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

      
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection