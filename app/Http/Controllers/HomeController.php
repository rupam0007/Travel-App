<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Region;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::active()->get();
        
        $regions = Region::where('is_active', true)
            ->orderBy('sort_order')
            ->with(['activeDestinations' => function($query) {
                $query->limit(8);
            }])
            ->get();
        
        $trendingDestinations = Destination::active()
            ->trending()
            ->with('region')
            ->limit(8)
            ->get();
        
        $featuredPackages = Package::active()
            ->featured()
            ->with(['destination', 'category'])
            ->limit(8)
            ->get();
        
        $categories = Category::active()
            ->where('type', 'interest')
            ->orderBy('sort_order')
            ->limit(8)
            ->get();
        
        $reviews = Review::approved()
            ->featured()
            ->with('package')
            ->latest()
            ->limit(6)
            ->get();
        
        $blogs = Blog::published()
            ->latest('published_at')
            ->limit(3)
            ->get();
        
        $popularPackages = Package::active()
            ->orderBy('reviews_count', 'desc')
            ->orderBy('rating', 'desc')
            ->with('destination')
            ->limit(6)
            ->get();

        return view('home', compact(
            'sliders',
            'regions',
            'trendingDestinations',
            'featuredPackages',
            'categories',
            'reviews',
            'blogs',
            'popularPackages'
        ));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $packages = Package::active()
            ->where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->with('destination')
            ->paginate(12);
        
        $destinations = Destination::active()
            ->where('name', 'like', "%{$query}%")
            ->with('region')
            ->get();

        return view('search', compact('packages', 'destinations', 'query'));
    }
}
