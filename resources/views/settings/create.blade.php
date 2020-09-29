@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card uper">
                    <div class="card-header">
                        Create Division
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        <form method="post" action="{{ route('settings.store') }}">
                            <div class="form-group">
                                @csrf
                                <label for="agency_name">Agency Name:</label>
                                <input type="text" class="form-control" name="agency_name" value="{{ old('agency_name') }}" />
                                <br>
                                <label for="abbrev">Abbreviation:</label>
                                <input type="text" class="form-control" name="abbrev" value="{{ old('abbrev') }}" />
                                <br>
                                <label for="logo">Logo:</label>
                                <input type="text" class="form-control" name="logo" value="{{ old('logo') }}" />
                                <br>
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" />
                                <br>
                                <label for="contact_no">Contact Number:</label>
                                <input type="text" class="form-control" name="contact_no" value="{{ old('contact_no') }}" />
                                <br>
                                <label for="website">Website:</label>
                                <input type="text" class="form-control" name="website" value="{{ old('website') }}" />
                                <br>
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                                <br>
                                <label for="background">Background:</label>
                                <textarea class="form-control" name="background" value="{{ old('background') }}"></textarea>
                                <br>
                                <label for="vision">Vision:</label>
                                <textarea class="form-control" name="vision" value="{{ old('vision') }}"></textarea>
                                <br>
                                <label for="mandate">Mandate:</label>
                                <textarea class="form-control" name="mandate" value="{{ old('mandate') }}"></textarea>
                                <br>
                                <label for="mission">Mission:</label>
                                <textarea class="form-control" name="mission" value="{{ old('mission') }}"></textarea>
                                <br>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Unit</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

