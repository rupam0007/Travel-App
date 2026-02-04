<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Vraman - Your Perfect Travel Partner')</title>
    <meta name="description" content="@yield('meta_description', 'Discover incredible India with Vraman. Book customized tour packages, explore destinations, and create unforgettable memories.')">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        },
                        secondary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .gradient-overlay {
            background: linear-gradient(180deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.6) 100%);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 50%, #c2410c 100%);
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .nav-link:hover {
            color: #f97316;
        }
        .swiper-pagination-bullet-active {
            background: #f97316 !important;
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Top Bar -->
    <div class="bg-gray-900 text-white py-2 text-sm hidden md:block">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <span><i class="fas fa-phone-alt mr-2"></i>+91 9876543210</span>
                <span><i class="fas fa-envelope mr-2"></i>info@vraman.com</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="hover:text-primary-400"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-primary-400"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-primary-400"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-primary-400"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-700 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-xl">V</span>
                    </div>
                    <span class="text-2xl font-bold text-gray-800">Vraman</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="nav-link text-gray-700 font-medium hover:text-primary-600 transition">Home</a>
                    <div class="relative group">
                        <a href="{{ route('destinations.index') }}" class="nav-link text-gray-700 font-medium hover:text-primary-600 transition flex items-center">
                            Destinations <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </a>
                        <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="py-2">
                                <a href="{{ route('destinations.index', ['region' => 'north-india']) }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">North India</a>
                                <a href="{{ route('destinations.index', ['region' => 'south-india']) }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">South India</a>
                                <a href="{{ route('destinations.index', ['region' => 'east-india']) }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">East India</a>
                                <a href="{{ route('destinations.index', ['region' => 'west-india']) }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">West India</a>
                                <a href="{{ route('destinations.index', ['region' => 'central-india']) }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">Central India</a>
                            </div>
                        </div>
                    </div>
                    <div class="relative group">
                        <a href="{{ route('packages.index') }}" class="nav-link text-gray-700 font-medium hover:text-primary-600 transition flex items-center">
                            Packages <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </a>
                        <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="py-2">
                                <a href="{{ route('packages.index', ['category' => 'wildlife']) }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">Wildlife Tours</a>
                                <a href="{{ route('packages.index', ['category' => 'heritage']) }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">Heritage Tours</a>
                                <a href="{{ route('packages.index', ['category' => 'honeymoon']) }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">Honeymoon Tours</a>
                                <a href="{{ route('packages.index', ['category' => 'adventure']) }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">Adventure Tours</a>
                                <a href="{{ route('packages.index', ['category' => 'pilgrimage']) }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">Pilgrimage Tours</a>
                                <a href="{{ route('packages.index', ['category' => 'beach']) }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">Beach Tours</a>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('blogs.index') }}" class="nav-link text-gray-700 font-medium hover:text-primary-600 transition">Blog</a>
                    <a href="{{ route('about') }}" class="nav-link text-gray-700 font-medium hover:text-primary-600 transition">About Us</a>
                    <a href="{{ route('contact') }}" class="nav-link text-gray-700 font-medium hover:text-primary-600 transition">Contact</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="{{ route('bookings.track') }}" class="text-gray-700 hover:text-primary-600 transition">
                        <i class="fas fa-search mr-1"></i> Track Booking
                    </a>
                    <a href="#enquiry-modal" onclick="openEnquiryModal()" class="bg-primary-600 text-white px-6 py-2 rounded-full hover:bg-primary-700 transition font-medium">
                        Plan Your Trip
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden text-gray-700 text-2xl">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="lg:hidden hidden pb-4">
                <a href="{{ route('home') }}" class="block py-2 text-gray-700 hover:text-primary-600">Home</a>
                <a href="{{ route('destinations.index') }}" class="block py-2 text-gray-700 hover:text-primary-600">Destinations</a>
                <a href="{{ route('packages.index') }}" class="block py-2 text-gray-700 hover:text-primary-600">Packages</a>
                <a href="{{ route('blogs.index') }}" class="block py-2 text-gray-700 hover:text-primary-600">Blog</a>
                <a href="{{ route('about') }}" class="block py-2 text-gray-700 hover:text-primary-600">About Us</a>
                <a href="{{ route('contact') }}" class="block py-2 text-gray-700 hover:text-primary-600">Contact</a>
                <a href="{{ route('bookings.track') }}" class="block py-2 text-gray-700 hover:text-primary-600">Track Booking</a>
                <a href="#" onclick="openEnquiryModal()" class="mt-3 inline-block bg-primary-600 text-white px-6 py-2 rounded-full">Plan Your Trip</a>
            </div>
        </nav>
    </header>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative container mx-auto mt-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
        <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative container mx-auto mt-4" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
        <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-700 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-xl">V</span>
                        </div>
                        <span class="text-2xl font-bold">Vraman</span>
                    </div>
                    <p class="text-gray-400 mb-6">Your perfect travel partner for exploring incredible India. We offer customized tour packages for unforgettable experiences.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-600 transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-primary-500 transition">About Us</a></li>
                        <li><a href="{{ route('packages.index') }}" class="text-gray-400 hover:text-primary-500 transition">Tour Packages</a></li>
                        <li><a href="{{ route('destinations.index') }}" class="text-gray-400 hover:text-primary-500 transition">Destinations</a></li>
                        <li><a href="{{ route('blogs.index') }}" class="text-gray-400 hover:text-primary-500 transition">Travel Blog</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-primary-500 transition">Contact Us</a></li>
                        <li><a href="{{ route('faq') }}" class="text-gray-400 hover:text-primary-500 transition">FAQ</a></li>
                    </ul>
                </div>

                <!-- Popular Destinations -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Popular Destinations</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-primary-500 transition">Rajasthan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-500 transition">Kerala</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-500 transition">Goa</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-500 transition">Himachal Pradesh</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-500 transition">Uttarakhand</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary-500 transition">Kashmir</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Contact Us</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-primary-500"></i>
                            <span class="text-gray-400">123 Travel Street, New Delhi - 110001, India</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3 text-primary-500"></i>
                            <span class="text-gray-400">+91 9876543210</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-primary-500"></i>
                            <span class="text-gray-400">info@vraman.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fab fa-whatsapp mr-3 text-primary-500"></i>
                            <span class="text-gray-400">+91 9876543210</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">© {{ date('Y') }} Vraman. All rights reserved.</p>
                    <div class="flex space-x-6 text-sm">
                        <a href="{{ route('terms') }}" class="text-gray-400 hover:text-primary-500 transition">Terms & Conditions</a>
                        <a href="{{ route('privacy') }}" class="text-gray-400 hover:text-primary-500 transition">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Enquiry Modal -->
    <div id="enquiry-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl max-w-md w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Plan Your Trip</h3>
                    <button onclick="closeEnquiryModal()" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <form action="{{ route('enquiry.store') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                            <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                            <input type="tel" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Travel Date</label>
                            <input type="date" name="travel_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Number of Travelers</label>
                            <input type="number" name="travelers" min="1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea name="message" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-primary-600 text-white py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
                            Submit Enquiry
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 bg-primary-600 text-white rounded-full shadow-lg hidden items-center justify-center hover:bg-primary-700 transition z-40">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/919876543210" target="_blank" class="fixed bottom-8 left-8 w-14 h-14 bg-green-500 text-white rounded-full shadow-lg flex items-center justify-center hover:bg-green-600 transition z-40">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Enquiry Modal
        function openEnquiryModal() {
            document.getElementById('enquiry-modal').classList.remove('hidden');
            document.getElementById('enquiry-modal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeEnquiryModal() {
            document.getElementById('enquiry-modal').classList.add('hidden');
            document.getElementById('enquiry-modal').classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // Close modal on outside click
        document.getElementById('enquiry-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEnquiryModal();
            }
        });

        // Back to Top Button
        const backToTop = document.getElementById('back-to-top');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('hidden');
                backToTop.classList.add('flex');
            } else {
                backToTop.classList.add('hidden');
                backToTop.classList.remove('flex');
            }
        });

        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

    @stack('scripts')
</body>
</html>
