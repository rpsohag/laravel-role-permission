@extends('dashboard.auth.layout')

@section('login_content')
<div class="col-xxl-4 col-lg-4">
    <div class="card overflow-hidden">
        <div class="row g-0">
            <div class="col-lg-12">
                <div class="d-flex flex-column h-100">
                    <div class="auth-brand w-100 d-flex justify-content-center p-4">
                        <a href="index.html" class="logo-light">
                            <img src="{{ asset('dashboard-assets/images/logo.png') }}" alt="logo" height="22">
                        </a>
                        <a href="index.html" class="logo-dark">
                            <img src="{{ asset('dashboard-assets/images/logo-dark.png') }}" alt="dark logo" height="22">
                        </a>
                    </div>
                    <div class="p-4 my-auto">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show" role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Error - </strong> {{ session('error') }}
                            </div>
                        @endif

                        <h4 class="fs-20">Sign In</h4>
                        <p class="text-muted mb-3">Enter your email address and password to access account.</p>
                        
                        <!-- form -->
                        <form action="{{ route('dashboard.login.process') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress" name="email" value="admin@example.com" placeholder="Enter your email">
                                @error('email')     
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value="password" placeholder="Enter your password">
                                @error('password')     
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" id="checkbox-signin">
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                            <div class="mb-0 text-start">
                                <button class="btn btn-soft-primary w-100" type="submit">
                                    <i class="ri-login-circle-fill me-1"></i>
                                    <span class="fw-bold">Log In</span>
                                </button>
                            </div>
                        </form>
                        <!-- end form-->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
@endsection