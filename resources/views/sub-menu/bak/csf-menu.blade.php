@extends('layouts.app')

@section('custom-css')

<link rel="stylesheet" href="{{ Asset('css/stackpath.css') }}">
<link rel="stylesheet" href="{{ Asset('css/style_sidebar.css') }}">

@endsection

@section('side-nav')

@include('partials.sidebar_csf')

@endsection

@section('content')

<!--Main layout-->
<div class="py-5 pdf-frame-container">
    <div class="container-fluid pt-3">
        <div class="row mt-3">
            <div class="col-xs-12 col-md-12">
                <div class="card z-depth-1">
                    <div class="card">
                        <div class="card-body p-2">
                            <iframe id="viewer" src="" width="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-js')

<script type="text/javascript" src="{{ Asset('js/rocket-loader.min.js') }}"></script>
<script>
    $(function() {
        $.fn.displayPDF = function(url) {
            $("#viewer").attr('src', url);
        }
    });
</script>

@endsection
