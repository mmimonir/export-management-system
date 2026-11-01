<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-lte-toggle="treeview"
        role="menu" data-accordion="false">
        <li class="nav-header">DASHBOARD</li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>Dashboard</p>
            </a>
        </li>

        @include('layouts.partials.sidebars.workspaces')

        <li class="nav-header">SETTINGS</li>
        <li class="nav-item">
            <a href="{{ route('profile.edit') }}"
                class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                <i class="nav-icon bi bi-person"></i>
                <p>Profile</p>
            </a>
        </li>
    </ul>
</nav>
