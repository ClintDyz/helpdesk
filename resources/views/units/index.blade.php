@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Units') }}</div>

                <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a href="{{ route('units.create') }}" class="btn btn-info" role="button">{{ __('Add Unit') }}</a>
                                <!-- <a class="nav-link" href="units/create">{{ __('Add Unit') }}</a> -->
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
                                        <td>Unit Name</td>
                                        <td>Division</td>
                                        <td>Created At</td>
                                        <td>Updated At</td>
                                        <td colspan="2">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($units as $unit)
                                        <tr>
                                            <td>{{$unit->id}}</td>
                                            <td>{{$unit->name}}</td>
                                            <td>{{$unit->division}}</td>
                                            <td>{{$unit->created_at}}</td>
                                            <td>{{$unit->updated_at}}</td>
                                            <td><a href="{{ route('units.edit',$unit->id)}}" class="btn btn-primary">Edit</a></td>
                                            <td>
                                                <form action="{{ route('units.destroy', $unit->id)}}" method="post">
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
