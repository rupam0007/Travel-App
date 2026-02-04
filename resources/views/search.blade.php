@extends('layouts.app')

@section('title', 'Search Results - Vraman')

@section('content')
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Search Results for "{{ $query }}"</h1>
            <p class="text-gray-600">Found {{ $packages->total() }} packages and {{ $destinations->count() }} destinations</p>
        </div>

        @if($destinations->count() > 0)
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Destinations</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($destinations as $destination)
                <a href="{{ route('destinations.show', $destination) }}" class="group relative rounded-xl overflow-hidden h-40">
                    <img src="{{ $destination->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400' }}" alt="{{ $destination->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-4">
                        <h3 class="text-white font-semibold">{{ $destination->name }}</h3>
                        <p class="text-primary-300 text-sm">{{ $destination->packages_count }}+ Packages</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        @if($packages->count() > 0)
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tour Packages</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($packages as $package)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover transition duration-300">
                    <div class="relative">
                        <img src="{{ $package->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400' }}" alt="{{ $package->name }}" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4 bg-primary-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                            {{ $package->nights }}N/{{ $package->days }}D
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">{{ $package->destination->name ?? 'India' }}</span>
                        <h3 class="font-semibold text-lg text-gray-800 mt-2 mb-2">{{ $package->name }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-primary-600 font-bold text-lg">₹{{ number_format($package->price) }}</span>
                            <div class="flex items-center text-yellow-500 text-sm">
                                <i class="fas fa-star"></i>
                                <span class="ml-1 text-gray-700">{{ $package->rating }}</span>
                            </div>
                        </div>
                        <a href="{{ route('packages.show', $package) }}" class="mt-4 block text-center bg-primary-50 text-primary-600 py-2 rounded-lg font-medium hover:bg-primary-100 transition">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $packages->withQueryString()->links() }}
            </div>
        </div>
        @endif

        @if($packages->count() == 0 && $destinations->count() == 0)
        <div class="text-center py-16">
            <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No results found</h3>
            <p class="text-gray-500 mb-6">Try different keywords or browse our packages</p>
            <a href="{{ route('packages.index') }}" class="inline-block bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition">
                View All Packages
            </a>
        </div>
        @endif
    </div>
</section>
@endsection
