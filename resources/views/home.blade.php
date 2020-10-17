@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-gray">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <h5>Bienvenido {{Auth::user()->name}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
