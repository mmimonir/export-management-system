<li class="nav-header">WORKSPACES</li>
<li class="nav-item">
    <a href="{{ route('ems.dashboard') }}"
        class="nav-link {{ request()->routeIs('ems.*') ? 'active' : '' }}">
        <i class="nav-icon bi bi-boxes"></i>
        <p>EMS</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('blog.dashboard') }}"
        class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">
        <i class="nav-icon bi bi-journal-text"></i>
        <p>Blog</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('store.dashboard') }}"
        class="nav-link {{ request()->routeIs('store.*') ? 'active' : '' }}">
        <i class="nav-icon bi bi-shop"></i>
        <p>Store</p>
    </a>
</li>
<li class="nav-header">SETTINGS</li>
<li class="nav-item">
    <a href="{{ route('profile.edit') }}"
        class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
        <i class="nav-icon bi bi-person"></i>
        <p>Profile</p>
    </a>
</li>
