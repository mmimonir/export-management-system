@extends('layouts.admin')

@section('title', 'Store Dashboard - Export Management System')

@section('page-title', 'Store Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Store</li>
@endsection

@section('content')
    <!-- Info boxes -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-2">
                    <i class="bi bi-box-seam"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Products</span>
                    <span class="info-box-number">142</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-2">
                    <i class="bi bi-check-circle"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">In Stock</span>
                    <span class="info-box-number">98</span>
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
                    <span class="info-box-number">12</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-2">
                    <i class="bi bi-x-circle"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Out of Stock</span>
                    <span class="info-box-number">32</span>
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
                    <h3 class="card-title">Recent Products</h3>
                    <div class="card-tools">
                        <a href="{{ route('store.product.create') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-lg me-1"></i> New Product
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
                                    <th>Product Name</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Premium Widget Pro</td>
                                    <td>WGT-001</td>
                                    <td>Electronics</td>
                                    <td>$299.99</td>
                                    <td>45</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Standard Gadget Plus</td>
                                    <td>GDT-002</td>
                                    <td>Accessories</td>
                                    <td>$149.99</td>
                                    <td>120</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Basic Tool Kit</td>
                                    <td>TLK-003</td>
                                    <td>Tools</td>
                                    <td>$79.99</td>
                                    <td>8</td>
                                    <td><span class="badge bg-warning">Low Stock</span></td>
                                </tr>
                                <tr>
                                    <td>Advanced Component X</td>
                                    <td>CMP-004</td>
                                    <td>Components</td>
                                    <td>$499.99</td>
                                    <td>0</td>
                                    <td><span class="badge bg-danger">Out of Stock</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('store.product.index') }}" class="btn btn-sm btn-outline-primary">View All Products</a>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Store Statistics</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Total Revenue</span>
                        <span class="badge bg-primary">$45,230</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Orders Today</span>
                        <span class="badge bg-success">23</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Active Categories</span>
                        <span class="badge bg-info">12</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Avg. Order Value</span>
                        <span class="badge bg-warning text-dark">$185</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Conversion Rate</span>
                        <span class="badge bg-danger">3.2%</span>
                    </div>
                </div>
            </div>

            <!-- Top Categories Card -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Top Categories</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Electronics
                            <span class="badge bg-primary rounded-pill">45</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Accessories
                            <span class="badge bg-success rounded-pill">32</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tools
                            <span class="badge bg-info rounded-pill">28</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Components
                            <span class="badge bg-warning rounded-pill">15</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Welcome back, {{ Auth::user()->name }}!</h5>
                    <p class="card-text">You have 5 products with low stock levels.</p>
                    <a href="{{ route('store.product.create') }}" class="btn btn-light btn-sm">Add New Product</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Row -->
    <div class="row">
        <!-- Recent Orders -->
        <div class="col-md-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Recent Orders</h3>
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
                            <h6 class="mt-0">Order #ORD-2024-001</h6>
                            <p class="text-muted mb-1">Premium Widget Pro x2 - $599.98</p>
                            <small class="text-secondary"><span class="badge bg-success">Completed</span> - 2 hours ago</small>
                        </div>
                    </div>
                    <div class="media mb-3">
                        <div class="media-body">
                            <h6 class="mt-0">Order #ORD-2024-002</h6>
                            <p class="text-muted mb-1">Standard Gadget Plus x1 - $149.99</p>
                            <small class="text-secondary"><span class="badge bg-warning">Processing</span> - 5 hours ago</small>
                        </div>
                    </div>
                    <div class="media mb-3">
                        <div class="media-body">
                            <h6 class="mt-0">Order #ORD-2024-003</h6>
                            <p class="text-muted mb-1">Basic Tool Kit x3 - $239.97</p>
                            <small class="text-secondary"><span class="badge bg-info">Shipped</span> - 1 day ago</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-sm btn-outline-warning">View All Orders</a>
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
                            <a href="{{ route('store.product.create') }}" class="btn btn-block btn-outline-primary">
                                <i class="bi bi-plus-circle me-2"></i> New Product
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="{{ route('store.product.index') }}" class="btn btn-block btn-outline-success">
                                <i class="bi bi-box-seam me-2"></i> Manage Products
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="#" class="btn btn-block btn-outline-info">
                                <i class="bi bi-tags me-2"></i> Inventory
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="#" class="btn btn-block btn-outline-warning">
                                <i class="bi bi-cart me-2"></i> Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sales Overview -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Sales Overview</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <span>This Week</span>
                        <span class="text-success"><i class="bi bi-arrow-up"></i> 12.5%</span>
                    </div>
                    <div class="progress mb-3" style="height: 10px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span>This Month</span>
                        <span class="text-success"><i class="bi bi-arrow-up"></i> 8.2%</span>
                    </div>
                    <div class="progress mb-3" style="height: 10px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 65%"></div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <span>This Quarter</span>
                        <span class="text-warning"><i class="bi bi-arrow-down"></i> 2.1%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 45%"></div>
                    </div>
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
