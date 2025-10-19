@extends('frontend.master')

@section('title', 'Current Shipment - World Shipping')

@section('content')
<!-- Shipping Hero Section -->
<section class="shipping-hero-section d-flex align-items-center justify-content-center text-white position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Page Title -->
                <h1 class="shipping-hero-title mb-3">CURRENT SHIPMENT</h1>
                
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center shipping-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Your Shipment Process</li>
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

<!-- Shipment Track Result Section -->
<section class="shipment-track-section py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Section Header -->
                <div class="text-center mb-5">
                    <h2 class="track-result-title mb-3">SHIPMENT TRACK RESULT</h2>
                </div>
                
                <div class="row g-4">
                    <!-- Left Column - Tracking Result -->
                    <div class="col-lg-8">
                        <div class="tracking-result-container bg-white shadow-sm">
                            <!-- Order Tracking Header -->
                            <div class="tracking-header bg-danger text-white p-3">
                                <h5 class="mb-0 fw-bold">ORDER TRACKING: ORDER NO</h5>
                            </div>
                            
                            <!-- Tracking Info -->
                            <div class="tracking-info bg-light p-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="tracking-label">Shipping Via:</span>
                                        <span class="tracking-value text-danger">Ipsum Dolor</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="tracking-label">Status:</span>
                                        <span class="tracking-value text-danger">Processing Order</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="tracking-label">Expected Date:</span>
                                        <span class="tracking-value text-danger">12-DEC-2017</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Progress Timeline -->
                            <div class="tracking-timeline p-4">
                                <div class="timeline-container">
                                    <div class="timeline-step completed">
                                        <div class="timeline-icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="timeline-title">Confirmed Order</h6>
                                        </div>
                                    </div>
                                    
                                    <div class="timeline-step completed">
                                        <div class="timeline-icon">
                                            <i class="fas fa-cogs"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="timeline-title">Processing Order</h6>
                                        </div>
                                    </div>
                                    
                                    <div class="timeline-step active">
                                        <div class="timeline-icon">
                                            <i class="fas fa-clipboard-check"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="timeline-title">Quality Check</h6>
                                        </div>
                                    </div>
                                    
                                    <div class="timeline-step active">
                                        <div class="timeline-icon">
                                            <i class="fas fa-truck"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="timeline-title">Dispatched Item</h6>
                                        </div>
                                    </div>
                                    
                                    <div class="timeline-step active">
                                        <div class="timeline-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="timeline-title">Product Delivered</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column - Freight Options -->
                    <div class="col-lg-4">
                        <div class="freight-options-container mb-4">
                            <div class="freight-header bg-danger text-white p-3">
                                <h5 class="mb-0 fw-bold text-center">SELECT YOUR FREIGHT</h5>
                            </div>
                            
                            <div class="freight-options bg-white">
                                <a href="#" class="freight-option-item d-flex justify-content-between align-items-center p-3 text-decoration-none">
                                    <span class="freight-option-text">AIR FREIGHT TRACKING</span>
                                    <i class="fas fa-chevron-right text-muted"></i>
                                </a>
                                
                                <a href="#" class="freight-option-item d-flex justify-content-between align-items-center p-3 text-decoration-none">
                                    <span class="freight-option-text">OCEAN FREIGHT TRACKING</span>
                                    <i class="fas fa-chevron-right text-muted"></i>
                                </a>
                                
                                <a href="#" class="freight-option-item d-flex justify-content-between align-items-center p-3 text-decoration-none">
                                    <span class="freight-option-text">ROAD & RAIL FREIGHT TRACKING</span>
                                    <i class="fas fa-chevron-right text-muted"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Your Order List Button -->
                        <div class="order-list-container">
                            <a href="#" class="btn btn-danger order-list-btn w-100 py-3">
                                YOUR ORDER LIST
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Help Section -->
<section class="help-section py-4 bg-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h4 class="help-text mb-0 text-white">
                    WE ARE ALWAYS IN HERE, <span class="text-danger">NEED ANY HELP?</span>
                </h4>
            </div>
            <div class="col-lg-4 text-end">
                <a href="{{ route('contact.us') }}" class="btn btn-danger help-contact-btn px-4 py-2">
                    CONTACT WITH US
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Our Services Section -->
@include('frontend.partials.services_section')
@endsection