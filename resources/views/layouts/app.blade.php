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
        
        /* Page Loader Styles */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        .page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }
        .loader-logo {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            animation: pulse 1.5s ease-in-out infinite;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        .loader-logo span {
            font-size: 2.5rem;
            font-weight: 800;
            color: #f97316;
        }
        .loader-text {
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: 2px;
            margin-bottom: 30px;
        }
        .loader-spinner {
            display: flex;
            gap: 8px;
        }
        .loader-spinner span {
            width: 12px;
            height: 12px;
            background: white;
            border-radius: 50%;
            animation: bounce 1.4s ease-in-out infinite both;
        }
        .loader-spinner span:nth-child(1) { animation-delay: -0.32s; }
        .loader-spinner span:nth-child(2) { animation-delay: -0.16s; }
        .loader-spinner span:nth-child(3) { animation-delay: 0s; }
        @keyframes bounce {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 10px 40px rgba(0,0,0,0.2); }
            50% { transform: scale(1.05); box-shadow: 0 15px 50px rgba(0,0,0,0.3); }
        }
        
        /* Alert Styles */
        .alert-toast {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9998;
            min-width: 350px;
            max-width: 450px;
            padding: 16px 20px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            display: flex;
            align-items: flex-start;
            gap: 12px;
            animation: slideInRight 0.5s ease forwards;
            backdrop-filter: blur(10px);
        }
        .alert-toast.alert-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }
        .alert-toast.alert-error {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }
        .alert-toast.alert-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }
        .alert-toast.alert-info {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
        }
        .alert-toast .alert-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .alert-toast .alert-icon i {
            font-size: 1.25rem;
        }
        .alert-toast .alert-content {
            flex: 1;
        }
        .alert-toast .alert-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 4px;
        }
        .alert-toast .alert-message {
            font-size: 0.875rem;
            opacity: 0.9;
        }
        .alert-toast .alert-close {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: 4px;
            opacity: 0.7;
            transition: opacity 0.2s;
        }
        .alert-toast .alert-close:hover {
            opacity: 1;
        }
        .alert-toast .alert-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            background: rgba(255,255,255,0.3);
            border-radius: 0 0 12px 12px;
            animation: progressShrink 5s linear forwards;
        }
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOutRight {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        @keyframes progressShrink {
            from { width: 100%; }
            to { width: 0%; }
        }
        .alert-toast.closing {
            animation: slideOutRight 0.5s ease forwards;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-logo">
            <span>V</span>
        </div>
        <div class="loader-text">VRAMAN</div>
        <div class="loader-spinner">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

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
                    
                    @auth
                        <!-- User Dropdown -->
                        <div class="relative group">
                            <button class="flex items-center space-x-2 text-gray-700 hover:text-primary-600 transition">
                                <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                <div class="py-2">
                                    <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">
                                        <i class="fas fa-user mr-2"></i> My Profile
                                    </a>
                                    <a href="{{ route('bookings.track') }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">
                                        <i class="fas fa-calendar-check mr-2"></i> My Bookings
                                    </a>
                                    @if(Auth::user()->role === 'admin' || Auth::user()->is_admin)
                                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-primary-50 hover:text-primary-600">
                                            <i class="fas fa-cog mr-2"></i> Admin Panel
                                        </a>
                                    @endif
                                    <hr class="my-2">
                                    <form action="{{ route('user.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-red-50 hover:text-red-600">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary-600 transition font-medium">
                            <i class="fas fa-sign-in-alt mr-1"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-primary-600 text-white px-5 py-2 rounded-full hover:bg-primary-700 transition font-medium">
                            <i class="fas fa-user-plus mr-1"></i> Register
                        </a>
                    @endauth
                    
                    <a href="#enquiry-modal" onclick="openEnquiryModal()" class="bg-secondary-600 text-white px-6 py-2 rounded-full hover:bg-secondary-700 transition font-medium">
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
                
                <div class="border-t border-gray-200 my-3 pt-3">
                    @auth
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center text-white font-semibold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <a href="{{ route('profile') }}" class="block py-2 text-gray-700 hover:text-primary-600">
                            <i class="fas fa-user mr-2"></i> My Profile
                        </a>
                        @if(Auth::user()->role === 'admin' || Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="block py-2 text-gray-700 hover:text-primary-600">
                                <i class="fas fa-cog mr-2"></i> Admin Panel
                            </a>
                        @endif
                        <form action="{{ route('user.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="block w-full text-left py-2 text-red-600 hover:text-red-700">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block py-2 text-gray-700 hover:text-primary-600">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="block py-2 text-primary-600 font-medium">
                            <i class="fas fa-user-plus mr-2"></i> Create Account
                        </a>
                    @endauth
                </div>
                
                <a href="#" onclick="openEnquiryModal()" class="mt-3 inline-block bg-primary-600 text-white px-6 py-2 rounded-full">Plan Your Trip</a>
            </div>
        </nav>
    </header>

    <!-- Flash Messages - Toast Style -->
    @if(session('success'))
    <div class="alert-toast alert-success" id="successAlert">
        <div class="alert-icon">
            <i class="fas fa-check"></i>
        </div>
        <div class="alert-content">
            <div class="alert-title">Success!</div>
            <div class="alert-message">{{ session('success') }}</div>
        </div>
        <button class="alert-close" onclick="closeAlert(this)">
            <i class="fas fa-times"></i>
        </button>
        <div class="alert-progress"></div>
    </div>
    @endif

    @if(session('error'))
    <div class="alert-toast alert-error" id="errorAlert">
        <div class="alert-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="alert-content">
            <div class="alert-title">Error!</div>
            <div class="alert-message">{{ session('error') }}</div>
        </div>
        <button class="alert-close" onclick="closeAlert(this)">
            <i class="fas fa-times"></i>
        </button>
        <div class="alert-progress"></div>
    </div>
    @endif

    @if(session('warning'))
    <div class="alert-toast alert-warning" id="warningAlert">
        <div class="alert-icon">
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <div class="alert-content">
            <div class="alert-title">Warning!</div>
            <div class="alert-message">{{ session('warning') }}</div>
        </div>
        <button class="alert-close" onclick="closeAlert(this)">
            <i class="fas fa-times"></i>
        </button>
        <div class="alert-progress"></div>
    </div>
    @endif

    @if(session('info'))
    <div class="alert-toast alert-info" id="infoAlert">
        <div class="alert-icon">
            <i class="fas fa-info-circle"></i>
        </div>
        <div class="alert-content">
            <div class="alert-title">Info</div>
            <div class="alert-message">{{ session('info') }}</div>
        </div>
        <button class="alert-close" onclick="closeAlert(this)">
            <i class="fas fa-times"></i>
        </button>
        <div class="alert-progress"></div>
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
        // Page Loader
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('pageLoader').classList.add('hidden');
            }, 800);
        });

        // Alert Functions
        function closeAlert(button) {
            const alert = button.closest('.alert-toast');
            alert.classList.add('closing');
            setTimeout(() => alert.remove(), 500);
        }

        // Auto-dismiss alerts after 5 seconds
        document.querySelectorAll('.alert-toast').forEach(function(alert) {
            setTimeout(function() {
                if (alert && !alert.classList.contains('closing')) {
                    alert.classList.add('closing');
                    setTimeout(() => alert.remove(), 500);
                }
            }, 5000);
        });

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
