@extends('layouts.app')

@section('title', 'About Us - Vraman')

@section('content')
<!-- Hero Section -->
<section class="relative h-80">
    <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=1920" alt="Travel" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex items-center">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">About Vraman</h1>
            <p class="text-xl max-w-2xl mx-auto">Your trusted travel partner for exploring incredible India</p>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Story</h2>
                <p class="text-gray-600 mb-4">
                    Founded with a passion for travel and a deep love for India's rich cultural heritage, Vraman has been helping travelers discover the magic of incredible India for over two decades.
                </p>
                <p class="text-gray-600 mb-4">
                    What started as a small travel consultancy has grown into one of the most trusted names in Indian tourism. Our journey has been marked by an unwavering commitment to quality, personalized service, and creating memorable experiences for every traveler.
                </p>
                <p class="text-gray-600">
                    At Vraman, we believe that travel is not just about visiting places; it's about immersing yourself in new cultures, creating lasting memories, and discovering the beauty that exists in diversity.
                </p>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=600" alt="Taj Mahal" class="rounded-2xl shadow-2xl">
                <div class="absolute -bottom-6 -left-6 bg-primary-600 text-white p-6 rounded-xl">
                    <div class="text-4xl font-bold">20+</div>
                    <div class="text-sm">Years of Experience</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-16 bg-primary-600 text-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-5xl font-bold mb-2">50K+</div>
                <div class="text-primary-100">Happy Travelers</div>
            </div>
            <div>
                <div class="text-5xl font-bold mb-2">500+</div>
                <div class="text-primary-100">Tour Packages</div>
            </div>
            <div>
                <div class="text-5xl font-bold mb-2">100+</div>
                <div class="text-primary-100">Destinations</div>
            </div>
            <div>
                <div class="text-5xl font-bold mb-2">4.8</div>
                <div class="text-primary-100">Average Rating</div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Why Choose Vraman?</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">We are committed to providing you with the best travel experience possible</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-medal text-primary-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">20+ Years Experience</h3>
                <p class="text-gray-600">With over two decades of experience, we have deep knowledge of every destination we offer.</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-users text-primary-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Expert Team</h3>
                <p class="text-gray-600">Our team of travel experts are passionate about creating perfect itineraries for you.</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-hotel text-primary-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Verified Hotels</h3>
                <p class="text-gray-600">All our partner hotels are personally verified to ensure quality and comfort.</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-rupee-sign text-primary-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Best Price Guarantee</h3>
                <p class="text-gray-600">We offer competitive prices without compromising on quality or experience.</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-headset text-primary-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">24/7 Support</h3>
                <p class="text-gray-600">Our support team is available round the clock to assist you during your trip.</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-shield-alt text-primary-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Safe & Secure</h3>
                <p class="text-gray-600">Your safety is our priority. All trips are planned with safety measures in mind.</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Mission -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-bullseye text-primary-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Our Mission</h3>
                <p class="text-gray-600">
                    To make travel accessible, enjoyable, and memorable for everyone. We strive to showcase the beauty and diversity of India while promoting sustainable tourism practices that benefit local communities.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-primary-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Our Vision</h3>
                <p class="text-gray-600">
                    To be the most trusted and preferred travel partner for exploring India, known for our commitment to excellence, innovation, and customer satisfaction.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Meet Our Team</h2>
            <p class="text-gray-600">Passionate travel experts dedicated to creating your perfect trip</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $team = [
                    ['name' => 'Rajesh Kumar', 'role' => 'Founder & CEO', 'image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=300'],
                    ['name' => 'Priya Sharma', 'role' => 'Head of Operations', 'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300'],
                    ['name' => 'Amit Patel', 'role' => 'Travel Expert', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=300'],
                    ['name' => 'Sneha Gupta', 'role' => 'Customer Relations', 'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=300'],
                ];
            @endphp
            @foreach($team as $member)
            <div class="text-center">
                <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-40 h-40 rounded-full object-cover mx-auto mb-4 shadow-lg">
                <h4 class="text-lg font-semibold text-gray-800">{{ $member['name'] }}</h4>
                <p class="text-primary-600">{{ $member['role'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-primary-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Start Your Journey?</h2>
        <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">Let us help you create memories that last a lifetime</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('packages.index') }}" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
                Explore Packages
            </a>
            <a href="{{ route('contact') }}" class="inline-block border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-primary-600 transition">
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection
