@extends('admin.layout')

@section('title', 'Edit User')

@section('content')
<div class="table-card" style="max-width: 800px;">
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="form-group">
                <label for="password">Password (leave blank to keep current)</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>
        </div>
        
        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role')
                <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>
        
        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update User
            </button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
