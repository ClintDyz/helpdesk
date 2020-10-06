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
                            <p class="text-center px-5">
                                <b>{{ strtoupper($config->agency_name) }} {!! $config->abbrev ? "($config->abbrev)" : '' !!}</b><br>
                                <small>{!! $config->address ? "$config->address<br>" : '' !!}</small>
                                <small>
                                    @if ($config->contact_no && $config->email)
                                    {!! "$config->contact_no | $config->email<br>" !!}
                                    @elseif ($config->contact_no && !$config->email)
                                    {!! "$config->contact_no<br>" !!}
                                    @elseif (!$config->contact_no && $config->email)
                                    {!! "$config->email<br>" !!}
                                    @endif
                                </small>
                                <small>{!! $config->website ? "$config->website<br>" : '' !!}</small>
                            </p>

                            @if ($config->background)
                            <hr>
                            <p class="text-center p-5">
                                <b>Background</b><br><br>
                                {{ $config->background }}
                            </p>
                            @endif

                            @if ($config->vision)
                            <hr>
                            <p class="text-center p-5">
                                <b>Vision</b><br><br>
                                {{ $config->vision }}
                            </p>
                            @endif

                            @if ($config->mandate)
                            <hr>
                            <p class="text-center p-5">
                                <b>Mandate</b><br><br>
                                {{ $config->mandate }}
                            </p>
                            @endif

                            @if ($config->mission)
                            <hr>
                            <p class="text-center p-5">
                                <b>Mission</b><br><br>
                                {{ $config->mission }}
                            </p>
                            @endif
                        </div>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection



