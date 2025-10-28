<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('contact.us');

//our services pages
Route::get('/our-services', [FrontendController::class, 'ourServices'])->name('our.services');

Route::get('/air-freight-shipping', [FrontendController::class, 'airFreightShipping'])->name('air.freight.shipping');

Route::get('/ocean-shipping', [FrontendController::class, 'oceanShipping'])->name('ocean.shipping');

Route::get('/car-shipping', [FrontendController::class, 'carShipping'])->name('car.shipping');

//tracking  pages
Route::get('/tracking', [FrontendController::class, 'tracking'])->name('tracking');

Route::get('/your-shipping', [FrontendController::class, 'yourShipping'])->name('your.shipping');

//shipping pages
Route::get('/shipping', [FrontendController::class, 'shipping'])->name('shipping');

Route::get('/create-shipment', [FrontendController::class, 'createShipment'])->name('create.shipment');

Route::get('/shipping-history', [FrontendController::class, 'shippingHistory'])->name('shipping.history');

//blog pages
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [FrontendController::class, 'showPost'])->name('blog.show');

//about us page
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about.us');

Route::get('/dashboard', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }
    return app(AdminController::class)->dashboard();
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Routes
require __DIR__.'/admin.php';
