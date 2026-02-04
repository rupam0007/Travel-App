@extends('layouts.app')

@section('title', 'Vraman - Explore Incredible India')

@section('content')
<!-- Hero Slider Section -->
<section class="relative h-[600px] md:h-[700px]">
    <div class="swiper hero-swiper h-full">
        <div class="swiper-wrapper">
            @forelse($sliders as $slider)
            <div class="swiper-slide relative">
                <img src="{{ $slider->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1920' }}" alt="{{ $slider->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-4 animate-float">{{ $slider->title }}</h1>
                        @if($slider->subtitle)
                        <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">{{ $slider->subtitle }}</p>
                        @endif
                        @if($slider->button_text)
                        <a href="{{ $slider->button_link ?? route('packages.index') }}" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-primary-700 transition">
                            {{ $slider->button_text }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <!-- Default Slides -->
            <div class="swiper-slide relative">
                <img src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1920" alt="Taj Mahal" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-4 animate-float">Let us plan your perfect<br>India Holiday</h1>
                        <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">Discover the magic of incredible India with customized tour packages</p>
                        <a href="{{ route('packages.index') }}" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-primary-700 transition">
                            Explore Packages
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide relative">
                <img src="https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=1920" alt="Kerala" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-4">Experience Kerala's Beauty</h1>
                        <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">God's Own Country awaits you</p>
                        <a href="{{ route('packages.index') }}" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-primary-700 transition">
                            Explore Kerala
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide relative">
                <img src="https://images.unsplash.com/photo-1477587458883-47145ed94245?w=1920" alt="Rajasthan" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h1 class="text-4xl md:text-6xl font-bold mb-4">Royal Rajasthan Tour</h1>
                        <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">Explore the land of kings and forts</p>
                        <a href="{{ route('packages.index') }}" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-primary-700 transition">
                            Discover Rajasthan
                        </a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next !text-white"></div>
        <div class="swiper-button-prev !text-white"></div>
    </div>

    <!-- Search Form Overlay -->
    <div class="absolute bottom-0 left-0 right-0 transform translate-y-1/2 z-10 px-4">
        <div class="container mx-auto">
            <div class="bg-white rounded-xl shadow-2xl p-6 max-w-4xl mx-auto">
                <form action="{{ route('search') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Where do you want to go?</label>
                        <input type="text" name="q" placeholder="Search destinations, packages..." class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Travel Date</label>
                        <input type="date" name="date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-primary-600 text-white py-3 px-6 rounded-lg hover:bg-primary-700 transition font-semibold">
                            <i class="fas fa-search mr-2"></i>Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Spacer for search form -->
<div class="h-24 md:h-16"></div>

<!-- Explore Destinations by Region -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Explore Top Destinations by Region</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">India's diverse geography offers unique experiences in every region. Choose your adventure!</p>
        </div>

        <!-- Region Tabs -->
        <div class="flex flex-wrap justify-center gap-2 mb-10">
            @php
                $defaultRegions = ['North India', 'South India', 'East India', 'West India', 'Central India'];
            @endphp
            @forelse($regions as $index => $region)
            <button class="region-tab px-6 py-2 rounded-full font-medium transition {{ $index === 0 ? 'bg-primary-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}" data-region="{{ $region->slug }}">
                {{ $region->name }}
            </button>
            @empty
            @foreach($defaultRegions as $index => $regionName)
            <button class="region-tab px-6 py-2 rounded-full font-medium transition {{ $index === 0 ? 'bg-primary-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                {{ $regionName }}
            </button>
            @endforeach
            @endforelse
        </div>

        <!-- Destinations Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($trendingDestinations as $destination)
            <a href="{{ route('destinations.show', $destination) }}" class="group relative rounded-xl overflow-hidden card-hover transition duration-300">
                <img src="{{ $destination->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400' }}" alt="{{ $destination->name }}" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h3 class="text-white font-semibold text-lg">{{ $destination->name }}</h3>
                    <p class="text-primary-300 text-sm">{{ $destination->packages_count }}+ Packages</p>
                </div>
            </a>
            @empty
            @php
                $defaultDestinations = [
                    ['name' => 'Uttarakhand', 'packages' => '50+', 'image' => 'https://images.unsplash.com/photo-1626621341517-bbf3d9990a23?w=400'],
                    ['name' => 'Rajasthan', 'packages' => '30+', 'image' => 'https://images.unsplash.com/photo-1477587458883-47145ed94245?w=400'],
                    ['name' => 'Himachal', 'packages' => '60+', 'image' => 'https://images.unsplash.com/photo-1597074866923-dc0589150a81?w=400'],
                    ['name' => 'Jammu & Kashmir', 'packages' => '30+', 'image' => 'https://images.unsplash.com/photo-1595815771614-ade9d652a65d?w=400'],
                    ['name' => 'Kerala', 'packages' => '40+', 'image' => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=400'],
                    ['name' => 'Goa', 'packages' => '25+', 'image' => 'https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?w=400'],
                    ['name' => 'Ladakh', 'packages' => '25+', 'image' => 'https://images.unsplash.com/photo-1537970093676-eb4d16e4c85a?w=400'],
                    ['name' => 'Sikkim', 'packages' => '40+', 'image' => 'https://images.unsplash.com/photo-1622308644420-b20142dc993c?w=400'],
                ];
            @endphp
            @foreach($defaultDestinations as $dest)
            <a href="{{ route('destinations.index') }}" class="group relative rounded-xl overflow-hidden card-hover transition duration-300">
                <img src="{{ $dest['image'] }}" alt="{{ $dest['name'] }}" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h3 class="text-white font-semibold text-lg">{{ $dest['name'] }}</h3>
                    <p class="text-primary-300 text-sm">{{ $dest['packages'] }} Packages</p>
                </div>
            </a>
            @endforeach
            @endforelse
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('destinations.index') }}" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 transition">
                View All Destinations <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Packages By Interest -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Packages By Interest</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Choose from a variety of curated packages based on your travel preferences</p>
        </div>

        <!-- Category Tabs -->
        <div class="flex flex-wrap justify-center gap-2 mb-10">
            @php
                $defaultCategories = [
                    ['name' => 'Wildlife', 'icon' => 'fa-paw'],
                    ['name' => 'Hill Station', 'icon' => 'fa-mountain'],
                    ['name' => 'Pilgrimage', 'icon' => 'fa-om'],
                    ['name' => 'Heritage', 'icon' => 'fa-landmark'],
                    ['name' => 'Beach', 'icon' => 'fa-umbrella-beach'],
                    ['name' => 'Honeymoon', 'icon' => 'fa-heart'],
                    ['name' => 'Adventure', 'icon' => 'fa-hiking'],
                    ['name' => 'Trekking', 'icon' => 'fa-person-hiking'],
                ];
            @endphp
            @forelse($categories as $index => $category)
            <button class="category-tab px-5 py-2 rounded-full font-medium transition flex items-center gap-2 {{ $index === 0 ? 'bg-primary-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100 shadow-sm' }}" data-category="{{ $category->slug }}">
                <i class="fas {{ $category->icon ?? 'fa-map-marker-alt' }}"></i>
                {{ $category->name }}
            </button>
            @empty
            @foreach($defaultCategories as $index => $cat)
            <button class="category-tab px-5 py-2 rounded-full font-medium transition flex items-center gap-2 {{ $index === 0 ? 'bg-primary-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100 shadow-sm' }}">
                <i class="fas {{ $cat['icon'] }}"></i>
                {{ $cat['name'] }}
            </button>
            @endforeach
            @endforelse
        </div>

        <!-- Packages Slider -->
        <div class="swiper packages-swiper">
            <div class="swiper-wrapper pb-12">
                @forelse($featuredPackages as $package)
                <div class="swiper-slide">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover transition duration-300">
                        <div class="relative">
                            <img src="{{ $package->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400' }}" alt="{{ $package->name }}" class="w-full h-52 object-cover">
                            <div class="absolute top-4 left-4 bg-primary-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $package->duration }}
                            </div>
                            @if($package->discount_percentage > 0)
                            <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $package->discount_percentage }}% OFF
                            </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <h3 class="font-semibold text-lg text-gray-800 mb-2">{{ $package->name }}</h3>
                            <p class="text-gray-500 text-sm mb-3">{{ Str::limit($package->short_description, 60) }}</p>
                            <div class="flex items-center justify-between">
                                <div>
                                    @if($package->original_price)
                                    <span class="text-gray-400 line-through text-sm">₹{{ number_format($package->original_price) }}</span>
                                    @endif
                                    <span class="text-primary-600 font-bold text-lg">₹{{ number_format($package->price) }}</span>
                                    <span class="text-gray-500 text-sm">/person</span>
                                </div>
                                <div class="flex items-center text-yellow-500">
                                    <i class="fas fa-star text-sm"></i>
                                    <span class="ml-1 text-gray-700 text-sm">{{ $package->rating }} ({{ $package->reviews_count }})</span>
                                </div>
                            </div>
                            <a href="{{ route('packages.show', $package) }}" class="mt-4 block text-center bg-primary-50 text-primary-600 py-2 rounded-lg font-medium hover:bg-primary-100 transition">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                @php
                    $defaultPackages = [
                        ['name' => 'India Tiger Tour', 'duration' => '13N/14D', 'price' => 85000, 'rating' => 4.8, 'reviews' => 45, 'image' => 'https://images.unsplash.com/photo-1561731216-c3a4d99437d5?w=400'],
                        ['name' => 'Golden Triangle with Tigers', 'duration' => '9N/10D', 'price' => 45000, 'rating' => 4.9, 'reviews' => 78, 'image' => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400'],
                        ['name' => 'Kerala Backwaters', 'duration' => '6N/7D', 'price' => 35000, 'rating' => 4.7, 'reviews' => 120, 'image' => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=400'],
                        ['name' => 'Rajasthan Royal Tour', 'duration' => '10N/11D', 'price' => 55000, 'rating' => 4.8, 'reviews' => 92, 'image' => 'https://images.unsplash.com/photo-1477587458883-47145ed94245?w=400'],
                        ['name' => 'Ladakh Adventure', 'duration' => '7N/8D', 'price' => 42000, 'rating' => 4.9, 'reviews' => 65, 'image' => 'https://images.unsplash.com/photo-1537970093676-eb4d16e4c85a?w=400'],
                        ['name' => 'Goa Beach Holiday', 'duration' => '4N/5D', 'price' => 22000, 'rating' => 4.6, 'reviews' => 156, 'image' => 'https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?w=400'],
                    ];
                @endphp
                @foreach($defaultPackages as $pkg)
                <div class="swiper-slide">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover transition duration-300">
                        <div class="relative">
                            <img src="{{ $pkg['image'] }}" alt="{{ $pkg['name'] }}" class="w-full h-52 object-cover">
                            <div class="absolute top-4 left-4 bg-primary-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $pkg['duration'] }}
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-semibold text-lg text-gray-800 mb-2">{{ $pkg['name'] }}</h3>
                            <p class="text-gray-500 text-sm mb-3">Experience the best of India with our curated tour package</p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-primary-600 font-bold text-lg">₹{{ number_format($pkg['price']) }}</span>
                                    <span class="text-gray-500 text-sm">/person</span>
                                </div>
                                <div class="flex items-center text-yellow-500">
                                    <i class="fas fa-star text-sm"></i>
                                    <span class="ml-1 text-gray-700 text-sm">{{ $pkg['rating'] }} ({{ $pkg['reviews'] }})</span>
                                </div>
                            </div>
                            <a href="{{ route('packages.index') }}" class="mt-4 block text-center bg-primary-50 text-primary-600 py-2 rounded-lg font-medium hover:bg-primary-100 transition">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('packages.index') }}" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-primary-700 transition">
                View All Packages
            </a>
        </div>
    </div>
