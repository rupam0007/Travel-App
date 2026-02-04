@extends('layouts.app')

@section('title', 'Tour Packages - Vraman')

@section('content')
<!-- Hero Section -->
<section class="relative h-64 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Tour Packages</h1>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2">
                    <li><a href="{{ route('home') }}" class="text-gray-200 hover:text-white">Home</a></li>
                    <li><span class="text-gray-300">/</span></li>
                    <li><span class="text-white">Packages</span></li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <aside class="lg:w-1/4">
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Filter Packages</h3>
                    
                    <form action="{{ route('packages.index') }}" method="GET">
                        <!-- Category Filter -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-3">Category</h4>
                            <div class="space-y-2">
                                @foreach($categories as $category)
                                <label class="flex items-center">
                                    <input type="radio" name="category" value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'checked' : '' }} class="text-primary-600 focus:ring-primary-500">
                                    <span class="ml-2 text-gray-600">{{ $category->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Destination Filter -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-3">Destination</h4>
                            <select name="destination" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                                <option value="">All Destinations</option>
                                @foreach($destinations as $destination)
                                <option value="{{ $destination->slug }}" {{ request('destination') == $destination->slug ? 'selected' : '' }}>{{ $destination->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-3">Price Range</h4>
                            <div class="flex gap-2">
                                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-1/2 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-1/2 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-3">Duration (Nights)</h4>
                            <select name="duration" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                                <option value="">Any Duration</option>
                                <option value="3" {{ request('duration') == '3' ? 'selected' : '' }}>Up to 3 Nights</option>
                                <option value="5" {{ request('duration') == '5' ? 'selected' : '' }}>Up to 5 Nights</option>
                                <option value="7" {{ request('duration') == '7' ? 'selected' : '' }}>Up to 7 Nights</option>
                                <option value="10" {{ request('duration') == '10' ? 'selected' : '' }}>Up to 10 Nights</option>
                                <option value="14" {{ request('duration') == '14' ? 'selected' : '' }}>Up to 14 Nights</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-primary-600 text-white py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
                            Apply Filters
                        </button>
                        <a href="{{ route('packages.index') }}" class="block text-center mt-3 text-gray-600 hover:text-primary-600">Clear All</a>
                    </form>
                </div>
            </aside>

            <!-- Packages Grid -->
            <div class="lg:w-3/4">
                <!-- Sort Bar -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <p class="text-gray-600">
                        Showing <span class="font-semibold">{{ $packages->firstItem() ?? 0 }}-{{ $packages->lastItem() ?? 0 }}</span> of <span class="font-semibold">{{ $packages->total() }}</span> packages
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="text-gray-600">Sort by:</span>
                        <select onchange="window.location.href=this.value" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'popular']) }}" {{ request('sort', 'popular') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_low']) }}" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_high']) }}" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'rating']) }}" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating</option>
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                        </select>
                    </div>
                </div>

                @if($packages->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($packages as $package)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover transition duration-300">
                        <div class="relative">
                            <img src="{{ $package->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400' }}" alt="{{ $package->name }}" class="w-full h-52 object-cover">
                            <div class="absolute top-4 left-4 bg-primary-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $package->nights }}N/{{ $package->days }}D
                            </div>
                            @if($package->discount_percentage > 0)
                            <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $package->discount_percentage }}% OFF
                            </div>
                            @endif
                            @if($package->is_trending)
                            <div class="absolute bottom-4 left-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-medium">
                                <i class="fas fa-fire mr-1"></i>Trending
                            </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">{{ $package->destination->name ?? 'India' }}</span>
                                @if($package->category)
                                <span class="text-xs bg-primary-50 text-primary-600 px-2 py-1 rounded">{{ $package->category->name }}</span>
                                @endif
                            </div>
                            <h3 class="font-semibold text-lg text-gray-800 mb-2">{{ $package->name }}</h3>
                            <p class="text-gray-500 text-sm mb-3">{{ Str::limit($package->short_description, 60) }}</p>
                            
                            @if($package->highlights && count($package->highlights) > 0)
                            <div class="flex flex-wrap gap-1 mb-3">
                                @foreach(array_slice($package->highlights, 0, 3) as $highlight)
                                <span class="text-xs text-gray-500"><i class="fas fa-check text-green-500 mr-1"></i>{{ $highlight }}</span>
                                @endforeach
                            </div>
                            @endif

                            <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                <div>
                                    @if($package->original_price)
                                    <span class="text-gray-400 line-through text-sm">₹{{ number_format($package->original_price) }}</span>
                                    @endif
                                    <span class="text-primary-600 font-bold text-lg">₹{{ number_format($package->price) }}</span>
                                    <span class="text-gray-500 text-xs">/person</span>
                                </div>
                                <div class="flex items-center text-yellow-500">
                                    <i class="fas fa-star text-sm"></i>
                                    <span class="ml-1 text-gray-700 text-sm">{{ $package->rating }} ({{ $package->reviews_count }})</span>
                                </div>
                            </div>
                            <div class="flex gap-2 mt-4">
                                <a href="{{ route('packages.show', $package) }}" class="flex-1 text-center bg-primary-50 text-primary-600 py-2 rounded-lg font-medium hover:bg-primary-100 transition">
                                    View Details
                                </a>
                                <a href="{{ route('bookings.create', $package) }}" class="flex-1 text-center bg-primary-600 text-white py-2 rounded-lg font-medium hover:bg-primary-700 transition">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $packages->withQueryString()->links() }}
                </div>
                @else
                <div class="text-center py-16 bg-white rounded-xl shadow">
                    <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No packages found</h3>
                    <p class="text-gray-500 mb-4">Try adjusting your filters or search criteria</p>
                    <a href="{{ route('packages.index') }}" class="inline-block bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition">
                        View All Packages
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
