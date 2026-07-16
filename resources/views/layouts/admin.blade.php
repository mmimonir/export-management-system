<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light" style="color-scheme: light;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Export Management System')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+3:300,400,400i,700&display=fallback">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="app-wrapper">
        <nav class="app-header navbar navbar-expand bg-body" id="navigation" tabindex="-1">
            <div class="container-fluid">

                <!-- Left Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"
                            aria-label="Toggle sidebar">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>

                    <li class="nav-item d-none d-md-block">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="bi bi-grid-1x2 me-1"></i>
                            Dashboard
                        </a>
                    </li>

                    {{-- Uncomment if you have documentation route --}}
                    {{--
            <li class="nav-item d-none d-md-block">
                <a href="{{ route('documentation') }}" class="nav-link">
                    <i class="bi bi-book me-1"></i>
                    Documentation
                </a>
            </li>
            --}}
                </ul>

                <!-- Right Navbar -->
                <ul class="navbar-nav ms-auto">

                    <!-- Messages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="bi bi-chat-text"></i>

                            {{-- Dynamic Count --}}
                            {{-- @php($messageCount = 0)

                            @if ($messageCount) --}}
                            <span class="navbar-badge badge text-bg-danger">
                                {{-- {{ $messageCount }} --}}
                            </span>
                            {{-- @endif --}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

                            {{-- Example --}}
                            <span class="dropdown-item dropdown-header">
                                No new messages
                            </span>

                            {{--
                    @foreach ($messages as $message)
                        ...
                    @endforeach
                    --}}

                        </div>
                    </li>

                    <!-- Notifications -->
                    <!--begin::Notifications Dropdown Menu-->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#"
                            aria-label="Notifications: 15 unread" aria-expanded="false">
                            <i class="bi bi-bell-fill"></i>
                            <span class="navbar-badge badge text-bg-warning">15</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>

                            <div class="dropdown-divider"></div>

                            <a href="#" class="dropdown-item">
                                <i class="bi bi-envelope me-2"></i>
                                4 new messages
                                <span class="text-secondary fs-7 float-end">3 mins</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="#" class="dropdown-item">
                                <i class="bi bi-people-fill me-2"></i>
                                8 friend requests
                                <span class="text-secondary fs-7 float-end">12 hours</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="#" class="dropdown-item">
                                <i class="bi bi-file-earmark-fill me-2"></i>
                                3 new reports
                                <span class="text-secondary fs-7 float-end">2 days</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="#" class="dropdown-item dropdown-footer">
                                See All Notifications
                            </a>
                        </div>
                    </li>

                    <!-- Fullscreen -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit d-none"></i>
                        </a>
                    </li>

                    <!-- Theme Switcher -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="bd-theme" data-bs-toggle="dropdown">

                            <i class="bi bi-sun-fill" data-lte-theme-icon="light"></i>
                            <i class="bi bi-moon-fill d-none" data-lte-theme-icon="dark"></i>
                            <i class="bi bi-circle-half d-none" data-lte-theme-icon="auto"></i>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" style="--bs-dropdown-min-width: 8rem">

                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active"
                                    data-bs-theme-value="light">

                                    <i class="bi bi-sun-fill me-2"></i>
                                    Light
                                    <i class="bi bi-check-lg ms-auto"></i>

                                </button>
                            </li>

                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="dark">

                                    <i class="bi bi-moon-fill me-2"></i>
                                    Dark
                                    <i class="bi bi-check-lg d-none ms-auto"></i>

                                </button>
                            </li>

                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="auto">

                                    <i class="bi bi-circle-half me-2"></i>
                                    Auto
                                    <i class="bi bi-check-lg d-none ms-auto"></i>

                                </button>
                            </li>

                        </ul>
                    </li>

                    <!-- User -->
                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                                class="user-image rounded-circle shadow" alt="{{ Auth::user()->name }}">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!--begin::User Image-->
                            <li class="user-header text-bg-primary">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&size=128&background=0D8ABC&color=fff"
                                    class="rounded-circle shadow" alt="{{ Auth::user()->name }}">

                                <p>
                                    {{ Auth::user()->name }}
                                    <small>{{ Auth::user()->email }}</small>
                                    <small>Member since {{ Auth::user()->created_at?->format('M. Y') }}</small>
                                </p>
                            </li>
                            <!--end::User Image-->

                            <!--begin::Menu Body-->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                            </li>
                            <!--end::Menu Body-->

                            <!--begin::Menu Footer-->
                            <li class="user-footer">
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">
                                    Profile
                                </a>

                                <form method="POST" action="{{ route('logout') }}" class="d-inline float-end">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">
                                        Sign out
                                    </button>
                                </form>
                            </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li>
                    <!--end::User Menu Dropdown-->

                </ul>

            </div>
        </nav>


        <!-- Sidebar -->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="{{ route('dashboard') }}" class="brand-link">
                    <!--begin::Brand Image-->
                    {{-- <img src="https://adminlte.io/wp-content/uploads/2024/04/logo-adminlte.png" alt="AdminLTE Logo"
                        class="brand-image opacity-75 shadow"> --}}
                    <!--end::Brand Image-->
                    <!--begin::Brand Text-->
                    <span class="brand-text fw-light">AdminLTE 4</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            {{-- <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="https://adminlte.io/wp-content/uploads/2024/04/logo-adminlte.png" alt="EMS Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8;">
                <span class="brand-text fw-light">EMS</span>
            </a> --}}

            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-lte-toggle="treeview"
                        role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-header">EXPORT MANAGEMENT</li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-box-seam"></i>
                                <p>
                                    Export Orders
                                    <i class="right bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>All Orders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>New Order</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-truck"></i>
                                <p>
                                    Shipments
                                    <i class="right bi bi-chevron-right"></i>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-text"></i>
                                <p>
                                    Documents
                                    <i class="right bi bi-chevron-right"></i>
                                </p>
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
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <main class="app-main">
            <section class="app-content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('page-title', 'Dashboard')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="app-content">
                <div class="container-fluid">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </section>
        </main>

        <footer class="app-footer">
            <div class="d-none d-sm-inline float-end">
                Export Management System v1.0
            </div>
            <strong>
                Copyright &copy; {{ date('Y') }}
                <a href="#" class="text-decoration-none">Your Company</a>.
            </strong>
            All rights reserved.
        </footer>
    </div>

    @stack('scripts')
</body>

</html>
