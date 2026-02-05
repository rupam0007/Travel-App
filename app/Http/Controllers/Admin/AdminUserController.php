<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminUserController extends Controller
{
    /**
     * Display a listing of users
     */
    public function index(Request $request): View
    {
        $query = User::query();
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }
        
        $users = $query->paginate(15);
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    /**
     * Show the form for editing a user
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the user
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin',
        ]);

        if ($request->filled('password')) {
            $request->validate(['password' => 'min:8|confirmed']);
            $validated['password'] = bcrypt($request->password);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    /**
     * Delete a user
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
