<div class="leftside-menu">
    <!-- Brand Logo Light -->
    <a href="{{ route('dashboard.view') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('dashboard-assets/images/logo.png') }}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('dashboard-assets/images/logo-sm.png') }}" alt="small logo">
        </span>
    </a>
    <!-- Brand Logo Dark -->
    <a href="{{ route('dashboard.view') }}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('dashboard-assets/images/logo-dark.png') }}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('dashboard-assets/images/logo-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            @if (authAdmin()->can('dashboard.view'))
            <li class="side-nav-title">Main</li>
            <li class="side-nav-item">
                <a href="{{ route('dashboard.view') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            @endif
            <li class="side-nav-title">Setting</li>
            <li class="side-nav-item {{ request()->routeIs('dashboard.admin.index') ||
             request()->routeIs('dashboard.admin.create') ||
             request()->routeIs('dashboard.admin.edit') ||
             request()->routeIs('dashboard.roles.index') ||
             request()->routeIs('dashboard.roles.create') ||
             request()->routeIs('dashboard.roles.edit') ? 'menuitem-active' : '' }}">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link {{ request()->routeIs('dashboard.admin.index') || request()->routeIs('dashboard.admin.create') || request()->routeIs('dashboard.admin.edit') ? '' : 'collapsed' }}">
                    <i class="ri-admin-line"></i>
                    <span>Administration</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ 
                request()->routeIs('dashboard.admin.index') ||
                request()->routeIs('dashboard.admin.create') ||
                request()->routeIs('dashboard.admin.edit') ||
                 request()->routeIs('dashboard.roles.index') ||
             request()->routeIs('dashboard.roles.create') ||
             request()->routeIs('dashboard.roles.edit')  ? 'show' : '' }}" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        @if (authAdmin()->can('admin.view') || authAdmin()->can('admin.create') || authAdmin()->can('admin.edit') || authAdmin()->can('admin.delete'))
                        <li class="{{ request()->routeIs('dashboard.admin.index') || request()->routeIs('dashboard.admin.create') || request()->routeIs('dashboard.admin.edit') ? 'menuitem-active' : '' }}">
                            <a class="{{ request()->routeIs('dashboard.admin.index') || request()->routeIs('dashboard.admin.create') || request()->routeIs('dashboard.admin.edit') ? 'active' : '' }}" href="{{ route('dashboard.admin.index') }}">Admins</a>
                        </li>
                        @endif
                        <li><a href="pages-starter.html">Users</a></li>
                        @if (authAdmin()->can('role.view') || authAdmin()->can('role.create') || authAdmin()->can('role.edit') || authAdmin()->can('role.delete'))
                        <li class="{{ request()->routeIs('dashboard.roles.index') || request()->routeIs('dashboard.roles.create') || request()->routeIs('dashboard.roles.edit') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('dashboard.roles.index') }}" class="{{ request()->routeIs('dashboard.roles.index') ||  request()->routeIs('dashboard.roles.create') || request()->routeIs('dashboard.roles.edit') ? 'active' : '' }}">Roles & Permissions</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#tools" aria-expanded="false" aria-controls="tools" class="side-nav-link">
                    <i class="ri-tools-line"></i>
                    <span>Tools</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="tools">
                    <ul class="side-nav-second-level">
                        <li><a href="pages-starter.html">Export</a></li>
                        <li><a href="pages-starter.html">Import</a></li>
                    </ul>
                </div>
            </li>
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>