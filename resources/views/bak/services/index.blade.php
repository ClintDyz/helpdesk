@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Units') }}</div>

                <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a href="{{ route('charters.create') }}" class="btn btn-info" role="button">{{ __('Add Unit') }}</a>
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

                                    </tbody>
                                </table>
                                <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
