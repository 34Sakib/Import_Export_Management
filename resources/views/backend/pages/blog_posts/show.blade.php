@extends('backend.layout.master')

@section('title', 'View Blog Post')
@section('page-title', 'View Blog Post')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.blog-posts.index') }}">Blog Posts</a></li>
    <li class="breadcrumb-item active">{{ $post->title }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Blog Post Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.blog-posts.edit', $post->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.blog-posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>{{ $post->title }}</h2>
                            
                            <div class="post-meta mb-4">
                                <span class="badge badge-{{ 
                                    $post->status == 'published' ? 'success' : 
                                    ($post->status == 'draft' ? 'secondary' : 'warning') 
                                }}">
                                    {{ ucfirst($post->status) }}
                                </span>
                                <span class="text-muted ml-2">
                                    <i class="far fa-calendar-alt"></i> 
                                    {{ $post->published_at ? $post->published_at->format('F j, Y') : 'Not published' }}
                                </span>
                            </div>

                            @if($post->featured_image)
                                <div class="featured-image mb-4">
                                    <img src="{{ asset('images/' . $post->featured_image) }}" 
                                         alt="{{ $post->title }}" class="img-fluid rounded">
                                </div>
                            @endif

                            <div class="post-content mb-4">
                                {!! $post->content !!}
                            </div>

                            @if($post->excerpt)
                                <div class="card bg-light mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Excerpt</h5>
                                        <p class="card-text">{{ $post->excerpt }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Post Details</h3>
                                </div>
                                <div class="card-body">
                                    <h5>Status</h5>
                                    <p>
                                        <span class="badge badge-{{ 
                                            $post->status == 'published' ? 'success' : 
                                            ($post->status == 'draft' ? 'secondary' : 'warning') 
                                        }}">
                                            {{ ucfirst($post->status) }}
                                        </span>
                                    </p>

                                    <h5>Publish Date</h5>
                                    <p>{{ $post->published_at ? $post->published_at->format('F j, Y \a\t g:i A') : 'Not published' }}</p>

                                    <h5>Created At</h5>
                                    <p>{{ $post->created_at->format('F j, Y \a\t g:i A') }}</p>

                                    <h5>Last Updated</h5>
                                    <p>{{ $post->updated_at->format('F j, Y \a\t g:i A') }}</p>
                                </div>
                            </div>

                            @if($post->meta_title || $post->meta_description || $post->meta_keywords)
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h3 class="card-title">SEO Information</h3>
                                    </div>
                                    <div class="card-body">
                                        @if($post->meta_title)
                                            <h5>Meta Title</h5>
                                            <p>{{ $post->meta_title }}</p>
                                        @endif

                                        @if($post->meta_description)
                                            <h5>Meta Description</h5>
                                            <p>{{ $post->meta_description }}</p>
                                        @endif

                                        @if($post->meta_keywords)
                                            <h5>Meta Keywords</h5>
                                            <p>{{ $post->meta_keywords }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Actions</h3>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.blog-posts.edit', $post->id) }}" class="btn btn-warning btn-block mb-2">
                                        <i class="fas fa-edit"></i> Edit Post
                                    </a>
                                    <form action="{{ route('admin.blog-posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-block">
                                            <i class="fas fa-trash"></i> Delete Post
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .post-content {
            line-height: 1.8;
        }
        .post-content img {
            max-width: 100%;
            height: auto;
            margin: 1rem 0;
            border-radius: 4px;
        }
        .post-content h2, .post-content h3, .post-content h4 {
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }
        .post-content p {
            margin-bottom: 1.2rem;
        }
        .post-content ul, .post-content ol {
            margin-bottom: 1.2rem;
            padding-left: 2rem;
        }
        .post-content a {
            color: #3490dc;
            text-decoration: none;
        }
        .post-content a:hover {
            text-decoration: underline;
        }
        .featured-image {
            margin-bottom: 2rem;
        }
        .featured-image img {
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .post-meta {
            margin-bottom: 1.5rem;
            color: #6c757d;
        }
        .card {
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid rgba(0,0,0,.125);
        }
        .card-title {
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }
        h5 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #495057;
        }
    </style>
@endpush