</section>

<!-- Holidays by Interest -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Holidays by Interest</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Explore our diverse range of holiday experiences tailored to your preferences</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @php
                $interests = [
                    ['name' => 'Wildlife Tours', 'icon' => 'fa-paw', 'image' => 'https://images.unsplash.com/photo-1561731216-c3a4d99437d5?w=300', 'color' => 'from-orange-500 to-amber-500'],
                    ['name' => 'Heritage Tours', 'icon' => 'fa-landmark', 'image' => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=300', 'color' => 'from-amber-600 to-yellow-500'],
                    ['name' => 'Honeymoon Tours', 'icon' => 'fa-heart', 'image' => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=300', 'color' => 'from-pink-500 to-rose-500'],
                    ['name' => 'Adventure Tours', 'icon' => 'fa-hiking', 'image' => 'https://images.unsplash.com/photo-1537970093676-eb4d16e4c85a?w=300', 'color' => 'from-emerald-500 to-teal-500'],
                    ['name' => 'Beach Tours', 'icon' => 'fa-umbrella-beach', 'image' => 'https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?w=300', 'color' => 'from-cyan-500 to-blue-500'],
                    ['name' => 'Pilgrimage Tours', 'icon' => 'fa-om', 'image' => 'https://images.unsplash.com/photo-1561361513-2d000a50f0dc?w=300', 'color' => 'from-purple-500 to-indigo-500'],
                ];
            @endphp
            @foreach($interests as $interest)
            <a href="{{ route('packages.index', ['category' => Str::slug($interest['name'])]) }}" class="group relative rounded-2xl overflow-hidden h-64 card-hover transition duration-300">
                <img src="{{ $interest['image'] }}" alt="{{ $interest['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t {{ $interest['color'] }} opacity-70"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center text-white p-4">
                    <i class="fas {{ $interest['icon'] }} text-4xl mb-3"></i>
                    <h3 class="font-semibold text-center">{{ $interest['name'] }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Top Weekend Destinations -->
<section class="py-16 bg-gradient-to-br from-primary-600 to-primary-800 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Top Weekend Destinations</h2>
            <p class="max-w-2xl mx-auto opacity-90">Perfect getaways for a quick refreshing break from the city hustle</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $weekendTrips = [
                    ['city' => 'Delhi', 'packages' => 25, 'image' => 'https://images.unsplash.com/photo-1587474260584-136574528ed5?w=400'],
                    ['city' => 'Mumbai', 'packages' => 20, 'image' => 'https://images.unsplash.com/photo-1570168007204-dfb528c6958f?w=400'],
                    ['city' => 'Bangalore', 'packages' => 25, 'image' => 'https://images.unsplash.com/photo-1596176530529-78163a4f7af2?w=400'],
                ];
            @endphp
            @foreach($weekendTrips as $trip)
            <a href="{{ route('packages.index') }}" class="group relative rounded-2xl overflow-hidden h-72 card-hover transition duration-300">
                <img src="{{ $trip['image'] }}" alt="{{ $trip['city'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <p class="text-primary-300 font-medium">{{ $trip['packages'] }} Tour Packages</p>
                    <h3 class="text-2xl font-bold">Weekend Trips From {{ $trip['city'] }}</h3>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('packages.index') }}" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
                View All Weekend Tours
            </a>
        </div>
    </div>
</section>

<!-- International Holiday Packages -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">International Holiday Packages</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Explore the world with our specially curated international tour packages</p>
        </div>

        <div class="swiper international-swiper">
            <div class="swiper-wrapper pb-12">
                @php
                    $internationalDests = [
                        ['name' => 'Bhutan Tours', 'image' => 'https://images.unsplash.com/photo-1553856622-d1b352e24a4c?w=300'],
                        ['name' => 'Thailand Tours', 'image' => 'https://images.unsplash.com/photo-1528181304800-259b08848526?w=300'],
                        ['name' => 'Nepal Tours', 'image' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?w=300'],
                        ['name' => 'Dubai Tours', 'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=300'],
                        ['name' => 'Malaysia Tours', 'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=300'],
                        ['name' => 'Maldives Tours', 'image' => 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?w=300'],
                        ['name' => 'Singapore Tours', 'image' => 'https://images.unsplash.com/photo-1525625293386-3f8f99389edd?w=300'],
                        ['name' => 'Vietnam Tours', 'image' => 'https://images.unsplash.com/photo-1583417319070-4a69db38a482?w=300'],
                    ];
                @endphp
                @foreach($internationalDests as $dest)
                <div class="swiper-slide">
                    <a href="{{ route('packages.index') }}" class="block group">
                        <div class="relative rounded-xl overflow-hidden h-64 card-hover transition duration-300">
                            <img src="{{ $dest['image'] }}" alt="{{ $dest['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h3 class="text-white font-semibold text-lg">{{ $dest['name'] }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('packages.index') }}" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 transition">
                View All International Tours <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Top India Tourism Experiences -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Top India Tourism Experiences</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Discover the diverse experiences India has to offer</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $experiences = [
                    ['name' => 'Wildlife Tourism in India', 'type' => 'Travel Guide', 'image' => 'https://images.unsplash.com/photo-1561731216-c3a4d99437d5?w=400'],
                    ['name' => 'Hill Stations in India', 'type' => 'Travel Guide', 'image' => 'https://images.unsplash.com/photo-1626621341517-bbf3d9990a23?w=400'],
                    ['name' => 'Popular Beaches in India', 'type' => 'Travel Guide', 'image' => 'https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?w=400'],
                ];
            @endphp
            @foreach($experiences as $exp)
            <a href="{{ route('packages.index') }}" class="group relative rounded-2xl overflow-hidden h-80 card-hover transition duration-300">
                <img src="{{ $exp['image'] }}" alt="{{ $exp['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <span class="inline-block bg-primary-600 text-white text-xs px-3 py-1 rounded-full mb-3">{{ $exp['type'] }}</span>
                    <h3 class="text-white text-xl font-bold">{{ $exp['name'] }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Guest Reviews -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Guest Satisfaction is Our Goal</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Valuable Feedback Matters to Us</p>
        </div>

        <div class="swiper reviews-swiper">
            <div class="swiper-wrapper pb-12">
                @forelse($reviews as $review)
                <div class="swiper-slide">
                    <div class="bg-white rounded-xl p-6 shadow-lg h-full">
                        <div class="flex items-center mb-4">
                            @if($review->image)
                            <img src="{{ $review->image }}" alt="{{ $review->name }}" class="w-16 h-16 rounded-full object-cover">
                            @else
                            <div class="w-16 h-16 rounded-full bg-primary-100 flex items-center justify-center">
                                <span class="text-primary-600 text-2xl font-bold">{{ substr($review->name, 0, 1) }}</span>
                            </div>
                            @endif
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800">{{ $review->name }}</h4>
                                <p class="text-sm text-gray-500">{{ $review->location ?? 'India' }}</p>
                            </div>
                        </div>
                        <div class="flex mb-3">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $review->rating ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                            @endfor
                        </div>
                        @if($review->title)
                        <h5 class="font-semibold text-gray-800 mb-2">{{ $review->title }}</h5>
                        @endif
                        <p class="text-gray-600 text-sm">{{ Str::limit($review->review, 200) }}</p>
                        @if($review->travel_date)
                        <p class="text-gray-400 text-xs mt-4">{{ $review->travel_date->format('F Y') }}</p>
                        @endif
                    </div>
                </div>
                @empty
                @php
                    $defaultReviews = [
                        ['name' => 'Rahul Sharma', 'location' => 'Delhi', 'rating' => 5, 'title' => 'Amazing Experience!', 'review' => 'Had an incredible trip to Rajasthan. The team at Vraman made sure everything was perfectly arranged. Highly recommended!', 'date' => 'January 2026'],
                        ['name' => 'Priya Patel', 'location' => 'Mumbai', 'rating' => 5, 'title' => 'Perfect Kerala Trip', 'review' => 'Our honeymoon package to Kerala was absolutely magical. The houseboat stay was unforgettable. Thank you Vraman!', 'date' => 'December 2025'],
                        ['name' => 'Amit Singh', 'location' => 'Bangalore', 'rating' => 5, 'title' => 'Wildlife Safari Excellence', 'review' => 'The tiger safari at Ranthambore was a dream come true. Spotted 3 tigers! The guide was very knowledgeable.', 'date' => 'November 2025'],
                    ];
                @endphp
                @foreach($defaultReviews as $rev)
                <div class="swiper-slide">
                    <div class="bg-white rounded-xl p-6 shadow-lg h-full">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-primary-100 flex items-center justify-center">
                                <span class="text-primary-600 text-2xl font-bold">{{ substr($rev['name'], 0, 1) }}</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-800">{{ $rev['name'] }}</h4>
                                <p class="text-sm text-gray-500">{{ $rev['location'] }}</p>
                            </div>
                        </div>
                        <div class="flex mb-3">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $rev['rating'] ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                            @endfor
                        </div>
                        <h5 class="font-semibold text-gray-800 mb-2">{{ $rev['title'] }}</h5>
                        <p class="text-gray-600 text-sm">{{ $rev['review'] }}</p>
                        <p class="text-gray-400 text-xs mt-4">{{ $rev['date'] }}</p>
                    </div>
                </div>
                @endforeach
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Why Choose Us?</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Experience the Vraman difference</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center group">
                <div class="w-20 h-20 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-primary-600 transition">
                    <i class="fas fa-medal text-3xl text-primary-600 group-hover:text-white transition"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">20+ Years Experience</h3>
                <p class="text-gray-600">Boasting over two decades in the tourism and hospitality industry with invaluable experience.</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-primary-600 transition">
                    <i class="fas fa-users text-3xl text-primary-600 group-hover:text-white transition"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Expert Team</h3>
                <p class="text-gray-600">Our experienced team are destination experts for every location within India.</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-primary-600 transition">
                    <i class="fas fa-hotel text-3xl text-primary-600 group-hover:text-white transition"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Verified Hotels</h3>
                <p class="text-gray-600">Meticulously selected and verified high-grade hotels ensuring exceptional experience.</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-primary-600 transition">
                    <i class="fas fa-rupee-sign text-3xl text-primary-600 group-hover:text-white transition"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Value for Money</h3>
                <p class="text-gray-600">Hassle-free holiday packages designed with focus on value and unforgettable experiences.</p>
            </div>
        </div>
    </div>
</section>

<!-- About India Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">About Incredible India</h2>
                <p class="text-gray-600 mb-6">
                    Interesting and Intriguing, India offers incredible holiday experiences through its cultural, topography, and wildlife diversity. With these amazing and unique experiences, this south Asian country conveniently finds its way into the world tourism map as one of the finest destinations for a holistic vacation.
                </p>
                <p class="text-gray-600 mb-6">
                    India establishes its identity as the country of architectural masterpieces, making it an ideal travel destination to plan a heritage tour in the world. While Taj Mahal makes for the major draw on an India tour, there are a plethora of monuments and edifices displaying the fine architecture and grandiose of different eras.
                </p>
                <a href="{{ route('about') }}" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 transition">
                    Learn More About India <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1561361513-2d000a50f0dc?w=600" alt="Varanasi India" class="rounded-2xl shadow-2xl">
                <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-sun text-primary-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Climate</p>
                            <p class="font-semibold text-gray-800">Diverse Seasons</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Travel Stories -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Latest Travel Stories</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Get inspired by our travel guides and stories</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($blogs as $blog)
            <a href="{{ route('blogs.show', $blog) }}" class="group">
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover transition duration-300">
                    <img src="{{ $blog->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400' }}" alt="{{ $blog->title }}" class="w-full h-52 object-cover group-hover:scale-105 transition duration-500">
                    <div class="p-5">
                        <p class="text-primary-600 text-sm mb-2">{{ $blog->published_at ? $blog->published_at->format('F d, Y') : '' }}</p>
                        <h3 class="font-semibold text-lg text-gray-800 group-hover:text-primary-600 transition">{{ $blog->title }}</h3>
                    </div>
                </div>
            </a>
            @empty
            @php
                $defaultBlogs = [
                    ['title' => 'Winter Tourism in India: 10 Best Skiing Destinations', 'date' => 'January 30, 2026', 'image' => 'https://images.unsplash.com/photo-1551524559-8af4e6624178?w=400'],
                    ['title' => 'The Ultimate 7-Day Andaman Itinerary', 'date' => 'January 27, 2026', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400'],
                    ['title' => '10 Best Winter Destinations in Western India', 'date' => 'January 22, 2026', 'image' => 'https://images.unsplash.com/photo-1568894031852-24a139e09ac1?w=400'],
                ];
            @endphp
            @foreach($defaultBlogs as $blog)
            <a href="{{ route('blogs.index') }}" class="group">
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover transition duration-300">
                    <img src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}" class="w-full h-52 object-cover group-hover:scale-105 transition duration-500">
                    <div class="p-5">
                        <p class="text-primary-600 text-sm mb-2">{{ $blog['date'] }}</p>
                        <h3 class="font-semibold text-lg text-gray-800 group-hover:text-primary-600 transition">{{ $blog['title'] }}</h3>
                    </div>
                </div>
            </a>
            @endforeach
            @endforelse
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('blogs.index') }}" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 transition">
                Read More Stories <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-600">Some frequently asked questions about India tourism & holiday packages</p>
            </div>

            <div class="space-y-4">
                <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                        <span class="font-semibold text-gray-800">What is the best time to travel to India?</span>
                        <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                    </button>
                    <div class="faq-answer hidden px-6 pb-6">
                        <p class="text-gray-600">The best time to travel to India depends on the places you would like to visit. However, the winter season (October - March) is mostly preferred by tourists. For wildlife sightings, both summer and winter seasons are favorable.</p>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                        <span class="font-semibold text-gray-800">What kind of clothes do I need to carry while traveling to India?</span>
                        <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                    </button>
                    <div class="faq-answer hidden px-6 pb-6">
                        <p class="text-gray-600">It depends on the season and region you're visiting. For winters in North India, carry warm clothes. For summers, light cotton clothes are recommended. For beaches and coastal areas, casual summer wear is ideal.</p>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                        <span class="font-semibold text-gray-800">Is India a safe place to travel with kids?</span>
                        <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                    </button>
                    <div class="faq-answer hidden px-6 pb-6">
                        <p class="text-gray-600">Yes, India is generally safe for family travel. Many destinations are kid-friendly with proper amenities. We recommend family-specific packages that cater to the needs of traveling with children.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('faq') }}" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 transition">
                    View All FAQs <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-primary-600 to-primary-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready for Your Next Adventure?</h2>
        <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">Let us help you plan your perfect India holiday. Get customized packages tailored to your preferences.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('packages.index') }}" class="inline-block bg-white text-primary-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
                Explore Packages
            </a>
            <button onclick="openEnquiryModal()" class="inline-block border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-primary-600 transition">
                Plan Your Trip
            </button>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Hero Swiper
    new Swiper('.hero-swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    // Packages Swiper
    new Swiper('.packages-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
            1280: {
                slidesPerView: 4,
            },
        },
    });

    // International Swiper
    new Swiper('.international-swiper', {
        slidesPerView: 2,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 5,
            },
            1280: {
                slidesPerView: 6,
            },
        },
    });

    // Reviews Swiper
    new Swiper('.reviews-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });

    // FAQ Toggle
    function toggleFaq(button) {
        const item = button.closest('.faq-item');
        const answer = item.querySelector('.faq-answer');
        const icon = button.querySelector('i');
        
        answer.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }

    // Region Tabs
    document.querySelectorAll('.region-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.region-tab').forEach(t => {
                t.classList.remove('bg-primary-600', 'text-white');
                t.classList.add('bg-gray-100', 'text-gray-700');
            });
            this.classList.remove('bg-gray-100', 'text-gray-700');
            this.classList.add('bg-primary-600', 'text-white');
        });
    });

    // Category Tabs
    document.querySelectorAll('.category-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.category-tab').forEach(t => {
                t.classList.remove('bg-primary-600', 'text-white');
                t.classList.add('bg-white', 'text-gray-700');
            });
            this.classList.remove('bg-white', 'text-gray-700');
            this.classList.add('bg-primary-600', 'text-white');
        });
    });
</script>
@endpush
