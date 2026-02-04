<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $query = Package::active()->with(['destination', 'category']);
        
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        
        if ($request->has('destination')) {
            $query->whereHas('destination', function($q) use ($request) {
                $q->where('slug', $request->destination);
            });
        }
        
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
        
        if ($request->has('duration')) {
            $query->where('nights', '<=', $request->duration);
        }
        
        $sortBy = $request->get('sort', 'popular');
        switch ($sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'newest':
                $query->latest();
                break;
            default:
                $query->orderBy('reviews_count', 'desc');
        }
        
        $packages = $query->paginate(12);
        $categories = Category::active()->where('type', 'interest')->orderBy('sort_order')->get();
        $destinations = Destination::active()->orderBy('name')->get();

        return view('packages.index', compact('packages', 'categories', 'destinations'));
    }

    public function show(Package $package)
    {
        $package->load(['destination.region', 'category', 'approvedReviews' => function($query) {
            $query->latest()->limit(10);
        }]);
        
        $relatedPackages = Package::active()
            ->where('id', '!=', $package->id)
            ->where(function($query) use ($package) {
                $query->where('destination_id', $package->destination_id)
                    ->orWhere('category_id', $package->category_id);
            })
            ->limit(4)
            ->get();

        return view('packages.show', compact('package', 'relatedPackages'));
    }

    public function byCategory(Category $category)
    {
        $packages = $category->activePackages()
            ->with('destination')
            ->paginate(12);

        return view('packages.by-category', compact('category', 'packages'));
    }
}
