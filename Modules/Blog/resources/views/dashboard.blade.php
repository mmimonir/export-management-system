@extends('layouts.admin')

@section('title', 'Blog Dashboard - Export Management System')

@section('page-title', 'Blog Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Blog</li>
@endsection

@section('content')
    <!-- Info boxes -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-2">
                    <i class="bi bi-file-text"></i>
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
                <span class="info-box-icon bg-info elevation-2">
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
                        <a href="{{ route('blog.post.create') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-lg me-1"></i> New Post
                        </a>
                        <button type="button" class="btn btn-tool ms-1" data-lte-toggle="card-collapse">
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
                                <tr>
                                    <td>AdminLTE 4 Integration Guide</td>
                                    <td>Sarah Wilson</td>
                                    <td>Tutorial</td>
                                    <td><span class="badge bg-info">Scheduled</span></td>
                                    <td>Jan 8, 2024</td>
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
                    <h3 class="card-title">Blog Statistics</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Total Views</span>
                        <span class="badge bg-primary">45,230</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Avg. Read Time</span>
                        <span class="badge bg-success">5 min</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Active Categories</span>
                        <span class="badge bg-info">8</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Total Comments</span>
                        <span class="badge bg-warning text-dark">156</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Engagement Rate</span>
                        <span class="badge bg-danger">72%</span>
                    </div>
                </div>
            </div>

            <!-- Categories Card -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Popular Categories</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tutorials
                            <span class="badge bg-primary rounded-pill">12</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Guides
                            <span class="badge bg-success rounded-pill">8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            News
                            <span class="badge bg-info rounded-pill">6</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tips & Tricks
                            <span class="badge bg-warning rounded-pill">5</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Welcome back, {{ Auth::user()->name }}!</h5>
                    <p class="card-text">You have 3 draft posts waiting to be published.</p>
                    <a href="{{ route('blog.post.create') }}" class="btn btn-light btn-sm">Create New Post</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Row -->
    <div class="row">
        <!-- Recent Comments -->
        <div class="col-md-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Recent Comments</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media mb-3">
                        <div class="media-body">
                            <h6 class="mt-0">Great article!</h6>
                            <p class="text-muted mb-1">by Alex Thompson on "Getting Started with Laravel Modules"</p>
                            <small class="text-secondary">2 hours ago</small>
                        </div>
                    </div>
                    <div class="media mb-3">
                        <div class="media-body">
                            <h6 class="mt-0">Very helpful, thanks!</h6>
                            <p class="text-muted mb-1">by Maria Garcia on "Best Practices for Module Development"</p>
                            <small class="text-secondary">5 hours ago</small>
                        </div>
                    </div>
                    <div class="media mb-3">
                        <div class="media-body">
                            <h6 class="mt-0">Looking forward to more content</h6>
                            <p class="text-muted mb-1">by David Lee on "AdminLTE 4 Integration Guide"</p>
                            <small class="text-secondary">1 day ago</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-sm btn-outline-warning">View All Comments</a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <a href="{{ route('blog.post.create') }}" class="btn btn-block btn-outline-primary">
                                <i class="bi bi-plus-circle me-2"></i> New Post
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="{{ route('blog.post.index') }}" class="btn btn-block btn-outline-success">
                                <i class="bi bi-folder me-2"></i> Manage Posts
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="#" class="btn btn-block btn-outline-info">
                                <i class="bi bi-tags me-2"></i> Tags
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="#" class="btn btn-block btn-outline-warning">
                                <i class="bi bi-chat-left-text me-2"></i> Comments
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Publishing Schedule -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Publishing Schedule</h3>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="time-label">
                            <span class="bg-success">This Week</span>
                        </div>
                        <div>
                            <i class="bi bi-circle-fill bg-success timeline-icon"></i>
                            <div class="timeline-item">
                                <h5 class="timeline-title">Laravel Tips #5</h5>
                                <span class="text-secondary"><i class="bi bi-calendar me-1"></i> Jan 18, 2024</span>
                            </div>
                        </div>
                        <div>
                            <i class="bi bi-circle-fill bg-warning timeline-icon"></i>
                            <div class="timeline-item">
                                <h5 class="timeline-title">Module Security Best Practices</h5>
                                <span class="text-secondary"><i class="bi bi-calendar me-1"></i> Jan 20, 2024</span>
                            </div>
                        </div>
                    </div>
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
