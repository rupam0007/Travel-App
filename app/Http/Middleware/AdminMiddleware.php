<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }

        // Check if user has admin role
        $user = auth()->user();
        if ($user->role !== 'admin' && !$user->is_admin) {
            auth()->logout();
            return redirect()->route('admin.login')->withErrors(['email' => 'You do not have admin access.']);
        }

        return $next($request);
    }
}
