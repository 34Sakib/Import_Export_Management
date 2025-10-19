<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $services = Service::latest()->limit(6)->get();
        return view('frontend.index', compact('services'));
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

    public function blog()
    {
        return view('frontend.blog.single_blog');
    }

    public function aboutUs()
    {
        return view('frontend.pages.aboutus');
    }
}
