<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

// Admin Auth Routes (public)
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Routes (protected)
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // User Management
    Route::resource('users', AdminUserController::class, ['names' => 'admin.users']);
    
    // Destination Management
    Route::resource('destinations', AdminDestinationController::class, ['names' => 'admin.destinations']);
    
    // Package Management
    Route::resource('packages', AdminPackageController::class, ['names' => 'admin.packages']);
    
    // Booking Management
    Route::resource('bookings', AdminBookingController::class, ['names' => 'admin.bookings']);
    Route::patch('bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('admin.bookings.update-status');
    
    // Blog Management
    Route::resource('blogs', AdminBlogController::class, ['names' => 'admin.blogs']);
    
    // Review Management
    Route::resource('reviews', AdminReviewController::class, ['names' => 'admin.reviews']);
    Route::patch('reviews/{review}/approve', [AdminReviewController::class, 'approve'])->name('admin.reviews.approve');
    
    // Settings Management
    Route::resource('settings', AdminSettingController::class, ['names' => 'admin.settings']);
    Route::post('settings/general', [AdminSettingController::class, 'updateGeneral'])->name('admin.settings.general');
});

// User Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.submit');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('user.logout');
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [App\Http\Controllers\AuthController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password', [App\Http\Controllers\AuthController::class, 'updatePassword'])->name('password.update');
});

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Destinations
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');
Route::get('/region/{region}', [DestinationController::class, 'byRegion'])->name('destinations.by-region');

// Packages
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::get('/packages/{package}', [PackageController::class, 'show'])->name('packages.show');
Route::get('/category/{category}', [PackageController::class, 'byCategory'])->name('packages.by-category');

// Bookings
Route::get('/book/{package}', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/book', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/booking/confirmation/{bookingNumber}', [BookingController::class, 'confirmation'])->name('bookings.confirmation');
Route::get('/booking/track', [BookingController::class, 'track'])->name('bookings.track');

// Contact & Enquiry
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/enquiry', [ContactController::class, 'enquiry'])->name('enquiry.store');

// Reviews
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Blogs
Route::get('/blog', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blogs.show');

// Static Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/terms-conditions', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/visa-information', [PageController::class, 'visaInfo'])->name('visa-info');
Route::get('/travel-tips', [PageController::class, 'travelTips'])->name('travel-tips');
