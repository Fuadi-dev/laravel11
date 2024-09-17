<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}?v={{ time() }}">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>

            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="auth-buttons">
                @if(session('customer'))
                    <span class="customer-name">hallo {{ session('nama_customer') }}</span>
                    <a href="{{ url('logout_customer') }}" class="logout-btn">Logout</a>
                @else
                    <a href="{{ url('login_customer') }}" class="login-btn">Login</a>
                    <a href="{{ url('register_customer') }}" class="register-btn">Register</a>
                @endif
            </div>            
        </nav>
    </header>
</body>
</html>