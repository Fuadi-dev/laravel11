<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href={{ asset('css/login.css') }}>
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <form action="{{ url('register_admin/process') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" placeholder="masukan email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" placeholder="masukan password" name="password" required>
            </div>
            <div class="form-group">
                <label for='nama_admin'>Nama Anda:</label>
                <input type='text' placeholder='masukan nama anda' name='nama_admin' required>
            </div>
            <button type="submit" name ="register">Register</button>
        </form>
        <a href="/">kembali</a>
    </div>
</body>
</html>
