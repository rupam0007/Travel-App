@extends('layouts.app')

@section('title', 'Login - Vraman')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo -->
        <div class="text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center space-x-2">
                <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-700 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-2xl">V</span>
                </div>
            </a>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Welcome Back!</h2>
            <p class="mt-2 text-sm text-gray-600">Sign in to your account to continue</p>
        </div>
        
        <!-- Login Form -->
        <div class="bg-white py-8 px-6 shadow-2xl rounded-2xl">
            @if($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            
            <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                            placeholder="Enter your email">
                    </div>
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" required
                            class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                            placeholder="Enter your password">
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" 
                            class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                    <a href="#" class="text-sm text-primary-600 hover:text-primary-500">Forgot password?</a>
                </div>
                
                <button type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition">
                    <i class="fas fa-sign-in-alt mr-2"></i> Sign In
                </button>
            </form>
            
            <!-- Divider -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>
            </div>
            
            <!-- Social Login -->
            <div class="mt-6 grid grid-cols-2 gap-3">
                <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fab fa-google text-red-500 mr-2"></i> Google
                </button>
                <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fab fa-facebook text-blue-600 mr-2"></i> Facebook
                </button>
            </div>
        </div>
        
        <!-- Register Link -->
        <p class="text-center text-sm text-gray-600">
            Don't have an account? 
            <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500">Create one now</a>
        </p>
    </div>
</div>
@endsection
