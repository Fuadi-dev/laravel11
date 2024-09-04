<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="{{ asset('css/tambah_barang.css') }}">
</head>
<body>
    <div class="container">
        <h2 class="title">Tambah Barang Baru</h2>
        <form action="{{url('barang/tambah/process')}}" method="POST" enctype="multipart/form-data" class="form-tambah-barang">
            @csrf
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control">
            </div>
            <div class="form-group">
                <label for="foto_barang">Foto Barang</label>
                <input type="file" name="foto_barang" id="foto_barang" class="form-control-file">
            </div>
            <button type="submit" class="btn-submit">Tambahkan</button>
        </form>
    </div>
</body>
</html>
