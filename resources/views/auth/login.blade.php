@extends('layouts.app')

@section('custom-css')
    <style>
        body {
            background: #FFF !important;
        }
        .btn-primary, .btn-primary:active, .btn-primary.active {
            background-color: #ff4f7b !important;
            border-color: #ff4f7b !important;
            transition: all .5s;
            color: #ffffff !important;
        }
        .btn {
            border-radius: .25rem;
            font-weight: 400;
            border-width: 2px;
            font-style: normal;
            letter-spacing: normal;
            margin: .4rem .8rem;
            white-space: normal;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            display: -webkit-inline-flex;
            display: inline-flex;
            -webkit-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            justify-content: center;
            word-break: break-word;
            padding: 0.8rem 2rem;
            border-radius: 0.25rem;
        }
        .form-control, .form-control:focus {
            border: 1px solid #e8e8e8;
        }
        .form-control {
            background-color: #f5f5f5;
            box-shadow: none;
            color: #565656;
            font-family: 'PT Sans', sans-serif;
            font-size: 1rem;
            line-height: 1.43;
            min-height: 3.5em;
            padding: 1.07em .5em;
        }
        .card {
            -webkit-box-shadow: 0 0 transparent;
            box-shadow: 0 0 transparent;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="pt-5">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email/Username') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror @error('username') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror @error('username') is-invalid @enderror"
                                      name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
