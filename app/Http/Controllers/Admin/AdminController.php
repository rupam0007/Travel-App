<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Destination;
use App\Models\Blog;
use App\Models\Review;
use App\Models\Contact;
use App\Models\Enquiry;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard with statistics
     */
    public function dashboard(): View
    {
        // Get statistics for the dashboard
        $totalUsers = User::count();
        $totalDestinations = Destination::count();
        $totalPackages = Package::count();
        $totalBookings = Booking::count();
        $totalBlogs = Blog::count();
        $totalReviews = Review::count();
        $totalContacts = Contact::count();
        $totalEnquiries = Enquiry::count();
        
        // Recent bookings
        $recentBookings = Booking::latest()->take(5)->get();
        
        // Revenue statistics
        $totalRevenue = Booking::sum('total_amount');
        $paidRevenue = Booking::where('payment_status', 'completed')->sum('paid_amount');
        $pendingRevenue = Booking::where('payment_status', 'pending')->sum('total_amount');
        
        // Booking status breakdown
        $bookingStatuses = Booking::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get();
        
        // Monthly booking trend (last 12 months)
        $monthlyBookings = Booking::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, count(*) as count')
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        
        // Top packages by bookings
        $topPackages = Package::withCount('bookings')
            ->orderByDesc('bookings_count')
            ->take(5)
            ->get();
        
        // Pending reviews
        $pendingReviews = Review::where('is_approved', false)->count();
        
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalDestinations' => $totalDestinations,
            'totalPackages' => $totalPackages,
            'totalBookings' => $totalBookings,
            'totalBlogs' => $totalBlogs,
            'totalReviews' => $totalReviews,
            'totalContacts' => $totalContacts,
            'totalEnquiries' => $totalEnquiries,
            'recentBookings' => $recentBookings,
            'totalRevenue' => $totalRevenue,
            'paidRevenue' => $paidRevenue,
            'pendingRevenue' => $pendingRevenue,
            'bookingStatuses' => $bookingStatuses,
            'monthlyBookings' => $monthlyBookings,
            'topPackages' => $topPackages,
            'pendingReviews' => $pendingReviews,
        ]);
    }
}
