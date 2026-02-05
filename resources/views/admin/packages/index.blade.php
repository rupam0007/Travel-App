@extends('admin.layout')

@section('title', 'Package Management')

@section('content')
<div class="table-card">
    <div class="flex justify-between items-center mb-5">
        <div>
            <form action="{{ route('admin.packages.index') }}" method="GET" style="display: flex; gap: 10px;">
                <input type="text" name="search" placeholder="Search packages..." value="{{ request('search') }}"
                    style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; width: 300px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Search
                </button>
            </form>
        </div>
        <a href="{{ route('admin.packages.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add New Package
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($packages as $package)
                <tr>
                    <td>
                        @if($package->image)
                            <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->title }}" 
                                 style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                        @else
                            <div style="width: 60px; height: 40px; background-color: #f3f4f6; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image" style="color: #9ca3af;"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $package->title }}</strong>
                    </td>
                    <td>
                        <span class="badge badge-info">{{ $package->category->name ?? 'N/A' }}</span>
                    </td>
                    <td>{{ $package->duration_days }} days</td>
                    <td>₹{{ number_format($package->price, 2) }}</td>
                    <td>
                        @if($package->discount_percentage > 0)
                            <span class="badge badge-success">{{ $package->discount_percentage }}% OFF</span>
                        @else
                            <span class="badge badge-warning">No Discount</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
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
                        <i class="fas fa-suitcase-rolling" style="font-size: 40px; margin-bottom: 10px;"></i>
                        <p>No packages found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $packages->links() }}
    </div>
</div>
@endsection
