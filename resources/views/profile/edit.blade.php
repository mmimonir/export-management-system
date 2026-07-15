@extends('layouts.admin')

@section('title', 'Edit Profile - Export Management System')

@section('page-title', 'Edit Profile')

@section('breadcrumb')
    <li class="breadcrumb-item active">Profile</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Update Profile Information -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-person me-2"></i>Profile Information
                    </h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Update Password -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-shield-lock me-2"></i>Update Password
                    </h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <!-- Delete Account -->
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <h3 class="card-title">
                        <i class="bi bi-exclamation-triangle me-2"></i>Delete Account
                    </h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Account Information -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-info-circle me-2"></i>Account Information
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-borderless table">
                            <tr>
                                <td width="150"><strong>Member Since:</strong></td>
                                <td>{{ $user->created_at->format('F d, Y') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Last Updated:</strong></td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email Verified:</strong></td>
                                <td>
                                    @if ($user->email_verified_at)
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i>Verified
                                        </span>
                                        <small class="text-muted ms-2">on
                                            {{ $user->email_verified_at->format('M d, Y') }}</small>
                                    @else
                                        <span class="badge bg-warning text-dark">
                                            <i class="bi bi-exclamation-circle me-1"></i>Unverified
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Account Type:</strong></td>
                                <td>
                                    <span class="badge bg-primary">Standard User</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Auto-dismiss alerts after 5 seconds
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 5000);

            // Auto-focus password field when modal opens
            $('#confirmUserDeletion').on('shown.bs.modal', function() {
                $('#delete_password').trigger('focus');
            });

            // Add password toggle functionality
            $('.input-group input[type="password"]').each(function() {
                var inputGroup = $(this).closest('.input-group');
                var toggleBtn = $(
                    '<span class="input-group-text" style="cursor: pointer;"><i class="bi bi-eye"></i></span>'
                    );

                toggleBtn.click(function() {
                    var input = $(this).siblings('input');
                    var icon = $(this).find('i');

                    if (input.attr('type') === 'password') {
                        input.attr('type', 'text');
                        icon.removeClass('bi-eye').addClass('bi-eye-slash');
                    } else {
                        input.attr('type', 'password');
                        icon.removeClass('bi-eye-slash').addClass('bi-eye');
                    }
                });

                inputGroup.append(toggleBtn);
            });
        });
    </script>
@endpush
