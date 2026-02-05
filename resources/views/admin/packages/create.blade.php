@extends('admin.layout')

@section('title', 'Create Package')

@section('content')
<div class="table-card" style="max-width: 900px;">
    <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="form-group">
                <label for="title">Package Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="form-group">
                <label for="duration_days">Duration (Days)</label>
                <input type="number" id="duration_days" name="duration_days" value="{{ old('duration_days') }}" min="1" required>
                @error('duration_days')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="price">Price (₹)</label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" required>
                @error('price')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="discount_percentage">Discount (%)</label>
                <input type="number" id="discount_percentage" name="discount_percentage" value="{{ old('discount_percentage', 0) }}" step="0.01" min="0" max="100">
                @error('discount_percentage')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label for="destinations">Destinations (comma-separated)</label>
            <input type="text" id="destinations" name="destinations" value="{{ old('destinations') }}" placeholder="e.g., Jaipur, Udaipur, Jodhpur">
            @error('destinations')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="highlights">Package Highlights</label>
            <textarea id="highlights" name="highlights" placeholder="Enter each highlight on a new line">{{ old('highlights') }}</textarea>
            @error('highlights')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="included_services">Included Services</label>
            <textarea id="included_services" name="included_services" placeholder="Enter each service on a new line">{{ old('included_services') }}</textarea>
            @error('included_services')
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
                <i class="fas fa-save"></i> Create Package
            </button>
            <a href="{{ route('admin.packages.index') }}" class="btn btn-danger">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
