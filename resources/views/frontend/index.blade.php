@extends('frontend.master')

@section('content')
<!-- Hero Section -->
@if(isset($heroSlides) && $heroSlides->count() > 0)
    <div class="hero-slider">
        @foreach($heroSlides as $slide)
            <div class="hero-slide position-relative d-flex align-items-center" 
                 style="min-height: 70vh; background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('{{ $slide->image ? asset('storage/hero-slides/' . $slide->image) : 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80' }}') 
                        center/cover no-repeat;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center text-white">
                            @if($slide->subtitle)
                                <!-- Top Label -->
                                <div class="mb-3">
                                    <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-normal" style="font-size: 14px;">
                                        {{ $slide->subtitle }}
                                    </span>
                                </div>
                            @endif
                            
                            <!-- Main Heading -->
                            <h1 class="display-4 fw-bold mb-4" style="line-height: 1.2;">
                                {!! $slide->title !!}
                            </h1>
                            
                            <!-- Description -->
                            @if($slide->description)
                                <p class="lead mb-4 mx-auto" style="max-width: 600px; font-size: 18px; line-height: 1.6;">
                                    {{ $slide->description }}
                                </p>
                            @endif
                            
                            <!-- CTA Button -->
                            @if($slide->button_text && $slide->button_url)
                                <div class="mt-4">
                                    <a href="{{ $slide->button_url }}" class="btn btn-danger btn-lg px-5 py-3 fw-semibold text-uppercase" style="letter-spacing: 1px;">
                                        {{ $slide->button_text }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <!-- Default hero section if no slides are available -->
    <section class="hero-section position-relative d-flex align-items-center" style="min-height: 70vh; background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center text-white">
                    <div class="mb-3">
                        <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-normal" style="font-size: 14px;">
                            WE ARE ACTIVE
                        </span>
                    </div>
                    <h1 class="display-4 fw-bold mb-4" style="line-height: 1.2;">
                        TO SHIP YOUR PRODUCT 
                        <span class="text-danger">TRUSTED</span>
                    </h1>
                    <p class="lead mb-4 mx-auto" style="max-width: 600px; font-size: 18px; line-height: 1.6;">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="btn btn-danger btn-lg px-5 py-3 fw-semibold text-uppercase" style="letter-spacing: 1px;">
                            GET FREE QUOTE
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@push('scripts')
<script>
    $(document).ready(function(){
            // Initialize Slick slider for hero section with enhanced autoplay
            if ($('.hero-slider').length) {
                $('.hero-slider').slick({
                    dots: true,
                    infinite: true,
                    speed: 1000,  // Slightly faster transition
                    fade: true,
                    cssEase: 'cubic-bezier(0.4, 0, 0.2, 1)',  // Smoother easing
                    autoplay: true,
                    autoplaySpeed: 5000,  // 5 seconds per slide
                    pauseOnHover: false,   // Keep autoplay running on hover
                    pauseOnFocus: false,   // Keep autoplay running on focus
                    pauseOnDotsHover: false, // Keep autoplay running when hovering dots
                    arrows: true,
                    prevArrow: '<button type="button" class="slick-prev" aria-label="Previous"><i class="fas fa-chevron-left"></i></button>',
                    nextArrow: '<button type="button" class="slick-next" aria-label="Next"><i class="fas fa-chevron-right"></i></button>',
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                arrows: false,
                                dots: true,
                                autoplay: true,
                                pauseOnHover: false,
                                pauseOnFocus: false
                            }
                        }
                    ]
                });
            }
        });
</script>
@endpush

@push('styles')
<style>
    .hero-slider .slick-dots {
        bottom: 30px;
    }
    .hero-slider .slick-dots li button:before {
        font-size: 12px;
        color: #fff;
        opacity: 0.5;
    }
    .hero-slider .slick-dots li.slick-active button:before {
        color: #dc3545;
        opacity: 1;
    }
    .hero-slider .slick-arrow {
        z-index: 1;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transition: all 0.3s ease;
        border: none;
        color: #fff;
        display: flex !important;
        align-items: center;
        justify-content: center;
    }
    .hero-slider .slick-arrow:hover {
        background: #dc3545;
    }
    .hero-slider .slick-prev {
        left: 30px;
    }
    .hero-slider .slick-next {
        right: 30px;
    }
    .hero-slider .slick-arrow i {
        font-size: 20px;
        color: #fff;
    }
    .hero-slide {
        padding: 100px 0;
    }
