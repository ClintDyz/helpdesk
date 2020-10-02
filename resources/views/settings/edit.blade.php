@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
    <div class="card uper mb-5">
        <div class="card-header">
            Update Configuration
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br>
            @endif

            <form method="post" action="{{ route('settings.update', $settings->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="agency_name">Agency Name:</label>
                    <input type="text" class="form-control" name="agency_name" value="{{ $settings->agency_name}}" />
                </div>
                <div class="form-group">
                    <label for="abbrev">Abbreviation:</label>
                    <input type="text" class="form-control" name="abbrev" value="{{ $settings->abbrev}}" />
                </div>
                <div class="form-group">
                    <label for="logo">Logo:</label>
                    <input type="text" class="form-control" name="logo" value="{{ $settings->logo}}" />
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" name="address"  value="{{ $settings->address}}"/>
                </div>
                <div class="form-group">
                    <label for="contact_no">Contact Number:</label>
                    <input type="text" class="form-control" name="contact_no"  value="{{ $settings->contact_no}}" />
                </div>
                <div class="form-group">
                    <label for="website">Website:</label>
                    <input type="text" class="form-control" name="website" value="{{ $settings->website}}"/>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email"  value="{{ $settings->email}}" />
                </div>
                <div class="form-group">
                    <label for="background">Background:</label>
                    <textarea class="form-control" name="background"  value="{{ $settings->background}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="vision">Vision:</label>
                    <textarea class="form-control" name="vision"  value="{{ $settings->vision}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="mandate">Mandate:</label>
                    <textarea class="form-control" name="mandate"  value="{{ $settings->mandate}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="mission">Mission:</label>
                    <textarea class="form-control" name="mission"  value="{{ $settings->mission}}"></textarea>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-block btn-md">
                            Update
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ Route('settings.index') }}" class="btn btn-light btn-block btn-md">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
