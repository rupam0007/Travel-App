@extends('admin.layout')

@section('title', 'Booking Details')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
    <!-- Booking Information -->
    <div class="table-card lg:col-span-2">
        <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 20px; color: #1f2937; border-bottom: 2px solid #f3f4f6; padding-bottom: 15px;">
            <i class="fas fa-calendar-check"></i> Booking Information
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Booking Number</p>
                <p style="font-size: 18px; font-weight: 600; color: #3b82f6;">{{ $booking->booking_number }}</p>
            </div>
            <div>
                <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Package</p>
                <p style="font-size: 16px; font-weight: 500;">{{ $booking->package->title ?? 'N/A' }}</p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5" style="margin-top: 20px;">
            <div>
                <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Travel Date</p>
                <p style="font-size: 15px;">{{ $booking->travel_date ? \Carbon\Carbon::parse($booking->travel_date)->format('d M Y') : 'N/A' }}</p>
            </div>
            <div>
                <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Duration</p>
                <p style="font-size: 15px;">{{ $booking->package->duration_days ?? 'N/A' }} Days</p>
            </div>
            <div>
                <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Booked On</p>
                <p style="font-size: 15px;">{{ $booking->created_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>
        
        <h4 style="font-size: 16px; font-weight: 600; margin-top: 30px; margin-bottom: 15px; color: #374151;">
            <i class="fas fa-users"></i> Traveler Details
        </h4>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Adults</p>
                <p style="font-size: 15px;">{{ $booking->adults }}</p>
            </div>
            <div>
                <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Children</p>
                <p style="font-size: 15px;">{{ $booking->children ?? 0 }}</p>
            </div>
            <div>
                <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Infants</p>
                <p style="font-size: 15px;">{{ $booking->infants ?? 0 }}</p>
            </div>
        </div>
        
        @if($booking->special_requirements)
        <div style="margin-top: 20px;">
            <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Special Requirements</p>
            <p style="font-size: 15px; background-color: #f9fafb; padding: 15px; border-radius: 6px;">{{ $booking->special_requirements }}</p>
        </div>
        @endif
    </div>
    
    <!-- Status & Payment -->
    <div>
        <!-- Status Card -->
        <div class="table-card" style="margin-bottom: 20px;">
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px;">
                <i class="fas fa-cog"></i> Update Status
            </h3>
            <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="form-group">
                    <label for="status">Booking Status</label>
                    <select id="status" name="status">
                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="payment_status">Payment Status</label>
                    <select id="payment_status" name="payment_status">
                        <option value="pending" {{ $booking->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $booking->payment_status === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="failed" {{ $booking->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                        <option value="refunded" {{ $booking->payment_status === 'refunded' ? 'selected' : '' }}>Refunded</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%;">
                    <i class="fas fa-save"></i> Update Status
                </button>
            </form>
        </div>
        
        <!-- Amount Card -->
        <div class="table-card">
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px;">
                <i class="fas fa-money-bill-wave"></i> Payment Details
            </h3>
            
            <div style="margin-bottom: 15px;">
                <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Total Amount</p>
                <p style="font-size: 24px; font-weight: 700; color: #059669;">₹{{ number_format($booking->total_amount, 2) }}</p>
            </div>
            
            <div style="margin-bottom: 15px;">
                <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Paid Amount</p>
                <p style="font-size: 18px; font-weight: 600; color: #1f2937;">₹{{ number_format($booking->paid_amount ?? 0, 2) }}</p>
            </div>
            
            <div style="margin-bottom: 15px;">
                <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Balance Due</p>
                <p style="font-size: 18px; font-weight: 600; color: #dc2626;">₹{{ number_format($booking->total_amount - ($booking->paid_amount ?? 0), 2) }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Guest Information -->
<div class="table-card" style="margin-top: 20px;">
    <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 20px; color: #1f2937; border-bottom: 2px solid #f3f4f6; padding-bottom: 15px;">
        <i class="fas fa-user"></i> Guest Information
    </h3>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
        <div>
            <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Full Name</p>
            <p style="font-size: 15px; font-weight: 500;">{{ $booking->name }}</p>
        </div>
        <div>
            <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Email</p>
            <p style="font-size: 15px;">{{ $booking->email }}</p>
        </div>
        <div>
            <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Phone</p>
            <p style="font-size: 15px;">{{ $booking->phone }}</p>
        </div>
        <div>
            <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">City</p>
            <p style="font-size: 15px;">{{ $booking->city }}</p>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5" style="margin-top: 20px;">
        <div>
            <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Address</p>
            <p style="font-size: 15px;">{{ $booking->address }}</p>
        </div>
        <div>
            <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">State / Country</p>
            <p style="font-size: 15px;">{{ $booking->state }}, {{ $booking->country }}</p>
        </div>
    </div>
</div>

<!-- Action Buttons -->
<div style="margin-top: 20px; display: flex; gap: 10px;">
    <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-warning">
        <i class="fas fa-edit"></i> Edit Booking
    </a>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i> Back to Bookings
    </a>
</div>
@endsection
