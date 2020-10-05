<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DOST-CAR') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ Asset('plugins/fa/css/all.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ Asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ Asset('plugins/mdb/css/mdb.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ Asset('css/skin.css') }}">
    @yield('custom-css')
</head>
<body>

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-sm unique-color navbar-dark scrolling-navbar py-2">
            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="{{ route('home') }}">
                <img src="{{ Asset('images/logo/dostlogo.png') }}"  height="25" alt="DOST-CAR">
                DOST-CAR
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="navbar-nav mr-auto">
                    <!--
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    -->
                </ul>

                <ul class="navbar-nav ml-auto nav-flex-icons">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light">
                            About
                        </a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="profile-dropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> {!! Auth::user()->firstname !!}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info"
                             aria-labelledby="profile-dropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                            <a class="dropdown-item" href="{{ route('about') }}">
                                About
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('accounts.show', Auth::user()->id) }}">Profile</a>
                            <a class="dropdown-item" onclick="$('#logout-form').submit();">
                                Logout
                            </a>
                        </div>
                    </li>
                    @endguest
                </ul>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </nav>
        <!-- Navbar -->

    </header>
    <!--Main Navigation-->

    <main class="container-fluid wow animated fadeIn px-0">
        @yield('side-nav')
        <div class="content">
            @yield('content')
        </div>
    </main>

    <!--Footer-->
    <footer class="page-footer fixed-bottom text-center font-small unique-color mt-4 wow fadeIn">

        <!--Copyright-->
        <div class="footer-copyright py-2 white-text">
            <p class="mb-0">
                {{--  <span class="font-weight-bold">

                </span>  --}}
                © Department of Science & Technology - CAR |  All Rights Reserved 2020

            </p>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!-- JavaScripts -->
    <script type="text/javascript" src="{{ Asset('plugins/jquery/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ Asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ Asset('plugins/mdb/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ Asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ Asset('plugins/mdb/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ Asset('plugins/fa/js/all.min.js') }}"></script>

    <script type="text/javascript" src="{{ Asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ Asset('js/additional-methods.min.js') }}"></script>
    <script type="text/javascript" src="{{ Asset('js/moment.min.js') }}"></script>

    @yield('custom-js')
</body>
</html>
