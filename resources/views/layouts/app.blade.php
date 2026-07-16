<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Export Management System') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+3:300,400,400i,700&display=fallback">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body data-bs-theme="dark" class="hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <div class="container-fluid">
                <a href="{{ route('dashboard') }}" class="navbar-brand">
                    <img src="https://adminlte.io/wp-content/uploads/2024/04/logo-adminlte.png" alt="EMS Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8;">
                    <span class="brand-text fw-light">Export Management System</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse order-3" id="navbarSupportedContent">
                    @include('layouts.navigation')
                </div>
            </div>
        </nav>

        <div class="content-wrapper">
            @isset($header)
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                {{ $header }}
                            </div>
                        </div>
                    </div>
                </div>
            @endisset

            <div class="content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <div class="d-none d-sm-inline float-end">Export Management System</div>
            <strong>&copy; {{ date('Y') }} <a href="#" class="text-decoration-none">Your Company</a>.</strong>
            All rights reserved.
        </footer>
    </div>

    @stack('scripts')
</body>

</html>
