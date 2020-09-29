@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="card uper">
                            <div class="card-header">
                                Edit System Setting
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
                                <form method="post" action="{{ route('settings.update', $settings->id) }}">
                                    <div class="form-group">
                                        @csrf
                                        @method('PATCH')
                                        <label for="agency_name">Agency Name:</label>
                                        <input type="text" class="form-control" name="agency_name" value="{{ $settings->agency_name}}" />
                                        <br>
                                        <label for="abbrev">Abbreviation:</label>
                                        <input type="text" class="form-control" name="abbrev" value="{{ $settings->abbrev}}" />
                                        <br>
                                        <label for="logo">Logo:</label>
                                        <input type="text" class="form-control" name="logo" value="{{ $settings->logo}}" />
                                        <br>
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" name="address"  value="{{ $settings->address}}"/>
                                        <br>
                                        <label for="contact_no">Contact Number:</label>
                                        <input type="text" class="form-control" name="contact_no"  value="{{ $settings->contact_no}}" />
                                        <br>
                                        <label for="website">Website:</label>
                                        <input type="text" class="form-control" name="website" value="{{ $settings->website}}"/>
                                        <br>
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email"  value="{{ $settings->email}}" />
                                        <br>
                                        <label for="background">Background:</label>
                                        <textarea class="form-control" name="background"  value="{{ $settings->background}}"></textarea>
                                        <br>
                                        <label for="vision">Vision:</label>
                                        <textarea class="form-control" name="vision"  value="{{ $settings->vision}}"></textarea>
                                        <br>
                                        <label for="mandate">Mandate:</label>
                                        <textarea class="form-control" name="mandate"  value="{{ $settings->mandate}}"></textarea>
                                        <br>
                                        <label for="mission">Mission:</label>
                                        <textarea class="form-control" name="mission"  value="{{ $settings->mission}}"></textarea>
                                        <br>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
