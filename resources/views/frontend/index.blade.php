@extends('frontend.master')

@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative d-flex align-items-center" style="min-height: 70vh; background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center text-white">
                <!-- Top Label -->
                <div class="mb-3">
                    <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-normal" style="font-size: 14px;">
                        WE ARE ACTIVE
                    </span>
                </div>
                
                <!-- Main Heading -->
                <h1 class="display-4 fw-bold mb-4" style="line-height: 1.2;">
                    TO SHIP YOUR PRODUCT 
                    <span class="text-danger">TRUSTED</span>
                </h1>
                
                <!-- Description -->
                <p class="lead mb-4 mx-auto" style="max-width: 600px; font-size: 18px; line-height: 1.6;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>
                
                <!-- CTA Button -->
                <div class="mt-4">
                    <a href="#" class="btn btn-danger btn-lg px-5 py-3 fw-semibold text-uppercase" style="letter-spacing: 1px;">
                        GET FREE QUOTE
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


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
                    <form class="quote-form">
                        <div class="row g-3">
                            <!-- Full Name -->
                            <div class="col-12">
                                <input type="text" class="form-control form-control-lg" placeholder="Full Name" style="border: none; padding: 15px;">
                            </div>
                            
                            <!-- Email and Mobile -->
                            <div class="col-md-6">
                                <input type="email" class="form-control form-control-lg" placeholder="Email" style="border: none; padding: 15px;">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" class="form-control form-control-lg" placeholder="Mobile" style="border: none; padding: 15px;">
                            </div>
                            
                            <!-- Destination From and To -->
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-lg" placeholder="Destination From" style="border: none; padding: 15px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-lg" placeholder="Destination To" style="border: none; padding: 15px;">
                            </div>
                            
                            <!-- Shipping Type and Date -->
                            <div class="col-md-6">
                                <select class="form-select form-select-lg" style="border: none; padding: 15px;">
                                    <option selected>Shipping Type</option>
                                    <option value="air">Air Freight</option>
                                    <option value="sea">Sea Freight</option>
                                    <option value="road">Road Freight</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control form-control-lg" placeholder="Date" style="border: none; padding: 15px;">
                            </div>
                            
                            <!-- Message -->
                            <div class="col-12">
                                <textarea class="form-control" rows="4" placeholder="Message" style="border: none; padding: 15px; resize: none;"></textarea>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-dark btn-lg px-5 py-3 fw-semibold text-uppercase" style="letter-spacing: 1px;">
                                    SEND US QUOTE
                                </button>
                            </div>
                        </div>
                    </form>
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

