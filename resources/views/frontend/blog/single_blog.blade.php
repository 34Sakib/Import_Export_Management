@extends('frontend.master')

@section('title', 'Single Blog - World Shipping')

@section('content')
<!-- Blog Hero Section -->
<section class="shipping-hero-section d-flex align-items-center justify-content-center text-white position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Page Title -->
                <h1 class="shipping-hero-title mb-3">BLOG</h1>
                
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center shipping-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Blog</li>
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

<!-- Blog Content Section -->
<section class="blog-content-section py-5">
    <div class="container">
        <div class="row">
            <!-- Main Blog Content -->
            <div class="col-lg-8 col-md-7">
                <div class="blog-post-content">
                    <!-- Blog Post Image -->
                    <div class="blog-post-image mb-4">
                        <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&h=400&q=80" alt="Blog Post" class="img-fluid rounded">
                    </div>
                    
                    <!-- Blog Post Title -->
                    <h2 class="blog-post-title mb-3">My Daily Reading List</h2>
                    
                    <!-- Blog Post Meta -->
                    <div class="blog-post-meta mb-4">
                        <span class="text-muted">
                            <i class="fas fa-calendar-alt me-2"></i>Posted on 8 March 2015 by 
                            <a href="#" class="text-danger text-decoration-none">Mike Ross</a>
                        </span>
                        <span class="text-muted ms-3">
                            <i class="fas fa-eye me-2"></i>20 View
                        </span>
                        <span class="text-muted ms-3">
                            <i class="fas fa-comments me-2"></i>12 comments
                        </span>
                        <span class="text-muted ms-3">
                            <i class="fas fa-share me-2"></i>60 share
                        </span>
                        <span class="text-muted ms-3">
                            <i class="fas fa-heart me-2"></i>life style, friends, wonderful
                        </span>
                    </div>
                    
                    <!-- Blog Post Content -->
                    <div class="blog-post-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque. Lorem ipsum dolor sit amet.</p>
                        
                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                        
                        <p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.</p>
                        
                        <ul class="blog-list mt-4">
                            <li>Echo Park exercitation</li>
                            <li>Pinterest delectus cray voluptate</li>
                            <li>Aliqua cred Terry Richardson</li>
                            <li>Pitchfork accusamus</li>
                        </ul>
                        
                        <p class="mt-4">Nulla sed mi leo, sit amet molestie nulla. Phasellus lobortis blandit ipsum, at adipiscing eros porta quis. Phasellus in nisl ipsum, quis dapibus magna. Phasellus odio dolor, pretium sit amet aliquam a, gravida eget dui. Pellentesque eu ipsum et quam faucibus scelerisque vitae ut ligula. Ut luctus fermentum commodo. Mauris eget justo turpis, eget fringilla mi. Duis lobortis cursus mi vel tristique. Maecenas eu lorem hendrerit neque dapibus cursus cursus id sit amet nisl. Proin rhoncus semper sem nec aliquet. Aenean lacinia bibendum nulla sed consectetur.</p>
                    </div>
                    
                    <!-- You May Also Like Section -->
                    <div class="you-may-like mt-5">
                        <h4 class="section-title mb-4">YOU MAY ALSO LIKE</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="related-post">
                                    <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=250&q=80" alt="Related Post" class="img-fluid rounded mb-3">
                                    <h5><a href="#" class="text-dark text-decoration-none">ALL SHIPPING CONTAINER ARE INTERNATIONAL TRANSPORT</a></h5>
                                    <p class="text-muted small">Posted on 8 March 2015 by Mike Ross</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="related-post">
                                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=250&q=80" alt="Related Post" class="img-fluid rounded mb-3">
                                    <h5><a href="#" class="text-dark text-decoration-none">ALL SHIPPING CONTAINER ARE INTERNATIONAL TRANSPORT</a></h5>
                                    <p class="text-muted small">Posted on 8 March 2015 by Mike Ross</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comments Section -->
                    <div class="comments-section mt-5">
                        <h4 class="section-title mb-4">3 THOUGHTS ON "SINGLE POST"</h4>
                        
                        <!-- Comment 1 -->
                        <div class="comment-item mb-4">
                            <div class="d-flex">
                                <img src="https://randomuser.me/api/portraits/women/25.jpg" alt="Kate Winless" class="comment-avatar rounded-circle me-3">
                                <div class="comment-content flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="comment-author mb-0 text-danger">Kate Winless</h6>
                                        <small class="text-muted">14th Feb 2015 at 9:00 am</small>
                                    </div>
                                    <p class="comment-text mb-2">Phasellus odio dolor, pretium sit amet aliquam a, gravida eget dui. Pellentesque ipsum eque vitae ut ligula. Ut luctus fermentum commodo. Mauris eget justo turpis, eget fringilla. Duis lobortis cursus mi vel tristique.</p>
                                    <a href="#" class="reply-link text-danger text-decoration-none small">REPLY</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Comment 2 -->
                        <div class="comment-item mb-4">
                            <div class="d-flex">
                                <img src="https://randomuser.me/api/portraits/men/35.jpg" alt="John Doe" class="comment-avatar rounded-circle me-3">
                                <div class="comment-content flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="comment-author mb-0 text-danger">John Doe</h6>
                                        <small class="text-muted">14th Feb 2015 at 9:00 am</small>
                                    </div>
                                    <p class="comment-text mb-2">Phasellus odio dolor, pretium sit amet aliquam a, gravida eget dui. Pellentesque ipsum eque vitae ut ligula. Ut luctus fermentum commodo. Mauris eget justo turpis, eget fringilla. Duis lobortis cursus mi vel tristique.</p>
                                    <a href="#" class="reply-link text-danger text-decoration-none small">REPLY</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Comment 3 -->
                        <div class="comment-item mb-4">
                            <div class="d-flex">
                                <img src="https://randomuser.me/api/portraits/women/38.jpg" alt="Sarah Miller" class="comment-avatar rounded-circle me-3">
                                <div class="comment-content flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="comment-author mb-0 text-danger">Sarah Miller</h6>
                                        <small class="text-muted">14th Feb 2015 at 9:00 am</small>
                                    </div>
                                    <p class="comment-text mb-2">Phasellus odio dolor, pretium sit amet aliquam a, gravida eget dui. Pellentesque ipsum eque vitae ut ligula. Ut luctus fermentum commodo. Mauris eget justo turpis, eget fringilla. Duis lobortis cursus mi vel tristique.</p>
                                    <a href="#" class="reply-link text-danger text-decoration-none small">REPLY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Leave a Comment Form -->
                    <div class="comment-form mt-5">
                        <h4 class="section-title mb-4">Leave a Comment</h4>
                        <p class="text-muted mb-4">Your email address will not be published. Required fields are marked *</p>
                        
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="6" placeholder="Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5">
                <div class="blog-sidebar">
                    <!-- Search Widget -->
                    <div class="sidebar-widget mb-4">
                        <div class="search-widget">
                            <input type="text" class="form-control" placeholder="Enter keywords...">
                            <button class="search-btn" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Category Widget -->
                    <div class="sidebar-widget mb-4">
                        <h5 class="widget-title">CATEGORY</h5>
                        <div class="widget-content">
                            <ul class="category-list">
                                <li><a href="#" class="category-item active">SEA FREIGHT</a></li>
                                <li><a href="#" class="category-item">RAILWAY LOGISTICS</a></li>
                                <li><a href="#" class="category-item">CARGO SERVICES</a></li>
                                <li><a href="#" class="category-item">LATEST SHIPMENTS</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Latest Post Widget -->
                    <div class="sidebar-widget mb-4">
                        <h5 class="widget-title">LATEST POST</h5>
                        <div class="widget-content">
                            <!-- Latest Post Item 1 -->
                            <div class="latest-post-item mb-3">
                                <div class="d-flex">
                                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=70&h=70&q=80" alt="Latest Post" class="latest-post-thumb me-3">
                                    <div class="latest-post-content">
                                        <h6><a href="#" class="text-dark text-decoration-none">Ocean Freight Shipping Solutions</a></h6>
                                        <small class="text-muted">9th September 2016</small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Latest Post Item 2 -->
                            <div class="latest-post-item mb-3">
                                <div class="d-flex">
                                    <img src="https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=70&h=70&q=80" alt="Latest Post" class="latest-post-thumb me-3">
                                    <div class="latest-post-content">
                                        <h6><a href="#" class="text-dark text-decoration-none">Road Transport & Logistics</a></h6>
                                        <small class="text-muted">9th September 2016</small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Latest Post Item 3 -->
                            <div class="latest-post-item mb-3">
                                <div class="d-flex">
                                    <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-4.0.3&auto=format&fit=crop&w=70&h=70&q=80" alt="Latest Post" class="latest-post-thumb me-3">
                                    <div class="latest-post-content">
                                        <h6><a href="#" class="text-dark text-decoration-none">Railway Cargo Transportation</a></h6>
                                        <small class="text-muted">9th September 2016</small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Latest Post Item 4 -->
                            <div class="latest-post-item mb-3">
                                <div class="d-flex">
                                    <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&auto=format&fit=crop&w=70&h=70&q=80" alt="Latest Post" class="latest-post-thumb me-3">
                                    <div class="latest-post-content">
                                        <h6><a href="#" class="text-dark text-decoration-none">Air Freight Express Services</a></h6>
                                        <small class="text-muted">9th September 2016</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tags Widget -->
                    <div class="sidebar-widget">
                        <h5 class="widget-title">TAGS</h5>
                        <div class="widget-content">
                            <div class="tags-cloud">
                                <a href="#" class="tag-item">LOGISTICS</a>
                                <a href="#" class="tag-item">HOW TO BUILD</a>
                                <a href="#" class="tag-item">CURGO SERVICES</a>
                                <a href="#" class="tag-item">TIPS</a>
                                <a href="#" class="tag-item">LATEST OFFERS</a>
                                <a href="#" class="tag-item">SEA & TRUCKING</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection