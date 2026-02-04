@extends('layouts.app')

@section('title', 'Contact Us - Vraman')

@section('content')
<!-- Hero Section -->
<section class="relative h-64 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Us</h1>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2">
                    <li><a href="{{ route('home') }}" class="text-gray-200 hover:text-white">Home</a></li>
                    <li><span class="text-gray-300">/</span></li>
                    <li><span class="text-white">Contact</span></li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contact Info -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Get in Touch</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-primary-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800">Office Address</h4>
                                <p class="text-gray-600">123 Travel Street, Sector 8,<br>New Delhi - 110001, India</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone-alt text-primary-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800">Phone</h4>
                                <p class="text-gray-600">+91 9876543210</p>
                                <p class="text-gray-600">+91 9876543211</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-primary-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800">Email</h4>
                                <p class="text-gray-600">info@vraman.com</p>
                                <p class="text-gray-600">support@vraman.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fab fa-whatsapp text-green-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800">WhatsApp</h4>
                                <p class="text-gray-600">+91 9876543210</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Business Hours</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Monday - Friday</span>
                            <span class="font-medium text-gray-800">9:00 AM - 7:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Saturday</span>
                            <span class="font-medium text-gray-800">10:00 AM - 5:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sunday</span>
                            <span class="font-medium text-gray-800">Closed</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Send us a Message</h3>
                    
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 @error('name') border-red-500 @enderror">
                                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 @error('email') border-red-500 @enderror">
                                @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Your Message *</label>
                            <textarea name="message" rows="6" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
                            <i class="fas fa-paper-plane mr-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Map -->
        <div class="mt-12">
            <div class="bg-white rounded-xl shadow-lg p-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.0667799723897!2d77.37484431508267!3d28.620659982419547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce50c6f96a7a3%3A0x74c97f7f55c37c13!2sSector%208%2C%20Noida%2C%20Uttar%20Pradesh%2C%20India!5e0!3m2!1sen!2sus!4v1634567890123!5m2!1sen!2sus" width="100%" height="400" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection
