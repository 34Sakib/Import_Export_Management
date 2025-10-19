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
                
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center shipping-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
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

<!-- About Us Content Section -->
<section class="about-content-section py-5">
    <div class="container">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-3 col-md-4">
                <div class="about-sidebar">
                    <!-- Navigation Menu -->
                    <div class="about-nav-menu mb-4">
                        <ul class="about-nav-list">
                            <li class="about-nav-item active">
                                <a href="#" class="about-nav-link">
                                    COMPANY OVERVIEW
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="about-nav-item">
                                <a href="#" class="about-nav-link">
                                    ASPIRATION & VISION
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="about-nav-item">
                                <a href="#" class="about-nav-link">
                                    STRENGTH
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="about-nav-item">
                                <a href="#" class="about-nav-link">
                                    QUALITY POLICY
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Latest News -->
                    <div class="latest-news-widget">
                        <h5 class="news-widget-title">LATEST NEWS</h5>
                        <div class="news-items">
                            <!-- News Item 1 -->
                            <div class="news-item mb-3">
                                <div class="d-flex">
                                    <div class="news-date">
                                        <span class="date-day">28</span>
                                        <span class="date-month">FEB</span>
                                    </div>
                                    <div class="news-content">
                                        <h6 class="news-title">News Title</h6>
                                        <p class="news-author">By <a href="#" class="text-danger">Admin</a></p>
                                        <p class="news-excerpt">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- News Item 2 -->
                            <div class="news-item mb-3">
                                <div class="d-flex">
                                    <div class="news-date">
                                        <span class="date-day">28</span>
                                        <span class="date-month">FEB</span>
                                    </div>
                                    <div class="news-content">
                                        <h6 class="news-title">News Title</h6>
                                        <p class="news-author">By <a href="#" class="text-danger">Admin</a></p>
                                        <p class="news-excerpt">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Send Quote Button -->
                        <div class="quote-button-wrapper mt-4">
                            <a href="#" class="btn btn-danger quote-btn w-100">SEND US QUOTE</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-lg-6 col-md-8">
                <div class="about-main-content">
                    <!-- Company Overview Header -->
                    <div class="content-header mb-4">
                        <h2 class="content-title">COMPANY OVERVIEW</h2>
                    </div>
                    
                    <!-- Company Image -->
                    <div class="company-image mb-4">
                        <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&h=600&q=80" alt="Company Overview" class="img-fluid rounded">
                    </div>
                    
                    <!-- Company Description -->
                    <div class="company-description">
                        <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        
                        <p>When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.</p>
                        
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock.</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Sidebar -->
            <div class="col-lg-3">
                <div class="about-right-sidebar">
                    <!-- Client Testimonial -->
                    <div class="testimonial-widget">
                        <h5 class="testimonial-title">CLIENTS TESTIMONIAL</h5>
                        <div class="testimonial-content">
                            <div class="testimonial-image mb-3">
                                <img src="https://randomuser.me/api/portraits/men/52.jpg" alt="Client" class="img-fluid rounded">
                            </div>
                            <div class="testimonial-text">
                                <blockquote class="testimonial-quote">
                                    <p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Why Choose Us Section -->
                    <div class="why-choose-us mt-5">
                        <h4 class="choose-us-title mb-4">WHY CHOOSE US?</h4>
                        <div class="features-grid">
                            <!-- Feature 1 -->
                            <div class="feature-item text-center mb-4">
                                <div class="feature-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <h6 class="feature-title">WE ARE TRUSTED</h6>
                            </div>
                            
                            <!-- Feature 2 -->
                            <div class="feature-item text-center mb-4">
                                <div class="feature-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <h6 class="feature-title">THE BEST SECURITY</h6>
                            </div>
                            
                            <!-- Feature 3 -->
                            <div class="feature-item text-center mb-4">
                                <div class="feature-icon">
                                    <i class="fas fa-thumbs-up"></i>
                                </div>
                                <h6 class="feature-title">100% GUARANTEE</h6>
                            </div>
                            
                            <!-- Feature 4 -->
                            <div class="feature-item text-center mb-4">
                                <div class="feature-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h6 class="feature-title">QUICK LOCATION</h6>
                            </div>
                        </div>
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
<section class="valuable-client-section py-5 bg-white">
    <div class="container">
        <!-- Section Header -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="client-section-title mb-1">OUR VALUABLE CLIENT</h2>
                <div class="client-title-underline mb-4"></div>
            </div>
        </div>
        
        <!-- Client Logos -->
        <div class="row align-items-center justify-content-center g-4">
            <div class="col-lg-2 col-md-4 col-6">
                <div class="client-logo-item text-center p-3">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/6c757d?text=HUNTER" 
                         class="img-fluid client-logo-img" alt="Hunter Client">
                </div>
            </div>
            
            <div class="col-lg-2 col-md-4 col-6">
                <div class="client-logo-item text-center p-3">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/6c757d?text=Premium+Labels" 
                         class="img-fluid client-logo-img" alt="Premium Labels Client">
                </div>
            </div>
            
            <div class="col-lg-2 col-md-4 col-6">
                <div class="client-logo-item text-center p-3">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/6c757d?text=CREATIVE" 
                         class="img-fluid client-logo-img" alt="Creative Client">
                </div>
            </div>
            
            <div class="col-lg-2 col-md-4 col-6">
                <div class="client-logo-item text-center p-3">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/6c757d?text=Adventure" 
                         class="img-fluid client-logo-img" alt="Adventure Client">
                </div>
            </div>
            
            <div class="col-lg-2 col-md-4 col-6">
                <div class="client-logo-item text-center p-3">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/6c757d?text=Premium+Labels" 
                         class="img-fluid client-logo-img" alt="Premium Labels Client">
                </div>
            </div>
            
            <div class="col-lg-2 col-md-4 col-6">
                <div class="client-logo-item text-center p-3">
                    <img src="https://via.placeholder.com/150x80/f8f9fa/6c757d?text=MILLER" 
                         class="img-fluid client-logo-img" alt="Miller Client">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection