@extends('frontend.master')

@section('title', 'About Us - World Shipping')

@section('content')
<!-- Blog Hero Section -->
<section class="shipping-hero-section d-flex align-items-center justify-content-center text-white position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Page Title -->
                <h1 class="shipping-hero-title mb-3">About Us</h1>
                
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

<!-- About Us Content Section -->
<section class="about-content-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="company-description">
                    <h2 class="mb-4">ABOUT OUR COMPANY</h2>
                    <p class="text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
                        culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
                        culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Statistics Section -->
<section class="py-5" style="background-color: #2c3e50;">
    <div class="container">
        <div class="row g-4">
            <!-- Project Done -->
            <div class="col-lg-3 col-md-6">
                <div class="stats-card bg-danger text-white text-center p-4 h-100">
                    <div class="stats-icon mb-3">
                        <i class="fas fa-folder-open fa-2x"></i>
                    </div>
                    <div class="stats-content">
                        <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: white;">578</h2>
                        <p class="mb-0 text-uppercase fw-semibold" style="font-size: 14px; letter-spacing: 1px;">
                            PROJECT DONE
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Permanent Clients -->
            <div class="col-lg-3 col-md-6">
                <div class="stats-card bg-danger text-white text-center p-4 h-100">
                    <div class="stats-icon mb-3">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div class="stats-content">
                        <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: white;">347</h2>
                        <p class="mb-0 text-uppercase fw-semibold" style="font-size: 14px; letter-spacing: 1px;">
                            PERMANENT CLIENTS
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Owned Vehicles -->
            <div class="col-lg-3 col-md-6">
                <div class="stats-card bg-danger text-white text-center p-4 h-100">
                    <div class="stats-icon mb-3">
                        <i class="fas fa-truck fa-2x"></i>
                    </div>
                    <div class="stats-content">
                        <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: white;">128</h2>
                        <p class="mb-0 text-uppercase fw-semibold" style="font-size: 14px; letter-spacing: 1px;">
                            OWNED VEHICLES
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Support Member -->
            <div class="col-lg-3 col-md-6">
                <div class="stats-card bg-danger text-white text-center p-4 h-100">
                    <div class="stats-icon mb-3">
                        <i class="fas fa-user-tie fa-2x"></i>
                    </div>
                    <div class="stats-content">
                        <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: white;">67</h2>
                        <p class="mb-0 text-uppercase fw-semibold" style="font-size: 14px; letter-spacing: 1px;">
                            SUPPORT MEMBER
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Meet Our Team Section -->
<section class="meet-team-section py-5">
    <div class="container">
        <!-- Section Header -->
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="team-section-title">MEET OUR TEAM</h2>
                <p class="team-section-subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>
        
        <!-- Team Members -->
        <div class="row g-4">
            <!-- Team Member 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-member-card">
                    <div class="team-member-image">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Team Member" class="img-fluid">
                    </div>
                    <div class="team-member-info">
                        <h5 class="team-member-name">JOHN ANDERSON</h5>
                        <p class="team-member-position">Chief Marketing Officer</p>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-member-card">
                    <div class="team-member-image">
                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Team Member" class="img-fluid">
                    </div>
                    <div class="team-member-info">
                        <h5 class="team-member-name">MICHAEL BROWN</h5>
                        <p class="team-member-position">Chief Marketing Officer</p>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-member-card">
                    <div class="team-member-image">
                        <img src="https://randomuser.me/api/portraits/men/28.jpg" alt="Team Member" class="img-fluid">
                    </div>
                    <div class="team-member-info">
                        <h5 class="team-member-name">DAVID WILSON</h5>
                        <p class="team-member-position">Chief Marketing Officer</p>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="team-member-card">
                    <div class="team-member-image">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Team Member" class="img-fluid">
                    </div>
                    <div class="team-member-info">
                        <h5 class="team-member-name">SARAH JOHNSON</h5>
                        <p class="team-member-position">Chief Marketing Officer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Valuable Client Section -->
@php
    $clients = \App\Models\Client::where('is_active', true)
        ->orderBy('sort_order', 'asc')
        ->get();
@endphp

<x-clients-section :clients="$clients" />

@endsection