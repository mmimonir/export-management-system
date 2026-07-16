<x-guest-layout>
    <div class="mb-4 text-center">
        <h1 class="h4 mb-2">Verify Your Email Address</h1>
        <p class="text-muted">Before getting started, please verify your email address by clicking the link we emailed to
            you.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-grid mb-3 gap-2">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg">Resend Verification Email</button>
        </form>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-secondary w-100">Log Out</button>
    </form>
</x-guest-layout>
