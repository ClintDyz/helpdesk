@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                        <form method="post" action="{{ route('divisions.store') }}">
                            <div class="form-group">
                                @csrf
                                <label for="name">Division Name:</label>
                                <input type="textarea" class="form-control" name="name" value="{{ old('name') }}"/>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block btn-md">
                                        Add Division
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ Route('divisions.index') }}" class="btn btn-light btn-block btn-md">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
