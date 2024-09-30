@extends('dashboard.auth.layout')
@section('login_content')
<div class="col-xxl-4 col-lg-4">
    <div class="card overflow-hidden">
        <div class="row g-0">
            <div class="col-lg-12">
                <div class="d-flex flex-column h-100">
                    <div class="auth-brand w-100 d-flex justify-content-center p-4">
                        <a href="{{ route('dashboard.login.view') }}" class="logo-dark">
                            <img src="{{ asset('dashboard-assets/images/logo-dark.png') }}" alt="dark logo" height="22">
                        </a>
                    </div>
                    <div class="p-4 my-auto">
                        <x-error-alert></x-error-alert>
                        <h4 class="fs-20">Sign In</h4>
                        <p class="text-muted mb-3">Enter your email address and password to access account.</p>
                        <!-- form -->
                        <x-form action="{{ route('dashboard.login.process') }}">
                            <x-form-input label="Email address" name="email" value="admin@example.com" placeholder="Enter your email" />
                            <x-form-input type="password" label="Password" name="password" value="password" placeholder="Enter your password" />
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" id="signin">
                                    <label class="form-check-label" for="signin">Remember me</label>
                                </div>
                            </div>
                            <div class="mb-0 text-start">
                                <button class="btn btn-soft-primary w-100" type="submit">
                                    <i class="ri-login-circle-fill me-1"></i>
                                    <span class="fw-bold">Log In</span>
                                </button>
                            </div>
                        </x-form>
                        <!-- end form-->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const loginButton = document.querySelector('button[type="submit"]');
    const loginForm = document.querySelector('form');
    loginButton.addEventListener('click', function (event) {
        event.preventDefault();
        loginButton.disabled = true;
        loginButton.style.backgroundColor = 'rgb(0 132 135)';
        loginButton.style.color = '#fff';
        loginForm.submit();
    });
})
</script>
@endpush