<!-- Latest Blog Post Section -->
<section class="py-5 bg-white">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-dark mb-3">LATEST BLOG POST</h2>
            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        </div>
        
        <!-- Blog Cards -->
        <div class="row g-4">
            <!-- Blog Post 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card bg-white shadow-sm h-100">
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Shipping Container" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="blog-content p-4">
                        <h5 class="fw-bold mb-3 text-dark" style="line-height: 1.4;">
                            SHIPPING CONTAINER ALL INTERNATIONAL TRANSPORT
                        </h5>
                        
                        <!-- Blog Meta -->
                        <div class="blog-meta d-flex align-items-center mb-3 text-muted" style="font-size: 12px;">
                            <div class="me-3">
                                <i class="fas fa-calendar-alt me-1"></i>
                                <span>18 March 2017</span>
                            </div>
                            <div>
                                <i class="fas fa-user me-1"></i>
                                <span>By Admin</span>
                            </div>
                        </div>
                        
                        <!-- Blog Excerpt -->
                        <p class="text-muted mb-4" style="font-size: 14px; line-height: 1.6;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        </p>
                        
                        <!-- Read More Link -->
                        <a href="#" class="text-danger fw-semibold text-decoration-none" style="font-size: 12px; letter-spacing: 0.5px;">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Blog Post 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card bg-white shadow-sm h-100">
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Truck Transport" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="blog-content p-4">
                        <h5 class="fw-bold mb-3 text-dark" style="line-height: 1.4;">
                            LOREM IPSUM IS SIMPLY DUMMY TEXT OF THE PRINTING.
                        </h5>
                        
                        <!-- Blog Meta -->
                        <div class="blog-meta d-flex align-items-center mb-3 text-muted" style="font-size: 12px;">
                            <div class="me-3">
                                <i class="fas fa-calendar-alt me-1"></i>
                                <span>18 March 2017</span>
                            </div>
                            <div>
                                <i class="fas fa-user me-1"></i>
                                <span>By Admin</span>
                            </div>
                        </div>
                        
                        <!-- Blog Excerpt -->
                        <p class="text-muted mb-4" style="font-size: 14px; line-height: 1.6;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        </p>
                        
                        <!-- Read More Link -->
                        <a href="#" class="text-danger fw-semibold text-decoration-none" style="font-size: 12px; letter-spacing: 0.5px;">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Blog Post 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card bg-white shadow-sm h-100">
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1540962351504-03099e0a754b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Air Cargo" class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="blog-content p-4">
                        <h5 class="fw-bold mb-3 text-dark" style="line-height: 1.4;">
                            ALL SHIPPING CONTAINER ARE INTERNATIONAL TRANSPORT
                        </h5>
                        
                        <!-- Blog Meta -->
                        <div class="blog-meta d-flex align-items-center mb-3 text-muted" style="font-size: 12px;">
                            <div class="me-3">
                                <i class="fas fa-calendar-alt me-1"></i>
                                <span>18 March 2017</span>
                            </div>
                            <div>
                                <i class="fas fa-user me-1"></i>
                                <span>By Admin</span>
                            </div>
                        </div>
                        
                        <!-- Blog Excerpt -->
                        <p class="text-muted mb-4" style="font-size: 14px; line-height: 1.6;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        </p>
                        
                        <!-- Read More Link -->
                        <a href="#" class="text-danger fw-semibold text-decoration-none" style="font-size: 12px; letter-spacing: 0.5px;">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
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
<section class="py-5 bg-white">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header mb-5">
            <h3 class="fw-bold text-dark mb-2">OUR VALUABLE CLIENTS</h3>
            <div class="bg-danger" style="width: 50px; height: 3px;"></div>
        </div>
        
        <!-- Client Logos Carousel -->
        <div class="client-logos">
            <!-- Client 1 -->
            <div class="client-logo-item text-center p-3">
                <div class="client-logo bg-light p-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="https://via.placeholder.com/150x80/cccccc/666666?text=Premium+Labels" 
                         alt="Premium Labels" class="img-fluid" style="max-height: 50px; opacity: 0.7; transition: all 0.3s ease;">
                </div>
            </div>
            
            <!-- Client 2 -->
            <div class="client-logo-item text-center p-3">
                <div class="client-logo bg-light p-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="https://via.placeholder.com/150x80/cccccc/666666?text=Creative" 
                         alt="Creative" class="img-fluid" style="max-height: 50px; opacity: 0.7; transition: all 0.3s ease;">
                </div>
            </div>
            
            <!-- Client 3 -->
            <div class="client-logo-item text-center p-3">
                <div class="client-logo bg-light p-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="https://via.placeholder.com/150x80/cccccc/666666?text=Adventure" 
                         alt="Adventure" class="img-fluid" style="max-height: 50px; opacity: 0.7; transition: all 0.3s ease;">
                </div>
            </div>
            
            <!-- Client 4 -->
            <div class="client-logo-item text-center p-3">
                <div class="client-logo bg-light p-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="https://via.placeholder.com/150x80/cccccc/666666?text=Global+Logistics" 
                         alt="Global Logistics" class="img-fluid" style="max-height: 50px; opacity: 0.7; transition: all 0.3s ease;">
                </div>
            </div>
            
            <!-- Client 5 -->
            <div class="client-logo-item text-center p-3">
                <div class="client-logo bg-light p-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="https://via.placeholder.com/150x80/cccccc/666666?text=Ocean+Freight" 
                         alt="Ocean Freight" class="img-fluid" style="max-height: 50px; opacity: 0.7; transition: all 0.3s ease;">
                </div>
            </div>
            
            <!-- Client 6 -->
            <div class="client-logo-item text-center p-3">
                <div class="client-logo bg-light p-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="https://via.placeholder.com/150x80/cccccc/666666?text=Air+Cargo" 
                         alt="Air Cargo" class="img-fluid" style="max-height: 50px; opacity: 0.7; transition: all 0.3s ease;">
                </div>
            </div>
            
            <!-- Client 7 -->
            <div class="client-logo-item text-center p-3">
                <div class="client-logo bg-light p-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="https://via.placeholder.com/150x80/cccccc/666666?text=Worldwide" 
                         alt="Worldwide" class="img-fluid" style="max-height: 50px; opacity: 0.7; transition: all 0.3s ease;">
                </div>
            </div>
            
            <!-- Client 8 -->
            <div class="client-logo-item text-center p-3">
                <div class="client-logo bg-light p-3 h-100 d-flex align-items-center justify-content-center">
                    <img src="https://via.placeholder.com/150x80/cccccc/666666?text=Express+Shipping" 
                         alt="Express Shipping" class="img-fluid" style="max-height: 50px; opacity: 0.7; transition: all 0.3s ease;">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection