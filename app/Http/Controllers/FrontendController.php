<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // Get active hero slides ordered by their order field
        $heroSlides = \App\Models\HeroSlide::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        $services = Service::latest()->limit(6)->get();
        $latestBlogPosts = \App\Models\BlogPost::where('status', 'published')
            ->latest('published_at')
            ->limit(3)
            ->get();
            
        // Get latest published news
        $latestNews = \App\Models\News::where('is_published', true)
            ->where('publish_date', '<=', now())
            ->latest('publish_date')
            ->limit(3)
            ->get();
            
        // Get active testimonials
        $testimonials = \App\Models\Testimonial::where('is_active', true)
            ->latest()
            ->get();
            
        return view('frontend.index', compact('heroSlides', 'services', 'latestBlogPosts', 'latestNews', 'testimonials'));
    }

    public function contactUs()
    {
        return view('frontend.contact_us');
    }

    public function ourServices()
    {
        $services = Service::latest()->get();
        return view('frontend.services.our_services', compact('services'));
    }

    public function airFreightShipping()
    {
        $services = Service::latest()->limit(3)->get();
        return view('frontend.services.air_freight_shipping', compact('services'));
    }

    public function oceanShipping()
    {
        $services = Service::latest()->limit(3)->get();
        return view('frontend.services.ocean_shipping', compact('services'));
    }

    public function carShipping()
    {
        $services = Service::latest()->limit(3)->get();
        return view('frontend.services.car_shipping', compact('services'));
    }

    public function tracking()
    {
        $services = Service::latest()->limit(3)->get();
        return view('frontend.track.tracking', compact('services'));
    }

    public function yourShipping()
    {
        $services = Service::latest()->limit(3)->get();
        return view('frontend.track.your_shipping', compact('services'));
    }

    public function shipping()
    {
        $services = Service::latest()->limit(3)->get();
        return view('frontend.shipping.shipping', compact('services'));
    }

    public function createShipment()
    {
        return view('frontend.shipping.create_shipment');
    }

    public function shippingHistory()
    {
        $services = Service::latest()->limit(3)->get();
        return view('frontend.shipping.shipping_history', compact('services'));
    }

    public function blog(Request $request)
    {
        $query = \App\Models\BlogPost::where('status', 'published')
            ->latest('published_at');
            
        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }
            
        $posts = $query->paginate(9);
        
        if ($request->ajax()) {
            return view('frontend.blog.posts', compact('posts'))->render();
        }
            
        return view('frontend.blog.index', compact('posts'));
    }
    
    /**
     * Display the specified blog post.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function showPost($slug)
    {
        $post = \App\Models\BlogPost::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
            
        $recentPosts = \App\Models\BlogPost::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->limit(3)
            ->get();
            
        return view('frontend.blog.show', compact('post', 'recentPosts'));
    }

    public function aboutUs()
    {
        return view('frontend.pages.aboutus');
    }
}
