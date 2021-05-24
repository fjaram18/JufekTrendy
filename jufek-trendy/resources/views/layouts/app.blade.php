<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title','Home Page')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/custom-styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            
            <a class="navbar-brand js-scroll-trigger" href="{{ route('home.index') }}"> Jufek Trendy </a>
            @if(Auth::check())
            @if( Auth::user()->getRole() == 'admin')
            <a href="{{ route('admin.home') }}">{{__('messages.admin_menu')}}</a>
            @endif
            @endif
            
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('login') }}"> {{__('messages.login')}}</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('register') }}"> {{__('messages.register')}} </a></li>
                    @else
                        <form action="{{ route('search.index') }}" method="GET" role="search" style="position: absolute; left: 600px; margin-top: 10px;">
                            <div class="input-group justify-content-center " style="margin-right: 50px;">
                                <span class="input-group-prepend">
                                    <button class="btn btn-info" type="submit" title="Search products">
                                        <span class="fas fa-search"></span>
                                    </button>
                                </span>
                                <input type="text" class="form-control mr-2" name="term" placeholder="{{__('messages.search_products')}}" id="term">
                            </div>
                        </form>

                    <li class="nav-item mx-0 mx-lg-1">
                    @if (Session::get('amount') > 0)
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('cart.index') }}"> {{__('messages.cart')}} ({{ Session::get('amount') }})</a>
                    @endif
                    </li>
                    
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> {{__('messages.logout')}} </a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img class="flag" width="27" height="18" src="{{asset('/img/flags/').'/'.Config::get('languages')[App::getLocale()].'.png' }}" >
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                    <img class="flag" width="27" height="18" src="{{asset('/img/flags/').'/'.$language.'.png' }}" >
                                        {{$language}}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                </ul> 
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-center">
        @yield('content')
    </header>
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4"> {{__('messages.location')}} </h4>
                    <p class="lead mb-0">
                        Cl. 10 ## 36 - 14
                        <br />
                        Medellín, Antioquia
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">{{__('messages.around')}} </h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4"> {{__('messages.aboutJufek')}} </h4>
                    <p class="lead mb-0">
                        {{__('messages.aboutJufekMessage')}}
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Your Website 2020</small></div>
    </div>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('/js/scripts.js') }}" type="text/js"></script>
</body>

</html>