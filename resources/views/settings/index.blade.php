@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-50">
            <div class="card">
                <div class="card-header">{{ __('Configuration') }}</div>

                <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a href="{{ route('settings.create') }}" class="btn btn-info" role="button">{{ __('Add Setting') }}</a>

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
                                        <td>Agency Name</td>
                                        <td>Abbreviation</td>
                                        <td>Logo</td>
                                        <td>Address At</td>
                                        <td>Contact No.</td>
                                        <td>Website</td>
                                        <td>Email</td>
                                        <td>Background</td>
                                        <td>Vision</td>
                                        <td>Mandate</td>
                                        <td>Mission</td>
                                        <td colspan="2">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($settings as $setting)
                                        <tr>
                                            <td>{{$setting->agency_name}}</td>
                                            <td>{{$setting->abbrev}}</td>
                                            <td>{{$setting->logo}}</td>
                                            <td>{{$setting->address}}</td>
                                            <td>{{$setting->contact_no}}</td>
                                            <td>{{$setting->website}}</td>
                                            <td>{{$setting->email}}</td>
                                            <td>{{$setting->background}}</td>
                                            <td>{{$setting->vision}}</td>
                                            <td>{{$setting->mandate}}</td>
                                            <td>{{$setting->mission}}</td>
                                            <td><a href="{{ route('settings.edit',$setting->id)}}" class="btn btn-primary">Edit</a></td>
                                            <td>
                                                <form action="{{ route('settings.destroy', $setting->id)}}" method="post">
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
