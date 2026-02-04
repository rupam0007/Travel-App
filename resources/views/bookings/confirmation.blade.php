@extends('layouts.app')

@section('title', 'Booking Confirmed - Vraman')

@section('content')
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <!-- Success Icon -->
            <div class="text-center mb-8">
                <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check-circle text-green-500 text-5xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Booking Confirmed!</h1>
                <p class="text-gray-600">Thank you for booking with Vraman. Your booking has been received.</p>
            </div>

            <!-- Booking Details Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                <div class="bg-primary-600 text-white p-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm opacity-90">Booking Number</p>
                            <p class="text-2xl font-bold">{{ $booking->booking_number }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm opacity-90">Status</p>
                            <span class="inline-block bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-sm font-medium">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Package Info -->
                    <div class="flex gap-4 mb-6 pb-6 border-b border-gray-200">
                        <img src="{{ $booking->package->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=200' }}" alt="{{ $booking->package->name }}" class="w-24 h-24 rounded-lg object-cover">
                        <div>
                            <h3 class="font-semibold text-lg text-gray-800">{{ $booking->package->name }}</h3>
                            <p class="text-gray-500">{{ $booking->package->destination->name ?? 'India' }}</p>
                            <p class="text-primary-600 font-medium">{{ $booking->package->nights }}N / {{ $booking->package->days }}D</p>
                        </div>
                    </div>

                    <!-- Booking Info -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <p class="text-sm text-gray-500">Travel Date</p>
                            <p class="font-medium text-gray-800">{{ $booking->travel_date->format('d M, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Travelers</p>
                            <p class="font-medium text-gray-800">
                                {{ $booking->adults }} Adult(s)
                                @if($booking->children > 0), {{ $booking->children }} Child(ren)@endif
                                @if($booking->infants > 0), {{ $booking->infants }} Infant(s)@endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Booked By</p>
                            <p class="font-medium text-gray-800">{{ $booking->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Contact</p>
                            <p class="font-medium text-gray-800">{{ $booking->phone }}</p>
                        </div>
                    </div>

                    <!-- Amount -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total Amount</span>
                            <span class="text-2xl font-bold text-primary-600">₹{{ number_format($booking->total_amount) }}</span>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-gray-600">Payment Status</span>
                            <span class="inline-block bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">
                                {{ ucfirst($booking->payment_status) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- What's Next -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                <h3 class="font-semibold text-lg text-gray-800 mb-4">What's Next?</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                            <span class="text-primary-600 font-bold text-sm">1</span>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">Confirmation Email</h4>
                            <p class="text-sm text-gray-500">A confirmation email has been sent to {{ $booking->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                            <span class="text-primary-600 font-bold text-sm">2</span>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">Team Contact</h4>
                            <p class="text-sm text-gray-500">Our travel expert will contact you within 24 hours to confirm your booking details</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                            <span class="text-primary-600 font-bold text-sm">3</span>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">Payment & Confirmation</h4>
                            <p class="text-sm text-gray-500">Complete the payment to finalize your booking</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition">
                    <i class="fas fa-home mr-2"></i>Back to Home
                </a>
                <a href="{{ route('bookings.track') }}?booking_number={{ $booking->booking_number }}" class="inline-flex items-center justify-center px-6 py-3 bg-primary-600 text-white rounded-lg font-medium hover:bg-primary-700 transition">
                    <i class="fas fa-search mr-2"></i>Track Booking
                </a>
            </div>

            <!-- Help -->
            <div class="text-center mt-8">
                <p class="text-gray-500 mb-2">Need help with your booking?</p>
                <div class="flex justify-center gap-6">
                    <a href="tel:+919876543210" class="text-primary-600 font-medium hover:text-primary-700">
                        <i class="fas fa-phone-alt mr-1"></i>Call Us
                    </a>
                    <a href="https://wa.me/919876543210" class="text-green-600 font-medium hover:text-green-700">
                        <i class="fab fa-whatsapp mr-1"></i>WhatsApp
                    </a>
                    <a href="mailto:info@vraman.com" class="text-gray-600 font-medium hover:text-gray-700">
                        <i class="fas fa-envelope mr-1"></i>Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
