
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/mobirise/icons/mobirise-icons/mobirise-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/tether/tether.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dropdown/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/theme2/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/mobirise/css/mbr-additional.css') }}">

    <!-- Custom styles -->
    @yield('custom-css')
    <link rel="stylesheet" href="{{ asset('css/skin.css') }}">
</head>
<body>
    <header class="menu cid-r6VkWYIybb" once="menu" id="menu1-0">
        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg text-white">
            <div class="navbar-brand">
                <span class="navbar-caption-wrap">
                    <a class="navbar-caption display-4" href="{{ url('/') }}">
                        {{--  DOST-CAR  --}}
                        <img src="images/logo/logo cc_draft.png" class="img-fluid" alt="" width="50" height="50">
                    </a>
                </span>
            </div>
            <main class="py-4 container-fluid">


            @yield('about')

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                   data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup"
                   aria-expanded="false" aria-label="Toggle navigation">
               <div class="hamburger">
                   <span></span>
                   <span></span>
                   <span></span>
                   <span></span>
               </div>
           </button>
        </nav>
    </header>

    <main class="py-4 container-fluid">



        @yield('content')


    </main>

    <section once="" class="cid-qyvfbdUvMJ fixed-bottom" id="footer6-5" data-rv-view="794">
        <div class="container">
            <div class="media-container-row align-center mbr-white">
                <div class="col-12">
                    <p class="mbr-text mb-0 mbr-fonts-style display-7">
                        © Copyright {{ date('Y') }}  - All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('plugins/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/tether/tether.min.js') }}"></script>
    <script src="{{ asset('plugins/dropdown/js/script.min.js') }}"></script>
    <script src="{{ asset('plugins/touch-swipe/jquery.touch-swipe.min.js') }}"></script>
    <script src="{{ asset('plugins/smooth-scroll/smooth-scroll.js') }}"></script>
    <script src="{{ asset('plugins/theme2/js/script.js') }}"></script>
    <script src="{{ asset('plugins/formoid/formoid.min.js') }}"></script>

    <!-- Custom scripts -->
    @yield('custom-js')
</body>
</html>
