@extends('layouts.backend')

@section('content')

<div class="mt-5 py-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header stylish-color white-text">{{ __('Divisions') }}</div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('divisions.create') }}" class="btn btn-info" role="button">{{ __('Add Division') }}</a>
                            <!-- <a class="nav-link" href="divisions/create">{{ __('Add Division') }}</a> -->
                            <!-- <button type="button" class="btn btn-success" href="divisions/create">Add Division</button> -->
                        </li>
                    </ul>

                    <div class="card-body">
                        <div class="pt-3">
                            @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div><br>
                            @endif
                        </div>

                        <div class="table-responsive z-depth-1">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="unique-color white-text">
                                        <th width="3%" class="text-center">
                                            <small>#</small>
                                        </th>
                                        <th width="60%" class="text-center">
                                            <small>DIVISION NAME</small>
                                        </th>
                                        <th width="13%" class="text-center">
                                            <small>CREATED AT</small>
                                        </th>
                                        <th width="13%" class="text-center">
                                            <small>UPDATED AT</small>
                                        </th>
                                        <th width="11%" class="text-center">
                                            <small>ACTION</small>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($divisions as $ctr => $division)
                                    <tr>
                                        <td>{{ $divisions->firstItem() + $ctr }}</td>
                                        <td>{{$division->name}}</td>
                                        <td align="center">{{$division->created_at}}</td>
                                        <td align="center">{{$division->updated_at}}</td>
                                        <td>

                                            <a href="{{ route('divisions.edit', $division->id)}}"
                                                class="btn btn-sm btn-outline-orange btn-block z-depth-0">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-red btn-block mt-2 z-depth-0"
                                                onclick="$('#destroy-{{ $ctr }}').submit();">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                            <form action="{{ route('divisions.destroy', $division->id)}}" id="destroy-{{ $ctr }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row pt-5">
                            <div class="col-md-12 flex-center">
                                {{ $divisions->links() }}
                            </div>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
