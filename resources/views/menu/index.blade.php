@extends('layouts.app')

@section('content')

<!--Main layout-->
<main class="py-4 pt-5">
    <div class="container-fluid wow animated fadeIn">
		<div class="row mt-3">
			<div class="col-xs-12 col-md-12">
				<div class="card z-depth-1" style="background: #00000066;">
					<div class="card-body" style="background: #ffffffbf;">
						<div class="card-title">
							<img src="{{ url('images/icons/HelpDesk.png') }}">
                        </div>

						<div id="infosys-display" class="card-body rounded white px-0">
							<div class="row pl-5 pr-5">

                                <!--Carousel Wrapper-->
                                <div id="carousel-item" class="carousel slide carousel-multi-item" data-ride="carousel">

                                    <!--Controls-->
                                    @if (count($menus) > 0)
                                    <div class="controls-top">
                                        <a class="btn btn-primary btn-rounded" href="#carousel-item" data-slide="prev">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                        <a class="btn btn-primary btn-rounded" href="#carousel-item" data-slide="next">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                    @endif
                                    <!--/.Controls-->

                                    <!--Indicators-->
                                    <ol class="carousel-indicators">
                                        @if (count($menus) > 0)
                                            @foreach($menus as $slideNo => $menu)
                                        <li data-target="#carousel-item" data-slide-to="{{ $slideNo }}"
                                            class="{{ $slideNo == 0 ? 'active' : '' }}"></li>
                                            @endforeach
                                        @endif
                                    </ol>
                                    <!--/.Indicators-->

                                    <!--Slides-->
                                    <div class="carousel-inner" role="listbox">

                                        @if (count($menus) > 0)
                                            @foreach($menus as $slideNo => $items)

                                        <!--Slide {{ $slideNo }}-->
                                        <div class="carousel-item {{ $slideNo == 0 ? 'active' : '' }}">

                                                @if (count($items) > 0)
                                                    @foreach ($items as $menu)

                                            <div class="col-md-3">
                                                <!-- Card -->
                                                <div class="card promoting-card">

                                                    <!-- Card image -->
                                                    <div class="view overlay border">
                                                        <img class="card-img-top rounded-0" src="{{ $menu->photo ? url($menu->photo) : url('images/icons/blankmenu.jpg') }}"
                                                            alt="{{ $menu->slug }}">
                                                        <a href="{{ url('sub/'.$menu->slug) }}">
                                                            <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>

                                                    <!-- Card content -->
                                                    <div class="card-body">
                                                        <div class="collapse-content">

                                                            <!-- Text -->
                                                            <p class="card-text collapse d-block" id="{{ $menu->slug }}">
                                                                <span class="d-block text-center">
                                                                    <b>{{ strtoupper($menu->name) }}</b>
                                                                </span>

                                                                {!! $menu->description ? "<br><br>$menu->description" : ''!!}
                                                            </p>

                                                            <!-- Button -->
                                                            <a class="btn btn-flat btn-sm btn-block indigo-text p-1 my-1 mr-0 mml-1 collapsed"
                                                            data-toggle="collapse" href="#{{ $menu->slug }}"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card -->

                                            </div>

                                                    @endforeach

                                                    @if (count($items) < 4)
                                                        @for ($itemCtr = count($items); $itemCtr < 4; $itemCtr++)

                                            <div class="col-md-3">
                                                <!-- Card -->
                                                <div class="card promoting-card">

                                                    <!-- Card image -->
                                                    <div class="view overlay border">
                                                        <img class="card-img-top rounded-0" src="{{ url('images/icons/blankmenu.jpg') }}"
                                                            alt="blankmenu">
                                                        <a href="#">
                                                            <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>

                                                    <!-- Card content -->
                                                    <div class="card-body">
                                                        <div class="collapse-content">

                                                            <!-- Text -->
                                                            <p class="card-text collapse d-block" id="blankmenu-{{ $slideNo }}-{{ $itemCtr }}">
                                                            </p>

                                                            <!-- Button -->
                                                            <a class="btn btn-flat btn-sm btn-block grey-text p-1 my-1 mr-0 mml-1 collapsed"
                                                            data-toggle="collapse" href="#blankmenu-{{ $slideNo }}-{{ $itemCtr }}"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card -->

                                            </div>

                                                        @endfor
                                                    @endif
                                                @endif

                                        </div>
                                        <!--/.Slide {{ $slideNo }}-->

                                            @endforeach
                                        @endif

                                    </div>
                                    <!--/.Slides-->

                                </div>
                                <!--/.Carousel Wrapper-->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection

@section('custom-js')

<script>

</script>

@endsection
