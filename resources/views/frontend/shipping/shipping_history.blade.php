@extends('frontend.master')

@section('title', 'SHIPPING HISTORY - World Shipping')

@section('content')
<!-- Shipping Hero Section -->
<section class="shipping-hero-section d-flex align-items-center justify-content-center text-white position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Page Title -->
                <h1 class="shipping-hero-title mb-3">SHIPPING HISTORY</h1>
                
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center shipping-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Shipping History</li>
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

<!-- Shipment History Section -->
<section class="shipment-history-section py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Section Header -->
                <div class="text-center mb-5">
                    <h2 class="shipment-history-title mb-3">YOUR SHIPMENT HISTORY</h2>
                </div>
                
                <div class="row g-4">
                    <!-- Left Column - History Table -->
                    <div class="col-lg-8">
                        <div class="history-table-container bg-white shadow-sm">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table history-table mb-0">
                                    <thead>
                                        <tr class="history-table-header">
                                            <th class="history-th">SL</th>
                                            <th class="history-th">SKU#</th>
                                            <th class="history-th">PRODUCT NAME</th>
                                            <th class="history-th">QTY</th>
                                            <th class="history-th">WT</th>
                                            <th class="history-th">TAX</th>
                                            <th class="history-th">STATUS</th>
                                            <th class="history-th">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="history-table-row">
                                            <td class="history-td">1</td>
                                            <td class="history-td">US-ZPSC-65F2</td>
                                            <td class="history-td">The point of using Lorem Ipsum is that</td>
                                            <td class="history-td">2</td>
                                            <td class="history-td">10kg</td>
                                            <td class="history-td">Y</td>
                                            <td class="history-td">
                                                <span class="status-badge status-processing">Processing</span>
                                            </td>
                                            <td class="history-td">
                                                <button class="btn btn-sm history-action-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="history-table-row">
                                            <td class="history-td">2</td>
                                            <td class="history-td">US-ZP3C-65F3</td>
                                            <td class="history-td">The point of using Lorem Ipsum is that</td>
                                            <td class="history-td">2</td>
                                            <td class="history-td">10kg</td>
                                            <td class="history-td">Y</td>
                                            <td class="history-td">
                                                <span class="status-badge status-confirm">Confirm</span>
                                            </td>
                                            <td class="history-td">
                                                <button class="btn btn-sm history-action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="history-table-row">
                                            <td class="history-td">3</td>
                                            <td class="history-td">US-ZP4C-65F4</td>
                                            <td class="history-td">The point of using Lorem Ipsum is that</td>
                                            <td class="history-td">2</td>
                                            <td class="history-td">10kg</td>
                                            <td class="history-td">Y</td>
                                            <td class="history-td">
                                                <span class="status-badge status-processing">Processing</span>
                                            </td>
                                            <td class="history-td">
                                                <button class="btn btn-sm history-action-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="history-table-row">
                                            <td class="history-td">4</td>
                                            <td class="history-td">US-ZPSC-65F2</td>
                                            <td class="history-td">The point of using Lorem Ipsum is that</td>
                                            <td class="history-td">2</td>
                                            <td class="history-td">10kg</td>
                                            <td class="history-td">Y</td>
                                            <td class="history-td">
                                                <span class="status-badge status-processing">Processing</span>
                                            </td>
                                            <td class="history-td">
                                                <button class="btn btn-sm history-action-btn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="history-table-row">
                                            <td class="history-td">5</td>
                                            <td class="history-td">US-ZP3C-65F3</td>
                                            <td class="history-td">The point of using Lorem Ipsum is that</td>
                                            <td class="history-td">2</td>
                                            <td class="history-td">10kg</td>
                                            <td class="history-td">Y</td>
                                            <td class="history-td">
                                                <span class="status-badge status-confirm">Confirm</span>
                                            </td>
                                            <td class="history-td">
                                                <button class="btn btn-sm history-action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="history-table-row">
                                            <td class="history-td">6</td>
                                            <td class="history-td">US-ZP4C-65F4</td>
                                            <td class="history-td">The point of using Lorem Ipsum is that</td>
                                            <td class="history-td">2</td>
                                            <td class="history-td">10kg</td>
                                            <td class="history-td">Y</td>
                                            <td class="history-td">
                                                <span class="status-badge status-processing">Processing</span>
                                            </td>
                                            <td class="history-td">
                                                <button class="btn btn-sm history-action-btn">
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

<!-- Our Services Section -->
@include('frontend.partials.services_section')
@endsection