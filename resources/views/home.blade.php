@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <h5>Bienvenido {{Auth::user()->name}}</h5>
                </div>
            </div>
            
        </div>
        @foreach ($anuncios as $anuncio)
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header bg-primary text-white">{{$anuncio->titulo}}</div>

                <div class="card-body">
                   <h6>{{$anuncio->descripcion}}</h6>
                   <hr>
                   @isset($anuncio->link)
                   <div class="text-right bg-white">
                   <a class="btn btn-success btn-md text-white" href="{{$anuncio->link}}" target="_blank">Enlace</a>
                   </div>
                   @endisset
                </div>
            </div>
            
        </div>
        @endforeach
        
    </div>
    {{ $anuncios->links() }}
</div>
@endsection
