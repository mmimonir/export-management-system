<x-guest-layout>
    <div class="mb-4 text-center">
        <h1 class="h4 mb-2">Forgot Your Password?</h1>
        <p class="text-muted">Enter your email address and we'll send you a password reset link.</p>
    </div>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                <span class="input-group-text">
                    <i class="bi bi-envelope"></i>
                </span>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Email Password Reset Link</button>
        </div>
    </form>

    <p class="mb-0 mt-3 text-center">
        <a href="{{ route('login') }}">Back to Login</a>
    </p>
</x-guest-layout>
