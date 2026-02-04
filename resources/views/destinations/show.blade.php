@extends('layouts.app')

@section('title', $destination->name . ' - Vraman')

@section('content')
<!-- Hero Section -->
<section class="relative h-96">
    <img src="{{ $destination->banner_image ?? $destination->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1920' }}" alt="{{ $destination->name }}" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex items-center">
        <div class="container mx-auto px-4">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-200 hover:text-white">Home</a></li>
                    <li><span class="text-gray-300">/</span></li>
                    <li><a href="{{ route('destinations.index') }}" class="text-gray-200 hover:text-white">Destinations</a></li>
                    <li><span class="text-gray-300">/</span></li>
                    <li><span class="text-white">{{ $destination->name }}</span></li>
                </ol>
            </nav>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $destination->name }}</h1>
            <div class="flex flex-wrap items-center gap-4 text-white">
                <span class="flex items-center"><i class="fas fa-map-marker-alt mr-2"></i>{{ $destination->region->name ?? 'India' }}</span>
                <span class="flex items-center"><i class="fas fa-box mr-2"></i>{{ $destination->packages_count }}+ Packages</span>
                @if($destination->best_time_to_visit)
                <span class="flex items-center"><i class="fas fa-calendar-alt mr-2"></i>Best Time: {{ $destination->best_time_to_visit }}</span>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <!-- About -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">About {{ $destination->name }}</h2>
                    <div class="prose max-w-none text-gray-600">
                        {!! $destination->description ?? '<p>' . $destination->short_description . '</p>' ?? '<p>Discover the beauty and culture of ' . $destination->name . '. This destination offers unique experiences for every traveler.</p>' !!}
                    </div>

                    @if($destination->climate)
                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <h4 class="font-semibold text-gray-800 mb-2"><i class="fas fa-cloud-sun text-blue-500 mr-2"></i>Climate</h4>
                        <p class="text-gray-600">{{ $destination->climate }}</p>
                    </div>
                    @endif
                </div>

                <!-- Packages -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Tour Packages</h2>
                        <a href="{{ route('packages.index', ['destination' => $destination->slug]) }}" class="text-primary-600 font-medium hover:text-primary-700">
                            View All <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    @if($destination->activePackages->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($destination->activePackages->take(4) as $package)
                        <div class="bg-gray-50 rounded-lg overflow-hidden">
                            <div class="flex">
                                <img src="{{ $package->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=200' }}" alt="{{ $package->name }}" class="w-32 h-32 object-cover">
                                <div class="p-4 flex-1">
                                    <h3 class="font-semibold text-gray-800 mb-1">{{ $package->name }}</h3>
                                    <p class="text-sm text-gray-500 mb-2">{{ $package->nights }}N / {{ $package->days }}D</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-primary-600 font-bold">₹{{ number_format($package->price) }}</span>
                                        <a href="{{ route('packages.show', $package) }}" class="text-sm text-primary-600 hover:text-primary-700">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-500 text-center py-8">No packages available for this destination yet.</p>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <!-- Quick Info -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Quick Info</h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt text-primary-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Region</p>
                                <p class="font-medium text-gray-800">{{ $destination->region->name ?? 'India' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-calendar-alt text-primary-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Best Time to Visit</p>
                                <p class="font-medium text-gray-800">{{ $destination->best_time_to_visit ?? 'Year Round' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-box text-primary-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Available Packages</p>
                                <p class="font-medium text-gray-800">{{ $destination->packages_count }}+</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enquiry Form -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Plan Your Trip</h3>
                    <form action="{{ route('enquiry.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                        <div class="space-y-4">
                            <input type="text" name="name" placeholder="Full Name *" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <input type="email" name="email" placeholder="Email *" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <input type="tel" name="phone" placeholder="Phone *" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <input type="date" name="travel_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            <select name="travelers" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                                <option value="">Number of Travelers</option>
                                @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'Person' : 'People' }}</option>
                                @endfor
                                <option value="10+">10+ People</option>
                            </select>
                            <textarea name="message" rows="3" placeholder="Your Message" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500"></textarea>
                            <button type="submit" class="w-full bg-primary-600 text-white py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
                                Send Enquiry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Related Destinations -->
        @if($relatedDestinations->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-8">Other Destinations in {{ $destination->region->name ?? 'this Region' }}</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($relatedDestinations as $related)
                <a href="{{ route('destinations.show', $related) }}" class="group relative rounded-xl overflow-hidden h-48 card-hover transition duration-300">
                    <img src="{{ $related->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400' }}" alt="{{ $related->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-4">
                        <h3 class="text-white font-semibold">{{ $related->name }}</h3>
                        <p class="text-primary-300 text-sm">{{ $related->packages_count }}+ Packages</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
