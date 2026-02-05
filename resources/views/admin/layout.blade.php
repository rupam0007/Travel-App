<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Chart.js for analytics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        .sidebar {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 3px;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        .sidebar-header {
            padding: 30px 20px;
            border-bottom: 2px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-header h2 {
            color: white;
            font-size: 24px;
            font-weight: 700;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
        }
        
        .sidebar-menu li {
            margin: 0;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }
        
        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            color: white;
            background-color: rgba(255,255,255,0.1);
            border-left-color: #fbbf24;
        }
        
        .sidebar-menu i {
            width: 24px;
            margin-right: 12px;
        }
        
        .top-navbar {
            background: white;
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .top-navbar h1 {
            color: #1e3a8a;
            font-size: 28px;
            font-weight: 700;
        }
        
        .navbar-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        
        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            position: relative;
        }
        
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-left: 4px solid;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .stat-card.primary {
            border-color: #3b82f6;
        }
        
        .stat-card.success {
            border-color: #10b981;
        }
        
        .stat-card.warning {
            border-color: #f59e0b;
        }
        
        .stat-card.danger {
            border-color: #ef4444;
        }
        
        .stat-card .label {
            color: #6b7280;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        
        .stat-card .number {
            font-size: 32px;
            font-weight: 700;
            color: #1f2937;
        }
        
        .stat-card .icon {
            font-size: 32px;
            float: right;
            opacity: 0.2;
        }
        
        .stat-card.primary .icon {
            color: #3b82f6;
        }
        
        .stat-card.success .icon {
            color: #10b981;
        }
        
        .stat-card.warning .icon {
            color: #f59e0b;
        }
        
        .stat-card.danger .icon {
            color: #ef4444;
        }
        
        .table-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-top: 20px;
        }
        
        .table-card table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table-card thead th {
            background-color: #f3f4f6;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            border-bottom: 2px solid #e5e7eb;
        }
        
        .table-card tbody td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .table-card tbody tr:hover {
            background-color: #f9fafb;
        }
        
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        
        .btn-primary {
            background-color: #3b82f6;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #2563eb;
        }
        
        .btn-success {
            background-color: #10b981;
            color: white;
        }
        
        .btn-success:hover {
            background-color: #059669;
        }
        
        .btn-warning {
            background-color: #f59e0b;
            color: white;
        }
        
        .btn-warning:hover {
            background-color: #d97706;
        }
        
        .btn-danger {
            background-color: #ef4444;
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #dc2626;
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        
        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        
        .alert-warning {
            background-color: #fef3c7;
            color: #78350f;
            border: 1px solid #fde68a;
        }
        
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .badge-success {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .badge-warning {
            background-color: #fef3c7;
            color: #78350f;
        }
        
        .badge-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        .badge-info {
            background-color: #dbeafe;
            color: #1e3a8a;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #374151;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar.active {
                margin-left: 0;
            }
            
            .top-navbar {
                flex-direction: column;
                gap: 15px;
            }
            
            .top-navbar h1 {
                font-size: 20px;
            }
            
            .navbar-right {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-plane-departure"></i> Vraman</h2>
            <p style="color: rgba(255,255,255,0.6); font-size: 12px; margin-top: 5px;">Travel Admin</p>
        </div>
        
        <ul class="sidebar-menu">
            <li><a href="{{ route('admin.dashboard') }}" class="@routeIs('admin.dashboard') active @endrouteIs"><i class="fas fa-chart-line"></i> Dashboard</a></li>
            
            <li style="padding: 15px 20px; color: rgba(255,255,255,0.5); font-size: 12px; font-weight: 600; text-transform: uppercase;">Content</li>
            <li><a href="{{ route('admin.destinations.index') }}" class="@routeIs('admin.destinations.*') active @endrouteIs"><i class="fas fa-map-marker-alt"></i> Destinations</a></li>
            <li><a href="{{ route('admin.packages.index') }}" class="@routeIs('admin.packages.*') active @endrouteIs"><i class="fas fa-suitcase-rolling"></i> Packages</a></li>
            <li><a href="{{ route('admin.blogs.index') }}" class="@routeIs('admin.blogs.*') active @endrouteIs"><i class="fas fa-blog"></i> Blogs</a></li>
            
            <li style="padding: 15px 20px; color: rgba(255,255,255,0.5); font-size: 12px; font-weight: 600; text-transform: uppercase;">Management</li>
            <li><a href="{{ route('admin.bookings.index') }}" class="@routeIs('admin.bookings.*') active @endrouteIs"><i class="fas fa-calendar-check"></i> Bookings</a></li>
            <li><a href="{{ route('admin.reviews.index') }}" class="@routeIs('admin.reviews.*') active @endrouteIs"><i class="fas fa-star"></i> Reviews</a></li>
            <li><a href="{{ route('admin.users.index') }}" class="@routeIs('admin.users.*') active @endrouteIs"><i class="fas fa-users"></i> Users</a></li>
            
            <li style="padding: 15px 20px; color: rgba(255,255,255,0.5); font-size: 12px; font-weight: 600; text-transform: uppercase;">Settings</li>
            <li><a href="{{ route('admin.settings.index') }}" class="@routeIs('admin.settings.*') active @endrouteIs"><i class="fas fa-cog"></i> Settings</a></li>
            
            <li style="padding: 15px 20px; color: rgba(255,255,255,0.5); font-size: 12px; font-weight: 600; text-transform: uppercase;">Other</li>
            <li><a href="{{ route('home') }}"><i class="fas fa-external-link-alt"></i> Visit Website</a></li>
            <li><a href="#" onclick="document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <h1>@yield('title', 'Dashboard')</h1>
            <div class="navbar-right">
                <div style="color: #6b7280;">
                    <i class="fas fa-user-circle" style="font-size: 24px; color: #3b82f6;"></i>
                </div>
                <div class="user-dropdown">
                    <span style="color: #374151; font-weight: 500;">{{ Auth::user()->name ?? 'Admin' }}</span>
                </div>
            </div>
        </div>
        
        <!-- Alerts -->
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ $message }}
            </div>
        @endif
        
        @if($message = Session::get('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> {{ $message }}
            </div>
        @endif
        
        @if($message = Session::get('warning'))
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i> {{ $message }}
            </div>
        @endif
        
        <!-- Page Content -->
        @yield('content')
    </div>
    
    <!-- Logout Form (hidden) -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
    <script>
        // Simple confirmation for delete actions
        function confirmDelete() {
            return confirm('Are you sure you want to delete this item?');
        }
    </script>
    
    @yield('scripts')
</body>
</html>
