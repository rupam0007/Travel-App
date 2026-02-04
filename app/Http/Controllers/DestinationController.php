<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Region;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $query = Destination::active()->with('region');
        
        if ($request->has('region')) {
            $query->whereHas('region', function($q) use ($request) {
                $q->where('slug', $request->region);
            });
        }
        
        $destinations = $query->orderBy('sort_order')->paginate(12);
        $regions = Region::where('is_active', true)->orderBy('sort_order')->get();

        return view('destinations.index', compact('destinations', 'regions'));
    }

    public function show(Destination $destination)
    {
        $destination->load(['region', 'activePackages.category']);
        
        $relatedDestinations = Destination::active()
            ->where('id', '!=', $destination->id)
            ->where('region_id', $destination->region_id)
            ->limit(4)
            ->get();

        return view('destinations.show', compact('destination', 'relatedDestinations'));
    }

    public function byRegion(Region $region)
    {
        $destinations = $region->activeDestinations()
            ->orderBy('sort_order')
            ->paginate(12);

        return view('destinations.by-region', compact('region', 'destinations'));
    }
}
