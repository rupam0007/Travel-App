<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of blogs
     */
    public function index(Request $request): View
    {
        $query = Blog::query();
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
        }
        
        $blogs = $query->latest()->paginate(15);
        
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog
     */
    public function create(): View
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created blog
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blogs', 'public');
            $validated['featured_image'] = $imagePath;
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully');
    }

    /**
     * Show the form for editing a blog
     */
    public function edit(Blog $blog): View
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the blog
     */
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blogs', 'public');
            $validated['featured_image'] = $imagePath;
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Delete a blog
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully');
    }
}
