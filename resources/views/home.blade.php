@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        

        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header"><h4>CRUD's</h4></div>
    
                <div class="card-body">

                    <a href="{{ route('zone.index') }}" class="btn btn-dark">ZONE</a>
                    <a href="{{ route('region.index') }}" class="btn btn-dark">Region</a>

                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection
