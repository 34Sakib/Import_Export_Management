<!-- Footer -->
<footer class="bg-dark text-white py-5" style="background-color: #2c3e50;">
    <div class="container">
        <div class="row">
            <!-- Company Info Section -->
            <div class="col-lg-3 col-md-6 mb-4">
                <!-- Logo -->
                @if($footer)
                    @if($footer->logo)
                    <div class="mb-3">
                        <img src="{{ asset('images/' . $footer->logo) }}" alt="{{ $footer->title ?? 'Logo' }}" style="max-height: 60px; max-width: 200px;">
                    </div>
                    @else
                    <div class="mb-3">
                        <h4 class="fw-bold" style="color: #dc3545;">
                            <span class="bg-danger text-white px-2 py-1 rounded me-1">W</span>
                            {{ $footer->title ?? 'SHIPPING' }}
                        </h4>
                    </div>
                    @endif
                    
                    <!-- Description -->
                    @if($footer->description)
                    <p class="text-light mb-3" style="font-size: 14px; line-height: 1.6;">
                        {{ $footer->description }}
                    </p>
                    @endif
                    
                    <!-- Contact Info -->
                    @if($footer->phone)
                    <div class="mb-2">
                        <i class="fas fa-phone text-danger me-2"></i>
                        <span style="color: #dc3545;">{{ $footer->phone }}</span>
                    </div>
                    @endif
                    
                    @if($footer->email)
                    <div class="mb-2">
                        <i class="fas fa-envelope text-danger me-2"></i>
                        <span class="text-light">{{ $footer->email }}</span>
                    </div>
                    @endif
                    
                    <!-- Social Media Icons -->
                    <div class="d-flex gap-2">
                        @if($footer->facebook)
                        <a href="{{ $footer->facebook }}" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        @endif
                        
                        @if($footer->twitter)
                        <a href="{{ $footer->twitter }}" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        @endif
                        
                        @if($footer->instagram)
                        <a href="{{ $footer->instagram }}" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        @endif
                        
                        @if($footer->youtube)
                        <a href="{{ $footer->youtube }}" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                            <i class="fab fa-youtube"></i>
                        </a>
                        @endif
                    </div>
                @else
                    <!-- Default content if no footer data exists -->
                    <div class="mb-3">
                        <h4 class="fw-bold" style="color: #dc3545;">
                            <span class="bg-danger text-white px-2 py-1 rounded me-1">W</span>
                            SHIPPING
                        </h4>
                    </div>
                    <p class="text-light mb-3" style="font-size: 14px; line-height: 1.6;">
                        It was popularised in the 1960s with the release of Letraset sheets containing.
                    </p>
                    <div class="mb-2">
                        <i class="fas fa-phone text-danger me-2"></i>
                        <span style="color: #dc3545;">+88 01911 837404</span>
                    </div>
                    <div class="mb-2">
                        <i class="fas fa-envelope text-danger me-2"></i>
                        <span class="text-light">info@worldshipping.com</span>
                    </div>
                @endif
            </div>
            
            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="text-white mb-3 position-relative">
                    QUICK LINKS
                    <span class="position-absolute bottom-0 start-0 bg-danger" style="width: 30px; height: 2px;"></span>
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Company Overview</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Our Services</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Media & Publications</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Blog</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Contact Us</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Freight Gallery</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Image Gallery</a>
                    </li>
                </ul>
            </div>
            
            <!-- Useful Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="text-white mb-3 position-relative">
                    USEFULL LINKS
                    <span class="position-absolute bottom-0 start-0 bg-danger" style="width: 30px; height: 2px;"></span>
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Create Shipping</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Tracking</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Shipment History</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Typography</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Button Accordion</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-chevron-right text-danger me-2" style="font-size: 10px;"></i>
                        <a href="#" class="text-light text-decoration-none">Tracking Result</a>
                    </li>
                </ul>
            </div>
            
            <!-- Opening Hours & Newsletter -->
            <div class="col-lg-5 col-md-6 mb-4">
                <div class="row">
                    <!-- Opening Hours -->
                    <div class="col-md-6 mb-4">
                        <h5 class="text-white mb-3 position-relative">
                            OPENING HOURS
                            <span class="position-absolute bottom-0 start-0 bg-danger" style="width: 30px; height: 2px;"></span>
                        </h5>
                        <div class="mb-2">
                            <span class="text-light">Mon to Fri: 09:30AM to 05:30PM</span>
                        </div>
                        <div class="mb-3">
                            <span class="text-light">Sun: Closed</span>
                        </div>
                    </div>
                    
                    <!-- Newsletter -->
                    <div class="col-md-12">
                        <div class="d-flex">
                            <input type="email" class="form-control me-2" placeholder="Enter your email" style="background-color: #34495e; border: none; color: white;">
                            <button class="btn btn-danger px-3" type="button">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>