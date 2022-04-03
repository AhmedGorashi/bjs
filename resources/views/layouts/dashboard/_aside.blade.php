<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dashboard_files/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Basic Job Site</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('uploads/users_images/'.auth()->user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('dashboard.welcome')}}" class="nav-link {{route('dashboard.welcome') == Request::url() ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{route('dashboard.jobs.index') == Request::url() ? 'active' : (route('dashboard.jobs.create') == Request::url() ? 'active'  : '') }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            @lang('site.jobs')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.jobs.create') }}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>@lang('site.add_new')</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.jobs.index') }}" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>@lang('site.show_jobs')</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{route('dashboard.users.index') == Request::url() ? 'active' : (route('dashboard.users.create') == Request::url() ? 'active'  : '') }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            @lang('site.users')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.users.create') }}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>@lang('site.add_new')</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.users.index') }}" class="nav-link">
                                <i class="far fa-eye nav-icon"></i>
                                <p>@lang('site.show_users')</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