</style>
@endpush


<!-- Our Services Section -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-dark mb-3">OUR SERVICES</h2>
            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        </div>
        
        <!-- Services Cards -->
        <div class="row g-4">
            @forelse($services as $service)
            <div class="col-lg-4 col-md-6">
                <div class="service-card bg-white shadow-sm position-relative overflow-hidden">
                    <div class="service-image">
                        @if($service->image && $service->image !== 'nophoto.png')
                            <img src="{{ asset('images/' . $service->image) }}" 
                                 alt="{{ $service->title }}" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                        @else
                            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                 alt="{{ $service->title }}" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                        @endif
                    </div>
                    <div class="service-content p-4">
                        <h4 class="fw-bold mb-3 text-dark">{{ strtoupper($service->title) }}</h4>
                        <p class="text-muted mb-4" style="font-size: 14px; line-height: 1.6;">
                            {{ Str::limit($service->description ?? 'Professional shipping service with reliable and secure delivery solutions.', 100) }}
                        </p>
                        <a href="{{ route('our.services') }}" class="service-link text-danger fw-semibold text-decoration-none">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                    <!-- Red Corner Element -->
                    <div class="service-corner position-absolute bg-danger d-flex align-items-center justify-content-center">
                        <i class="fas fa-plus text-white"></i>
                    </div>
                </div>
            </div>
            @empty
            <!-- Default services when no services are created -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card bg-white shadow-sm position-relative overflow-hidden">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Ocean Freight Shipping" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                    </div>
                    <div class="service-content p-4">
                        <h4 class="fw-bold mb-3 text-dark">OCEAN FREIGHT SHIPPING</h4>
                        <p class="text-muted mb-4" style="font-size: 14px; line-height: 1.6;">
                            Professional ocean freight services with reliable and secure delivery solutions worldwide.
                        </p>
                        <a href="{{ route('our.services') }}" class="service-link text-danger fw-semibold text-decoration-none">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                    <div class="service-corner position-absolute bg-danger d-flex align-items-center justify-content-center">
                        <i class="fas fa-plus text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-card bg-white shadow-sm position-relative overflow-hidden">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1540962351504-03099e0a754b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Air Freight Shipping" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                    </div>
                    <div class="service-content p-4">
                        <h4 class="fw-bold mb-3 text-dark">AIR FREIGHT SHIPPING</h4>
                        <p class="text-muted mb-4" style="font-size: 14px; line-height: 1.6;">
                            Fast and efficient air freight services for time-sensitive shipments and urgent deliveries.
                        </p>
                        <a href="{{ route('our.services') }}" class="service-link text-danger fw-semibold text-decoration-none">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                    <div class="service-corner position-absolute bg-danger d-flex align-items-center justify-content-center">
                        <i class="fas fa-plus text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-card bg-white shadow-sm position-relative overflow-hidden">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Car Shipping" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                    </div>
                    <div class="service-content p-4">
                        <h4 class="fw-bold mb-3 text-dark">CAR SHIPPING</h4>
                        <p class="text-muted mb-4" style="font-size: 14px; line-height: 1.6;">
                            Secure vehicle transportation services with specialized handling and comprehensive insurance coverage.
                        </p>
                        <a href="{{ route('our.services') }}" class="service-link text-danger fw-semibold text-decoration-none">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                    <div class="service-corner position-absolute bg-danger d-flex align-items-center justify-content-center">
                        <i class="fas fa-plus text-white"></i>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section - Sea and Air Freight -->
