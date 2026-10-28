{{--
    Blog Module Dashboard
    Design mirrors resources/views/dashboard.blade.php (AdminLTE 4 look:
    info boxes + card-primary table + quick stats + welcome card).
    The module layout may not include the global sidebar, therefore this
    view also provides its own in-page module navigation ("mini sidebar")
    styled exactly like the sidebar-menu of resources/views/layouts/admin.blade.php.
--}}

@php
    // Use the global admin layout when it is available; otherwise fall back
    // to the module layout, keeping the exact same content design.
    $layout = view()->exists('layouts.admin') ? 'layouts.admin' : 'blog::components.layouts.master';
@endphp

@extends($layout)

@section('title', 'Blog Dashboard - Export Management System')

@section('page-title', 'Blog Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Blog</li>
@endsection

@section('content')
    <!-- Module navigation (in-page sidebar replica of layouts/admin.blade.php sidebar) -->
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills nav-sidebar flex-column mb-3" role="menu" style="flex-wrap: wrap;">
                <li class="nav-header">BLOG MODULE</li>
                <li class="nav-item">
                    <a href="{{ route('blog.dashboard') }}"
                        class="nav-link {{ request()->routeIs('blog.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blog.post.index') }}"
                        class="nav-link {{ request()->routeIs('blog.post.*') && !request()->routeIs('blog.post.create') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-file-earmark-text"></i>
                        <p>All Posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blog.post.create') }}"
                        class="nav-link {{ request()->routeIs('blog.post.create') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-plus-circle"></i>
                        <p>New Post</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Main Dashboard</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Info boxes -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-2">
                    <i class="bi bi-file-earmark-text"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Posts</span>
                    <span class="info-box-number">24</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-2">
                    <i class="bi bi-check-circle"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Published</span>
                    <span class="info-box-number">18</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-2">
                    <i class="bi bi-pencil-square"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Drafts</span>
                    <span class="info-box-number">4</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-2">
                    <i class="bi bi-chat-left-text"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Comments</span>
                    <span class="info-box-number">156</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main row -->
    <div class="row">
        <!-- Recent Posts -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Recent Blog Posts</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table-striped table-hover table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Getting Started with Laravel Modules</td>
                                    <td>John Doe</td>
                                    <td>Tutorial</td>
                                    <td><span class="badge bg-success">Published</span></td>
                                    <td>Jan 15, 2024</td>
                                </tr>
                                <tr>
                                    <td>Best Practices for Module Development</td>
                                    <td>Jane Smith</td>
                                    <td>Guide</td>
                                    <td><span class="badge bg-success">Published</span></td>
                                    <td>Jan 12, 2024</td>
                                </tr>
                                <tr>
                                    <td>Upcoming Features in Laravel 13</td>
                                    <td>Mike Johnson</td>
                                    <td>News</td>
                                    <td><span class="badge bg-warning">Draft</span></td>
                                    <td>Jan 10, 2024</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('blog.post.index') }}" class="btn btn-sm btn-outline-primary">View All Posts</a>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Quick Stats</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Total Views</span>
                        <span class="badge bg-primary">45,230</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Active Authors</span>
                        <span class="badge bg-success">6</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Active Categories</span>
                        <span class="badge bg-info">8</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Engagement Rate</span>
                        <span class="badge bg-warning text-dark">72%</span>
                    </div>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Welcome back!</h5>
                    <p class="card-text">{{ Auth::user()->name }}</p>
                    <p class="card-text">You have 4 draft posts waiting to be published.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            console.log('Blog Dashboard loaded successfully');
        });
    </script>
@endpush
