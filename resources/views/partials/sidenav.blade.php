<div id="mySidebar" class="sidebar elegant-color">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="mt-2">
        <a class="btn-elegant white-text btn-block" href="{{ route('home') }}">
            Dashboard
        </a>
    </div>
    <hr class="white">
    <div>
        <a class="btn-indigo white-text btn-block text-left dropdown-toggle"
           data-toggle="collapse" data-target="#helpdesk">
            Helpdesk
        </a>
        <div id="helpdesk" class="collapse blue-grey lighten-5">
            <a class="btn btn-white btn-block pt-3 text-left"
               href="{{ route('menu.index') }}">
                <h6>Menus</h6>
            </a>
        </div>
    </div>

    @if (Auth::user()->role == 'admin')
    <div class="mt-2">
        <a class="btn-indigo white-text btn-block text-left dropdown-toggle"
           data-toggle="collapse" data-target="#library">
            Library
        </a>
        <div id="library" class="collapse blue-grey lighten-5">
            <a class="btn btn-white btn-block pt-3 text-left"
               href="{{ route('accounts.index') }}">
                <h6>Users</h6>
            </a>
            <a class="btn btn-white btn-block pt-3 text-left"
               href="{{ route('divisions.index') }}">
                <h6>Division</h6>
            </a>
            <a class="btn btn-white btn-block pt-3 text-left"
               href="{{ route('units.index') }}">
                <h6>Unit</h6>
            </a>
        </div>
    </div>
    @endif

    @if (Auth::user()->role == 'admin')
    <div class="mt-2">
        <a class="btn-indigo white-text btn-block text-left dropdown-toggle"
           data-toggle="collapse" data-target="#conf">
            System
        </a>
        <div id="conf" class="collapse blue-grey lighten-5">
            <a class="btn btn-white btn-block pt-3 text-left"
               href="{{ route('settings.index') }}">
                <h6>Configuration</h6>
            </a>
        </div>
    </div>
    @endif

    <div class="mt-2">
        <a class="btn-indigo white-text btn-block text-left dropdown-toggle"
           data-toggle="collapse" data-target="#profile">
            Profile
        </a>
        <div id="profile" class="collapse blue-grey lighten-5">
            <a class="btn btn-white btn-block pt-3 text-left"
               href="{{ route('accounts.show', Auth::user()->id) }}">
                <h6>Your Profile</h6>
            </a>

            @if (Auth::user()->role == 'admin')
            <a class="btn btn-white btn-block pt-3 text-left"
               href="{{ route('register') }}">
                <h6>Register User</h6>
            </a>
            @endif

            <a class="btn btn-white btn-block pt-3 text-left"
               href="#" onclick="$('#logout-form').submit();">
                <h6>Logout</h6>
            </a>
        </div>
    </div>
</div>

<!--
<div id="main">
    <button class="openbtn" onclick="openNav()">☰ </button>
</div>
-->
