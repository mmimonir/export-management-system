<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Export Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body data-bs-theme="dark" class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">
                <img src="https://adminlte.io/wp-content/uploads/2024/04/logo-adminlte.png" alt="EMS Logo"
                    class="brand-image opacity-75 shadow" style="max-height: 40px;">
                <span class="brand-text fw-light">Export Management System</span>
            </a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                {{ $slot }}
            </div>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
