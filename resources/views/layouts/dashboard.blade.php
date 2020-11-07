<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aside.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm bg-primary">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
            Tutorias UPB
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           {{ Auth::user()->name }}
                           @hasrole('Tutor')
                           @isset(auth()->user()->tutor()->first()->perfil_slug)
                           <img src="{{asset('/storage/imagenesPerfil/' . auth()->user()->tutor()->first()->perfil_slug)}}" alt="Foto de Perfil" width="30px" height="30px" class="avatar">
                           @endisset 
                           @endrole
                           @hasrole('Admin')
                           @isset(auth()->user()->admin()->first()->perfil_slug)
                           <img src="{{asset('/storage/imagenesPerfil/admin/' . auth()->user()->admin()->first()->perfil_slug)}}" alt="Foto de Perfil" width="30px" height="30px" class="avatar">
                           @endisset 
                           @endrole
                          
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @hasrole('Tutor')
                            <a href="{{route('tutor.perfil')}}" class="dropdown-item">Perfil</a>
                            @endrole
                            @hasrole('Admin')
                            <a href="{{route('admin.perfil')}}" class="dropdown-item">Perfil</a>
                            @endrole
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
            @if (Auth::user()->roles->pluck('name')->first()=='Admin')
            <a href="/home" style="text-decoration: none; color:rgb(66, 65, 65);"><h5>Administrador</h5></a>
            @else
            {{Auth::user()->roles->pluck('name')->first()}}
            @endif
            </div>
            <div class="list-group list-group-flush">
                @hasrole('Tutor')
                <a href="/home" class="list-group-item list-group-item-action bg-light">Inicio</a>
                <button disabled class="list-group-item list-group-item-action bg-primary text-white">Crear Cuentas</button>
                <a href="{{route('tutor.crearMonitor')}}" class="list-group-item list-group-item-action bg-light" >Crear Alumno Monitor</a>
                <a href="{{route('tutor.crearTutorado')}}" class="list-group-item list-group-item-action bg-light" >Crear Alumno Tutorado</a>
                <button disabled class="list-group-item list-group-item-action bg-primary text-white">Administracion de Cuentas</button>
                <a href="{{route('tutor.alumnosMonitores')}}" class="list-group-item list-group-item-action bg-light" >Alumnos Monitores</a>
                <a href="{{route('tutor.alumnosTutorados')}}" class="list-group-item list-group-item-action bg-light" >Alumnos Tutorados</a>
                <button disabled class="list-group-item list-group-item-action bg-primary text-white">Reportes Individuales</button>
                <a href="{{route('tutor.reporteIndividual')}}" class="list-group-item list-group-item-action bg-light" >Crear Reporte</a>
                <a href="{{route('tutor.reportesIndividuales')}}" class="list-group-item list-group-item-action bg-light" >Reportes Individuales</a>
                <button disabled class="list-group-item list-group-item-action bg-primary text-white">Reportes Grupales</button>
                <a href="{{route('tutor.reporteGrupal')}}" class="list-group-item list-group-item-action bg-light" >Crear Reporte</a>
                <a href="{{route('tutor.reportesGrupales')}}" class="list-group-item list-group-item-action bg-light" >Reportes Grupales</a>
                <button disabled class="list-group-item list-group-item-action bg-primary text-white">Cuentas Desactivadas</button>
                <a href="{{route('tutor.monitoresDesactivados')}}" class="list-group-item list-group-item-action bg-light" >Alumnos Monitores</a>
                <a href="{{route('tutor.tutoradosDesactivados')}}" class="list-group-item list-group-item-action bg-light" >Alumnos Tutorados</a>
                @endrole
                @hasrole('Admin')
                <button disabled class="list-group-item list-group-item-action bg-primary text-white">Creacion de Cuentas</button>
                <a href="{{route('admin.crearTutor')}}" class="list-group-item list-group-item-action bg-light" >Crear Tutor</a>
                <a href="{{route('admin.crearPsicologo')}}" class="list-group-item list-group-item-action bg-light" >Crear Psicologo</a>
                <button disabled class="list-group-item list-group-item-action bg-primary text-white">Reportes Recibidos</button>
                <a href="{{route('admin.reportesGrupales')}}" class="list-group-item list-group-item-action bg-light">Reportes Grupales</a>
                <a href="{{route('admin.reportesIndividuales')}}" class="list-group-item list-group-item-action bg-light">Reportes Individuales</a>
                <button disabled class="list-group-item list-group-item-action bg-primary text-white">Cuentas</button>
                <a href="{{route('admin.Tutores')}}" class="list-group-item list-group-item-action bg-light">Cuentas de Tutores</a>
                <a href="{{route('admin.Psicologos')}}" class="list-group-item list-group-item-action bg-light">Cuentas de Psicologos</a>
                <button disabled class="list-group-item list-group-item-action bg-primary text-white">Anuncios</button>
                <a href="{{route('admin.crearAnuncio')}}" class="list-group-item list-group-item-action bg-light">Nuevo anuncio</a>
                <a href="{{route('admin.anuncios')}}" class="list-group-item list-group-item-action bg-light">Anuncios en Plataforma</a>
                {{-- <a href="{{route('admin.anuncios')}}" class="list-group-item list-group-item-action bg-light">Anuncios Desactivados</a> --}}
                <button disabled class="list-group-item list-group-item-action bg-primary text-white">Extras</button>
                <a href="#" class="list-group-item list-group-item-action bg-light">Estadistica</a>
                @endrole

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom hide-btn">
                <button class="btn btn-primary hide-btn" id="menu-toggle"><i class="fas fa-arrow-circle-right"  ></i></button>
            </nav>

            <div class="container-fluid">
                <div class="container py-4">
                    @yield('content')
                </div>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

</div>
<script src="{{asset('js/dates.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


</script>

<style>
    .avatar{
        border-radius: 50%;
    }
</style>
</body>
</html>
