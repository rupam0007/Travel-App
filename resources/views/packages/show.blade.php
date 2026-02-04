@extends('layouts.app')

@section('title', $package->name . ' - Vraman')

@section('content')
<!-- Hero Section -->
<section class="relative h-96">
    <img src="{{ $package->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1920' }}" alt="{{ $package->name }}" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex items-center">
        <div class="container mx-auto px-4">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-200 hover:text-white">Home</a></li>
                    <li><span class="text-gray-300">/</span></li>
                    <li><a href="{{ route('packages.index') }}" class="text-gray-200 hover:text-white">Packages</a></li>
                    <li><span class="text-gray-300">/</span></li>
                    <li><span class="text-white">{{ $package->name }}</span></li>
                </ol>
            </nav>
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ $package->name }}</h1>
            <div class="flex flex-wrap items-center gap-4 text-white">
                <span class="flex items-center"><i class="fas fa-map-marker-alt mr-2"></i>{{ $package->destination->name ?? 'India' }}</span>
                <span class="flex items-center"><i class="fas fa-clock mr-2"></i>{{ $package->nights }} Nights / {{ $package->days }} Days</span>
                <span class="flex items-center"><i class="fas fa-star text-yellow-400 mr-2"></i>{{ $package->rating }} ({{ $package->reviews_count }} reviews)</span>
            </div>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <!-- Quick Info -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-moon text-primary-600 text-2xl mb-2"></i>
                            <p class="text-sm text-gray-500">Duration</p>
                            <p class="font-semibold">{{ $package->nights }}N / {{ $package->days }}D</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-calendar-alt text-primary-600 text-2xl mb-2"></i>
                            <p class="text-sm text-gray-500">Best Time</p>
                            <p class="font-semibold">{{ $package->best_time ?? 'Year Round' }}</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-users text-primary-600 text-2xl mb-2"></i>
                            <p class="text-sm text-gray-500">Group Size</p>
                            <p class="font-semibold">{{ $package->max_group_size ?? 'Flexible' }}</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-signal text-primary-600 text-2xl mb-2"></i>
                            <p class="text-sm text-gray-500">Difficulty</p>
                            <p class="font-semibold">{{ $package->difficulty_level ?? 'Easy' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Overview</h2>
                    <div class="prose max-w-none text-gray-600">
                        {!! $package->description ?? '<p>Experience an unforgettable journey with this carefully curated tour package. Discover the beauty and culture of ' . ($package->destination->name ?? 'India') . ' with expert guides and comfortable accommodations.</p>' !!}
                    </div>
                </div>

                <!-- Highlights -->
                @if($package->highlights && count($package->highlights) > 0)
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Tour Highlights</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach($package->highlights as $highlight)
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span class="text-gray-600">{{ $highlight }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Itinerary -->
                @if($package->itinerary && count($package->itinerary) > 0)
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Detailed Itinerary</h2>
                    <div class="space-y-4">
                        @foreach($package->itinerary as $index => $day)
                        <div class="border-l-4 border-primary-600 pl-4">
                            <button class="w-full text-left flex justify-between items-center py-3" onclick="toggleItinerary({{ $index }})">
                                <div>
                                    <span class="bg-primary-100 text-primary-600 text-sm font-semibold px-3 py-1 rounded-full mr-3">Day {{ $index + 1 }}</span>
                                    <span class="font-semibold text-gray-800">{{ $day['title'] ?? 'Day ' . ($index + 1) }}</span>
                                </div>
                                <i class="fas fa-chevron-down text-gray-400 itinerary-icon-{{ $index }} transition-transform"></i>
                            </button>
                            <div id="itinerary-{{ $index }}" class="hidden pb-4">
                                <p class="text-gray-600 mt-2">{{ $day['description'] ?? '' }}</p>
                                @if(isset($day['meals']))
                                <p class="text-sm text-gray-500 mt-2"><i class="fas fa-utensils mr-2"></i>Meals: {{ $day['meals'] }}</p>
                                @endif
                                @if(isset($day['accommodation']))
                                <p class="text-sm text-gray-500"><i class="fas fa-hotel mr-2"></i>Stay: {{ $day['accommodation'] }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Inclusions & Exclusions -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    @if($package->inclusions && count($package->inclusions) > 0)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>Inclusions
                        </h2>
                        <ul class="space-y-2">
                            @foreach($package->inclusions as $item)
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                <span class="text-gray-600">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($package->exclusions && count($package->exclusions) > 0)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-times-circle text-red-500 mr-2"></i>Exclusions
                        </h2>
                        <ul class="space-y-2">
                            @foreach($package->exclusions as $item)
                            <li class="flex items-start">
                                <i class="fas fa-times text-red-500 mr-2 mt-1"></i>
                                <span class="text-gray-600">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>

                <!-- Reviews -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Guest Reviews</h2>
                        <div class="flex items-center">
                            <div class="flex text-yellow-500 mr-2">
                                @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= round($package->rating) ? '' : 'text-gray-300' }}"></i>
                                @endfor
                            </div>
                            <span class="text-gray-600">{{ $package->rating }} out of 5</span>
                        </div>
                    </div>

                    @if($package->approvedReviews && $package->approvedReviews->count() > 0)
                    <div class="space-y-6">
                        @foreach($package->approvedReviews as $review)
                        <div class="border-b border-gray-100 pb-6 last:border-0">
                            <div class="flex items-start">
                                <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center flex-shrink-0">
                                    <span class="text-primary-600 font-bold">{{ substr($review->name, 0, 1) }}</span>
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-semibold text-gray-800">{{ $review->name }}</h4>
                                            <p class="text-sm text-gray-500">{{ $review->location ?? '' }} • {{ $review->created_at->format('M Y') }}</p>
                                        </div>
                                        <div class="flex text-yellow-500">
                                            @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star text-sm {{ $i <= $review->rating ? '' : 'text-gray-300' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    @if($review->title)
                                    <h5 class="font-medium text-gray-800 mt-2">{{ $review->title }}</h5>
                                    @endif
                                    <p class="text-gray-600 mt-2">{{ $review->review }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-500 text-center py-8">No reviews yet. Be the first to review this package!</p>
                    @endif

                    <!-- Write Review Form -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Write a Review</h3>
                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <input type="text" name="name" placeholder="Your Name *" required class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                                <input type="email" name="email" placeholder="Your Email" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                <div class="flex gap-2">
                                    @for($i = 1; $i <= 5; $i++)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" {{ $i == 5 ? 'checked' : '' }}>
                                        <i class="fas fa-star text-2xl text-gray-300 peer-checked:text-yellow-500 hover:text-yellow-500"></i>
                                    </label>
                                    @endfor
                                </div>
                            </div>
                            <textarea name="review" rows="4" placeholder="Share your experience..." required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 mb-4"></textarea>
                            <button type="submit" class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <!-- Booking Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                    <div class="mb-4">
                        @if($package->original_price)
                        <span class="text-gray-400 line-through text-lg">₹{{ number_format($package->original_price) }}</span>
                        <span class="ml-2 bg-green-100 text-green-600 text-sm px-2 py-1 rounded">{{ $package->discount_percentage }}% OFF</span>
                        @endif
                        <div class="mt-2">
                            <span class="text-3xl font-bold text-primary-600">₹{{ number_format($package->price) }}</span>
                            <span class="text-gray-500">/person</span>
                        </div>
                    </div>

                    <a href="{{ route('bookings.create', $package) }}" class="block w-full bg-primary-600 text-white py-3 rounded-lg text-center font-semibold hover:bg-primary-700 transition mb-4">
                        <i class="fas fa-calendar-check mr-2"></i>Book Now
                    </a>

                    <button onclick="openEnquiryModal()" class="block w-full border-2 border-primary-600 text-primary-600 py-3 rounded-lg text-center font-semibold hover:bg-primary-50 transition mb-6">
                        <i class="fas fa-paper-plane mr-2"></i>Send Enquiry
                    </button>

                    <div class="border-t border-gray-200 pt-6">
                        <h4 class="font-semibold text-gray-800 mb-4">Need Help?</h4>
                        <div class="space-y-3">
                            <a href="tel:+919876543210" class="flex items-center text-gray-600 hover:text-primary-600">
                                <i class="fas fa-phone-alt w-8 text-primary-600"></i>
                                <span>+91 9876543210</span>
                            </a>
                            <a href="https://wa.me/919876543210" class="flex items-center text-gray-600 hover:text-primary-600">
                                <i class="fab fa-whatsapp w-8 text-green-500"></i>
                                <span>WhatsApp</span>
                            </a>
                            <a href="mailto:info@vraman.com" class="flex items-center text-gray-600 hover:text-primary-600">
                                <i class="fas fa-envelope w-8 text-primary-600"></i>
                                <span>info@vraman.com</span>
                            </a>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <h4 class="font-semibold text-gray-800 mb-4">Share This Package</h4>
                        <div class="flex gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($package->name) }}" target="_blank" class="w-10 h-10 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($package->name . ' - ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="mailto:?subject={{ urlencode($package->name) }}&body={{ urlencode(request()->url()) }}" class="w-10 h-10 bg-gray-600 text-white rounded-full flex items-center justify-center hover:bg-gray-700 transition">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Packages -->
        @if($relatedPackages->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-8">Related Packages</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedPackages as $related)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover transition duration-300">
                    <div class="relative">
                        <img src="{{ $related->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400' }}" alt="{{ $related->name }}" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4 bg-primary-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                            {{ $related->nights }}N/{{ $related->days }}D
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-gray-800 mb-2">{{ $related->name }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-primary-600 font-bold">₹{{ number_format($related->price) }}</span>
                            <div class="flex items-center text-yellow-500 text-sm">
                                <i class="fas fa-star"></i>
                                <span class="ml-1 text-gray-700">{{ $related->rating }}</span>
                            </div>
                        </div>
                        <a href="{{ route('packages.show', $related) }}" class="mt-4 block text-center bg-primary-50 text-primary-600 py-2 rounded-lg font-medium hover:bg-primary-100 transition">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
function toggleItinerary(index) {
    const content = document.getElementById('itinerary-' + index);
    const icon = document.querySelector('.itinerary-icon-' + index);
    content.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
}
</script>
@endpush
