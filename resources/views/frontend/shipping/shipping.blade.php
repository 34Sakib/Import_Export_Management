@extends('frontend.master')

@section('title', 'CURRENT SHIPMENT - World Shipping')

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
                        <li class="breadcrumb-item active text-white" aria-current="page">Current Shipment</li>
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

<!-- Current Order Section -->
<section class="current-order-section py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Section Header -->
                <div class="text-center mb-5">
                    <h2 class="current-order-title mb-3">CURRENT SHIPMENT</h2>
                </div>
                
                <div class="row g-4">
                    <!-- Left Column - Order Table -->
                    <div class="col-lg-8">
                        <div class="order-table-container bg-white shadow-sm">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table order-table mb-0">
                                    <thead>
                                        <tr class="order-table-header">
                                            <th class="order-th">SL</th>
                                            <th class="order-th">SKU#</th>
                                            <th class="order-th">PRODUCT NAME</th>
                                            <th class="order-th">QTY</th>
                                            <th class="order-th">WT</th>
                                            <th class="order-th">TAX</th>
                                            <th class="order-th">STATUS</th>
                                            <th class="order-th">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="order-table-row">
                                            <td class="order-td">1</td>
                                            <td class="order-td">US-ZPSC-65F2</td>
                                            <td class="order-td">The point of using Lorem Ipsum is that</td>
                                            <td class="order-td">2</td>
                                            <td class="order-td">10kg</td>
                                            <td class="order-td">Y</td>
                                            <td class="order-td">
                                                <span class="status-badge status-processing">Processing</span>
                                            </td>
                                            <td class="order-td">
                                                <button class="btn btn-sm order-action-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="order-table-row">
                                            <td class="order-td">2</td>
                                            <td class="order-td">US-ZP3C-65F3</td>
                                            <td class="order-td">The point of using Lorem Ipsum is that</td>
                                            <td class="order-td">2</td>
                                            <td class="order-td">10kg</td>
                                            <td class="order-td">Y</td>
                                            <td class="order-td">
                                                <span class="status-badge status-confirm">Confirm</span>
                                            </td>
                                            <td class="order-td">
                                                <button class="btn btn-sm order-action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="order-table-row">
                                            <td class="order-td">3</td>
                                            <td class="order-td">US-ZP4C-65F4</td>
                                            <td class="order-td">The point of using Lorem Ipsum is that</td>
                                            <td class="order-td">2</td>
                                            <td class="order-td">10kg</td>
                                            <td class="order-td">Y</td>
                                            <td class="order-td">
                                                <span class="status-badge status-processing">Processing</span>
                                            </td>
                                            <td class="order-td">
                                                <button class="btn btn-sm order-action-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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

@include('frontend.partials.services_section')
@endsection