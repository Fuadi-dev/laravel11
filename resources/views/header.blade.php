<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}?v={{ time() }}">
    <title>My Web</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>

            <ul class="nav-links">
                <li><a href="home">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="login_customer" class="login-btn">Login</a>
                <a href="register_customer" class="register-btn">Register</a>
            </div>
        </nav>
    </header>
</body>
</html>