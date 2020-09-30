@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
    <div class="card uper mb-5">
        <div class="card-header">
            Update Menu
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br>
            @endif

            <form class="form-container" id="form-data" action="{{ Route('menus.update', $id) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="px-3">
                    <h5>Container 1</h5>
                    <div class="parent-menu border p-3" id="parent-menu-1">
                        <blockquote class="blockquote mb-0">
                            <h5>
                                <div class="row">
                                    <div class="col-md-10">
                                        Level 1
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-red btn-sm btn-block btn-rounded"
                                                onclick="$(this).deleteMenu('#parent-menu-1');">
                                            <i class="fas fa-minus-circle"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </h5>
                            <div class="md-form form-sm">
                                <input type="text" id="name" class="form-control form-control-sm name"
                                       value="{{ $menu->name }}" required>
                                <label for="name">
                                    Menu Name <span class="red-text">*</span>
                                </label>
                            </div>
                            <div class="md-form form-sm">
                                <textarea class="md-textarea form-control form-control-sm description" rows="1"
                                        id="description">{{ $menu->description }}</textarea>
                                <label for="description">
                                    Description (Optional)
                                </label>
                            </div>
                            <div class="md-form form-sm">
                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Choose file</span>
                                        <input type="file" class="photo" name="files[]"
                                               value="{{ url($menu->photo) }}">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload a photo or logo..."
                                               value="{{ $menu->photo }}">
                                    </div>
                                </div>
                            </div>
                            <hr>

                            {{-- 2nd Level --}}
                            @if (count($submenus) > 0)
                                @foreach ($submenus as $subCtr1 => $sub1)
                            <div class="child-menu p-3 border" id="child-menu-1-{{ $subCtr1 + 1 }}">
                                <blockquote class="blockquote mb-0">
                                    <h5>
                                        <div class="row">
                                            <div class="col-md-10">
                                                Level 2
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-red btn-sm btn-block btn-rounded"
                                                        onclick="$(this).deleteMenu('#child-menu-1-{{ $subCtr1 + 1 }}');">
                                                    <i class="fas fa-minus-circle"></i> Delete
                                                </button>
                                            </div>
                                        </div>
                                    </h5>
                                    <div class="md-form form-sm">
                                        <input type="text" id="submenu-name-1-{{ $subCtr1 + 1 }}-1"
                                               class="submenu-name form-control form-control-sm"
                                               value="{{ $sub1['name'] }}"
                                               required>
                                        <label for="submenu-name-1-{{ $subCtr1 + 1 }}-1">
                                            Sub-menu Name <span class="red-text">*</span>
                                        </label>
                                    </div>
                                    <div class="pb-2 toggle-submenu-container">
                                        <!-- Default switch -->
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="toggle-submenu custom-control-input"
                                                   id="toggle-submenu-1-{{ $subCtr1 + 1 }}-1"
                                                   onclick="$(this).toggleSubMenu('#toggle-submenu-1-{{ $subCtr1 + 1 }}-1');"
                                                   {{ $sub1['has_sub_menu'] ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="toggle-submenu-1-{{ $subCtr1 + 1 }}-1">
                                                Toggle Sub-menu
                                            </label>
                                        </div>
                                    </div>
                                    <hr>

                                    @if ($sub1['has_sub_menu'])

                                        {{-- 3rd Level --}}
                                        @if (count($sub1['sub_menu']) > 0)
                                            @foreach ($sub1['sub_menu'] as $subCtr2 => $sub2)
                                    <div class="child-menu p-3 border" id="child-menu-1-{{ $subCtr1 + 1 }}-1">
                                        <blockquote class="blockquote mb-0">
                                            <h5>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        Level 3
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-red btn-sm btn-block btn-rounded"
                                                                onclick="$(this).deleteMenu(
                                                                    '#child-menu-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}'
                                                                );">
                                                            <i class="fas fa-minus-circle"></i> Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </h5>
                                            <div class="md-form form-sm">
                                                <input type="text" id="submenu-name-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1"
                                                       value="{{ $sub2['name'] }}"
                                                       class="submenu-name form-control form-control-sm" required>
                                                <label for="submenu-name-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1">
                                                    Sub-menu Name <span class="red-text">*</span>
                                                </label>
                                            </div>
                                            <div class="pb-2 toggle-submenu-container">
                                                <!-- Default switch -->
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="toggle-submenu custom-control-input"
                                                           id="toggle-submenu-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1"
                                                           onclick="$(this).toggleSubMenu(
                                                               '#toggle-submenu-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1'
                                                           );"
                                                           {{ $sub2['has_sub_menu'] ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                           for="toggle-submenu-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1">
                                                        Toggle Sub-menu
                                                    </label>
                                                </div>
                                            </div>
                                            <hr>

                                            @if ($sub2['has_sub_menu'])

                                                {{-- 4th Level --}}
                                                @if (count($sub2['sub_menu']) > 0)
                                                    @foreach ($sub2['sub_menu'] as $subCtr3 => $sub3)
                                            <div class="child-menu p-3 border"
                                                 id="child-menu-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1">
                                                <blockquote class="blockquote mb-0">
                                                    <h5>
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                Level 4
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button" class="btn btn-red btn-sm btn-block btn-rounded"
                                                                        onclick="$(this).deleteMenu('${targetSubmenuID}');">
                                                                    <i class="fas fa-minus-circle"></i> Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </h5>
                                                    <div class="md-form form-sm">
                                                        <input type="text" id="submenu-name-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1"
                                                               class="submenu-name form-control form-control-sm"
                                                               value="{{ $sub3['name'] }}"
                                                               required>
                                                        <label for="submenu-name-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1">
                                                            Sub-menu Name <span class="red-text">*</span>
                                                        </label>
                                                    </div>
                                                    <div class="pb-2 toggle-submenu-container">
                                                        <!-- Default switch -->
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="toggle-submenu custom-control-input"
                                                                   id="toggle-submenu-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1"
                                                                   onclick="$(this).toggleSubMenu(
                                                                       '#toggle-submenu-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1'
                                                                   );">
                                                            <label class="custom-control-label" for="toggle-submenu-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1">
                                                                Toggle Sub-menu
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="child-menu p-3 border"
                                                         id="child-menu-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1">
                                                        <div class="pb-2 toggle-submenu-container">
                                                            <!-- Default switch -->
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="toggle-submenu-link custom-control-input"
                                                                       id="toggle-submenu-link-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1-1"
                                                                       onclick="$(this).toggleLinkURL(
                                                                           '#toggle-submenu-link-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1-1'
                                                                       );"
                                                                       {{ $sub3['has_file_link'] ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="toggle-submenu-link-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1-1">
                                                                    Toggle Link/URL
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div id="file-url-container-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1-1">
                                                            <div class="md-form form-sm">

                                                                @if ($sub3['has_file_link'])
                                                                <input type="text" id="fileurl-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1-1"
                                                                       value="{{ $sub2['file_link'] }}"
                                                                       class="fileurl form-control form-control-sm" required>
                                                                <label for="fileurl-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-{{ $subCtr3 + 1 }}-1-1">
                                                                    Enter the URL of the file <span class="red-text">*</span>
                                                                </label>
                                                                @else
                                                                <div class="file-field">
                                                                    <div class="btn btn-primary btn-sm float-left">
                                                                        <span>Choose file</span>
                                                                        <input type="file" class="submenu-attachment" name="files[]">
                                                                    </div>
                                                                    <div class="file-path-wrapper">
                                                                        <input class="file-path validate" type="text"
                                                                               value="{{ File::exists($sub3['file_link']) ? $sub3['file_link'] :
                                                                                      $sub3['file_link'] . ' does not exist' }}"
                                                                               placeholder="Upload a file...">
                                                                    </div>
                                                                </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </blockquote>
                                            </div>
                                                    @endforeach
                                                @endif
                                                {{-- End 4th Level --}}

                                            @else
                                            <div class="child-menu p-3 border"
                                                 id="child-menu-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1">
                                                <blockquote class="blockquote mb-0">
                                                    <div class="pb-2 toggle-submenu-container">
                                                        <!-- Default switch -->
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="toggle-submenu-link custom-control-input"
                                                                id="toggle-submenu-link-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1"
                                                                onclick="$(this).toggleLinkURL(
                                                                    '#toggle-submenu-link-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1'
                                                                );"
                                                                {{ $sub2['has_file_link'] ? 'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                                for="toggle-submenu-link-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1">
                                                                Toggle Link/URL
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="file-url-container-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1">
                                                        <div class="md-form form-sm">
                                                            @if ($sub2['has_file_link'])
                                                            <input type="text" id="fileurl-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1"
                                                                value="{{ $sub2['file_link'] }}"
                                                                class="fileurl form-control form-control-sm" required>
                                                            <label for="fileurl-1-{{ $subCtr1 + 1 }}-{{ $subCtr2 + 1 }}-1">
                                                                Enter the URL of the file <span class="red-text">*</span>
                                                            </label>
                                                            @else
                                                            <div class="file-field">
                                                                <div class="btn btn-primary btn-sm float-left">
                                                                    <span>Choose file</span>
                                                                    <input type="file" class="submenu-attachment" name="files[]">
                                                                </div>
                                                                <div class="file-path-wrapper">
                                                                    <input class="file-path validate" type="text"
                                                                           value="{{ File::exists($sub2['file_link']) ? $sub2['file_link'] :
                                                                                 $sub2['file_link'] . ' does not exist' }}"
                                                                           placeholder="Upload a file...">
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </blockquote>
                                            </div>
                                            @endif

                                        </blockquote>
                                    </div>
                                            @endforeach
                                        @endif
                                        {{-- End 3rd Level --}}

                                    @else
                                    <div class="child-menu p-3 border" id="child-menu-1-{{ $subCtr1 + 1 }}-1">
                                        <blockquote class="blockquote mb-0">
                                            <div class="pb-2 toggle-submenu-container">
                                                <!-- Default switch -->
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="toggle-submenu-link custom-control-input"
                                                        id="toggle-submenu-link-1-{{ $subCtr1 + 1 }}-1-1"
                                                        onclick="$(this).toggleLinkURL('#toggle-submenu-link-1-{{ $subCtr1 + 1 }}-1-1');"
                                                        {{ $sub1['has_file_link'] ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="toggle-submenu-link-1-{{ $subCtr1 + 1 }}-1-1">
                                                        Toggle Link/URL
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="file-url-container-1-{{ $subCtr1 + 1 }}-1-1">
                                                <div class="md-form form-sm">
                                                    @if ($sub1['has_file_link'])
                                                    <input type="text" id="fileurl-1-{{ $subCtr1 + 1 }}-1-1"
                                                        value="{{ $sub1['file_link'] }}"
                                                        class="fileurl form-control form-control-sm" required>
                                                    <label for="fileurl-1-{{ $subCtr1 + 1 }}-1-1">
                                                        Enter the URL of the file <span class="red-text">*</span>
                                                    </label>
                                                    @else
                                                    <div class="file-field">
                                                        <div class="btn btn-primary btn-sm float-left">
                                                            <span>Choose file</span>
                                                            <input type="file" class="submenu-attachment" name="files[]">
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate" type="text"
                                                                   value="{{ File::exists($sub1['file_link']) ? $sub1['file_link'] :
                                                                         $sub1['file_link'] . ' does not exist' }}"
                                                                   placeholder="Upload a file...">
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                    @endif

                                </blockquote>
                            </div>
                                @endforeach
                            @endif
                            {{-- End 2nd Level --}}

                        </blockquote>
                        <button type="button" class="btn btn-outline-info btn-sm btn-block mt-2"
                                onclick="$(this).addSubMenu('#parent-menu-1');">
                            + Add Level 2 Menu
                        </button>
                    </div>
                </div>
                <hr>
                <input type="hidden" id="input-sub-menus" name="sub_menus">

                <div class="row">
                    <div class="col-md-6">
                        <button id="btn-finalize" type="submit" class="btn btn-orange btn-lg btn-block mt-3">
                            Finilize and Update
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ Route('menu.index') }}" class="btn btn-light btn-lg btn-block mt-3">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('custom-js')

<script src="{{ Asset('js/helpdesk-menu.js') }}"></script>

@endsection
