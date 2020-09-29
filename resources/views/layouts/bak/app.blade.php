
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DOST-CAR') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>


    <div id="app">
        @include('nav')
    </div>
<main class="py-4 container-fluid">

    <div id="sidenav">
        @include('layouts.sidenav')
    </div>

<!-- sidebar content -->

    <div class="content">
        @yield('content')
    </div>


</main>













    {{-- <div id="app">
        @include('nav')
<!-- sidebar content -->


        </div> -->
        <main class="py-4">
<div id="sidebar" class="sidebar">

    @include('layouts.sidenav')
</div>

        <div class="container">
            @yield('content')
        </div>

        </main>
    </div> --}}
</body>
</html>
