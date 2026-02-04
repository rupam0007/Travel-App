<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Enquiry;
use App\Models\Package;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }

    public function enquiry(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'nullable|exists:packages,id',
            'destination_id' => 'nullable|exists:destinations,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'nullable|string|max:100',
            'travel_date' => 'nullable|date',
            'travelers' => 'nullable|integer|min:1',
            'message' => 'nullable|string|max:1000',
        ]);

        Enquiry::create($validated);

        return back()->with('success', 'Thank you for your enquiry! Our travel expert will contact you shortly.');
    }
}
