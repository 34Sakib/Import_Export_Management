<!-- Our Services Section -->
<section class="our-services-section py-5 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="services-section-title mb-3">OUR SERVICES</h2>
                <p class="services-section-subtitle text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>
        
        <!-- Services Grid -->
        <div class="row g-4 justify-content-center">
            @forelse($services as $service)
            <div class="col-lg-4 col-md-6">
                <div class="service-card-item card h-100 border-0 shadow-sm position-relative">
                    <div class="service-image-container overflow-hidden">
                        @if($service->image && $service->image !== 'nophoto.png')
                            <img src="{{ asset('images/' . $service->image) }}" 
                                 class="card-img-top service-image" alt="{{ $service->title }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                 class="card-img-top service-image" alt="{{ $service->title }}">
                        @endif
                    </div>
                    <div class="card-body p-4">
                        <h5 class="service-card-title mb-3">{{ $service->title }}</h5>
                        <p class="service-card-text text-muted mb-4">{{ Str::limit($service->description ?? 'Professional shipping service with reliable and secure delivery solutions.', 120) }}</p>
                        <a href="{{ route('our.services') }}" class="service-read-more text-danger text-decoration-none fw-semibold">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                    <!-- Red Corner -->
                    <div class="service-card-corner position-absolute">
                        <i class="fas fa-plus text-white"></i>
                    </div>
                </div>
            </div>
            @empty
            <!-- Default services when no services are created -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card-item card h-100 border-0 shadow-sm position-relative">
                    <div class="service-image-container overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             class="card-img-top service-image" alt="Ocean Freight Shipping">
                    </div>
                    <div class="card-body p-4">
                        <h5 class="service-card-title mb-3">Ocean Freight Shipping</h5>
                        <p class="service-card-text text-muted mb-4">Professional ocean freight services with reliable and secure delivery solutions worldwide.</p>
                        <a href="{{ route('our.services') }}" class="service-read-more text-danger text-decoration-none fw-semibold">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                    <div class="service-card-corner position-absolute">
                        <i class="fas fa-plus text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-card-item card h-100 border-0 shadow-sm position-relative">
                    <div class="service-image-container overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1540962351504-03099e0a754b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             class="card-img-top service-image" alt="Air Freight Shipping">
                    </div>
                    <div class="card-body p-4">
                        <h5 class="service-card-title mb-3">Air Freight Shipping</h5>
                        <p class="service-card-text text-muted mb-4">Fast and efficient air freight services for time-sensitive shipments and urgent deliveries.</p>
                        <a href="{{ route('our.services') }}" class="service-read-more text-danger text-decoration-none fw-semibold">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                    <div class="service-card-corner position-absolute">
                        <i class="fas fa-plus text-white"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-card-item card h-100 border-0 shadow-sm position-relative">
                    <div class="service-image-container overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             class="card-img-top service-image" alt="Car Shipping">
                    </div>
                    <div class="card-body p-4">
                        <h5 class="service-card-title mb-3">Car Shipping</h5>
                        <p class="service-card-text text-muted mb-4">Secure vehicle transportation services with specialized handling and comprehensive insurance coverage.</p>
                        <a href="{{ route('our.services') }}" class="service-read-more text-danger text-decoration-none fw-semibold">
                            READ MORE <i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                    <div class="service-card-corner position-absolute">
                        <i class="fas fa-plus text-white"></i>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
