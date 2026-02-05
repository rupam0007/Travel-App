@extends('admin.layout')

@section('title', 'Edit Booking')

@section('content')
<div class="table-card" style="max-width: 900px;">
    <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="background-color: #dbeafe; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <p style="color: #1e3a8a; font-weight: 500;">
                <i class="fas fa-info-circle"></i> Editing Booking: <strong>{{ $booking->booking_number }}</strong>
            </p>
        </div>
        
        <h4 style="font-size: 16px; font-weight: 600; margin-bottom: 15px; color: #374151;">
            <i class="fas fa-user"></i> Guest Information
        </h4>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $booking->name) }}" required>
                @error('name')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email', $booking->email) }}" required>
                @error('email')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $booking->phone) }}" required>
                @error('phone')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="travel_date">Travel Date</label>
                <input type="date" id="travel_date" name="travel_date" value="{{ old('travel_date', $booking->travel_date) }}" required>
                @error('travel_date')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <h4 style="font-size: 16px; font-weight: 600; margin-top: 20px; margin-bottom: 15px; color: #374151;">
            <i class="fas fa-map-marker-alt"></i> Address Information
        </h4>
        
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ old('address', $booking->address) }}" required>
            @error('address')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" value="{{ old('city', $booking->city) }}" required>
                @error('city')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" name="state" value="{{ old('state', $booking->state) }}" required>
                @error('state')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" id="country" name="country" value="{{ old('country', $booking->country) }}" required>
                @error('country')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <h4 style="font-size: 16px; font-weight: 600; margin-top: 20px; margin-bottom: 15px; color: #374151;">
            <i class="fas fa-users"></i> Traveler Count
        </h4>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="form-group">
                <label for="adults">Adults</label>
                <input type="number" id="adults" name="adults" value="{{ old('adults', $booking->adults) }}" min="1" required>
                @error('adults')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="children">Children (2-12 years)</label>
                <input type="number" id="children" name="children" value="{{ old('children', $booking->children) }}" min="0">
                @error('children')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="infants">Infants (0-2 years)</label>
                <input type="number" id="infants" name="infants" value="{{ old('infants', $booking->infants) }}" min="0">
                @error('infants')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label for="special_requirements">Special Requirements</label>
            <textarea id="special_requirements" name="special_requirements" placeholder="Any dietary requirements, accessibility needs, etc.">{{ old('special_requirements', $booking->special_requirements) }}</textarea>
            @error('special_requirements')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Booking
            </button>
            <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-danger">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
