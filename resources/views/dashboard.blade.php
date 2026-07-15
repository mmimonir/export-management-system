@extends('layouts.admin')

@section('title', 'Dashboard - Export Management System')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <!-- Info boxes -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon text-bg-primary shadow-sm">
                    <i class="bi bi-box-seam"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Orders</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon text-bg-success shadow-sm">
                    <i class="bi bi-check-circle"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Completed</span>
                    <span class="info-box-number">890</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon text-bg-warning shadow-sm">
                    <i class="bi bi-truck"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">In Transit</span>
                    <span class="info-box-number">320</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon text-bg-danger shadow-sm">
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
            <div class="card">
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
                                    <td><span class="badge text-bg-success">Completed</span></td>
                                    <td>$25,000</td>
                                </tr>
                                <tr>
                                    <td>EXP-2024-002</td>
                                    <td>XYZ Imports</td>
                                    <td>United States</td>
                                    <td><span class="badge text-bg-warning">In Transit</span></td>
                                    <td>$18,500</td>
                                </tr>
                                <tr>
                                    <td>EXP-2024-003</td>
                                    <td>Global Trade Co.</td>
                                    <td>Germany</td>
                                    <td><span class="badge text-bg-info">Processing</span></td>
                                    <td>$32,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Stats</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Total Revenue</span>
                        <span class="badge text-bg-primary">$1,250,000</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Active Buyers</span>
                        <span class="badge text-bg-success">45</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Export Countries</span>
                        <span class="badge text-bg-info">12</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Success Rate</span>
                        <span class="badge text-bg-warning">85%</span>
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
            console.log('Dashboard loaded successfully');
        });
    </script>
@endpush
