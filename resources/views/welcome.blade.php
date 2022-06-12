<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Fikisha</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('img/SC.png')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/style.css')}}" rel="stylesheet" />
        <link href="{{asset('css/landing.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
  
                <li class="sidebar-nav-item"><a href="{{ route('login') }}">Sign In</a></li>
                <li class="sidebar-nav-item"><a href="{{ route('register') }}">Sign Up</a></li>
                {{-- <li class="sidebar-nav-item"><a href="{{ route('register') }}">Sign Up</a></li> --}}

            </ul>
        </nav>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Fikisha</h1>
                <h3 class="mb-5"><em>Quick Convenient Fast Reliable Delivery</em></h3>
                <a class="btn btn-primary " style="width: unset !important;" href="{{ route('login') }}">Sign In</a>
                <a class="btn btn-primary " style="width: unset !important;" href="{{ route('register') }}">Sign Up</a>
            </div>
        </header>
        <!-- About-->



        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/landing.js')}}"></script>
    </body>
</html>