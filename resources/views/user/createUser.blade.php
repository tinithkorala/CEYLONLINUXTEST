@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Registration</h2> 

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ old('name') }}">
            @error('name')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="nic" class="form-label">NIC</label>
            <input type="text" class="form-control" id="nic" name="nic" aria-describedby="nic" value="{{ old('nic') }}">
            @error('nic')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" aria-describedby="address" value="{{ old('address') }}">
            @error('address')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="mobile" value="{{ old('mobile') }}">
            @error('mobile')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="{{ old('email') }}">
            @error('email')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select form-select-sm" name="gender" id="gender" >
                <option value="" readonly>Select Gender</option>
                <option value="Female">Female</option>    
                <option value="Male">Male</option>    
                <option value="Other">Other</option>    
            </select>
            @error('gender')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        <div class="mb-3">
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

        <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="username" value="{{ old('username') }}">
            @error('username')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="password" value="{{ old('password') }}">
            @error('password')
                <small class="fw-bold text-danger">{{ $message }}</small>    
            @enderror
        </div>

        
       
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection