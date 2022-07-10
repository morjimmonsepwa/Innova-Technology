<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <title>Innova Technology </title> <link rel="shortcut icon" type="image/ico" href="{{ asset('/libs/index/img/logo/innova.ico') }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Innova Technology') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta name="description" content="" />
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('libs/index/css/bootstrap-5.0.0-alpha-2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/index/css/LineIcons.2.0.css') }}"/>
    <link rel="stylesheet" href="{{ asset('libs/index/css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('libs/index/css/lindy-uikit.css') }}"/>
    @livewireStyles
  </head>
  <body>
    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
      <div class="loader">
        <div class="spinner">
          <div class="spinner-container">
            <div class="spinner-rotator">
              <div class="spinner-left">
                <div class="spinner-circle"></div>
              </div>
              <div class="spinner-right">
                <div class="spinner-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ========================= preloader end ========================= -->

    <!-- ========================= hero-section-wrapper-2 start ========================= -->
    <section id="home" class="hero-section-wrapper-2">

      <!-- ========================= header-2 start ========================= -->
      <header class="header header-2">
        <div class="navbar-area">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                  <a class="navbar-brand" href="{{route('index')}}">
                    <img src="{{ asset('libs/index/img/logo/logo2.jpeg')}}" alt="Logo" width="75" height="75"/>
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent2">
                    <ul id="nav2" class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="page-scroll" href="@if(Route::current()->uri() == 'register' or Route::current()->uri() == 'login' ) {{route('index')}} @else #home @endif">Inicio
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll" href="@if(Route::current()->uri() == 'register' or Route::current()->uri() == 'login' ) {{route('index')}} @else #services @endif">Servicios</a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll" href="@if(Route::current()->uri() == 'register' or Route::current()->uri() == 'login' ) {{route('index')}} @else #about @endif">Sobre</a>
                      </li>
                      <li class="nav-item">
                        <a class="page-scroll " href="@if(Route::current()->uri() == 'register' or Route::current()->uri() == 'login' ) {{route('index')}} @else #contact @endif">Contacto</a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('login') }}" class="@if(Route::current()->uri() == 'login') active @endif">Iniciar Sesión</a>
                      </li>
                    </ul>
                  </div>
                  <!-- navbar collapse -->
                </nav>
                <!-- navbar -->
              </div>
            </div>
            <!-- row -->
          </div>
          <!-- container -->
        </div>
        <!-- navbar area -->
      </header>
      <!-- ========================= header-2 end ========================= -->

    <!-- ========================= contenido start ========================= -->


      <div>
          @yield('contenido')
      </div>

    </section>
    <!-- ========================= contenido end ========================= -->
   
    <!-- ========================= scroll-top start ========================= -->
    <a href="#" class="scroll-top"> <i class="lni lni-chevron-up"></i> </a>
    <!-- ========================= scroll-top end ========================= -->
		
    <!-- ========================= JS here ========================= -->
    @livewireScripts
    <script src="{{ asset('libs/index/js/bootstrap.5.0.0.alpha-2-min.js')}}"></script>
    <script src="{{ asset('libs/index/js/count-up.min.js')}}"></script>
    <script src="{{ asset('libs/index/js/wow.min.js')}}"></script>
    <script src="{{ asset('libs/index/js/main.js')}}"></script>
  </body>
</html>
