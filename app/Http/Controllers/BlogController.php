<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()
            ->latest('published_at')
            ->paginate(12);

        return view('blogs.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $blog->incrementViews();
        
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->when($blog->category, function($query) use ($blog) {
                $query->where('category', $blog->category);
            })
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('blogs.show', compact('blog', 'relatedBlogs'));
    }
}
