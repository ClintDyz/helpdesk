@extends('layouts.app')

@section('content')

<!--Main layout-->
<main class="mt-5 py-4 pt-5">
    <div class="container-fluid wow animated fadeIn">
		<div class="row mt-3">
			<div class="col-xs-12 col-md-12">
				<div class="card z-depth-1">
					<div class="card-body" style="background: #2f45754f;">
						<div class="card-title">
                            <img src="{{ url('images/icons/HelpDesk.png') }}">
						</div>
						<div id="infosys-display" class="card-body rounded white p-5">
                            <form action="{{ Route('menu.order.update') }}" method="POST">
                                @csrf

                                <input type="hidden" id="order" name="order">

                                <div class="btn-group float-right" role="group">
                                    <button type="submit" class="btn btn-orange btn-sm">
                                        Update
                                    </button>
                                    <a type="button" class="btn btn-red btn-sm" href="{{ Route('menu.index') }}">
                                        Cancel
                                    </a>
                                </div>

                                <div class="row pl-5 pr-5 sortable">
                                    @if (count($menuList) > 0)
                                        @foreach($menuList as $menu)
                                    <div class="col-sm-4 col-md-3 col-lg-2 mt-3 ui-state-default"
                                        id="{{ $menu->slug }}">
                                        <div class="card">
                                            <div class="card-body text-center p-0">
                                                <div class="card-body p-0">
                                                    <a class="btn btn-white p-0" href="{{ url('sub/'.$menu->slug) }}"
                                                    data-toggle="tooltip" data-placement="bottom" title="name-title">
                                                        <div class="view overlay zoom cursor-pointer">
                                                            <img class="card-img-top img-fluid" src="{{ $menu->photo ? url($menu->photo) : '#' }}"
                                                                alt="{{ $menu->slug }}">
                                                        </div>
                                                    </a>
                                                    <a class="btn btn-white btn-block waves-effect waves-light p-1"
                                                        href="{{ url('sub/'.$menu->slug) }}">
                                                        <strong><i class="fas fa-external-link-alt"></i> {{ $menu->name }}</strong>
                                                    </a>
                                                    <div class="btn-group btn-toolbar w-100" role="group" aria-label="Basic example">
                                                        <a class="btn btn-light waves-effect waves-light black-text p-1 w-50"
                                                        data-toggle="tooltip" data-placement="top" title="">
                                                            <i class="fas fa-info-circle"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                    @endif
                                </div>
                            </form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection

@section('custom-js')

<script src="{{ Asset('js/helpdesk-menu.js') }}"></script>

@endsection
