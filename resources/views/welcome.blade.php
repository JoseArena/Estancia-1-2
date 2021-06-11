<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Programa de control Zona Norte </title>
        <link rel="icon" href="{{ URL::asset('/icons/tut.png') }}">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/landing.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Secretaria de Salud Zona Norte</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        
                        @auth
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Inicio</a>
                            </li>
                            @else

                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Registrar</a>
                            </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
     
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    {{-- Logos --}}
                    <div class="container col-12 row">
                        
                    </div>
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Psicologia</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">Programa de psicologia de la zona norte, administracion de perfiles y cuentas de los psicologos por parte de un administrador.</p>
                        <a class="btn btn-xl js-scroll-trigger text-white" style="background-color: #07689F" href="#about">Más Información </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">CONOCE MÁS SOBRE LA PSICOLOGIA </h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4">La psicología es la ciencia que estudia de forma teórica y práctica los aspectos, sociales, culturales y biológicos que influyen en el comportamiento humano, tanto a nivel individual como social, y el funcionamiento y desarrollo de la mente humana</p>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Empezar</a>
                    </div>
                </div>
            </div>
        </section>
       
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">SERVICIOS ESTATALES DE SALUD</h2>
                <a class="btn btn-light btn-xl" href="https://qroo.gob.mx/sesa">Visitar sitio web</a>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Contacto</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">SESA <br>          
                            Agregar direccion.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                       
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - ingeniería en software </div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/landing.js')}}"></script>
    </body>
</html>
