@extends('layouts.app')

@section('title', 'Book ' . $package->name . ' - Vraman')

@section('content')
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Progress Steps -->
            <div class="flex justify-center mb-12">
                <div class="flex items-center">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-primary-600 text-white rounded-full flex items-center justify-center font-bold">1</div>
                        <span class="ml-2 font-medium text-gray-800">Details</span>
                    </div>
                    <div class="w-16 h-1 bg-gray-300 mx-4"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center font-bold">2</div>
                        <span class="ml-2 text-gray-500">Confirmation</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Booking Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Booking Details</h2>
                        
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ $package->id }}">

                            <!-- Personal Information -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-user text-primary-600 mr-2"></i>Personal Information
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 @error('name') border-red-500 @enderror">
                                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 @error('email') border-red-500 @enderror">
                                        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 @error('phone') border-red-500 @enderror">
                                        @error('phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                        <input type="text" name="city" value="{{ old('city') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                    <textarea name="address" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">{{ old('address') }}</textarea>
                                </div>
                            </div>

                            <!-- Travel Details -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-calendar-alt text-primary-600 mr-2"></i>Travel Details
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Travel Date *</label>
                                        <input type="date" name="travel_date" value="{{ old('travel_date') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 @error('travel_date') border-red-500 @enderror">
                                        @error('travel_date')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Travelers -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-users text-primary-600 mr-2"></i>Number of Travelers
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Adults (12+ years) *</label>
                                        <select name="adults" id="adults" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500" onchange="calculateTotal()">
                                            @for($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ old('adults', 1) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Children (5-11 years)</label>
                                        <select name="children" id="children" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500" onchange="calculateTotal()">
                                            @for($i = 0; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ old('children', 0) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Infants (0-4 years)</label>
                                        <select name="infants" id="infants" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                                            @for($i = 0; $i <= 5; $i++)
                                            <option value="{{ $i }}" {{ old('infants', 0) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Special Requirements -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-clipboard-list text-primary-600 mr-2"></i>Special Requirements
                                </h3>
                                <textarea name="special_requirements" rows="3" placeholder="Any dietary restrictions, accessibility needs, or special requests..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">{{ old('special_requirements') }}</textarea>
                            </div>

                            <button type="submit" class="w-full bg-primary-600 text-white py-4 rounded-lg font-semibold text-lg hover:bg-primary-700 transition">
                                <i class="fas fa-check-circle mr-2"></i>Confirm Booking
                            </button>

                            <p class="text-sm text-gray-500 text-center mt-4">
                                By clicking "Confirm Booking", you agree to our <a href="{{ route('terms') }}" class="text-primary-600 hover:underline">Terms & Conditions</a>
                            </p>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Booking Summary</h3>
                        
                        <div class="flex gap-4 mb-4 pb-4 border-b border-gray-200">
                            <img src="{{ $package->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=200' }}" alt="{{ $package->name }}" class="w-20 h-20 rounded-lg object-cover">
                            <div>
                                <h4 class="font-semibold text-gray-800">{{ $package->name }}</h4>
                                <p class="text-sm text-gray-500">{{ $package->destination->name ?? 'India' }}</p>
                                <p class="text-sm text-primary-600">{{ $package->nights }}N / {{ $package->days }}D</p>
                            </div>
                        </div>

                        <div class="space-y-3 mb-4 pb-4 border-b border-gray-200">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Price per Adult</span>
                                <span class="font-medium">₹{{ number_format($package->price) }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Price per Child (50%)</span>
                                <span class="font-medium">₹{{ number_format($package->price * 0.5) }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Adults</span>
                                <span class="font-medium" id="summary-adults">1</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Children</span>
                                <span class="font-medium" id="summary-children">0</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-6">
                            <span class="text-lg font-semibold text-gray-800">Total Amount</span>
                            <span class="text-2xl font-bold text-primary-600" id="total-amount">₹{{ number_format($package->price) }}</span>
                        </div>

                        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                            <div class="flex items-start">
                                <i class="fas fa-shield-alt text-green-500 mt-1 mr-3"></i>
                                <div>
                                    <h5 class="font-medium text-green-800">Secure Booking</h5>
                                    <p class="text-sm text-green-600">Your payment information is safe with us</p>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <p class="text-sm text-gray-500 mb-2">Need Help?</p>
                            <a href="tel:+919876543210" class="text-primary-600 font-medium">
                                <i class="fas fa-phone-alt mr-1"></i>+91 9876543210
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    const pricePerAdult = {{ $package->price }};
    const pricePerChild = {{ $package->price * 0.5 }};

    function calculateTotal() {
        const adults = parseInt(document.getElementById('adults').value);
        const children = parseInt(document.getElementById('children').value);
        
        const total = (adults * pricePerAdult) + (children * pricePerChild);
        
        document.getElementById('summary-adults').textContent = adults;
        document.getElementById('summary-children').textContent = children;
        document.getElementById('total-amount').textContent = '₹' + total.toLocaleString('en-IN');
    }

    // Initial calculation
    calculateTotal();
</script>
@endpush
