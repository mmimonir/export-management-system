<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-lte-toggle="treeview"
        role="menu" data-accordion="false">
        <li class="nav-header">STORE</li>
        <li class="nav-item">
            <a href="{{ route('store.dashboard') }}"
                class="nav-link {{ request()->routeIs('store.dashboard', 'store.welcome') ? 'active' : '' }}">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>Store Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('store.product.index') }}"
                class="nav-link {{ request()->routeIs('store.product.*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-box-seam"></i>
                <p>Store Products</p>
            </a>
        </li>

        @include('layouts.partials.sidebars.workspaces')
    </ul>
</nav>
