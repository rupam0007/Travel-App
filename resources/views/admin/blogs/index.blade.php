@extends('admin.layout')

@section('title', 'Blog Management')

@section('content')
<div class="table-card">
    <div class="flex justify-between items-center mb-5">
        <div>
            <form action="{{ route('admin.blogs.index') }}" method="GET" style="display: flex; gap: 10px;">
                <input type="text" name="search" placeholder="Search blogs..." value="{{ request('search') }}"
                    style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; width: 300px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Search
                </button>
            </form>
        </div>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add New Blog
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
                <tr>
                    <td>
                        @if($blog->featured_image)
                            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" 
                                 style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
                        @else
                            <div style="width: 80px; height: 50px; background-color: #f3f4f6; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image" style="color: #9ca3af;"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ Str::limit($blog->title, 50) }}</strong>
                        <div style="font-size: 12px; color: #6b7280;">{{ Str::limit($blog->excerpt ?? '', 80) }}</div>
                    </td>
                    <td>
                        @if($blog->is_published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-warning">Draft</span>
                        @endif
                    </td>
                    <td>{{ $blog->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('blogs.show', $blog) }}" class="btn btn-sm btn-primary" target="_blank">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
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
                        <i class="fas fa-blog" style="font-size: 40px; margin-bottom: 10px;"></i>
                        <p>No blogs found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
