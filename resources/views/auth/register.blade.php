@extends('frontend.master')

@section('title', 'Customer Registration - World Shipping')

@section('content')
<!-- Registration Hero Section -->
<section class="shipping-hero-section d-flex align-items-center justify-content-center text-white position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Page Title -->
                <h1 class="shipping-hero-title mb-3">CUSTOMER REGISTRATION</h1>
                
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center shipping-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Customer Registration</li>
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

<!-- Registration Content Section -->
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
                                <h3 class="mb-3">Welcome To New Account</h3>
                                <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <p class="mb-4 fw-bold">IF YOU HAVE ACCOUNT ALREADY PLEASE LOGIN IN</p>
                                <a href="{{ route('login') }}" class="btn btn-outline-light">Login Here</a>
                            </div>
                        </div>
                        
                        <!-- Right Panel - Registration Form -->
                        <div class="col-md-6">
                            <div class="login-right-panel p-5">
                                <h4 class="login-form-title mb-4">Registration</h4>
                                
                                <!-- Session Status -->
                                @if (session('status'))
                                    <div class="alert alert-success mb-4">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    
                                    <div class="row">
                                        <!-- Name -->
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control login-input" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Enter your name">
                                            @error('name')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Phone -->
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="tel" class="form-control login-input" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone">
                                            @error('phone')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Email Address -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control login-input" id="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Enter your email">
                                        @error('email')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="row">
                                        <!-- Password -->
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control login-input" id="password" name="password" required autocomplete="new-password" placeholder="Enter password">
                                            @error('password')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Confirm Password -->
                                        <div class="col-md-6 mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control login-input" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                            @error('password_confirmation')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Registration Button -->
                                    <button type="submit" class="btn btn-danger w-100 login-btn">Registration</button>
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
