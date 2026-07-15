<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Export Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-bottom: 1rem;
        }

        .navbar-transparent {
            background: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-transparent">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <i class="bi bi-box-seam me-2"></i>ExportMS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">
                                    <i class="bi bi-speedometer2 me-1"></i>Dashboard
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">
                                    <i class="bi bi-box-arrow-in-right me-1"></i>Login
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="btn btn-light ms-2">
                                        <i class="bi bi-person-plus me-1"></i>Register
                                    </a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        Export Management System
                    </h1>
                    <p class="lead mb-4">
                        Streamline your export business with our comprehensive management system.
                        Designed specifically for Bangladeshi exporters.
                    </p>
                    <div class="d-flex gap-3">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-light btn-lg">
                                    <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-light btn-lg">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Get Started
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">
                                        <i class="bi bi-person-plus me-2"></i>Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="bi bi-globe2 text-white" style="font-size: 200px;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row mb-5 text-center">
                <div class="col-12">
                    <h2 class="fw-bold">Key Features</h2>
                    <p class="text-muted">Everything you need to manage your export business</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="feature-icon bg-primary mx-auto text-white">
                                <i class="bi bi-box-seam fs-4"></i>
                            </div>
                            <h5 class="card-title">Order Management</h5>
                            <p class="card-text text-muted">
                                Track and manage all your export orders from creation to delivery.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="feature-icon bg-success mx-auto text-white">
                                <i class="bi bi-truck fs-4"></i>
                            </div>
                            <h5 class="card-title">Shipment Tracking</h5>
                            <p class="card-text text-muted">
                                Real-time tracking of shipments and container status.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="feature-icon bg-info mx-auto text-white">
                                <i class="bi bi-file-earmark-text fs-4"></i>
                            </div>
                            <h5 class="card-title">Document Management</h5>
                            <p class="card-text text-muted">
                                Generate and manage all export documents automatically.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark py-4 text-white">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Export Management System. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
