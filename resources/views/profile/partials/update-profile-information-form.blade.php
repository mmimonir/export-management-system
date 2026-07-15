<section>
    <header>
        <h3 class="card-title mb-2">Profile Information</h3>
        <p class="text-muted">Update your account's profile information and email address.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="bg-warning mt-2 rounded bg-opacity-10 p-3">
                    <p class="text-warning mb-2">
                        <i class="bi bi-exclamation-triangle me-1"></i>
                        Your email address is unverified.
                    </p>
                    <button form="send-verification" class="btn btn-warning btn-sm">
                        <i class="bi bi-envelope me-1"></i>Click here to re-send the verification email.
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success mb-0 mt-2">
                            <i class="bi bi-check-circle me-1"></i>
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg me-1"></i>Save
            </button>
        </div>

        @if (session('status') === 'profile-updated')
            <div class="alert alert-success alert-dismissible fade show mb-0 mt-3" role="alert">
                <i class="bi bi-check-circle me-1"></i>Profile updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </form>
</section>
