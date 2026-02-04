<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

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
