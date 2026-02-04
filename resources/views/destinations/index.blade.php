@extends('layouts.app')

@section('title', 'Destinations - Vraman')

@section('content')
<!-- Hero Section -->
<section class="relative h-64 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Explore Destinations</h1>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2">
                    <li><a href="{{ route('home') }}" class="text-gray-200 hover:text-white">Home</a></li>
                    <li><span class="text-gray-300">/</span></li>
                    <li><span class="text-white">Destinations</span></li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <!-- Region Filters -->
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <a href="{{ route('destinations.index') }}" class="px-6 py-2 rounded-full font-medium transition {{ !request('region') ? 'bg-primary-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                All Regions
            </a>
            @foreach($regions as $region)
            <a href="{{ route('destinations.index', ['region' => $region->slug]) }}" class="px-6 py-2 rounded-full font-medium transition {{ request('region') == $region->slug ? 'bg-primary-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                {{ $region->name }}
            </a>
            @endforeach
        </div>

        @if($destinations->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($destinations as $destination)
            <a href="{{ route('destinations.show', $destination) }}" class="group relative rounded-xl overflow-hidden h-64 card-hover transition duration-300 shadow-lg">
                <img src="{{ $destination->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400' }}" alt="{{ $destination->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute top-4 right-4">
                    @if($destination->is_trending)
                    <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">
                        <i class="fas fa-fire mr-1"></i>Trending
                    </span>
                    @endif
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-5">
                    <span class="text-primary-300 text-sm">{{ $destination->region->name ?? '' }}</span>
                    <h3 class="text-white font-bold text-xl mb-1">{{ $destination->name }}</h3>
                    <p class="text-gray-300 text-sm">{{ $destination->packages_count }}+ Tour Packages</p>
                    @if($destination->best_time_to_visit)
                    <p class="text-gray-400 text-xs mt-2">
                        <i class="fas fa-calendar-alt mr-1"></i>Best: {{ $destination->best_time_to_visit }}
                    </p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $destinations->withQueryString()->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <i class="fas fa-map-marker-alt text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No destinations found</h3>
            <p class="text-gray-500">Try selecting a different region</p>
        </div>
        @endif
    </div>
</section>
@endsection
