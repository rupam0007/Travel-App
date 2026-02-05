<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminPackageController extends Controller
{
    /**
     * Display a listing of packages
     */
    public function index(Request $request): View
    {
        $query = Package::with('category');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }
        
        $packages = $query->paginate(15);
        
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new package
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('admin.packages.create', compact('categories'));
    }

    /**
     * Store a newly created package
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'duration_days' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|between:0,100',
            'destinations' => 'nullable|string',
            'highlights' => 'nullable|string',
            'included_services' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('packages', 'public');
            $validated['image'] = $imagePath;
        }

        Package::create($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully');
    }

    /**
     * Show the form for editing a package
     */
    public function edit(Package $package): View
    {
        $categories = Category::all();
        return view('admin.packages.edit', compact('package', 'categories'));
    }

    /**
     * Update the package
     */
    public function update(Request $request, Package $package): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'duration_days' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|between:0,100',
            'destinations' => 'nullable|string',
            'highlights' => 'nullable|string',
            'included_services' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('packages', 'public');
            $validated['image'] = $imagePath;
        }

        $package->update($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully');
    }

    /**
     * Delete a package
     */
    public function destroy(Package $package): RedirectResponse
    {
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully');
    }
}
