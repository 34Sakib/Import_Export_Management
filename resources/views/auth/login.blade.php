@extends('frontend.master')

@section('title', 'Customer Login - World Shipping')

@section('content')
<!-- Login Hero Section -->
<section class="shipping-hero-section d-flex align-items-center justify-content-center text-white position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Page Title -->
                <h1 class="shipping-hero-title mb-3">CUSTOMER LOGIN</h1>
                
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center shipping-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Customer Login</li>
                    </ol>
                </nav>
                
                <!-- Description Text -->
                <p class="shipping-hero-description lead mb-0">
                    We freight to all over the world The best logistic company, 
                    <span class="text-danger fw-bold">FAST</span> and 
                    <span class="text-danger fw-bold">SAFELY!</span>
                </p>
            </div>
        </div>
    </div>
    
    <!-- Background Overlay -->
    <div class="shipping-hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
</section>

<!-- Login Content Section -->
<section class="login-content-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="login-card shadow-lg">
                    <div class="row g-0">
                        <!-- Left Panel - Welcome Message -->
                        <div class="col-md-6">
                            <div class="login-left-panel d-flex flex-column align-items-center justify-content-center text-center text-white p-5">
                                <div class="login-icon mb-4">
                                    <i class="fas fa-lock fa-3x"></i>
                                </div>
                                <h3 class="mb-3">Welcome To Your Account</h3>
                                <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                <a href="{{ route('register') }}" class="btn btn-outline-light">Create New Account</a>
                            </div>
                        </div>
                        
                        <!-- Right Panel - Login Form -->
                        <div class="col-md-6">
                            <div class="login-right-panel p-5">
                                <h4 class="login-form-title mb-4">Login To Your Account</h4>
                                
                                <!-- Session Status -->
                                @if (session('status'))
                                    <div class="alert alert-success mb-4">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    
                                    <!-- Email Address -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control login-input" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Enter your email">
                                        @error('email')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control login-input" id="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                                        @error('password')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Remember Me & Forgot Password -->
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                            <label class="form-check-label small" for="remember_me">
                                                Remember me
                                            </label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-decoration-none small">Forgot your password?</a>
                                        @endif
                                    </div>
                                    
                                    <!-- Login Button -->
                                    <button type="submit" class="btn btn-danger w-100 login-btn">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
