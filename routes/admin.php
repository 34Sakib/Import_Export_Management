<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\TopBarSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FooterSettingController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\QuoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Admin Authentication Routes (No middleware)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Protected Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Admin Profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

    // Admin Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');

    Route::prefix('service')->name('service.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
        Route::get('/{id}/show', [ServiceController::class, 'show'])->name('show');

        // AJAX edit route
        Route::get('/{id}/ajax-edit', [ServiceController::class, 'ajaxEdit'])->name('ajaxEdit');

        //Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [ServiceController::class, 'destroy'])->name('destroy');
    });

    // Blog Posts Routes
    Route::prefix('blog-posts')->name('blog-posts.')->group(function () {
        Route::get('/', [BlogPostController::class, 'index'])->name('index');
        Route::get('/create', [BlogPostController::class, 'create'])->name('create');
        Route::post('/', [BlogPostController::class, 'store'])->name('store');
        Route::get('/{id}', [BlogPostController::class, 'show'])->name('show');

        // AJAX Edit route
        Route::get('/{id}/ajax-edit', [BlogPostController::class, 'ajaxEdit'])->name('ajaxEdit');

        Route::put('/{id}', [BlogPostController::class, 'update'])->name('update');
        Route::delete('/{id}', [BlogPostController::class, 'destroy'])->name('destroy');
    });

    // News Management Routes
    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/create', [NewsController::class, 'create'])->name('create');
        Route::post('/', [NewsController::class, 'store'])->name('store');
        Route::get('/{id}', [NewsController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [NewsController::class, 'update'])->name('update');
        Route::delete('/{id}', [NewsController::class, 'destroy'])->name('destroy');
    });

    // Testimonial Management Routes
    Route::resource('testimonials', TestimonialController::class);
    Route::get('testimonials/get/{id}', [TestimonialController::class, 'getTestimonial'])->name('testimonials.get');

    // Footer Settings
    Route::prefix('footer-settings')->name('admin.footer-settings.')->group(function () {
        Route::get('/', [FooterSettingController::class, 'index'])->name('index');
        Route::post('/', [FooterSettingController::class, 'store'])->name('store');
        Route::get('/{footer_setting}/edit', [FooterSettingController::class, 'edit'])->name('edit');
        Route::put('/{footer_setting}', [FooterSettingController::class, 'update'])->name('update');
        Route::delete('/{footer_setting}', [FooterSettingController::class, 'destroy'])->name('destroy');
    });

    // Hero Slides Routes
    Route::prefix('hero-slides')->name('hero-slides.')->group(function () {
        Route::get('/', [HeroSlideController::class, 'index'])->name('index');
        Route::get('/create', [HeroSlideController::class, 'create'])->name('create');
        Route::post('/', [HeroSlideController::class, 'store'])->name('store');
        Route::get('/{id}', [HeroSlideController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [HeroSlideController::class, 'edit'])->name('edit');
        Route::put('/{id}', [HeroSlideController::class, 'update'])->name('update');
        Route::delete('/{id}', [HeroSlideController::class, 'destroy'])->name('destroy');
    });

    // Quote Requests Routes
    Route::prefix('quotes')->name('quotes.')->group(function () {
        Route::get('/', [QuoteController::class, 'index'])->name('index');
        Route::post('/', [QuoteController::class, 'store'])->name('store');
        Route::get('/{quote}', [QuoteController::class, 'show'])->name('show');
        
        // Status update route - must be defined before the show route
        Route::post('{quote}/status', [QuoteController::class, 'updateStatus'])
            ->name('update-status')
            ->where('quote', '[0-9]+');
            
        Route::delete('/{quote}', [QuoteController::class, 'destroy'])->name('destroy');
    });


    // Top Bar Settings Routes
    Route::prefix('top-bar')->name('top-bar.')->group(function () {
        Route::get('/', [TopBarSettingController::class, 'index'])->name('index');
        Route::post('/', [TopBarSettingController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TopBarSettingController::class, 'getTopBar'])->name('edit');
        Route::put('/{id}', [TopBarSettingController::class, 'update'])->name('update');
        Route::delete('/{id}', [TopBarSettingController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/toggle-status', [TopBarSettingController::class, 'toggleStatus'])->name('toggle-status');
    });

    // Client Management Routes
    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');
        Route::get('/create', [ClientController::class, 'create'])->name('create');
        Route::post('/', [ClientController::class, 'store'])->name('store');
        Route::get('/{client}', [ClientController::class, 'show'])->name('show');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('edit');
        Route::put('/{client}', [ClientController::class, 'update'])->name('update');
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');
        Route::post('/{client}/toggle-status', [ClientController::class, 'toggleStatus'])->name('toggle-status');
    });

    
});
