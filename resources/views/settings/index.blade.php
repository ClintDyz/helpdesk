@extends('layouts.backend')

@section('content')

<div class="mt-5 py-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header stylish-color white-text">{{ __('Configuration') }}</div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        {{--
                        <a href="{{ route('settings.create') }}" class="btn btn-info"
                           role="button">{{ __('Add Setting') }}</a>
                        --}}
                    </li>
                </ul>

                <div class="card-body">
                    <div class="pt-3">
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br>
                        @endif

                        @if(session()->get('failed'))
                        <div class="alert alert-danger">
                            {{ session()->get('failed') }}
                        </div><br>
                        @endif
                    </div>

                    <div class="table-responsive z-depth-1">
                        <table class="table table-striped">
                            <thead>
                                <tr class="unique-color white-text">
                                    <th width="76%" class="text-center">
                                        <small>AGENCY</small>
                                    </th>
                                    <th width="13%" class="text-center">
                                        <small>UPDATED AT</small>
                                    </th>
                                    <th width="11%" class="text-center">
                                        <small>Action</small>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($settings as $ctr => $setting)
                                <tr>
                                    <td>
                                        <p>
                                            <b class="font-weight-bolder">Logo:</b> {{$setting->logo}}<br>
                                            <b class="font-weight-bolder">Agency Name:</b> {{$setting->agency_name}} ({{$setting->abbrev}})<br>
                                            <b class="font-weight-bolder">Address:</b> {{$setting->address}}<br>
                                            <b class="font-weight-bolder">Contact No.:</b> {{$setting->contact_no}}<br>
                                            <b class="font-weight-bolder">Website:</b> {{$setting->website}}<br>
                                            <b class="font-weight-bolder">Email:</b> {{$setting->email}}<br>
                                            <b class="font-weight-bolder">Background:</b> {{$setting->background}}<br>
                                            <b class="font-weight-bolder">Vision:</b> {{$setting->vision}}<br>
                                            <b class="font-weight-bolder">Mandate:</b> {{$setting->mandate}}<br>
                                            <b class="font-weight-bolder">Mission:</b> {{$setting->mission}}/p>
                                    </td>
                                    <td align="center">{{$setting->updated_at}}</td>
                                    <td>
                                        <a href="{{ route('settings.edit', $setting->id)}}"
                                            class="btn btn-sm btn-outline-orange btn-block z-depth-0">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        {{--
                                        <a class="btn btn-sm btn-outline-red btn-block mt-2 z-depth-0"
                                            onclick="$('#destroy-{{ $ctr }}').submit();">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <form action="{{ route('settings.destroy', $setting->id)}}" id="destroy-{{ $ctr }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
