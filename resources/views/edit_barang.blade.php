<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="{{ asset('css/edit_barang.css') }}">
</head>
<body>
    <div class="container">
        <h2 class="title">Edit Barang: {{$barang->nama_barang}}</h2>
        <form class="edit-form" action="{{url('barang/edit/process/') }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda yakin ingin menyimpan perubahan?')">
            @csrf
            <input type="hidden" name="id_barang" value="{{$barang->id_barang}}">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="5">{{$barang->deskripsi}}</textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" id="harga" name="harga" value="{{$barang->harga}}">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" value="{{$barang->stok}}">
            </div>
            <div class="form-group">
                <label for="foto_barang">Foto Barang</label>
                <input type="file" id="foto_barang" name="foto_barang" value={{$barang->foto_barang }}>
            </div>
            <button class="submit-btn" type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
