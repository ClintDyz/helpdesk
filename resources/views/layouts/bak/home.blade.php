@extends('layouts.app')

@section('content')
<style>
    .uper {
      margin-top: -200px;
    }
  </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Welcome to DOST-CAR Citizens' Charter Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hi {{ Auth::user()->firstname }}, You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
