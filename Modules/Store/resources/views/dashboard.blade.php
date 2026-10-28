{{--
    Store Module Dashboard
    Design mirrors resources/views/dashboard.blade.php (AdminLTE 4 look:
    info boxes + card-primary table + quick stats + welcome card).
    The module layout may not include the global sidebar, therefore this
    view also provides its own in-page module navigation ("mini sidebar")
    styled exactly like the sidebar-menu of resources/views/layouts/admin.blade.php.
--}}

@php
    // Use the global admin layout when it is available; otherwise fall back
    // to the module layout, keeping the exact same content design.
    $layout = view()->exists('layouts.admin') ? 'layouts.admin' : 'store::components.layouts.master';
@endphp

@extends($layout)

@section('title', 'Store Dashboard - Export Management System')

@section('page-title', 'Store Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Store</li>
@endsection

@section('content')
    <!-- Module navigation (in-page sidebar replica of layouts/admin.blade.php sidebar) -->
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills nav-sidebar flex-column mb-3" role="menu" style="flex-wrap: wrap;">
                <li class="nav-header">STORE MODULE</li>
                <li class="nav-item">
                    <a href="{{ route('store.dashboard') }}"
                        class="nav-link {{ request()->routeIs('store.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('store.product.index') }}"
                        class="nav-link {{ request()->routeIs('store.product.*') && !request()->routeIs('store.product.create') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-seam"></i>
                        <p>All Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('store.product.create') }}"
                        class="nav-link {{ request()->routeIs('store.product.create') ? 'active' : '' }}">
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
                    <span class="info-box-text">Total Products</span>
                    <span class="info-box-number">86</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-2">
                    <i class="bi bi-cart-check"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Orders This Month</span>
                    <span class="info-box-number">312</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-2">
                    <i class="bi bi-exclamation-triangle"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Low Stock</span>
                    <span class="info-box-number">9</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-2">
                    <i class="bi bi-currency-dollar"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Revenue</span>
                    <span class="info-box-number">$48,200</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main row -->
    <div class="row">
        <!-- Recent Products -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Recent Store Products</h3>
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
                                    <th>Product</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Organic Cotton Tote Bag</td>
                                    <td>SKU-1001</td>
                                    <td>Accessories</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>$18.00</td>
                                </tr>
                                <tr>
                                    <td>Premium Coffee Beans 1kg</td>
                                    <td>SKU-1002</td>
                                    <td>Groceries</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>$24.50</td>
                                </tr>
                                <tr>
                                    <td>Handmade Ceramic Mug</td>
                                    <td>SKU-1003</td>
                                    <td>Home & Living</td>
                                    <td><span class="badge bg-warning">Low Stock</span></td>
                                    <td>$12.90</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('store.product.index') }}" class="btn btn-sm btn-outline-primary">View All
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
                        <span class="badge bg-primary">$48,200</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Active Products</span>
                        <span class="badge bg-success">78</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Categories</span>
                        <span class="badge bg-info">10</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Conversion Rate</span>
                        <span class="badge bg-warning text-dark">3.8%</span>
                    </div>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Welcome back!</h5>
                    <p class="card-text">{{ Auth::user()->name }}</p>
                    <p class="card-text">You have 9 products running low on stock.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            console.log('Store Dashboard loaded successfully');
        });
    </script>
@endpush
