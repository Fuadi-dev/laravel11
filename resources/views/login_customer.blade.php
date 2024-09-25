<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="{{ url('login/proses') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type='email' name='email' placeholder="masukan email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="masukan password" required>
            </div>
            <button type="submit" name=login>Login</button>
        </form>
        <h4>Belum punya akun? <a href="/register_customer">daftar sekarang!</a></h4>
        <a href="/">kembali</a>
    </div>

</body>
</html>