<section class="cta-section position-relative d-flex align-items-center" style="min-height: 50vh; background: linear-gradient(rgba(139, 69, 19, 0.8), rgba(139, 69, 19, 0.8)), url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center text-white">
                <!-- Top Label -->
                <div class="mb-3">
                    <span class="text-white-50 text-uppercase" style="font-size: 16px; letter-spacing: 1px;">
                        WE PROVIDE
                    </span>
                </div>
                
                <!-- Main Heading -->
                <h2 class="display-5 fw-bold mb-4 text-white" style="line-height: 1.2;">
                    THE BEST SEA AND AIR FREIGHT SERVICES
                </h2>
                
                <!-- Subtitle -->
                <p class="lead mb-4 text-warning fw-semibold" style="font-size: 20px;">
                    For Book Your Shipping From any Country
                </p>
                
                <!-- CTA Button -->
                <div class="mt-4">
                    <a href="#" class="btn btn-danger btn-lg px-5 py-3 fw-semibold text-uppercase" style="letter-spacing: 1px;">
                        CONTACT WITH US
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side - Image and Content -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="position-relative">
                    <!-- Main Image -->
                    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Business Handshake" class="img-fluid rounded shadow-sm" style="width: 100%; height: 350px; object-fit: cover;">
                </div>
            </div>
            
            <!-- Right Side - Content -->
            <div class="col-lg-6">
                <div class="ps-lg-4">
                    <!-- Section Title -->
                    <h2 class="fw-bold mb-4" style="font-size: 2.5rem; color: #333;">
                        WHY CHOOSE US?
                        <div class="bg-danger" style="width: 50px; height: 3px; margin-top: 10px;"></div>
                    </h2>
                    
                    <!-- Description Paragraphs -->
                    <p class="text-muted mb-3" style="line-height: 1.6;">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.
                    </p>
                    
                    <p class="text-muted mb-4" style="line-height: 1.6;">
                        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                    </p>
                    
                    <!-- Read More Link -->
                    <a href="#" class="text-danger fw-semibold text-decoration-none mb-4 d-inline-block">
                        READ MORE <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Features Row -->
        <div class="row mt-5">
            <div class="col-12 col-lg-6 offset-lg-6">
                <div class="row g-4">
                    <!-- Feature 1 -->
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-lg-start">
                        <div class="d-flex align-items-center">
                            <div class="feature-icon bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">WE ARE TRUSTED</h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-lg-start">
                        <div class="d-flex align-items-center">
                            <div class="feature-icon bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">THE BEST SECURITY</h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-lg-start">
                        <div class="d-flex align-items-center">
                            <div class="feature-icon bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fas fa-thumbs-up"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">100% GUARANTEE</h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Feature 4 -->
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-lg-start">
                        <div class="d-flex align-items-center">
                            <div class="feature-icon bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">QUICK LOCATION</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Service Process Section -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-dark mb-3">OUR SERVICE PROCESS</h2>
            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        </div>
        
        <!-- Process Steps -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row process-row align-items-center">
                    <!-- Step 1 -->
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <div class="process-step text-center position-relative">
                            <div class="process-circle position-relative mx-auto mb-3">
                                <div class="step-number bg-danger text-white rounded-circle d-flex align-items-center justify-content-center position-absolute">
                                    <span class="fw-bold">1</span>
                                </div>
                                <div class="step-icon bg-white border border-danger rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fas fa-hand-pointer text-muted"></i>
                                </div>
                            </div>
                            <h6 class="fw-bold text-dark text-uppercase" style="font-size: 12px; letter-spacing: 1px;">
                                SELECT FREIGHT
                            </h6>
                            <!-- Connecting Line -->
                            <div class="process-line d-none d-lg-block position-absolute"></div>
                        </div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <div class="process-step text-center position-relative">
                            <div class="process-circle position-relative mx-auto mb-3">
                                <div class="step-number bg-danger text-white rounded-circle d-flex align-items-center justify-content-center position-absolute">
                                    <span class="fw-bold">2</span>
                                </div>
                                <div class="step-icon bg-white border border-danger rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fas fa-file-invoice text-muted"></i>
                                </div>
                            </div>
                            <h6 class="fw-bold text-dark text-uppercase" style="font-size: 12px; letter-spacing: 1px;">
                                CREATE INVOICE
                            </h6>
                            <!-- Connecting Line -->
                            <div class="process-line d-none d-lg-block position-absolute"></div>
                        </div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <div class="process-step text-center position-relative">
                            <div class="process-circle position-relative mx-auto mb-3">
                                <div class="step-number bg-danger text-white rounded-circle d-flex align-items-center justify-content-center position-absolute">
                                    <span class="fw-bold">3</span>
                                </div>
                                <div class="step-icon bg-white border border-danger rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fas fa-credit-card text-muted"></i>
                                </div>
                            </div>
                            <h6 class="fw-bold text-dark text-uppercase" style="font-size: 12px; letter-spacing: 1px;">
                                SECURE PAYMENT
                            </h6>
                            <!-- Connecting Line -->
                            <div class="process-line d-none d-lg-block position-absolute"></div>
                        </div>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="process-step text-center position-relative">
                            <div class="process-circle position-relative mx-auto mb-3">
                                <div class="step-number bg-danger text-white rounded-circle d-flex align-items-center justify-content-center position-absolute">
                                    <span class="fw-bold">4</span>
                                </div>
                                <div class="step-icon bg-white border border-danger rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fas fa-shipping-fast text-muted"></i>
                                </div>
                            </div>
                            <h6 class="fw-bold text-dark text-uppercase" style="font-size: 12px; letter-spacing: 1px;">
                                FAST DELIVERY
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get a Free Quote Section -->
<section class="quote-section position-relative" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); min-height: 60vh;">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <!-- Left Side - Quote Form -->
            <div class="col-lg-6 col-md-7 p-5">
                <div class="quote-form-container">
                    <!-- Section Title -->
                    <div class="mb-4">
                        <h2 class="text-white fw-bold mb-2" style="font-size: 2.5rem;">
                            GET A FREE QUOTE
                        </h2>
                        <p class="text-white-50 mb-4" style="font-size: 14px; letter-spacing: 1px;">
                            WE ALWAYS USE BEST & FASTEST FLEETS
                        </p>
                    </div>
                    
                    <!-- Quote Form -->
                    <form id="quoteForm" class="quote-form" action="{{ route('admin.quotes.store') }}" method="POST" onsubmit="event.preventDefault(); submitQuoteForm(this);">
                        @csrf
                        <div class="row g-3">
                            <!-- Full Name -->
                            <div class="col-12">
                                <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                    placeholder="Full Name" value="{{ old('name') }}" style="border: none; padding: 15px;" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Email and Mobile -->
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                    placeholder="Email" value="{{ old('email') }}" style="border: none; padding: 15px;" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="tel" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" 
                                    placeholder="Phone" value="{{ old('phone') }}" style="border: none; padding: 15px;" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Origin and Destination -->
                            <div class="col-md-6">
                                <input type="text" name="origin" class="form-control form-control-lg @error('origin') is-invalid @enderror" 
                                    placeholder="Origin (From)" value="{{ old('origin') }}" style="border: none; padding: 15px;" required>
                                @error('origin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="destination" class="form-control form-control-lg @error('destination') is-invalid @enderror" 
                                    placeholder="Destination (To)" value="{{ old('destination') }}" style="border: none; padding: 15px;" required>
                                @error('destination')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Weight and Dimensions -->
                            <div class="col-md-6">
                                <input type="text" name="weight" class="form-control form-control-lg @error('weight') is-invalid @enderror" 
                                    placeholder="Weight (kg)" value="{{ old('weight') }}" style="border: none; padding: 15px;" required>
                                @error('weight')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="dimensions" class="form-control form-control-lg @error('dimensions') is-invalid @enderror" 
                                    placeholder="Dimensions (LxWxH)" value="{{ old('dimensions') }}" style="border: none; padding: 15px;" required>
                                @error('dimensions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Message -->
                            <div class="col-12">
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" 
                                    rows="4" placeholder="Additional Message" style="border: none; padding: 15px; resize: none;" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="col-12 mt-4">
                                <button type="submit" id="submitQuoteBtn" class="btn btn-dark btn-lg px-5 py-3 fw-semibold text-uppercase" style="letter-spacing: 1px;">
                                    <span id="submitText">SEND US QUOTE</span>
                                    <span id="submitSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <script>
                    async function submitQuoteForm(form) {
                        // Show loading state
                        const submitBtn = document.getElementById('submitQuoteBtn');
                        const submitText = document.getElementById('submitText');
                        const submitSpinner = document.getElementById('submitSpinner');
                        
                        // Update button state
                        submitBtn.disabled = true;
                        submitText.textContent = 'SENDING...';
                        submitSpinner.classList.remove('d-none');
                        
                        // Show loading state
                        const loadingSwal = Swal.fire({
                            title: 'Sending your request',
                            html: 'Please wait while we process your quote...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        try {
                            const formData = new FormData(form);
                            
                            const response = await fetch(form.action, {
                                method: 'POST',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Accept': 'application/json'
                                },
                                body: formData
                            });
                            
                            const data = await response.json();
                            
                            if (!response.ok) {
                                throw { status: response.status, data };
                            }
                            
                            // Close loading and show success
                            await loadingSwal.close();
                            
                            await Swal.fire({
                                icon: 'success',
                                title: 'Thank You!',
                                html: `
                                    <div class="text-center">
                                        <i class="fas fa-check-circle text-success mb-3" style="font-size: 4rem;"></i>
                                        <h4 class="mb-3">Request Submitted Successfully!</h4>
                                        <p class="mb-0">We have received your request and will contact you shortly.</p>
                                    </div>
                                `,
                                confirmButtonText: 'Close',
                                confirmButtonColor: '#dc3545',
                                customClass: {
                                    popup: 'border-radius-20',
                                    confirmButton: 'px-4 py-2',
                                },
                                showCloseButton: true
                            });
                            
                            // Reset form
                            form.reset();
                            
                        } catch (error) {
                            console.error('Error:', error);
                            await loadingSwal.close();
                            
                            if (error.status === 422 && error.data && error.data.errors) {
                                // Validation errors
                                const errors = error.data.errors;
                                let errorMessages = [];
                                
                                // Clear previous errors
                                document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                                document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
                                
                                Object.entries(errors).forEach(([field, messages]) => {
                                    const input = form.querySelector(`[name="${field}"]`);
                                    if (input) {
                                        input.classList.add('is-invalid');
                                        const errorDiv = document.createElement('div');
                                        errorDiv.className = 'invalid-feedback';
                                        errorDiv.textContent = messages[0];
                                        input.parentNode.insertBefore(errorDiv, input.nextSibling);
                                        errorMessages.push(messages[0]);
                                    }
                                });
                                
                                await Swal.fire({
                                    icon: 'error',
                                    title: 'Validation Error',
                                    html: `
                                        <div class="text-start">
                                            <p>Please fix the following errors:</p>
                                            <ul class="mb-0 ps-3">
                                                ${errorMessages.map(msg => `<li>${msg}</li>`).join('')}
                                            </ul>
                                        </div>
                                    `,
                                    confirmButtonText: 'Got it',
                                    confirmButtonColor: '#dc3545',
                                    customClass: {
                                        popup: 'border-radius-20',
                                        confirmButton: 'px-4 py-2',
                                    },
                                    showCloseButton: true
                                });
                            } else {
                                // Other errors
                                await Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: error.data?.message || 'Failed to submit the form. Please try again.',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: '#dc3545',
                                    customClass: {
                                        popup: 'border-radius-20',
                                        confirmButton: 'px-4 py-2',
                                    }
                                });
                            }
                        } finally {
                            // Reset button state
                            submitBtn.disabled = false;
                            submitText.textContent = 'SEND US QUOTE';
                            submitSpinner.classList.add('d-none');
                        }
                    }
                    
                    document.getElementById('quoteForm').addEventListener('submit', function(e) {
                        e.preventDefault();
                        submitQuoteForm(this);
                    });
                    </script>
                    
                    <!-- Add this style to ensure SweetAlert2 z-index is above other elements -->
                    <style>
                        .swal2-container {
                            z-index: 2000 !important;
                        }
                        .swal2-popup {
                            border-radius: 20px !important;
                            padding: 2rem !important;
                            border-radius: 20px !important;
                        }
                    </style>
                </div>
            </div>
            
            <!-- Right Side - Background Image -->
            <div class="col-lg-6 col-md-5 d-none d-md-block position-relative h-100">
                <div class="quote-image-container h-100 position-relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1540962351504-03099e0a754b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                         alt="Airport Cargo" class="img-fluid h-100 w-100" style="object-fit: cover; object-position: center;">
                    <div class="image-overlay position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(45deg, rgba(220, 53, 69, 0.3), rgba(0, 0, 0, 0.1));"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="py-5 bg-white">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-dark mb-3">LATEST NEWS</h2>
            <p class="text-muted">Stay updated with our latest news and updates</p>
        </div>
        
        <!-- News Grid -->
        <div class="row g-4">
            @forelse($latestNews as $news)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    @if($news->image)
                    <img src="{{ asset('images/' . $news->image) }}" class="card-img-top" alt="{{ $news->title }}" style="height: 200px; object-fit: cover;">
                    @else
                    <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-muted small"><i class="far fa-calendar-alt me-1"></i> {{ $news->created_at->format('M d, Y') }}</span>
                        </div>
                        <h5 class="card-title fw-bold">{{ $news->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($news->content, 100) }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pt-0">
                        <a href="#" class="btn btn-link text-danger p-0">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No news available at the moment. Check back later!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Latest Blog Post Section -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-dark mb-3">LATEST BLOG POST</h2>
            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        </div>
        
        <!-- Blog Cards -->
        <div class="row g-4">
            @forelse($latestBlogPosts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="blog-card bg-white shadow-sm h-100">
                    <div class="blog-image">
                        @if($post->featured_image)
                            <img src="{{ asset('images/' . $post->featured_image) }}" 
                                 alt="{{ $post->title }}" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/800x400?text=No+Image" 
                                 alt="{{ $post->title }}" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                        @endif
                    </div>
                    <div class="blog-content p-4">
                        <h5 class="fw-bold mb-3 text-dark" style="line-height: 1.4;">
                            {{ strtoupper($post->title) }}
                        </h5>
                        
                        <!-- Blog Meta -->
                        <div class="blog-meta d-flex align-items-center mb-3 text-muted" style="font-size: 12px;">
                            <div class="me-3">
                                <i class="fas fa-calendar-alt me-1"></i>
                                <span>{{ $post->published_at ? $post->published_at->format('d F Y') : $post->created_at->format('d F Y') }}</span>
                            </div>
                            <div>
                                <i class="fas fa-user me-1"></i>
                                <span>Admin</span>
                            </div>
                        </div>
                        
                        <!-- Blog Excerpt -->
                        <p class="text-muted mb-4" style="font-size: 14px; line-height: 1.6;">
                            {{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}
                        </p>
                        
                        <!-- Read More Link -->
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-danger fw-semibold text-decoration-none" style="font-size: 12px; letter-spacing: 0.5px;">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No blog posts found.</p>
            </div>
            @endforelse
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

<!-- Latest News and Testimonial Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <!-- Latest News Section -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <!-- Section Header -->
                        <div class="section-header mb-4">
                            <h2 class="fw-bold text-dark mb-2">LATEST NEWS</h2>
                            <div class="bg-danger" style="width: 50px; height: 3px;"></div>
                        </div>
                        
                        @if($latestNews->count() > 0)
                        <!-- News Items -->
                        <div class="news-items">
                            @foreach($latestNews as $news)
                            <div class="news-item d-flex mb-4 pb-3 border-bottom">
                                <div class="news-date bg-danger text-white text-center p-2 me-3" style="min-width: 70px; border-radius: 8px;">
                                    <div class="date-number fw-bold" style="font-size: 1.5rem; line-height: 1;">{{ $news->created_at->format('d') }}</div>
                                    <div class="date-month text-uppercase" style="font-size: 11px; letter-spacing: 1px;">{{ strtoupper($news->created_at->format('M')) }}</div>
                                </div>
                                <div class="news-content">
                                    <h6 class="fw-bold mb-1">
                                        <a href="#" class="text-dark text-decoration-none hover-text-danger">{{ $news->title }}</a>
                                    </h6>
                                    <p class="text-muted small mb-2">
                                        <i class="far fa-user me-1"></i> {{ $news->author ?? 'Admin' }}
                                        <span class="mx-2">|</span>
                                        <i class="far fa-calendar-alt me-1"></i> {{ $news->created_at->format('M d, Y') }}
                                    </p>
                                    <p class="text-muted mb-0" style="font-size: 14px; line-height: 1.5;">
                                        {{ Str::limit(strip_tags($news->content), 120) }}
                                    </p>
                                    <a href="#" class="text-danger text-decoration-none small mt-2 d-inline-block">
                                        Read More <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center py-4">
                            <div class="py-4">
                                <i class="far fa-newspaper fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No news available at the moment. Check back later!</p>
                            </div>
                        </div>
                        @endif
                        
                        <div class="text-center mt-4">
                            <a href="{{ url('/blog') }}" class="btn btn-outline-danger btn-sm">
                                View All News <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial Section -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <!-- Section Header -->
                        <div class="section-header text-center mb-4">
                            <h2 class="fw-bold text-dark mb-2">TESTIMONIALS</h2>
                            <div class="bg-danger mx-auto" style="width: 50px; height: 3px;"></div>
                            <p class="text-muted mt-3 mb-0">What our clients say about our services</p>
                        </div>
                        
                        @if($testimonials->count() > 0)
                        <!-- Testimonial Carousel -->
                        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($testimonials as $index => $testimonial)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="testimonial-item p-4">
                                        <div class="testimonial-content text-center">
                                            <!-- Client Photo -->
                                            <div class="testimonial-image mx-auto mb-4">
                                                @if($testimonial->image)
                                                <img src="{{ asset('images/testimonials/' . $testimonial->image) }}" 
                                                     alt="{{ $testimonial->name }}" 
                                                     class="rounded-circle img-fluid border border-3 border-danger" 
                                                     style="width: 100px; height: 100px; object-fit: cover;"
                                                     onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($testimonial->name) }}&background=random'">
                                                @else
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($testimonial->name) }}&background=random" 
                                                     alt="{{ $testimonial->name }}" 
                                                     class="rounded-circle img-fluid border border-3 border-danger" 
                                                     style="width: 100px; height: 100px; object-fit: cover;">
                                                @endif
                                            </div>
                                            
                                            <!-- Testimonial Text -->
                                            <div class="testimonial-text">
                                                <div class="testimonial-rating mb-3">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-muted' }}"></i>
                                                    @endfor
                                                </div>
                                                
                                                <div class="testimonial-quote mb-4">
                                                    <i class="fas fa-quote-left text-danger me-2"></i>
                                                    <p class="fst-italic text-muted mb-0 px-4" style="line-height: 1.7;">
                                                        {{ $testimonial->content }}
                                                    </p>
                                                    <i class="fas fa-quote-right text-danger ms-2"></i>
                                                </div>
                                                
                                                <h5 class="mb-1 fw-bold">{{ $testimonial->name }}</h5>
                                                @if($testimonial->position || $testimonial->company)
                                                <p class="text-muted small mb-0">
                                                    {{ $testimonial->position }}{{ $testimonial->position && $testimonial->company ? ', ' : '' }}
                                                    @if($testimonial->company)
                                                    <span class="text-danger">{{ $testimonial->company }}</span>
                                                    @endif
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <!-- Carousel Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-danger rounded-circle" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-danger rounded-circle" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            
                            <!-- Carousel Indicators -->
                            <div class="carousel-indicators position-relative mt-4">
                                @foreach($testimonials as $index => $testimonial)
                                <button type="button" data-bs-target="#testimonialCarousel" 
                                        data-bs-slide-to="{{ $index }}" 
                                        class="{{ $loop->first ? 'active' : '' }} bg-secondary" 
                                        style="width: 10px; height: 10px; border-radius: 50%; border: none; margin: 0 3px;"
                                        aria-current="{{ $loop->first ? 'true' : 'false' }}" 
                                        aria-label="Slide {{ $index + 1 }}">
                                </button>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="text-center py-5">
                            <div class="py-4">
                                <i class="far fa-comment-dots fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No testimonials available at the moment. Check back later!</p>
                            </div>
                        </div>
                        @endif
                        
                        <div class="text-center mt-4">
                            <a href="#" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#submitTestimonialModal">
                                <i class="far fa-edit me-1"></i> Submit Your Review
                            </a>
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

@endsection