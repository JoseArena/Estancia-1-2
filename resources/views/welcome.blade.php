<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        {{-- bootstrap --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        {{-- custom css --}}
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
        {{-- javascript --}}
        <script src="{{asset('js/app.js')}}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-light bg-primary">
            <a class="navbar-brand text-white">Tutorias UPB</a>
            <ul class="navbar-nav text-white list-inline">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}">Home</a>
                </li>
                @else

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                {{-- @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endif --}}
                @endauth
              </ul>
        </nav>
        <main class="mb-2">
            <div class="hero row no-gutters">
                <div class="col-lg-6 col-md-12 col-sm-12">
                <img class="img-fluid" src="{{asset('img/school_teacher.jpg')}}" alt="">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 bg-light">
                    <div class="container pt-3">
                        <h3>Lorem</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium corrupti eveniet unde sequi quo inventore alias. Quisquam ea quod saepe omnis vero ipsum quaerat, architecto quasi laborum, perferendis, nesciunt repellat.</p>
                    </div>
                </div>
            </div>
            <div class="hero row no-gutters">
                <div class="col-lg-6 col-md-12 col-sm-12 bg-light">
                    <div class="container pt-3">
                        <h3>Lorem</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium corrupti eveniet unde sequi quo inventore alias. Quisquam ea quod saepe omnis vero ipsum quaerat, architecto quasi laborum, perferendis, nesciunt repellat.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img class="img-fluid" src="{{asset('img/tutor.jpg')}}" alt="">
                </div>
            </div>
            <div class="container mt-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ullam modi itaque, ipsum nulla aperiam esse magnam repellendus aspernatur eius suscipit! Molestias velit nam cupiditate voluptate consequatur explicabo doloribus pariatur possimus voluptatem quidem sed, dolores, commodi nesciunt. Consectetur praesentium sunt animi, illum labore, vel nihil veniam sit, quidem doloremque iure!
            </div>
        </main>
       <footer class="bg-primary mt-4">
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
    </body>
</html>
