@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
    <div class="card uper">
        <div class="card-header">
            Edit Division
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
            <form method="post" action="{{ route('divisions.update', $divisions->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Division Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$divisions->name}}"/>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
