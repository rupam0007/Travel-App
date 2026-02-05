@extends('admin.layout')

@section('title', 'Create Blog')

@section('content')
<div class="table-card" style="max-width: 900px;">
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="title">Blog Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="excerpt">Excerpt (Short Description)</label>
            <textarea id="excerpt" name="excerpt" style="min-height: 80px;">{{ old('excerpt') }}</textarea>
            @error('excerpt')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" style="min-height: 300px;" required>{{ old('content') }}</textarea>
            @error('content')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="form-group">
                <label for="featured_image">Featured Image</label>
                <input type="file" id="featured_image" name="featured_image" accept="image/*">
                @error('featured_image')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="is_published">Status</label>
                <select id="is_published" name="is_published">
                    <option value="0" {{ old('is_published') === '0' ? 'selected' : '' }}>Draft</option>
                    <option value="1" {{ old('is_published') === '1' ? 'selected' : '' }}>Published</option>
                </select>
            </div>
        </div>
        
        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Create Blog
            </button>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-danger">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
