{{--
    EMS Module Dashboard
    Design mirrors resources/views/dashboard.blade.php (AdminLTE 4 look:
    info boxes + card-primary table + quick stats + welcome card).
    The module layout may not include the global sidebar, therefore this
    view also provides its own in-page module navigation ("mini sidebar")
    styled exactly like the sidebar-menu of resources/views/layouts/admin.blade.php.
--}}

@php
    // Use the global admin layout when it is available; otherwise fall back
    // to the module layout, keeping the exact same content design.
    $layout = view()->exists('layouts.admin') ? 'layouts.admin' : 'ems::components.layouts.master';
@endphp

@extends($layout)

@section('title', 'EMS Dashboard - Export Management System')

@section('page-title', 'EMS Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">EMS</li>
@endsection

@section('content')
    <!-- Module navigation (in-page sidebar replica of layouts/admin.blade.php sidebar) -->
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills nav-sidebar flex-column mb-3" role="menu" style="flex-wrap: wrap;">
                <li class="nav-header">EMS MODULE</li>
                <li class="nav-item">
                    <a href="{{ route('ems.dashboard') }}"
                        class="nav-link {{ request()->routeIs('ems.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ems.product.index') }}"
                        class="nav-link {{ request()->routeIs('ems.product.*') && !request()->routeIs('ems.product.create') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-seam"></i>
                        <p>All Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ems.product.create') }}"
                        class="nav-link {{ request()->routeIs('ems.product.create') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-plus-circle"></i>
                        <p>New Product</p>
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
                    <i class="bi bi-box-seam"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Orders</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-2">
                    <i class="bi bi-check-circle"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Completed</span>
                    <span class="info-box-number">890</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-2">
                    <i class="bi bi-truck"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">In Transit</span>
                    <span class="info-box-number">320</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-2">
                    <i class="bi bi-exclamation-triangle"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Pending</span>
                    <span class="info-box-number">200</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main row -->
    <div class="row">
        <!-- Recent Orders -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Recent Export Orders</h3>
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
                                    <th>Order #</th>
                                    <th>Buyer</th>
                                    <th>Destination</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>EXP-2024-001</td>
                                    <td>ABC Trading Ltd.</td>
                                    <td>United Kingdom</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>$25,000</td>
                                </tr>
                                <tr>
                                    <td>EXP-2024-002</td>
                                    <td>XYZ Imports</td>
                                    <td>United States</td>
                                    <td><span class="badge bg-warning">In Transit</span></td>
                                    <td>$18,500</td>
                                </tr>
                                <tr>
                                    <td>EXP-2024-003</td>
                                    <td>Global Trade Co.</td>
                                    <td>Germany</td>
                                    <td><span class="badge bg-info">Processing</span></td>
                                    <td>$32,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('ems.product.index') }}" class="btn btn-sm btn-outline-primary">View All
                        Products</a>
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
                        <span>Total Revenue</span>
                        <span class="badge bg-primary">$1,250,000</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Active Buyers</span>
                        <span class="badge bg-success">45</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Export Countries</span>
                        <span class="badge bg-info">12</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Success Rate</span>
                        <span class="badge bg-warning text-dark">85%</span>
                    </div>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Welcome back!</h5>
                    <p class="card-text">{{ Auth::user()->name }}</p>
                    <p class="card-text">You have 5 pending orders to process.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            console.log('EMS Dashboard loaded successfully');
        });
    </script>
@endpush
