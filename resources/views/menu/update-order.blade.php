@extends('layouts.backend')

@section('content')

<div class="container-fluid mt-5 py-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card uper">
                    <div class="card-header">
                        Heldesk Menu Order
                    </div>
                    <div id="infosys-display" class="card-body rounded white p-5">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br>
                        @endif

                        <form action="{{ Route('menu.order.update') }}" method="POST">
                            @csrf

                            <input type="hidden" id="order" name="order">
                            <div class="row sortable">
                                @if (count($menuList) > 0)
                                    @foreach($menuList as $menu)
                                <div class="col-sm-4 col-md-3 col-lg-2 mt-3 ui-state-default"
                                    id="{{ $menu->slug }}">
                                    <div class="card">
                                        <div class="card-body text-center p-0">
                                            <div class="card-body p-0">
                                                <a class="btn btn-white p-0" data-toggle="tooltip"
                                                   data-placement="bottom" title="name-title">
                                                    <div class="view overlay zoom cursor-pointer">
                                                        <img class="card-img-top img-fluid" src="{{ $menu->photo ? url($menu->photo) : '#' }}"
                                                            alt="{{ $menu->slug }}">
                                                    </div>
                                                </a>
                                                <a class="btn btn-white btn-block waves-effect waves-light p-1"
                                                    href="#">
                                                    <strong>
                                                        <small>
                                                            <i class="fas fa-external-link-alt"></i> {{ $menu->name }}
                                                        </small>
                                                    </strong>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @endif
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block btn-md">
                                        Update
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

@section('custom-js')

<script src="{{ Asset('js/helpdesk-menu.js') }}"></script>

@endsection
