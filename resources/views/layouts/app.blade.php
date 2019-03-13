<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Worldskills Travel</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/style.css') }}">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <nav class="navbar-default navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="{{ url('/') }}" class="navbar-brand">Worldskills Travel</a>
                        </div>
                        <div class="collapse navbar-collapse" id="main-navbar">
                            <ul class="nav navbar-nav navbar-right">
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
                                <li class="nav-item">
                                    <a href="{{url('flights')}}" role="button">
                                        Flights
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/profile')}}" role="button">
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <main>
                <div class="container">
                    @yield('content')
                </div>
            </main>
            <footer>
                <div class="container">
                    <p class="text-center">
                        Copyright &copy; 2019 | All Right Reserved
                    </p>
                </div>
            </footer>
        </div>
        <!--scripts-->
        <script type="text/javascript" src="{{ asset('public/assets/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/app.js') }}"></script>
    </body>
</html>
