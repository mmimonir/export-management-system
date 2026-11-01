<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-lte-toggle="treeview"
        role="menu" data-accordion="false">
        <li class="nav-header">EXPORT MANAGEMENT</li>
        <li class="nav-item">
            <a href="{{ route('ems.dashboard') }}"
                class="nav-link {{ request()->routeIs('ems.dashboard', 'ems.welcome') ? 'active' : '' }}">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>EMS Dashboard</p>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('ems.products.*', 'ems.categories.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon bi bi-boxes"></i>
                <p>Product Catalog<i class="right bi bi-chevron-right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('ems.products.manage') }}"
                        class="nav-link {{ request()->routeIs('ems.products.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-seam"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ems.categories.manage') }}"
                        class="nav-link {{ request()->routeIs('ems.categories.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-tags"></i>
                        <p>Categories</p>
                    </a>
                </li>
            </ul>
        </li>

        @include('layouts.partials.sidebars.workspaces')
    </ul>
</nav>
