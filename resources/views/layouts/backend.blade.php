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

    <style>
        body {
            background: #f8fafc;
        }
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: #444;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media  screen and (max-height: 450px) {
            .sidebar {padding-top: 15px;}
            .sidebar a {font-size: 18px;}
        }
    </style>
    @yield('custom-css')
</head>
<body>

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-sm unique-color navbar-dark scrolling-navbar py-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-responsive"
                aria-controls="navbar-responsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-responsive">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" onclick="openNav()"> ☰
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="profile-dropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> {!! Auth::user()->firstname !!}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info"
                             aria-labelledby="profile-dropdown">
                            <a class="dropdown-item" href="{{ route('home') }}">
                                <i class="fas fa-globe"></i> Site
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </nav>
        <!-- Navbar -->

    </header>
    <!--Main Navigation-->

    @include('partials.sidenav')
    <main class="container-fluid wow animated fadeIn px-0">
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

    <script>
        const baseURL = "{{ url('/') }}/";

        function openNav() {
            if (document.getElementById("mySidebar").style.width == '250px') {
                document.getElementById("mySidebar").style.width = "0";
            } else {
                document.getElementById("mySidebar").style.width = "250px";
            }
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
        }
    </script>
    @yield('custom-js')
</body>
</html>
