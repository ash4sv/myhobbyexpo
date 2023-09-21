<div id="header" class="app-header">
    <div class="navbar-header">
        <a href="{{ route('apps.dashboard') }}" class="navbar-brand"><span class="navbar-logo"></span><b class="pe-5px">MHX2023</b> Exhibitor</a>
        <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div class="navbar-nav">
        <div class="navbar-item navbar-user dropdown">
            <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <img src="{{ asset('assets/img/user/user-13.jpg') }}" alt="" />
                <span> <span class="d-none d-md-inline">Web Admin</span> <b class="caret"></b> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end me-1">
                {{--<a href="javascript:;" class="dropdown-item">Edit Profile</a>
                <a href="javascript:;" class="dropdown-item"><span class="badge bg-danger float-end rounded-pill">2</span> Inbox</a>
                <a href="javascript:;" class="dropdown-item">Calendar</a>
                <a href="javascript:;" class="dropdown-item">Setting</a>
                <div class="dropdown-divider"></div>--}}
                <a href="javascript:;" class="dropdown-item" onclick="event.preventDefault(); $('#userlogout-form').submit();">Log Out</a>
            </div>
        </div>
        <form id="userlogout-form" action="#" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
