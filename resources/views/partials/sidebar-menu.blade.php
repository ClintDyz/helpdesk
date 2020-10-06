<nav id="sidebar">
    <div class="px-3">
        {{--  <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>  --}}
        <ul class="list-unstyled components mb-5">
            <!-- Level 1 -->

            @if (count($submenus) > 0)
                @foreach ($submenus as $sub1)

            <li>
                    @if ($sub1['has_sub_menu'])
                <a href="#{{ $sub1['slug'] }}"
                   data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    {{ $sub1['name'] }}
                </a>
                <ul class="collapse list-unstyled" id="{{ $sub1['slug'] }}">
                    <!-- Level 2 -->

                        @if (count($sub1['sub_menu']) > 0)
                            @foreach ($sub1['sub_menu'] as $sub2)

                    <li>
                                @if ($sub2['has_sub_menu'])
                        <a href="#{{ $sub2['slug'] }}"
                           data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            {{ $sub2['name'] }}
                        </a>
                        <ul class="collapse list-unstyled" id="{{ $sub2['slug'] }}">
                            <!-- Level 3 -->

                                    @if (count($sub2['sub_menu']) > 0)
                                        @foreach ($sub2['sub_menu'] as $sub3)
                            <li>
                                            @if ($sub3['has_sub_menu'])

                                            @else
                                                @if (!$sub3['has_file_link'] && File::exists($sub3['file_link']) && $sub3['file_link'])
                                <a href="#" onclick="$(this).displayPDF('{{ url($sub3['file_link']) }}');">
                                    {{ $sub3['name'] }}
                                </a>
                                                @else
                                <a href="{{ $sub3['file_link'] }}" target="{{ $sub3['file_link'] != '#' ? '_blank' : '_self' }}">
                                    {{ $sub3['name'] }}
                                </a>
                                                @endif
                                            @endif
                            </li>
                                        @endforeach
                                    @endif

                            <!-- End Level 2 -->
                        </ul>
                                @else
                                    @if (!$sub2['has_file_link'] && File::exists($sub2['file_link']) && $sub2['file_link'])
                        <a href="#" onclick="$(this).displayPDF('{{ url($sub2['file_link']) }}');">
                            {{ $sub2['name'] }}
                        </a>
                                    @else
                        <a href="{{ $sub2['file_link'] }}" target="{{ $sub2['file_link'] != '#' ? '_blank' : '_self' }}">
                            {{ $sub2['name'] }}
                        </a>
                                    @endif
                                @endif
                    </li>

                            @endforeach
                        @endif

                    <!-- End Level 2 -->
                </ul>
                    @else
                        @if (!$sub1['has_file_link'] && File::exists($sub1['file_link']) && $sub1['file_link'])
                <a href="#" onclick="$(this).displayPDF('{{ url($sub1['file_link']) }}');">
                    {{ $sub1['name'] }}
                </a>
                        @else
                <a href="{{ $sub1['file_link'] }}" target="{{ $sub1['file_link'] != '#' ? '_blank' : '_self' }}">
                    {{ $sub1['name'] }}
                </a>
                        @endif
                    @endif
            </li>
            <li>&nbsp;</li>

                @endforeach
            @endif

            <!-- End Level 1 -->
        </ul>
    </div>
</nav>
