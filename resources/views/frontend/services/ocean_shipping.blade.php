@extends('frontend.master')

@section('title', 'Our Services - World Shipping')

@section('content')
<!-- Air Freight Shipping Hero Section -->
<section class="services-hero-section d-flex align-items-center justify-content-center text-white position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Page Title -->
                <h1 class="services-hero-title mb-3">OCEAN SHIPPING SERVICE</h1>
                
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center services-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page"> Ocean Shipping Service</li>
                    </ol>
                </nav>
                
                <!-- Description Text -->
                <p class="services-hero-description lead mb-0">
                    We freight to all over the world The best logistic company, 
                    <span class="text-danger fw-bold">FAST</span> and 
                    <span class="text-danger fw-bold">SECURE</span>
                </p>
            </div>
        </div>
    </div>
    
    <!-- Background Overlay -->
    <div class="services-hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
</section>

<!-- Air Freight Shipping Details Section -->
<section class="air-freight-details-section py-5 bg-white">
    <div class="container">
        <div class="row g-5">
            <!-- Left Column - Images and Content -->
            <div class="col-lg-7">
                <!-- Section Title -->
                <h2 class="air-freight-title mb-4">OCEAN FREIGHT SHIPPING</h2>
                
                <!-- Images Grid -->
                <div class="air-freight-images mb-4">
                    <!-- Main Large Image -->
                    <div class="main-image-container mb-3">
                        <img src="https://images.unsplash.com/photo-1540962351504-03099e0a754b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid air-freight-main-image" alt="Air Freight Shipping Main">
                    </div>
                    
                    <!-- Two Small Images -->
                    <div class="row g-3">
                        <div class="col-6">
                            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid air-freight-small-image" alt="Air Freight Shipping 1">
                        </div>
                        <div class="col-6">
                            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 class="img-fluid air-freight-small-image" alt="Air Freight Shipping 2">
                        </div>
                    </div>
                </div>
                
                <!-- Download Buttons -->
                <div class="download-buttons mb-4">
                    <button class="btn air-freight-download-btn me-3 mb-2">Download Boucher</button>
                    <button class="btn air-freight-download-btn mb-2">Download Pricelist</button>
                </div>
                
                <!-- Content Text -->
                <div class="air-freight-content">
                    <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                    
                    <p class="mb-4">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    
                    <p class="mb-4">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.</p>
                    
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                </div>
            </div>
            
            <!-- Right Column - Advantages and Form -->
            <div class="col-lg-5">
                <!-- Our Advantages Section -->
                <div class="advantages-section mb-5">
                    <h3 class="advantages-title mb-4">OUR ADVANTAGES</h3>
                    
                    <!-- Advantage Items -->
                    <div class="advantage-items">
                        <!-- We Are Trusted -->
                        <div class="advantage-item d-flex align-items-start mb-4">
                            <div class="advantage-icon me-3">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="advantage-content">
                                <h5 class="advantage-title mb-2">WE ARE TRUSTED</h5>
                                <p class="advantage-text mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            </div>
                        </div>
                        
                        <!-- The Best Security -->
                        <div class="advantage-item d-flex align-items-start mb-4">
                            <div class="advantage-icon me-3">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="advantage-content">
                                <h5 class="advantage-title mb-2">THE BEST SECURITY</h5>
                                <p class="advantage-text mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            </div>
                        </div>
                        
                        <!-- 100% Guarantee -->
                        <div class="advantage-item d-flex align-items-start mb-4">
                            <div class="advantage-icon me-3">
                                <i class="fas fa-certificate"></i>
                            </div>
                            <div class="advantage-content">
                                <h5 class="advantage-title mb-2">100% GUARANTEE</h5>
                                <p class="advantage-text mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            </div>
                        </div>
                        
                        <!-- Quick Location -->
                        <div class="advantage-item d-flex align-items-start mb-4">
                            <div class="advantage-icon me-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="advantage-content">
                                <h5 class="advantage-title mb-2">QUICK LOCATION</h5>
                                <p class="advantage-text mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quote Form -->
                <div class="quote-form-section">
                    <div class="quote-form-header mb-3">
                        <h4 class="quote-form-title">GET A QUOTE ON RENOVATION</h4>
                    </div>
                    
                    <form class="air-freight-quote-form">
                        <div class="mb-3">
                            <input type="text" class="form-control quote-input" placeholder="Your Full Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control quote-input" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control quote-input" placeholder="Phone Number" required>
                        <div class="mb-4">
                            <textarea class="form-control quote-input" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <button type="submit" class="btn quote-submit-btn w-100">GET A FREE QUOTE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News and Testimonial Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Latest News Section -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="news-section">
                    <!-- Section Header -->
                    <div class="section-header mb-4">
                        <h3 class="fw-bold text-dark mb-2">LATEST NEWS</h3>
                        <div class="bg-danger" style="width: 50px; height: 3px;"></div>
                    </div>
                    
                    <!-- News Items -->
                    <div class="news-items">
                        <!-- News Item 1 -->
                        <div class="news-item d-flex mb-3">
                            <div class="news-date bg-danger text-white text-center p-3 me-3" style="min-width: 80px;">
                                <div class="date-number fw-bold" style="font-size: 2rem; line-height: 1;">28</div>
                                <div class="date-month text-uppercase" style="font-size: 12px; letter-spacing: 1px;">FEB</div>
                            </div>
                            <div class="news-content bg-white p-3 flex-grow-1 shadow-sm">
                                <h6 class="fw-bold mb-2 text-dark">News Title</h6>
                                <p class="text-muted mb-1" style="font-size: 12px;">
                                    By <span class="text-danger">Admin</span>
                                </p>
                                <p class="text-muted mb-0" style="font-size: 13px; line-height: 1.4;">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                            </div>
                        </div>
                        
                        <!-- News Item 2 -->
                        <div class="news-item d-flex mb-3">
                            <div class="news-date bg-danger text-white text-center p-3 me-3" style="min-width: 80px;">
                                <div class="date-number fw-bold" style="font-size: 2rem; line-height: 1;">23</div>
                                <div class="date-month text-uppercase" style="font-size: 12px; letter-spacing: 1px;">MAR</div>
                            </div>
                            <div class="news-content bg-white p-3 flex-grow-1 shadow-sm">
                                <h6 class="fw-bold mb-2 text-dark">News Title</h6>
                                <p class="text-muted mb-1" style="font-size: 12px;">
                                    By <span class="text-danger">Admin</span>
                                </p>
                                <p class="text-muted mb-0" style="font-size: 13px; line-height: 1.4;">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial Section -->
            <div class="col-lg-6">
                <div class="testimonial-section">
                    <!-- Section Header -->
                    <div class="section-header mb-4">
                        <h3 class="fw-bold text-dark mb-2">TESTIMONIAL</h3>
                        <div class="bg-danger" style="width: 50px; height: 3px;"></div>
                    </div>
                    
                    <!-- Testimonial Carousel -->
                    <div class="testimonial-carousel">
                        <!-- Testimonial 1 -->
                        <div class="testimonial-item">
                            <div class="testimonial-content d-flex">
                                <!-- Client Photo -->
                                <div class="testimonial-image me-4" style="min-width: 120px;">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                         alt="Client" class="img-fluid rounded" style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                                
                                <!-- Quote Content -->
                                <div class="testimonial-quote bg-danger text-white p-4 position-relative flex-grow-1">
                                    <!-- Quote Icon -->
                                    <div class="quote-icon position-absolute" style="top: 10px; left: 20px; font-size: 2rem; color: rgba(255,255,255,0.2);">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    
                                    <!-- Client Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <h5 class="text-white mb-0 me-2">John Doe</h5>
                                        <span class="text-white-50" style="font-size: 12px;">CEO, Company Name</span>
                                    </div>
                                    
                                    <!-- Rating -->
                                    <div class="mb-2">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </div>
                                    
                                    <!-- Quote Text -->
                                    <p class="mb-0" style="font-size: 14px; line-height: 1.6; position: relative; z-index: 1;">
                                        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Testimonial 2 -->
                        <div class="testimonial-item">
                            <div class="testimonial-content d-flex">
                                <!-- Client Photo -->
                                <div class="testimonial-image me-4" style="min-width: 120px;">
                                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                         alt="Client" class="img-fluid rounded" style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                                
                                <!-- Quote Content -->
                                <div class="testimonial-quote bg-danger text-white p-4 position-relative flex-grow-1">
                                    <!-- Quote Icon -->
                                    <div class="quote-icon position-absolute" style="top: 10px; left: 20px; font-size: 2rem; color: rgba(255,255,255,0.2);">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    
                                    <!-- Client Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <h5 class="text-white mb-0 me-2">Jane Smith</h5>
                                        <span class="text-white-50" style="font-size: 12px;">Marketing Director</span>
                                    </div>
                                    
                                    <!-- Rating -->
                                    <div class="mb-2">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                    </div>
                                    
                                    <!-- Quote Text -->
                                    <p class="mb-0" style="font-size: 14px; line-height: 1.6; position: relative; z-index: 1;">
                                        "The shipping service was excellent! My package arrived ahead of schedule and in perfect condition. Highly recommended for all your shipping needs."
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Testimonial 3 -->
                        <div class="testimonial-item">
                            <div class="testimonial-content d-flex">
                                <!-- Client Photo -->
                                <div class="testimonial-image me-4" style="min-width: 120px;">
                                    <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                         alt="Client" class="img-fluid rounded" style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                                
                                <!-- Quote Content -->
                                <div class="testimonial-quote bg-danger text-white p-4 position-relative flex-grow-1">
                                    <!-- Quote Icon -->
                                    <div class="quote-icon position-absolute" style="top: 10px; left: 20px; font-size: 2rem; color: rgba(255,255,255,0.2);">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    
                                    <!-- Client Info -->
                                    <div class="d-flex align-items-center mb-2">
                                        <h5 class="text-white mb-0 me-2">Michael Johnson</h5>
                                        <span class="text-white-50" style="font-size: 12px;">Business Owner</span>
                                    </div>
                                    
                                    <!-- Rating -->
                                    <div class="mb-2">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="far fa-star text-warning"></i>
                                    </div>
                                    
                                    <!-- Quote Text -->
                                    <p class="mb-0" style="font-size: 14px; line-height: 1.6; position: relative; z-index: 1;">
                                        "Professional service from start to finish. The team was very helpful and responsive throughout the entire shipping process. Will definitely use again!"
                                    </p>
                                </div>
                            </div>
                        </div>
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
</div>
</section>
@endsection
@endsection
