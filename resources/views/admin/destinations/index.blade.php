@extends('admin.layout')

@section('title', 'Destination Management')

@section('content')
<div class="table-card">
    <div class="flex justify-between items-center mb-5">
        <div>
            <form action="{{ route('admin.destinations.index') }}" method="GET" style="display: flex; gap: 10px;">
                <input type="text" name="search" placeholder="Search destinations..." value="{{ request('search') }}"
                    style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; width: 300px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Search
                </button>
            </form>
        </div>
        <a href="{{ route('admin.destinations.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add New Destination
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Region</th>
                <th>Best Time to Visit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($destinations as $destination)
                <tr>
                    <td>
                        @if($destination->image)
                            <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" 
                                 style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                        @else
                            <div style="width: 60px; height: 40px; background-color: #f3f4f6; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image" style="color: #9ca3af;"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $destination->name }}</strong>
                    </td>
                    <td>
                        <span class="badge badge-info">{{ $destination->region->name ?? 'N/A' }}</span>
                    </td>
                    <td>{{ $destination->best_time_to_visit }}</td>
                    <td>
                        <a href="{{ route('admin.destinations.edit', $destination) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.destinations.destroy', $destination) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
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
                    <td colspan="5" style="text-align: center; color: #9ca3af; padding: 30px;">
                        <i class="fas fa-map-marker-alt" style="font-size: 40px; margin-bottom: 10px;"></i>
                        <p>No destinations found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $destinations->links() }}
    </div>
</div>
@endsection
