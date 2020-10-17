<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tutorias UPB</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        a:hover{
            
        }
        .nav-item{
            transition: background-color 0.5s;
        }
        .nav-item:hover{
            background-color: #1e8ac9;
            transition:
        }
    </style>
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
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
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

    <main class="" style="height:95vh;">
            @yield('content')
    </main>
        <style>
            main{
                background: url('https://images.pexels.com/photos/990432/pexels-photo-990432.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260')
            }
        </style>
        <footer class="bg-primary">
            <div class="container row col-12">
                <div class="col-lg-4 col-sm-12">
                    <div class="col-lg-6 col-sm-12 text-center">
                        <img src="{{asset('img/logo_tutorias.png')}}" alt="" width="100px" height="80px">
                    </div>
                    <div class="col-lg-6 col-sm-12 text-center">
                        <img src="{{asset('img/logo_upb.png')}}" alt="" width="100px" height="80px">
                    </div>    
                </div>
                <div class="col-lg-4 col-sm-12 mt-4 text-white">
                    <div class="container contactos col-lg-6 offset-lg-3 col-sm-12 text-lg-left text-center">
                        <h4>Contactos:</h4>
                        <ul class="list-unstyled">
                            <li class="p-1">Correo: upb@upb.com</li>
                            <li class="p-1">Telefono: +52148793254</li>
                            <li class="p-1">Ubicacion: Bacalar, Qroo</li>
                        </ul>
                    </div>
                </div>
                 <div class="col-lg-4 col-sm-12">
                    <div class="col-lg-6 col-sm-12 text-center">
                        <img src="{{asset('img/logo_tutorias.png')}}" alt="" width="100px" height="80px">
                    </div>
                    <div class="col-lg-6 col-sm-12 text-center">
                        <img src="{{asset('img/logo_upb.png')}}" alt="" width="100px" height="80px">
                    </div>    
                </div>
            </div>
           </footer>
    </div>
</body>
</html>
