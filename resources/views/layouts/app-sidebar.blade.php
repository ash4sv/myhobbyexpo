<div id="sidebar" class="app-sidebar">

    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
            <div class="menu-profile">
                <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                    <div class="menu-profile-cover with-shadow"></div>
                    <div class="menu-profile-image">
                        <img src="{{ asset('assets/img/user/user-13.jpg') }}" alt="" />
                    </div>
                    <div class="menu-profile-info">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="menu-caret ms-auto"></div>
                        </div>
                        <small class="text-capitalize">{{ Auth::user()->getRoleNames()->first() }}</small>
                    </div>
                </a>
            </div>
            <div id="appSidebarProfileMenu" class="collapse">
                <div class="menu-item pt-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-cog"></i></div>
                        <div class="menu-text">Settings</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                        <div class="menu-text"> Send Feedback</div>
                    </a>
                </div>
                <div class="menu-item pb-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                        <div class="menu-text"> Helps</div>
                    </a>
                </div>
                <div class="menu-divider m-0"></div>
            </div>

            <div class="menu-header">Navigation</div>
            @can('dashboard-access')
            <div class="menu-item {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
                <a href="{{ route('apps.dashboard') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-square-full"></i>
                    </div>
                    <div class="menu-text">Dashboard</div>
                </a>
            </div>
            @endcan
            {{--<div class="menu-item {{ (request()->segment(1) == 'pre-register') ? 'active' : '' }}">
                <a href="{{ route('apps.pre-register.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-square-full"></i>
                    </div>
                    <div class="menu-text">Pre-Register</div>
                </a>
            </div>--}}
            @can('pre-register-access')
            <div class="menu-item has-sub {{ (request()->segment(1) == 'pre-register') ? 'active' : '' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-align-left"></i>
                    </div>
                    <div class="menu-text">Pre-Register</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ (request()->segment(2) == 'selling-vendor') ? 'active' : '' }}">
                        <a href="{{ route('apps.preregister.sellingvendor') }}" class="menu-link">
                            <div class="menu-text">Selling Vendor</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->segment(2) == 'hobby-activity') ? 'active' : '' }}">
                        <a href="{{ route('apps.preregister.hobbyactivity') }}" class="menu-link">
                            <div class="menu-text">Hobby Activity</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->segment(2) == 'hobby-showoff') ? 'active' : '' }}">
                        <a href="{{ route('apps.preregister.hobbyshowoff') }}" class="menu-link">
                            <div class="menu-text">Hobby Show Off</div>
                        </a>
                    </div>
                </div>
            </div>
            @endcan

            {{--<div class="menu-item has-sub {{ (request()->segment(1) == 'exhibitor') ? 'active' : '' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-align-left"></i>
                    </div>
                    <div class="menu-text">Exhibitor</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ (request()->segment(2) == 'category') ? 'active' : '' }}">
                        <a href="{{ route('apps.exhibitor.category.index') }}" class="menu-link">
                            <div class="menu-text">Booth Category</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->segment(2) == 'booths') ? 'active' : '' }}">
                        <a href="{{ route('apps.exhibitor.booths.index') }}" class="menu-link">
                            <div class="menu-text">Booth Number</div>
                        </a>
                    </div>
                </div>
            </div>--}}

            {{--<div class="menu-item has-sub">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-align-left"></i>
                    </div>
                    <div class="menu-text">Registered Exhibitor</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-text">Flea Market</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-text">Hobby Group Zone</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-text">Activity Zone</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-item has-sub">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-align-left"></i>
                    </div>
                    <div class="menu-text">Events Exhibitor</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="{{ route('apps.events.exhibit.index') }}" class="menu-link">
                            <div class="menu-text">Type of Exhibit</div>
                        </a>
                    </div>
                </div>
            </div>--}}
            @can('system-access')
            <div class="menu-header">Systems</div>

            @can('acl-access')
            <div class="menu-item has-sub {{ (request()->segment(1) == 'acl') ? 'active' : '' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-align-left"></i>
                    </div>
                    <div class="menu-text">A.C.L</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    @can('permission-access')
                    <div class="menu-item {{ (request()->segment(2) == 'permissions') ? 'active' : '' }}">
                        <a href="{{ route('apps.acl.permissions.index') }}" class="menu-link">
                            <div class="menu-text">Permissions</div>
                        </a>
                    </div>
                    @endcan
                    @can('role-access')
                    <div class="menu-item {{ (request()->segment(2) == 'roles') ? 'active' : '' }}">
                        <a href="{{ route('apps.acl.roles.index') }}" class="menu-link">
                            <div class="menu-text">Roles</div>
                        </a>
                    </div>
                    @endcan
                    @can('user-access')
                    <div class="menu-item {{ (request()->segment(2) == 'users') ? 'active' : '' }}">
                        <a href="{{ route('apps.acl.users.index') }}" class="menu-link">
                            <div class="menu-text">Users</div>
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
            @endcan

            @can('route-access')
            <div class="menu-item {{ (request()->segment(1) == 'route') ? 'active' : '' }}">
                <a href="{{ route('apps.route') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-link"></i>
                    </div>
                    <div class="menu-text">Route list</div>
                </a>
            </div>
            @endcan

            @can('log-access')
            <div class="menu-item {{ (request()->segment(1) == 'logs') ? 'active' : '' }}">
                <a href="{{ route('apps.logs') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-history"></i>
                    </div>
                    <div class="menu-text">Logs</div>
                </a>
            </div>
            @endcan

            <div class="menu-item {{ (request()->segment(1) == 'apps-logs') ? 'active' : '' }}">
                <a href="{{ url('apps-logs') }}" class="menu-link" target="_blank">
                    <div class="menu-icon">
                        <i class="fa fa-history"></i>
                    </div>
                    <div class="menu-text">Apps Logs</div>
                </a>
            </div>

            @endcan

            {{--<div class="menu-item has-sub">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-align-left"></i>
                    </div>
                    <div class="menu-text">Menu Level</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item has-sub">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-text">Menu 1.1</div>
                            <div class="menu-caret"></div>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item has-sub">
                                <a href="javascript:;" class="menu-link">
                                    <div class="menu-text">Menu 2.1</div>
                                    <div class="menu-caret"></div>
                                </a>
                                <div class="menu-submenu">
                                    <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 3.1</div></a></div>
                                    <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 3.2</div></a></div>
                                </div>
                            </div>
                            <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 2.2</div></a></div>
                            <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 2.3</div></a></div>
                        </div>
                    </div>
                    <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 1.2</div></a></div>
                    <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 1.3</div></a></div>
                </div>
            </div>--}}

            <div class="menu-item d-flex">
                <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
            </div>

        </div>

    </div>

</div>
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
