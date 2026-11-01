<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-lte-toggle="treeview"
        role="menu" data-accordion="false">
        <li class="nav-header">BLOG</li>
        <li class="nav-item">
            <a href="{{ route('blog.dashboard') }}"
                class="nav-link {{ request()->routeIs('blog.dashboard', 'blog.welcome') ? 'active' : '' }}">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>Blog Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('blog.post.index') }}"
                class="nav-link {{ request()->routeIs('blog.post.*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-file-earmark-text"></i>
                <p>Posts</p>
            </a>
        </li>

        @include('layouts.partials.sidebars.workspaces')
    </ul>
</nav>
