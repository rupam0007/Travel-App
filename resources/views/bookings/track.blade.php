@extends('layouts.app')

@section('title', 'Track Booking - Vraman')

@section('content')
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Track Your Booking</h1>
                <p class="text-gray-600">Enter your booking number to check the status</p>
            </div>

            <!-- Search Form -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                <form action="{{ route('bookings.track') }}" method="GET" class="flex gap-4">
                    <input type="text" name="booking_number" value="{{ request('booking_number') }}" placeholder="Enter Booking Number (e.g., VRM20260204XXXX)" required class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                    <button type="submit" class="px-6 py-3 bg-primary-600 text-white rounded-lg font-medium hover:bg-primary-700 transition">
                        <i class="fas fa-search mr-2"></i>Track
                    </button>
                </form>
            </div>

            @if(request('booking_number'))
                @if($booking)
                <!-- Booking Found -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-primary-600 text-white p-6">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm opacity-90">Booking Number</p>
                                <p class="text-2xl font-bold">{{ $booking->booking_number }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm opacity-90">Status</p>
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-yellow-400 text-yellow-900',
                                        'confirmed' => 'bg-green-400 text-green-900',
                                        'cancelled' => 'bg-red-400 text-red-900',
                                        'completed' => 'bg-blue-400 text-blue-900',
                                    ];
                                @endphp
                                <span class="inline-block {{ $statusColors[$booking->status] ?? 'bg-gray-400 text-gray-900' }} px-3 py-1 rounded-full text-sm font-medium">
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

                        <!-- Status Timeline -->
                        <div class="mb-6 pb-6 border-b border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-4">Booking Status</h4>
                            <div class="relative">
                                <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200"></div>
                                <div class="space-y-6">
                                    <div class="relative flex items-start">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 {{ in_array($booking->status, ['pending', 'confirmed', 'completed']) ? 'bg-green-500' : 'bg-gray-300' }}">
                                            <i class="fas fa-check text-white text-sm"></i>
                                        </div>
                                        <div class="ml-4">
                                            <h5 class="font-medium text-gray-800">Booking Received</h5>
                                            <p class="text-sm text-gray-500">{{ $booking->created_at->format('d M, Y h:i A') }}</p>
                                        </div>
                                    </div>
                                    <div class="relative flex items-start">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 {{ in_array($booking->status, ['confirmed', 'completed']) ? 'bg-green-500' : 'bg-gray-300' }}">
                                            @if(in_array($booking->status, ['confirmed', 'completed']))
                                            <i class="fas fa-check text-white text-sm"></i>
                                            @else
                                            <span class="text-white text-sm font-bold">2</span>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <h5 class="font-medium text-gray-800">Booking Confirmed</h5>
                                            <p class="text-sm text-gray-500">{{ $booking->status == 'confirmed' || $booking->status == 'completed' ? 'Confirmed' : 'Awaiting confirmation' }}</p>
                                        </div>
                                    </div>
                                    <div class="relative flex items-start">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 {{ $booking->status == 'completed' ? 'bg-green-500' : 'bg-gray-300' }}">
                                            @if($booking->status == 'completed')
                                            <i class="fas fa-check text-white text-sm"></i>
                                            @else
                                            <span class="text-white text-sm font-bold">3</span>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <h5 class="font-medium text-gray-800">Trip Completed</h5>
                                            <p class="text-sm text-gray-500">{{ $booking->status == 'completed' ? 'Completed' : 'Upcoming' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Details -->
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

                        <!-- Payment Info -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-600">Total Amount</span>
                                <span class="text-xl font-bold text-primary-600">₹{{ number_format($booking->total_amount) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Payment Status</span>
                                @php
                                    $paymentColors = [
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'partial' => 'bg-orange-100 text-orange-700',
                                        'paid' => 'bg-green-100 text-green-700',
                                        'refunded' => 'bg-red-100 text-red-700',
                                    ];
                                @endphp
                                <span class="inline-block {{ $paymentColors[$booking->payment_status] ?? 'bg-gray-100 text-gray-700' }} px-3 py-1 rounded-full text-sm font-medium">
                                    {{ ucfirst($booking->payment_status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <!-- Booking Not Found -->
                <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                    <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-exclamation-circle text-red-500 text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Booking Not Found</h3>
                    <p class="text-gray-600 mb-4">We couldn't find a booking with the number "{{ request('booking_number') }}".</p>
                    <p class="text-sm text-gray-500">Please check your booking number and try again.</p>
                </div>
                @endif
            @endif

            <!-- Help -->
            <div class="text-center mt-8">
                <p class="text-gray-500 mb-2">Can't find your booking?</p>
                <a href="{{ route('contact') }}" class="text-primary-600 font-medium hover:text-primary-700">
                    <i class="fas fa-headset mr-1"></i>Contact Support
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
