@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Divisions') }}</div>

                <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a href="{{ route('divisions.create') }}" class="btn btn-info" role="button">{{ __('Add Division') }}</a>
                                <!-- <a class="nav-link" href="divisions/create">{{ __('Add Division') }}</a> -->
                                <!-- <button type="button" class="btn btn-success" href="divisions/create">Add Division</button> -->
                            </li>

                    </ul>

                <div class="card-body">

                                <style>
                                .uper {
                                    margin-top: 40px;
                                }
                                </style>
                                <div class="uper">
                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                    </div><br />
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <td>ID</td>
                                        <td>Division Name</td>
                                        <td>Created At</td>
                                        <td>Updated At</td>
                                        <td colspan="2">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($divisions as $division)
                                        <tr>
                                            <td>{{$division->id}}</td>
                                            <td>{{$division->name}}</td>
                                            <td>{{$division->created_at}}</td>
                                            <td>{{$division->updated_at}}</td>
                                            <td><a href="{{ route('divisions.edit', $division->id)}}" class="btn btn-primary">Edit</a></td>
                                            <td>
                                                <form action="{{ route('divisions.destroy', $division->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
