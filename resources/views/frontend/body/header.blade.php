<!-- Sticky Header Wrapper -->
<div id="stickyHeader" class="sticky-header-wrapper">
<!-- Top Bar -->
@php
    use App\Models\TopBarSetting;
    $topBar = TopBarSetting::where('is_active', true)->first();
@endphp

@if($topBar)
<div class="bg-dark text-white py-2 mobile-top-bar" style="font-size: 13px;">
    <div class="container">
        <!-- Desktop View -->
        <div class="row align-items-center d-none d-md-flex">
            <div class="col-md-8">
                <div class="d-flex flex-wrap gap-4">
                    @if($topBar->email)
                    <div class="d-flex align-items-center">
                        <i class="fas fa-envelope me-2 text-danger"></i>
                        <span>{{ $topBar->email }}</span>
                    </div>
                    @endif
                    @if($topBar->phone)
                    <div class="d-flex align-items-center">
                        <i class="fas fa-phone me-2 text-danger"></i>
                        <span>{{ $topBar->phone }}</span>
                    </div>
                    @endif
                    @if($topBar->opening_hours)
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clock me-2 text-danger"></i>
                        <span>{{ $topBar->opening_hours }}</span>
                    </div>
                    @endif
                </div>
            </div>
            {{-- <div class="col-md-4">
                <div class="d-flex justify-content-end align-items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button class="btn btn-link text-white text-decoration-none p-0" type="submit" style="font-size: 13px;">
                                    <i class="fas fa-user me-1"></i>
                                    LogOut
                                </button>
                            </form>
                        @else
                            <a class="text-white text-decoration-none" href="{{ route('login') }}" style="font-size: 13px;">
                                <i class="fas fa-user me-1"></i>
                                Login
                            </a>
                            @if (Route::has('register'))
                                <span class="text-white">|</span>
                                <a class="text-white text-decoration-none" href="{{ route('register') }}" style="font-size: 13px;">
                                    <i class="fas fa-user-plus me-1"></i>
                                    Registration
                                </a>
                            @endif
                        @endauth
                    @endif
                    <span class="text-white">|</span>
                    <div class="dropdown">
                        <a class="text-white text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="font-size: 13px;">
                            <i class="fas fa-globe me-1"></i>
                            EN
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Bangla</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
        
        <!-- Mobile View -->
        <div class="d-block d-md-none">
            <div class="row">
                <!-- Contact Info Row -->
                <div class="col-12 mb-2">
                    <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                        @if($topBar->email)
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope me-2 text-danger"></i>
                            <span>{{ $topBar->email }}</span>
                        </div>
                        @endif
                        @if($topBar->phone)
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone me-2 text-danger"></i>
                            <span>{{ $topBar->phone }}</span>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- Hours Row -->
                @if($topBar->opening_hours)
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-clock me-2 text-danger"></i>
                            <span>{{ $topBar->opening_hours }}</span>
                        </div>
                    </div>
                </div>
                @endif
                
                {{-- <!-- Login/Language Row -->
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        @if (Route::has('login'))
                            @auth
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button class="btn btn-link text-white text-decoration-none p-0" type="submit" style="font-size: 11px;">
                                        <i class="fas fa-user me-1"></i>
                                        LogOut
                                    </button>
                                </form>
                            @else
                                <a class="text-white text-decoration-none" href="{{ route('login') }}" style="font-size: 11px;">
                                    <i class="fas fa-user me-1"></i>
                                    Login
                                </a>
                                @if (Route::has('register'))
                                    <span class="text-white">|</span>
                                    <a class="text-white text-decoration-none" href="{{ route('register') }}" style="font-size: 11px;">
                                        <i class="fas fa-user-plus me-1"></i>
                                        Registration
                                    </a>
                                @endif
                            @endauth
                        @endif
                        <span class="text-white">|</span>
                        <div class="dropdown">
                            <a class="text-white text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="font-size: 11px;">
                                <i class="fas fa-globe me-1"></i>
                                EN
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">Bangla</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endif

<!-- Main Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-3" href="{{route('home')}}" style="color: #dc3545;">
            <span class="bg-danger text-white px-2 py-1 rounded me-1" style="font-size: 1.2rem;">W</span>
            SHIPPING
        </a>

        <!-- Mobile menu button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-dark px-3 py-2" href="{{ route('home') }}" style="font-size: 14px; letter-spacing: 0.5px;">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold text-dark px-3 py-2" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 14px; letter-spacing: 0.5px;">
                        SERVICES
                    </a>
                    <ul class="dropdown-menu shipping-dropdown" aria-labelledby="servicesDropdown">
                        <li><a class="dropdown-item shipping-dropdown-item" href="{{ route('our.services') }}">OUR SERVICES</a></li>
                        <li><a class="dropdown-item shipping-dropdown-item" href="{{ route('air.freight.shipping') }}">AIR FREIGHT SHIPPING</a></li>
                        <li><a class="dropdown-item shipping-dropdown-item" href="{{ route('ocean.shipping') }}">OCEAN FREIGHT SHIPPING</a></li>
                        <li><a class="dropdown-item shipping-dropdown-item" href="{{ route('car.shipping') }}">CAR FREIGHT SHIPPING</a></li>
                    </ul>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold text-dark px-3 py-2" href="#" id="shippingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 14px; letter-spacing: 0.5px;">
                        SHIPPING
                    </a>
                    <ul class="dropdown-menu shipping-dropdown" aria-labelledby="shippingDropdown">
                        <li><a class="dropdown-item shipping-dropdown-item" href="{{ route('shipping') }}">CURRENT SHIPMENT</a></li>
                        <li><a class="dropdown-item shipping-dropdown-item" href="{{ route('create.shipment') }}">CREATE NEW SHIPMENT</a></li>
                        <li><a class="dropdown-item shipping-dropdown-item" href="{{ route('shipping.history') }}">SHIPPING HISTORY</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold text-dark px-3 py-2" href="#" id="trackingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 14px; letter-spacing: 0.5px;">
                        TRACKING
                    </a>
                    <ul class="dropdown-menu shipping-dropdown" aria-labelledby="trackingDropdown">
                        <li><a class="dropdown-item shipping-dropdown-item" href="{{ route('tracking') }}">TRACKING</a></li>
                        <li><a class="dropdown-item shipping-dropdown-item" href="{{ route('your.shipping') }}">YOUR SHIPPING PROCESS</a></li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-dark px-3 py-2" href="{{ route('blog') }}" style="font-size: 14px; letter-spacing: 0.5px;">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-dark px-3 py-2" href="{{ route('about.us') }}" style="font-size: 14px; letter-spacing: 0.5px;">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-dark px-3 py-2" href="{{ route('contact.us') }}" style="font-size: 14px; letter-spacing: 0.5px;">CONTACT US</a>
                </li>
            </ul>

            <!-- Search Button -->
            <div class="d-flex">
                <button class="btn btn-danger px-3 py-2" type="button" style="border-radius: 0;">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
</div>
<!-- End Sticky Header Wrapper -->
