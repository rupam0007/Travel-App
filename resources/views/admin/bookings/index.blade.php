@extends('admin.layout')

@section('title', 'Booking Management')

@section('content')
<div class="table-card">
    <div class="flex justify-between items-center mb-5 flex-wrap gap-4">
        <div>
            <form action="{{ route('admin.bookings.index') }}" method="GET" style="display: flex; gap: 10px; flex-wrap: wrap;">
                <input type="text" name="search" placeholder="Search by booking #, name, email..." value="{{ request('search') }}"
                    style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; width: 250px;">
                <select name="status" style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <select name="payment_status" style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                    <option value="">All Payment Status</option>
                    <option value="pending" {{ request('payment_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ request('payment_status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="failed" {{ request('payment_status') == 'failed' ? 'selected' : '' }}>Failed</option>
                    <option value="refunded" {{ request('payment_status') == 'refunded' ? 'selected' : '' }}>Refunded</option>
                </select>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </form>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Booking #</th>
                <th>Guest</th>
                <th>Package</th>
                <th>Travel Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>
                        <a href="{{ route('admin.bookings.show', $booking) }}" style="color: #3b82f6; text-decoration: none; font-weight: 600;">
                            {{ $booking->booking_number }}
                        </a>
                    </td>
                    <td>
                        <div>{{ $booking->name }}</div>
                        <div style="font-size: 12px; color: #6b7280;">{{ $booking->email }}</div>
                    </td>
                    <td>{{ $booking->package->title ?? 'N/A' }}</td>
                    <td>{{ $booking->travel_date ? \Carbon\Carbon::parse($booking->travel_date)->format('d M Y') : 'N/A' }}</td>
                    <td>₹{{ number_format($booking->total_amount, 2) }}</td>
                    <td>
                        @if($booking->status === 'confirmed')
                            <span class="badge badge-success">Confirmed</span>
                        @elseif($booking->status === 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif($booking->status === 'cancelled')
                            <span class="badge badge-danger">Cancelled</span>
                        @else
                            <span class="badge badge-info">{{ ucfirst($booking->status) }}</span>
                        @endif
                    </td>
                    <td>
                        @if($booking->payment_status === 'completed')
                            <span class="badge badge-success">Paid</span>
                        @elseif($booking->payment_status === 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif($booking->payment_status === 'failed')
                            <span class="badge badge-danger">Failed</span>
                        @elseif($booking->payment_status === 'refunded')
                            <span class="badge badge-info">Refunded</span>
                        @else
                            <span class="badge badge-warning">{{ ucfirst($booking->payment_status ?? 'N/A') }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center; color: #9ca3af; padding: 30px;">
                        <i class="fas fa-calendar-check" style="font-size: 40px; margin-bottom: 10px;"></i>
                        <p>No bookings found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $bookings->links() }}
    </div>
</div>
@endsection
