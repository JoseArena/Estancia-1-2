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
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">{{Auth::user()->roles->pluck('name')->first()}}</div>
            <div class="list-group list-group-flush">
                @hasrole('Tutor')
                <a href="/home" class="list-group-item list-group-item-action bg-light">Inicio</a>
                <button disabled class="list-group-item list-group-item-action bg-dark text-white">Crear Cuentas</button>
                <a href="{{route('tutor.crearMonitor')}}" class="list-group-item list-group-item-action bg-light" >Crear Alumno Monitor</a>
                <a href="#" class="list-group-item list-group-item-action bg-light" >Crear Alumno Tutorado</a>
                <button disabled class="list-group-item list-group-item-action bg-dark text-white">Administracion de Cuentas</button>
                <a href="{{route('tutor.alumnosMonitores')}}" class="list-group-item list-group-item-action bg-light" >Alumnos Monitores</a>
                <a href="" class="list-group-item list-group-item-action bg-light" >Alumnos Tutorados</a>

                @endrole
                @hasrole('Admin')
                <a href="#" class="list-group-item list-group-item-action bg-light">Reportes Recibidos</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Cuentas Tutor</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Cuentas Psicologo</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Estadistica</a>
                @else
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


</script>
</body>
</html>
