@extends('layouts.app')

@section('title', $blog->title . ' - Vraman')

@section('content')
<article>
    <!-- Hero -->
    <section class="relative h-96">
        <img src="{{ $blog->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1920' }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="absolute inset-0 flex items-end">
            <div class="container mx-auto px-4 pb-12">
                @if($blog->category)
                <span class="inline-block bg-primary-600 text-white text-sm px-4 py-1 rounded-full mb-4">{{ $blog->category }}</span>
                @endif
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 max-w-4xl">{{ $blog->title }}</h1>
                <div class="flex items-center text-white text-sm">
                    <span><i class="far fa-calendar-alt mr-1"></i>{{ $blog->published_at ? $blog->published_at->format('F d, Y') : '' }}</span>
                    <span class="mx-3">•</span>
                    <span><i class="far fa-eye mr-1"></i>{{ $blog->views }} views</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Content -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <div class="prose prose-lg max-w-none">
                            {!! $blog->content !!}
                        </div>

                        @if($blog->tags && count($blog->tags) > 0)
                        <div class="mt-8 pt-8 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-3">Tags</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($blog->tags as $tag)
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Share -->
                        <div class="mt-8 pt-8 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-3">Share This Post</h4>
                            <div class="flex gap-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="w-10 h-10 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="w-10 h-10 bg-blue-700 text-white rounded-full flex items-center justify-center hover:bg-blue-800 transition">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    @if($relatedBlogs->count() > 0)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Related Posts</h3>
                        <div class="space-y-4">
                            @foreach($relatedBlogs as $related)
                            <a href="{{ route('blogs.show', $related) }}" class="flex gap-4 group">
                                <img src="{{ $related->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=200' }}" alt="{{ $related->title }}" class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-primary-600 transition line-clamp-2">{{ $related->title }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $related->published_at ? $related->published_at->format('M d, Y') : '' }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- CTA -->
                    <div class="bg-primary-600 rounded-xl p-6 text-white mt-6">
                        <h3 class="text-xl font-bold mb-3">Plan Your Trip</h3>
                        <p class="opacity-90 mb-4">Let us help you create your perfect India holiday</p>
                        <button onclick="openEnquiryModal()" class="w-full bg-white text-primary-600 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                            Get Free Quote
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
@endsection
