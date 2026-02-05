@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    <!-- Total Users -->
    <div class="stat-card primary">
        <div class="label"><i class="fas fa-users"></i> Total Users</div>
        <div class="number">{{ $totalUsers }}</div>
        <i class="fas fa-user-tie icon"></i>
    </div>
    
    <!-- Total Destinations -->
    <div class="stat-card success">
        <div class="label"><i class="fas fa-map-marker-alt"></i> Destinations</div>
        <div class="number">{{ $totalDestinations }}</div>
        <i class="fas fa-earth-americas icon"></i>
    </div>
    
    <!-- Total Packages -->
    <div class="stat-card warning">
        <div class="label"><i class="fas fa-suitcase-rolling"></i> Packages</div>
        <div class="number">{{ $totalPackages }}</div>
        <i class="fas fa-box icon"></i>
    </div>
    
    <!-- Total Bookings -->
    <div class="stat-card danger">
        <div class="label"><i class="fas fa-calendar-check"></i> Bookings</div>
        <div class="number">{{ $totalBookings }}</div>
        <i class="fas fa-calendar icon"></i>
    </div>
</div>

<!-- Revenue Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
    <!-- Total Revenue -->
    <div class="stat-card primary">
        <div class="label"><i class="fas fa-money-bill-wave"></i> Total Revenue</div>
        <div class="number" style="color: #059669;">₹{{ number_format($totalRevenue, 2) }}</div>
        <i class="fas fa-chart-bar icon"></i>
    </div>
    
    <!-- Paid Revenue -->
    <div class="stat-card success">
        <div class="label"><i class="fas fa-check-circle"></i> Paid Revenue</div>
        <div class="number" style="color: #059669;">₹{{ number_format($paidRevenue, 2) }}</div>
        <i class="fas fa-credit-card icon"></i>
    </div>
    
    <!-- Pending Revenue -->
    <div class="stat-card warning">
        <div class="label"><i class="fas fa-hourglass-end"></i> Pending Revenue</div>
        <div class="number" style="color: #d97706;">₹{{ number_format($pendingRevenue, 2) }}</div>
        <i class="fas fa-clock icon"></i>
    </div>
</div>

<!-- Additional Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
    <div class="stat-card" style="border-color: #8b5cf6;">
        <div class="label"><i class="fas fa-blog"></i> Blog Posts</div>
        <div class="number">{{ $totalBlogs }}</div>
        <i class="fas fa-newspaper icon" style="color: #8b5cf6; opacity: 0.2;"></i>
    </div>
    
    <div class="stat-card" style="border-color: #ec4899;">
        <div class="label"><i class="fas fa-star"></i> Reviews</div>
        <div class="number">{{ $totalReviews }}</div>
        <i class="fas fa-thumbs-up icon" style="color: #ec4899; opacity: 0.2;"></i>
    </div>
    
    <div class="stat-card" style="border-color: #06b6d4;">
        <div class="label"><i class="fas fa-envelope"></i> Contacts</div>
        <div class="number">{{ $totalContacts }}</div>
        <i class="fas fa-mail-bulk icon" style="color: #06b6d4; opacity: 0.2;"></i>
    </div>
    
    <div class="stat-card" style="border-color: #14b8a6;">
        <div class="label"><i class="fas fa-question-circle"></i> Enquiries</div>
        <div class="number">{{ $totalEnquiries }}</div>
        <i class="fas fa-comments icon" style="color: #14b8a6; opacity: 0.2;"></i>
    </div>
</div>

<!-- Recent Activity Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
    <!-- Recent Bookings -->
    <div class="table-card">
        <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1f2937;">
            <i class="fas fa-calendar-check"></i> Recent Bookings
        </h3>
        <table>
            <thead>
                <tr>
                    <th>Booking #</th>
                    <th>Guest</th>
                    <th>Package</th>
                    <th>Status</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentBookings as $booking)
                    <tr>
                        <td><a href="{{ route('admin.bookings.show', $booking) }}" style="color: #3b82f6; text-decoration: none;">{{ $booking->booking_number }}</a></td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->package->title ?? 'N/A' }}</td>
                        <td>
                            @if($booking->status === 'confirmed')
                                <span class="badge badge-success">{{ ucfirst($booking->status) }}</span>
                            @elseif($booking->status === 'pending')
                                <span class="badge badge-warning">{{ ucfirst($booking->status) }}</span>
                            @elseif($booking->status === 'cancelled')
                                <span class="badge badge-danger">{{ ucfirst($booking->status) }}</span>
                            @else
                                <span class="badge badge-info">{{ ucfirst($booking->status) }}</span>
                            @endif
                        </td>
                        <td>₹{{ number_format($booking->total_amount, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #9ca3af; padding: 20px;">No recent bookings</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Booking Status Overview -->
    <div class="table-card">
        <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1f2937;">
            <i class="fas fa-chart-pie"></i> Booking Status
        </h3>
        <canvas id="bookingChart" height="150"></canvas>
    </div>
</div>

<!-- Top Packages -->
<div class="table-card" style="margin-top: 20px;">
    <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1f2937;">
        <i class="fas fa-fire"></i> Top Performing Packages
    </h3>
    <table>
        <thead>
            <tr>
                <th>Package Name</th>
                <th>Total Bookings</th>
                <th>Revenue</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($topPackages as $package)
                <tr>
                    <td>{{ $package->title }}</td>
                    <td><span class="badge badge-info">{{ $package->bookings_count }}</span></td>
                    <td>₹{{ number_format($package->bookings_count * $package->price, 2) }}</td>
                    <td><a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-sm btn-primary">Edit</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #9ca3af; padding: 20px;">No packages yet</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pending Reviews Alert -->
@if($pendingReviews > 0)
<div style="margin-top: 20px; padding: 15px; background-color: #fef3c7; border-left: 4px solid #f59e0b; border-radius: 6px;">
    <i class="fas fa-exclamation-triangle" style="color: #f59e0b;"></i>
    <span style="margin-left: 10px; color: #78350f;">
        You have <strong>{{ $pendingReviews }}</strong> pending review(s) to moderate.
        <a href="{{ route('admin.reviews.index', ['status' => 'pending']) }}" style="color: #d97706; text-decoration: underline; font-weight: 600;">View Now →</a>
    </span>
</div>
@endif

@endsection

@section('scripts')
<script>
    // Booking Status Chart
    const ctx = document.getElementById('bookingChart').getContext('2d');
    const statuses = @json($bookingStatuses->pluck('status')->toArray());
    const counts = @json($bookingStatuses->pluck('count')->toArray());
    
    const colors = {
        'pending': '#f59e0b',
        'confirmed': '#10b981',
        'completed': '#3b82f6',
        'cancelled': '#ef4444'
    };
    
    const bgColors = statuses.map(status => colors[status] || '#6b7280');
    
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: statuses.map(s => s.charAt(0).toUpperCase() + s.slice(1)),
            datasets: [{
                data: counts,
                backgroundColor: bgColors,
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: { family: "'Poppins', sans-serif" },
                        padding: 15
                    }
                }
            }
        }
    });
</script>
@endsection
