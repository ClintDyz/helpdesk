@extends('layouts.backend')

@section('content')

<div class="mt-5 py-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header stylish-color white-text">{{ __('Units') }}</div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('units.create') }}" class="btn btn-info" role="button">{{ __('Add Unit') }}</a>
                            <!-- <a class="nav-link" href="units/create">{{ __('Add Unit') }}</a> -->
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
                                        <th width="30%" class="text-center">
                                            <small>UNIT NAME</small>
                                        </th>
                                        <th width="30%" class="text-center">
                                            <small>DIVISION</small>
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
                                    @foreach($units as $ctr => $unit)
                                    <tr>
                                        <td align="center">{{ $units->firstItem() + $ctr }}</td>
                                        <td>{{$unit->name}}</td>
                                        <td>{{$unit->userDivision->name}}</td>
                                        <td align="center">{{$unit->created_at}}</td>
                                        <td align="center">{{$unit->updated_at}}</td>
                                        <td>
                                            <a href="{{ route('units.edit', $unit->id)}}"
                                               class="btn btn-sm btn-outline-orange btn-block z-depth-0">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-red btn-block mt-2 z-depth-0"
                                               onclick="$('#destroy-{{ $ctr }}').submit();">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                            <form action="{{ route('units.destroy', $unit->id)}}" id="destroy-{{ $ctr }}"
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
                                {{ $units->links() }}
                            </div>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
