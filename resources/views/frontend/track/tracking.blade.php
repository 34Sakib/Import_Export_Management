@extends('frontend.master')

@section('title', 'Tracking - World Shipping')

@section('content')
<!-- Tracking Hero Section -->
<section class="tracking-hero-section d-flex align-items-center justify-content-center text-white position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Page Title -->
                <h1 class="tracking-hero-title mb-3">TRACKING</h1>
                
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center tracking-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Tracking</li>
                    </ol>
                </nav>
                
                <!-- Description Text -->
                <p class="tracking-hero-description lead mb-0">
                    We freight to all over the world The best logistic company, 
                    <span class="text-danger fw-bold">FAST</span> and 
                    <span class="text-danger fw-bold">SECURE</span>
                </p>
            </div>
        </div>
    </div>
    
    <!-- Background Overlay -->
    <div class="tracking-hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
</section>

<!-- Track Shipment Section -->
<section class="track-shipment-section py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Section Header -->
                <div class="text-center mb-5">
                    <h2 class="track-section-title mb-3">TRACK A SHIPMENT</h2>
                    <p class="track-section-subtitle text-muted">
                        Track your LTL, truckload, or intermodal shipment by entering your 
                        <strong>Track number</strong> below to get instant freight tracking information.
                    </p>
                </div>
                
                <div class="row g-4">
                    <!-- Left Column - Tracking Form -->
                    <div class="col-lg-8">
                        <div class="tracking-form-container bg-white p-4 shadow-sm">
                            <!-- Tracking Tabs -->
                            <ul class="nav nav-tabs tracking-tabs mb-4" id="trackingTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active tracking-tab-btn" id="number-tab" data-bs-toggle="tab" 
                                            data-bs-target="#number-pane" type="button" role="tab">
                                        Track by Number
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link tracking-tab-btn" id="reference-tab" data-bs-toggle="tab" 
                                            data-bs-target="#reference-pane" type="button" role="tab">
                                        Track by Reference
                                    </button>
                                </li>
                            </ul>
                            
                            <!-- Tab Content -->
                            <div class="tab-content" id="trackingTabContent">
                                <!-- Track by Number Tab -->
                                <div class="tab-pane fade show active" id="number-pane" role="tabpanel">
                                    <div class="tracking-form-section">
                                        <h4 class="tracking-form-title mb-4">AIR FREIGHT TRACKING</h4>
                                        
                                        <form class="tracking-form">
                                            <div class="row g-3 align-items-end">
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control tracking-input" 
                                                           placeholder="Track ID" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-danger tracking-btn w-100">
                                                        TRACK
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        <div class="tracking-help-links mt-4">
                                            <a href="#" class="tracking-help-link me-3">NEED HELP?</a>
                                            <span class="text-muted">|</span>
                                            <a href="#" class="tracking-help-link ms-3">YOUR ORDER LIST</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Track by Reference Tab -->
                                <div class="tab-pane fade" id="reference-pane" role="tabpanel">
                                    <div class="tracking-form-section">
                                        <h4 class="tracking-form-title mb-4">AIR FREIGHT TRACKING</h4>
                                        
                                        <form class="tracking-form">
                                            <div class="row g-3 align-items-end">
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control tracking-input" 
                                                           placeholder="Reference Number" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-danger tracking-btn w-100">
                                                        TRACK
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        <div class="tracking-help-links mt-4">
                                            <a href="#" class="tracking-help-link me-3">NEED HELP?</a>
                                            <span class="text-muted">|</span>
                                            <a href="#" class="tracking-help-link ms-3">YOUR ORDER LIST</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column - Freight Options -->
                    <div class="col-lg-4">
                        <div class="freight-options-container">
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

@include('frontend.partials.services_section')
@endsection