@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
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
                <button type="submit" class="btn btn-primary">Add Division</button>
            </form>
        </div>
    </div>
</div>
@endsection
