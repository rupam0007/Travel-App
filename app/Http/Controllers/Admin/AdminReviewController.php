<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminReviewController extends Controller
{
    /**
     * Display a listing of reviews
     */
    public function index(Request $request): View
    {
        $query = Review::with('user', 'package');
        
        if ($request->filled('status')) {
            if ($request->status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($request->status === 'pending') {
                $query->where('is_approved', false);
            }
        }
        
        $reviews = $query->latest()->paginate(15);
        
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show review details
     */
    public function show(Review $review): View
    {
        $review->load('user', 'package');
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Approve a review
     */
    public function approve(Review $review): RedirectResponse
    {
        $review->update(['is_approved' => true]);
        return back()->with('success', 'Review approved successfully');
    }

    /**
     * Delete a review
     */
    public function destroy(Review $review): RedirectResponse
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully');
    }
}
