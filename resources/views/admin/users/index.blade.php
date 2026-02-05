@extends('admin.layout')

@section('title', 'User Management')

@section('content')
<div class="table-card">
    <div class="flex justify-between items-center mb-5">
        <div>
            <form action="{{ route('admin.users.index') }}" method="GET" style="display: flex; gap: 10px;">
                <input type="text" name="search" placeholder="Search users..." value="{{ request('search') }}"
                    style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; width: 300px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Search
                </button>
            </form>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add New User
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Registered</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div style="width: 40px; height: 40px; border-radius: 50%; background-color: #3b82f6; color: white; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            {{ $user->name }}
                        </div>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role === 'admin' || $user->is_admin)
                            <span class="badge badge-info">Admin</span>
                        @else
                            <span class="badge badge-success">User</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
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
                    <td colspan="6" style="text-align: center; color: #9ca3af; padding: 30px;">
                        <i class="fas fa-users" style="font-size: 40px; margin-bottom: 10px;"></i>
                        <p>No users found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $users->links() }}
    </div>
</div>
@endsection
