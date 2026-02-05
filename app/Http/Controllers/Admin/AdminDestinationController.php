<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class AdminDestinationController extends Controller
{
    /**
     * Display a listing of destinations
     */
    public function index(Request $request): View
    {
        $query = Destination::with('region');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }
        
        $destinations = $query->paginate(15);
        
        return view('admin.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new destination
     */
    public function create(): View
    {
        $regions = Region::all();
        return view('admin.destinations.create', compact('regions'));
    }

    /**
     * Store a newly created destination
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'description' => 'required|string',
            'best_time_to_visit' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        // Generate slug from name
        $validated['slug'] = Str::slug($validated['name']);
        
        // Ensure unique slug
        $count = Destination::where('slug', $validated['slug'])->count();
        if ($count > 0) {
            $validated['slug'] = $validated['slug'] . '-' . ($count + 1);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinations', 'public');
            $validated['image'] = $imagePath;
        }

        Destination::create($validated);

        return redirect()->route('admin.destinations.index')->with('success', 'Destination created successfully');
    }

    /**
     * Show the form for editing a destination
     */
    public function edit(Destination $destination): View
    {
        $regions = Region::all();
        return view('admin.destinations.edit', compact('destination', 'regions'));
    }

    /**
     * Update the destination
     */
    public function update(Request $request, Destination $destination): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'description' => 'required|string',
            'best_time_to_visit' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        // Update slug if name changed
        if ($destination->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
            $count = Destination::where('slug', $validated['slug'])->where('id', '!=', $destination->id)->count();
            if ($count > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($count + 1);
            }
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinations', 'public');
            $validated['image'] = $imagePath;
        }

        $destination->update($validated);

        return redirect()->route('admin.destinations.index')->with('success', 'Destination updated successfully');
    }

    /**
     * Delete a destination
     */
    public function destroy(Destination $destination): RedirectResponse
    {
        $destination->delete();
        return redirect()->route('admin.destinations.index')->with('success', 'Destination deleted successfully');
    }
}
