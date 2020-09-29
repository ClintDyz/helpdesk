@extends('layouts.backend')

@section('content')

<!--Main layout-->
<div class="mt-5 py-4 pt-5">
    <div class="container-fluid wow animated fadeIn">
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Welcome to DOST-CAR Citizens' Charter Dashboard
                    </div>
                    <div class="card-body">
                        Hi {!! Auth::user()->firstname !!}, you are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
