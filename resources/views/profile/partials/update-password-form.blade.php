<section>
    <header>
        <h3 class="card-title mb-2">Update Password</h3>
        <p class="text-muted">Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Current Password</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-lock"></i>
                </span>
                <input type="password"
                    class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                    id="update_password_current_password" name="current_password" autocomplete="current-password">
                @error('current_password', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">New Password</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-lock-fill"></i>
                </span>
                <input type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                    id="update_password_password" name="password" autocomplete="new-password">
                @error('password', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Confirm New Password</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-lock-fill"></i>
                </span>
                <input type="password"
                    class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                    id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password">
                @error('password_confirmation', 'updatePassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg me-1"></i>Save
            </button>
        </div>

        @if (session('status') === 'password-updated')
            <div class="alert alert-success alert-dismissible fade show mb-0 mt-3" role="alert">
                <i class="bi bi-check-circle me-1"></i>Password updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </form>
</section>
