@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Attachments') }}</div>
{{--
                <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a href="{{ route('divisions.create') }}" class="btn btn-info" role="button">{{ __('Add Division') }}</a>
                                <!-- <a class="nav-link" href="divisions/create">{{ __('Add Division') }}</a> -->
                                <!-- <button type="button" class="btn btn-success" href="divisions/create">Add Division</button> -->
                            </li>

                    </ul>  --}}

                <div class="card-body">

                            <h2>{{ $data->id }}

                            <p>
                                <iframe src="{{ url('/'.$data->directory) }}"></iframe>
                            </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
