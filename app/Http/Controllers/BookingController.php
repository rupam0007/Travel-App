<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function create(Package $package)
    {
        return view('bookings.create', compact('package'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'travel_date' => 'required|date|after:today',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'infants' => 'nullable|integer|min:0',
            'special_requirements' => 'nullable|string|max:1000',
        ]);

        $package = Package::findOrFail($validated['package_id']);
        
        $adults = $validated['adults'];
        $children = $validated['children'] ?? 0;
        $infants = $validated['infants'] ?? 0;
        
        $totalAmount = ($package->price * $adults) + ($package->price * 0.5 * $children);

        $booking = Booking::create([
            'booking_number' => Booking::generateBookingNumber(),
            'user_id' => auth()->id(),
            'package_id' => $package->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'] ?? null,
            'city' => $validated['city'] ?? null,
            'state' => $validated['state'] ?? null,
            'country' => $validated['country'] ?? null,
            'travel_date' => $validated['travel_date'],
            'adults' => $adults,
            'children' => $children,
            'infants' => $infants,
            'special_requirements' => $validated['special_requirements'] ?? null,
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'payment_status' => 'pending',
        ]);

        return redirect()->route('bookings.confirmation', $booking->booking_number)
            ->with('success', 'Your booking has been submitted successfully!');
    }

    public function confirmation($bookingNumber)
    {
        $booking = Booking::where('booking_number', $bookingNumber)
            ->with('package.destination')
            ->firstOrFail();

        return view('bookings.confirmation', compact('booking'));
    }

    public function track(Request $request)
    {
        $booking = null;
        
        if ($request->has('booking_number')) {
            $booking = Booking::where('booking_number', $request->booking_number)
                ->with('package.destination')
                ->first();
        }

        return view('bookings.track', compact('booking'));
    }
}
