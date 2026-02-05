@extends('admin.layout')

@section('title', 'Edit Destination')

@section('content')
<div class="table-card" style="max-width: 800px;">
    <form action="{{ route('admin.destinations.update', $destination) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Destination Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $destination->name) }}" required>
            @error('name')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="region_id">Region</label>
            <select id="region_id" name="region_id" required>
                <option value="">Select Region</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ old('region_id', $destination->region_id) == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                @endforeach
            </select>
            @error('region_id')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description', $destination->description) }}</textarea>
            @error('description')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="best_time_to_visit">Best Time to Visit</label>
            <input type="text" id="best_time_to_visit" name="best_time_to_visit" value="{{ old('best_time_to_visit', $destination->best_time_to_visit) }}" placeholder="e.g., October - March" required>
            @error('best_time_to_visit')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="image">Cover Image</label>
            @if($destination->image)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" 
                         style="width: 150px; height: 100px; object-fit: cover; border-radius: 4px;">
                </div>
            @endif
            <input type="file" id="image" name="image" accept="image/*">
            <p style="font-size: 12px; color: #6b7280;">Leave blank to keep current image</p>
            @error('image')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Destination
            </button>
            <a href="{{ route('admin.destinations.index') }}" class="btn btn-danger">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
