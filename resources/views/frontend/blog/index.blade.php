@extends('frontend.master')

@section('title', 'Blog - World Shipping')

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
                    Latest news and updates from World Shipping
                </p>
            </div>
        </div>
    </div>
    
    <!-- Background Overlay -->
    <div class="shipping-hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
</section>

<!-- Blog Posts Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Blog Posts -->
            <div class="col-lg-8">
                <div class="row">
                    @forelse($posts as $post)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            @if($post->featured_image)
                                <img src="{{ asset('images/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/800x400?text=No+Image" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-muted small">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                                    </span>
                                    <span class="mx-2 text-muted">|</span>
                                    <span class="text-muted small">
                                        <i class="far fa-user me-1"></i>
                                        Admin
                                    </span>
                                </div>
                                <h5 class="card-title fw-bold">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none text-dark">
                                        {{ $post->title }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted">
                                    {{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}
                                </p>
                                <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-outline-danger btn-sm">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            No blog posts found.
                        </div>
                    </div>
                    @endforelse
                </div>
                
                <!-- Pagination -->
                @if($posts->hasPages())
                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Search Widget -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Search</h5>
                        <form action="{{ route('blog') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search posts..." value="{{ request('search') }}">
                                <button class="btn btn-danger" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Recent Posts -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Recent Posts</h5>
                        @php
                            $recentPosts = \App\Models\BlogPost::where('status', 'published')
                                ->latest('published_at')
                                ->limit(5)
                                ->get();
                        @endphp
                        <div class="list-group list-group-flush">
                            @foreach($recentPosts as $recentPost)
                            <a href="{{ route('blog.show', $recentPost->slug) }}" class="list-group-item list-group-item-action border-0 px-0 py-2">
                                <div class="d-flex align-items-center">
                                    @if($recentPost->featured_image)
                                    <img src="{{ asset('images/' . $recentPost->featured_image) }}" alt="{{ $recentPost->title }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                    <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="far fa-newspaper text-muted"></i>
                                    </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-0" style="font-size: 0.9rem;">{{ $recentPost->title }}</h6>
                                        <small class="text-muted">{{ $recentPost->published_at ? $recentPost->published_at->format('M d, Y') : $recentPost->created_at->format('M d, Y') }}</small>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Categories -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Categories</h5>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-2 d-flex justify-content-between align-items-center">
                                Logistics
                                <span class="badge bg-danger rounded-pill">14</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-2 d-flex justify-content-between align-items-center">
                                Shipping
                                <span class="badge bg-danger rounded-pill">8</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-2 d-flex justify-content-between align-items-center">
                                Freight
                                <span class="badge bg-danger rounded-pill">5</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 px-0 py-2 d-flex justify-content-between align-items-center">
                                Transportation
                                <span class="badge bg-danger rounded-pill">3</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .shipping-hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                    url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 350px;
        position: relative;
    }
    
    .shipping-hero-title {
        font-size: 3rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    
    .shipping-hero-description {
        font-size: 1.2rem;
        max-width: 700px;
        margin: 0 auto;
    }
    
    .shipping-breadcrumb {
        background: transparent;
        padding: 0;
        margin: 0;
    }
    
    .shipping-breadcrumb .breadcrumb-item a {
        transition: all 0.3s ease;
    }
    
    .shipping-breadcrumb .breadcrumb-item a:hover {
        color: #dc3545 !important;
    }
    
    .shipping-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.7);
    }
    
    .shipping-hero-overlay {
        background: rgba(0, 0, 0, 0.5);
        z-index: -1;
    }
    
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
    
    .card-title a {
        transition: color 0.3s ease;
    }
    
    .card-title a:hover {
        color: #dc3545 !important;
    }
    
    .section-title {
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 25px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 1.25rem;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 3px;
        background: #dc3545;
    }
    
    .list-group-item-action:focus, 
    .list-group-item-action:hover {
        background-color: #f8f9fa;
        color: #dc3545;
    }
    
    .page-link {
        color: #dc3545;
        border-color: #dee2e6;
    }
    
    .page-item.active .page-link {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    
    .page-link:hover {
        color: #a71d2a;
    }
    
    .btn-outline-danger {
        border-width: 2px;
        font-weight: 500;
        letter-spacing: 0.5px;
    }
    
    .btn-outline-danger:hover {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
@endpush
