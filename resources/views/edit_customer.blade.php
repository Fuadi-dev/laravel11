<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko</title>
    <link rel="stylesheet" href="{{ asset('css/edit_barang.css') }}">
</head>
<body>
    <div class="container">
        <h2 class="title">Edit Customer: {{$customer->nama_customer}}</h2>
        <form action="{{url('customer/edit/process') }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda yakin ingin menyimpan perubahan?')">
            @csrf
            <input type="hidden" name="id_customer" value="{{$customer->id_customer}}">
            <div class="form-group">
                <label for='nama_customer'>Nama Customer</label>
                <input type="text" name="nama_customer" value="{{$customer->nama_customer}}">
            </div>
            <div class="form-group">
                <label for='email'>Email</label>
                <input type="text" name="email" value="{{$customer->email}}">
            </div>
            <div class="form-group">
                <label for='alamat'>Alamat</label>
                <textarea name="alamat" rows="5">{{$customer->alamat}}</textarea>
            </div>
            <div class="form-group">
                <label for='no_hp'>No HP</label>
                <input type="text" name="no_hp" value="{{$customer->no_hp}}">
            </div>
            <button class="submit-btn" type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>