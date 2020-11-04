<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Programa de Tutorías y Tutorías </title>
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
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Universidad Politécnica de Bacalar</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Acerca de</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Cargos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portafolio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contacto</a></li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Home</a>
                            </li>
                            @else

                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a>
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
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">PROGRAMA DE ASESORÍAS Y TUTORÍAS</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">Consolidar a las tutorías como uno de los servicios de la Universidad Politécnica de Bacalar ofrecido
                            a los alumnos inscritos para disminuir la reprobación y la deserción, aumentando así el indicador
                            de eficiencia terminal.</p>
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
                        <h2 class="text-white mt-0">CONOCE MÁS SOBRE LAS TUTORÍAS Y ASESORÍAS </h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4">La tutoría en un proceso de acompañamiento académico durante la formación de los estudiantes, tendiente a mejorar su rendimiento académico, lograr los perfiles de egreso, desarrollar hábitos de estudio y trabajo, cuya herramienta básica se encuentra en los procesos de orientación tutorial y la canalización a otras instancias de apoyo. </p>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Empezar</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">CARGOS</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-chalkboard-teacher text-primary mb-4"></i>
                            <h3 class="h4 mb-2">TUTOR</h3>
                            <p class="text-muted mb-0">Un tutor es un profesor de tiempo completo , que atiende a los estudiantes de un grupo a su cargo mediante la observación de su desempeño académico y socio afectivo, dándoles seguimiento donde los orienta y ayuda para su desarrollo integral.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fas fa-user text-primary mb-4"></i>
                            <h3 class="h4 mb-2">ALUMNO MONITOR</h3>
                            <p class="text-muted mb-0">Un alumno monitor, es aquel que apoya y guía el aprendizaje de los alumnos o un grupo en necesidades educativas especiales, siempre dentro del contexto académico e institucional.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fas fa-users text-primary mb-4"></i>
                            <h3 class="h4 mb-2">ALUMNO TUTORADO</h3>
                            <p class="text-muted mb-0">Es todo estudiante, quien recibe orientación y seguimiento de su proceso, del desempeño académico y socio afectivo a través de un tutor desde su ingreso, en cada periodo escolar y hasta su titulación.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fas fa-street-view text-primary mb-4"></i>
                            <h3 class="h4 mb-2">PSICÓLOGO</h3>
                            <p class="text-muted mb-0">Los psicólogos educativos brindan conocimientos competentes, éticos y profesionales, además de servicios de orientación educacional, con el propósito de ayudar a alumnos existentes y potenciales a lograr sus objetivos personales y académicos.  </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/1.jpg')}}">
                            <img class="img-fluid" src="{{asset('img/portfolio/fullsize/1.jpg')}}" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">TUTOR</div>
                                <div class="project-name">Tutorias Individuales</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/2.jpg')}}">
                            <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/2.jpg')}}" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">TUTOR</div>
                                <div class="project-name">Tutorias Grupales</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/3.jpg')}}">
                            <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/3.jpg')}}" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">TUTOR</div>
                                <div class="project-name">Canalizar para apoyo psicológico</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/4.jpg')}}">
                            <img class="img-fluid" src="{{asset('img/portfolio/fullsize/4.jpg')}}" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">ALUMNO MONITOR (PROAM)</div>
                                <div class="project-name">ALUMNO MONITOR</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/5.jpg')}}">
                            <img class="img-fluid" src="{{asset('img/portfolio/fullsize/5.jpg')}}" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">ALUMNO MONITOR (PROAM)</div>
                                <div class="project-name">TUTORADO</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('img/portfolio/fullsize/6.jpg')}}">
                            <img class="img-fluid" src="{{asset('img/portfolio/fullsize/6.jpg')}}" alt="" />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">PSICÓLOGO </div>
                                <div class="project-name">Apoyo psicológico</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Universidad Politécnica de Bacalar</h2>
                <a class="btn btn-light btn-xl" href="http://www.upb.edu.mx/">Visitar sitio web</a>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Contacto</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">UNIVERSIDAD POLITÉCNICA DE BACALAR <br>          
                            Avenida 39 entre calle 50 y 54, C.P. 77930,Bacalar, Q.Roo.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div> 983 733 5292</div>
                        <div> 983 168 2490</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:contact@yourwebsite.com">upbacalar@upb.edu.mx</a>
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
