@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
    <div class="card uper mb-5">
        <div class="card-header">
            Create Menu
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

            <form class="form-container" id="form-data" action="{{ Route('menus.store') }}"
                  method="POST" enctype="multipart/form-data">
                @csrf

                <div class="px-3">
                    <h5>Container 1</h5>
                    <div class="parent-menu border p-3" id="parent-menu-1">
                        <blockquote class="blockquote mb-0 sortable">
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
                                <input type="text" id="name" class="form-control form-control-sm name" required>
                                <label for="name">
                                    Menu Name <span class="red-text">*</span>
                                </label>
                            </div>
                            <div class="md-form form-sm">
                                <textarea class="md-textarea form-control form-control-sm description" rows="1"
                                        id="description"></textarea>
                                <label for="description">
                                    Description (Optional)
                                </label>
                            </div>
                            <div class="md-form form-sm">
                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Choose file</span>
                                        <input type="file" class="photo" name="files[]" accept="image/*" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload a photo or logo...">
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="child-menu p-3 border" id="child-menu-1-1">
                                <blockquote class="blockquote mb-0 sortable">
                                    <h5>
                                        <div class="row">
                                            <div class="col-md-10">
                                                Level 2
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-red btn-sm btn-block btn-rounded"
                                                        onclick="$(this).deleteMenu('#child-menu-1-1');">
                                                    <i class="fas fa-minus-circle"></i> Delete
                                                </button>
                                            </div>
                                        </div>
                                    </h5>
                                    <div class="md-form form-sm">
                                        <input type="text" id="submenu-name-1-1-1" class="submenu-name form-control form-control-sm"
                                               required>
                                        <label for="submenu-name-1-1-1">
                                            Sub-menu Name <span class="red-text">*</span>
                                        </label>
                                    </div>
                                    <div class="pb-2 toggle-submenu-container">
                                        <!-- Default switch -->
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="toggle-submenu custom-control-input" id="toggle-submenu-1-1-1"
                                                   onclick="$(this).toggleSubMenu('#toggle-submenu-1-1-1');">
                                            <label class="custom-control-label" for="toggle-submenu-1-1-1">
                                                Toggle Sub-menu
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="child-menu p-3 border" id="child-menu-1-1-1">
                                        <div class="pb-2 toggle-submenu-container">
                                            <!-- Default switch -->
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="toggle-submenu-link custom-control-input" id="toggle-submenu-link-1-1-1-1"
                                                       onclick="$(this).toggleLinkURL('#toggle-submenu-link-1-1-1-1');">
                                                <label class="custom-control-label" for="toggle-submenu-link-1-1-1-1">
                                                    Toggle Link/URL
                                                </label>
                                            </div>
                                        </div>
                                        <div id="file-url-container-1-1-1-1">
                                            <div class="md-form form-sm">
                                                <div class="file-field">
                                                    <div class="btn btn-primary btn-sm float-left">
                                                        <span>Choose file</span>
                                                        <input type="file" class="submenu-attachment" name="files[]"
                                                               accept="application/pdf" required>
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text" placeholder="Upload a file...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
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
                        <button id="btn-finalize" type="submit" class="btn btn-primary btn-lg btn-block mt-3">
                            Finilize and Save
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
