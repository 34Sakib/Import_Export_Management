@extends('frontend.master')

@section('title', 'Contact Us - World Shipping')

@section('content')
<!-- Contact Us Hero Section -->
<section class="contact-hero-section d-flex align-items-center justify-content-center text-white position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Page Title -->
                <h1 class="contact-hero-title mb-3">CONTACT US</h1>
                
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center contact-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
                
                <!-- Description Text -->
                <p class="contact-hero-description lead mb-0">
                    We freight to all over the world The best logistic company, 
                    <span class="text-danger fw-bold">FAST</span> and 
                    <span class="text-danger fw-bold">SECURE</span>
                </p>
            </div>
        </div>
    </div>
    
    <!-- Background Overlay -->
    <div class="contact-hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
</section>

<!-- Contact Information Section -->
<section class="contact-info-section py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <!-- Left Column - Image and Form -->
            <div class="col-lg-7">
                <!-- Section Title -->
                <div class="mb-4">
                    <h2 class="contact-section-title">
                        WE ARE ALWAYS WITH <span class="text-danger">YOU :)</span>
                    </h2>
                </div>
                
                <!-- Colorful Image -->
                <div class="contact-image-container mb-4">
                    <img src="https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         class="img-fluid contact-main-image" alt="Colorful Office Supplies">
                </div>
                
                <!-- Quick Feedback Form -->
                <div class="quick-feedback-form">
                    <h4 class="form-title mb-4">QUICK FEEDBACK FORM</h4>
                    <div class="form-title-underline mb-4"></div>
                    
                    <form class="contact-form">
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control contact-input" placeholder="Your Full Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control contact-input" placeholder="Company" required>
                            </div>
                        </div>
                        
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <input type="email" class="form-control contact-input" placeholder="Email" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" class="form-control contact-input" placeholder="Phone Number" required>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <textarea class="form-control contact-textarea" rows="5" placeholder="Message" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-danger contact-submit-btn px-4 py-2">Submit</button>
                    </form>
                </div>
            </div>
            
            <!-- Right Column - Office Information -->
            <div class="col-lg-5">
                <!-- Corporate Office -->
                <div class="office-info-card mb-4">
                    <div class="office-header bg-danger text-white p-3">
                        <h5 class="mb-0 fw-bold">CORPORATE OFFICE</h5>
                    </div>
                    <div class="office-body p-4">
                        <div class="office-item d-flex align-items-start mb-3">
                            <i class="fas fa-map-marker-alt text-danger me-3 mt-1"></i>
                            <div>
                                <strong class="office-label">Address:</strong><br>
                                <span class="office-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                            </div>
                        </div>
                        
                        <div class="office-item d-flex align-items-start mb-3">
                            <i class="fas fa-phone text-danger me-3 mt-1"></i>
                            <div>
                                <strong class="office-label">Telephone No:</strong><br>
                                <span class="office-text">+88 01711 123456</span>
                            </div>
                        </div>
                        
                        <div class="office-item d-flex align-items-start mb-3">
                            <i class="fas fa-fax text-danger me-3 mt-1"></i>
                            <div>
                                <strong class="office-label">Fax No:</strong><br>
                                <span class="office-text">+88 01711 123456</span>
                            </div>
                        </div>
                        
                        <div class="office-item d-flex align-items-start">
                            <i class="fas fa-envelope text-danger me-3 mt-1"></i>
                            <div>
                                <strong class="office-label">Email:</strong><br>
                                <a href="mailto:web24service@gmail.com" class="office-email">web24service@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Section Office -->
                <div class="office-info-card">
                    <div class="office-header bg-danger text-white p-3">
                        <h5 class="mb-0 fw-bold">SECTION OFFICE</h5>
                    </div>
                    <div class="office-body p-4">
                        <div class="office-item d-flex align-items-start mb-3">
                            <i class="fas fa-map-marker-alt text-danger me-3 mt-1"></i>
                            <div>
                                <strong class="office-label">Address:</strong><br>
                                <span class="office-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                            </div>
                        </div>
                        
                        <div class="office-item d-flex align-items-start mb-3">
                            <i class="fas fa-phone text-danger me-3 mt-1"></i>
                            <div>
                                <strong class="office-label">Telephone No:</strong><br>
                                <span class="office-text">+88 01711 123456</span>
                            </div>
                        </div>
                        
                        <div class="office-item d-flex align-items-start mb-3">
                            <i class="fas fa-fax text-danger me-3 mt-1"></i>
                            <div>
                                <strong class="office-label">Fax No:</strong><br>
                                <span class="office-text">+88 01711 123456</span>
                            </div>
                        </div>
                        
                        <div class="office-item d-flex align-items-start">
                            <i class="fas fa-envelope text-danger me-3 mt-1"></i>
                            <div>
                                <strong class="office-label">Email:</strong><br>
                                <a href="mailto:web24service@gmail.com" class="office-email">web24service@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58418.766816219135!2d90.34738!3d23.7808875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1635234567890!5m2!1sen!2sbd"
            class="google-map"
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>
@endsection
