<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Vraman</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            max-width: 420px;
            width: 100%;
            margin: 20px;
        }
        
        .login-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            padding: 40px;
            text-align: center;
        }
        
        .login-header h1 {
            color: white;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .login-header p {
            color: rgba(255,255,255,0.7);
            font-size: 14px;
        }
        
        .login-body {
            padding: 40px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #374151;
            font-size: 14px;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }
        
        .input-icon input {
            padding-left: 45px;
        }
        
        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }
        
        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
        }
        
        .remember-me label {
            color: #6b7280;
            font-size: 14px;
        }
        
        .error-message {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-link a {
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        
        .back-link a:hover {
            color: #3b82f6;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <h1><i class="fas fa-plane-departure"></i> Vraman</h1>
            <p>Admin Control Panel</p>
        </div>
        
        <div class="login-body">
            @if($errors->any())
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            
            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="admin@vraman.com" required autofocus>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>
                
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
            </form>
            
            <div class="back-link">
                <a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i> Back to Website</a>
            </div>
        </div>
    </div>
</body>
</html>
