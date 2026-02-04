<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'location' => 'nullable|string|max:100',
            'title' => 'nullable|string|max:255',
            'review' => 'required|string|max:2000',
            'rating' => 'required|integer|min:1|max:5',
            'travel_date' => 'nullable|date',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['is_approved'] = false;

        Review::create($validated);

        return back()->with('success', 'Thank you for your review! It will be published after moderation.');
    }
}
