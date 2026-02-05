@extends('layouts.app')

@section('title', 'My Profile - Vraman')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Profile Header -->
            <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl p-8 text-white mb-8">
                <div class="flex items-center space-x-6">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-primary-600 text-4xl font-bold">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
                        <p class="text-primary-100">{{ $user->email }}</p>
                        <p class="text-primary-200 text-sm mt-1">Member since {{ $user->created_at->format('F Y') }}</p>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('bookings.track') }}" class="flex items-center p-3 rounded-lg hover:bg-primary-50 text-gray-700 hover:text-primary-600 transition">
                                    <i class="fas fa-calendar-check w-6"></i>
                                    <span>My Bookings</span>
                                </a>
                            </li>
                            <li>
                                <a href="#profile-section" class="flex items-center p-3 rounded-lg hover:bg-primary-50 text-gray-700 hover:text-primary-600 transition">
                                    <i class="fas fa-user-edit w-6"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#password-section" class="flex items-center p-3 rounded-lg hover:bg-primary-50 text-gray-700 hover:text-primary-600 transition">
                                    <i class="fas fa-lock w-6"></i>
                                    <span>Change Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('packages.index') }}" class="flex items-center p-3 rounded-lg hover:bg-primary-50 text-gray-700 hover:text-primary-600 transition">
                                    <i class="fas fa-suitcase w-6"></i>
                                    <span>Browse Packages</span>
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('user.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center p-3 rounded-lg hover:bg-red-50 text-gray-700 hover:text-red-600 transition">
                                        <i class="fas fa-sign-out-alt w-6"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Recent Bookings -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fas fa-calendar-alt text-primary-600 mr-2"></i>Recent Bookings
                        </h3>
                        @if($bookings && $bookings->count() > 0)
                            <div class="space-y-4">
                                @foreach($bookings as $booking)
                                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $booking->package->title ?? 'Package' }}</p>
                                            <p class="text-sm text-gray-500">{{ $booking->booking_number }} • {{ $booking->travel_date ? \Carbon\Carbon::parse($booking->travel_date)->format('d M Y') : 'N/A' }}</p>
                                        </div>
                                        <div class="text-right">
                                            <span class="inline-block px-3 py-1 rounded-full text-xs font-medium 
                                                @if($booking->status === 'confirmed') bg-green-100 text-green-700
                                                @elseif($booking->status === 'pending') bg-yellow-100 text-yellow-700
                                                @elseif($booking->status === 'cancelled') bg-red-100 text-red-700
                                                @else bg-blue-100 text-blue-700 @endif">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                            <p class="text-sm font-semibold text-gray-800 mt-1">₹{{ number_format($booking->total_amount, 2) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8 text-gray-500">
                                <i class="fas fa-suitcase-rolling text-4xl mb-3"></i>
                                <p>No bookings yet. Start exploring!</p>
                                <a href="{{ route('packages.index') }}" class="inline-block mt-4 text-primary-600 hover:text-primary-700 font-medium">
                                    Browse Packages →
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Update Profile -->
                    <div id="profile-section" class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fas fa-user-edit text-primary-600 mr-2"></i>Update Profile
                        </h3>
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="+91 9876543210">
                            </div>
                            
                            <button type="submit" class="mt-4 bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition">
                                <i class="fas fa-save mr-2"></i>Update Profile
                            </button>
                        </form>
                    </div>
                    
                    <!-- Change Password -->
                    <div id="password-section" class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fas fa-lock text-primary-600 mr-2"></i>Change Password
                        </h3>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                    @error('current_password')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                                    <input type="password" id="password" name="password" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                </div>
                            </div>
                            
                            <button type="submit" class="mt-4 bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition">
                                <i class="fas fa-key mr-2"></i>Change Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
