@extends('layouts.appindex')

@section('about')

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <a class="nav-link link text-black display-4" href="about">
        About Us
    </a>
</div>

<div class="navbar-buttons mbr-section-btn">
    @guest
    <a class="btn btn-sm btn-black display-4" href="{{ route('login') }}">
        Login
    </a>
    @else
    <a class="btn btn-sm btn-black display-4" href="{{ route('home') }}">
        Dashboard
    </a>
    @endif
</div>

@endsection

@section('content')

<section class="header6 cid-r6VlsNWFje mbr-parallax-background" id="header6-8">
    <div class="mbr-overlay" style="opacity: 0.2;"></div>
    <div class="container align-left">
        <div class="row justify-content-center">
            <div class="media-container-column mbr-white col-md-10">
               <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-1">
                   Welcome to DOST-CAR Interactive Citizens' Charter
                </h1>
                <div class="mbr-section-btn align-center pt-3">
                    <a class="btn btn-md btn-white display-4" href="homeservices">
                        Proceed to Programs & Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
