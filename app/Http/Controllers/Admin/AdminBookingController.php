<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminBookingController extends Controller
{
    /**
     * Display a listing of bookings
     */
    public function index(Request $request): View
    {
        $query = Booking::with('package', 'user');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('booking_number', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }
        
        $bookings = $query->latest()->paginate(15);
        
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show booking details
     */
    public function show(Booking $booking): View
    {
        $booking->load('package', 'user');
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing a booking
     */
    public function edit(Booking $booking): View
    {
        return view('admin.bookings.edit', compact('booking'));
    }

    /**
     * Update booking details
     */
    public function update(Request $request, Booking $booking): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'travel_date' => 'required|date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'infants' => 'nullable|integer|min:0',
            'special_requirements' => 'nullable|string',
        ]);

        $booking->update($validated);

        return redirect()->route('admin.bookings.show', $booking)->with('success', 'Booking updated successfully');
    }

    /**
     * Update booking status
     */
    public function updateStatus(Request $request, Booking $booking): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'payment_status' => 'required|in:pending,completed,failed,refunded',
        ]);

        $booking->update($validated);

        return back()->with('success', 'Booking status updated successfully');
    }

    /**
     * Delete a booking
     */
    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully');
    }
}
