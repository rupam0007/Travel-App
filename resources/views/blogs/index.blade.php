@extends('layouts.app')

@section('title', 'Blog - Vraman')

@section('content')
<!-- Hero Section -->
<section class="relative h-64 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Travel Stories & Guides</h1>
            <p class="text-xl opacity-90">Get inspired for your next adventure</p>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        @if($blogs->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogs as $blog)
            <a href="{{ route('blogs.show', $blog) }}" class="group">
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover transition duration-300">
                    <div class="relative h-56">
                        <img src="{{ $blog->image ?? 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=400' }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @if($blog->category)
                        <div class="absolute top-4 left-4">
                            <span class="bg-primary-600 text-white text-xs px-3 py-1 rounded-full">{{ $blog->category }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span><i class="far fa-calendar-alt mr-1"></i>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : '' }}</span>
                            <span class="mx-2">•</span>
                            <span><i class="far fa-eye mr-1"></i>{{ $blog->views }} views</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3 group-hover:text-primary-600 transition line-clamp-2">{{ $blog->title }}</h3>
                        <p class="text-gray-600 line-clamp-3">{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 120) }}</p>
                        <div class="mt-4 flex items-center text-primary-600 font-medium">
                            Read More <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition"></i>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $blogs->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No blog posts yet</h3>
            <p class="text-gray-500">Check back later for travel stories and guides</p>
        </div>
        @endif
    </div>
</section>
@endsection
