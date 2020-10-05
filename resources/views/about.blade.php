@extends('layouts.app')

@section('content')
<!--Main layout-->

<main class="py-4 mb-4 pt-5">
    <div class="container wow animated fadeIn">
		<div class="row mt-3">
			<div class="col-xs-12 col-md-12">
				<div class="card z-depth-1>
					<div class="card-body">
                        <div class="card-header">
                            <h4>{{ __('About Us') }}</h4>

                            <a class="btn btn-primary btn-sm float-right" href="{{ route('home') }}">Back</a>
                        </div>

                        <div class="card-body">
                            <p class="text-center">
                                <b>{{ strtoupper($config->agency_name) }} {!! $config->abbrev ? "($config->abbrev)" : '' !!}</b><br>
                                <small>{!! $config->address ? "$config->address<br>" : '' !!}</small>
                                <small>{!! $config->contact_no ? "$config->contact_no<br>" : '' !!}</small>
                                <small>{!! $config->website ? "$config->website<br>" : '' !!}</small>
                            </p>
                            <hr>
                            <p class="text-center p-5">
                                <b>Background</b><br>
                                {{ $config->background }}
                            </p>
                            <hr>
                            <p class="text-center p-5">
                                <b>Vision</b><br>
                                {{ $config->vision }}
                            </p>
                            <hr>
                            <p class="text-center p-5">
                                <b>Mandate</b><br>
                                {{ $config->mandate }}
                            </p>
                            <hr>
                            <p class="text-center p-5">
                                <b>Mission</b><br>
                                {{ $config->mission }}
                            </p>
                        </div>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection



