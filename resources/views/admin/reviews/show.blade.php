@extends('admin.layout')

@section('title', 'Review Details')

@section('content')
<div class="table-card" style="max-width: 800px;">
    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 30px; flex-wrap: wrap; gap: 20px;">
        <div>
            <h3 style="font-size: 20px; font-weight: 600; color: #1f2937; margin-bottom: 10px;">Review Details</h3>
            <p style="color: #6b7280;">Submitted on {{ $review->created_at->format('d M Y, h:i A') }}</p>
        </div>
        <div>
            @if($review->is_approved)
                <span class="badge badge-success" style="font-size: 14px; padding: 8px 16px;">Approved</span>
            @else
                <span class="badge badge-warning" style="font-size: 14px; padding: 8px 16px;">Pending Approval</span>
            @endif
        </div>
    </div>
    
    <!-- Reviewer Info -->
    <div style="background-color: #f9fafb; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
        <div style="display: flex; align-items: center; gap: 15px;">
            <div style="width: 60px; height: 60px; border-radius: 50%; background-color: #3b82f6; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 24px;">
                {{ substr($review->user->name ?? 'G', 0, 1) }}
            </div>
            <div>
                <h4 style="font-size: 18px; font-weight: 600; color: #1f2937;">{{ $review->user->name ?? 'Guest' }}</h4>
                <p style="color: #6b7280;">{{ $review->user->email ?? '' }}</p>
            </div>
        </div>
    </div>
    
    <!-- Package Info -->
    <div style="margin-bottom: 25px;">
        <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Package Reviewed</p>
        <p style="font-size: 18px; font-weight: 600; color: #3b82f6;">{{ $review->package->title ?? 'N/A' }}</p>
    </div>
    
    <!-- Rating -->
    <div style="margin-bottom: 25px;">
        <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Rating</p>
        <div style="display: flex; align-items: center; gap: 10px;">
            <div style="color: #f59e0b; font-size: 24px;">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $review->rating)
                        <i class="fas fa-star"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
            </div>
            <span style="font-size: 20px; font-weight: 600; color: #1f2937;">{{ $review->rating }}/5</span>
        </div>
    </div>
    
    <!-- Review Content -->
    <div style="margin-bottom: 25px;">
        <p style="font-size: 13px; color: #6b7280; margin-bottom: 10px;">Review</p>
        <div style="background-color: #fff; border: 1px solid #e5e7eb; padding: 20px; border-radius: 8px; line-height: 1.7;">
            {{ $review->comment }}
        </div>
    </div>
    
    <!-- Actions -->
    <div style="display: flex; gap: 10px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
        @if(!$review->is_approved)
            <form action="{{ route('admin.reviews.approve', $review) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-check"></i> Approve Review
                </button>
            </form>
        @endif
        
        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" onsubmit="return confirmDelete()">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i> Delete Review
            </button>
        </form>
        
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Back to Reviews
        </a>
    </div>
</div>
@endsection
