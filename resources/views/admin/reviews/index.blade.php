@extends('admin.layout')

@section('title', 'Review Management')

@section('content')
<div class="table-card">
    <div class="flex justify-between items-center mb-5">
        <div>
            <form action="{{ route('admin.reviews.index') }}" method="GET" style="display: flex; gap: 10px;">
                <select name="status" style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px;">
                    <option value="">All Reviews</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
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
                <th>User</th>
                <th>Package</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reviews as $review)
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div style="width: 35px; height: 35px; border-radius: 50%; background-color: #3b82f6; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 12px;">
                                {{ substr($review->user->name ?? 'G', 0, 1) }}
                            </div>
                            <div>
                                <div style="font-weight: 500;">{{ $review->user->name ?? 'Guest' }}</div>
                                <div style="font-size: 12px; color: #6b7280;">{{ $review->user->email ?? '' }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $review->package->title ?? 'N/A' }}</td>
                    <td>
                        <div style="color: #f59e0b;">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review->rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                    </td>
                    <td>
                        <div style="max-width: 250px;">{{ Str::limit($review->comment, 80) }}</div>
                    </td>
                    <td>
                        @if($review->is_approved)
                            <span class="badge badge-success">Approved</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </td>
                    <td>{{ $review->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.reviews.show', $review) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        @if(!$review->is_approved)
                            <form action="{{ route('admin.reviews.approve', $review) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                        @endif
                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
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
                    <td colspan="7" style="text-align: center; color: #9ca3af; padding: 30px;">
                        <i class="fas fa-star" style="font-size: 40px; margin-bottom: 10px;"></i>
                        <p>No reviews found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $reviews->links() }}
    </div>
</div>
@endsection
