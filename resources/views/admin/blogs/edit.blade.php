@extends('admin.layout')

@section('title', 'Edit Blog')

@section('content')
<div class="table-card" style="max-width: 900px;">
    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Blog Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
            @error('title')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="excerpt">Excerpt (Short Description)</label>
            <textarea id="excerpt" name="excerpt" style="min-height: 80px;">{{ old('excerpt', $blog->excerpt) }}</textarea>
            @error('excerpt')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" style="min-height: 300px;" required>{{ old('content', $blog->content) }}</textarea>
            @error('content')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="form-group">
                <label for="featured_image">Featured Image</label>
                @if($blog->featured_image)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" 
                             style="width: 200px; height: 120px; object-fit: cover; border-radius: 4px;">
                    </div>
                @endif
                <input type="file" id="featured_image" name="featured_image" accept="image/*">
                <p style="font-size: 12px; color: #6b7280;">Leave blank to keep current image</p>
                @error('featured_image')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="is_published">Status</label>
                <select id="is_published" name="is_published">
                    <option value="0" {{ old('is_published', $blog->is_published) === 0 ? 'selected' : '' }}>Draft</option>
                    <option value="1" {{ old('is_published', $blog->is_published) === 1 ? 'selected' : '' }}>Published</option>
                </select>
            </div>
        </div>
        
        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Blog
            </button>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-danger">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
