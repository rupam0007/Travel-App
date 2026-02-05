@extends('admin.layout')

@section('title', 'Create Destination')

@section('content')
<div class="table-card" style="max-width: 800px;">
    <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Destination Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="region_id">Region</label>
            <select id="region_id" name="region_id" required>
                <option value="">Select Region</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                @endforeach
            </select>
            @error('region_id')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="best_time_to_visit">Best Time to Visit</label>
            <input type="text" id="best_time_to_visit" name="best_time_to_visit" value="{{ old('best_time_to_visit') }}" placeholder="e.g., October - March" required>
            @error('best_time_to_visit')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="image">Cover Image</label>
            <input type="file" id="image" name="image" accept="image/*">
            @error('image')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Create Destination
            </button>
            <a href="{{ route('admin.destinations.index') }}" class="btn btn-danger">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
