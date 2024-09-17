<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap'><link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
@extends('sidebar')
<body>
    @section('content')
    <div class="container">
        <div class="row">
            <a href="{{url('/barang/tambah')}}" class="btn btn-success mb-5">Tambah Barang</a>
            @forelse($barang as $brg)
            <div class="col-md-4">
                <div class="card">
                    @if($brg->foto_barang)
                    <img src="{{asset('foto_barang/' . $brg->foto_barang)}}" class="card-img-top" alt="{{$brg->nama_barang}}">
                    @else
                    <img src="{{asset('not_found.jpeg')}}" class="card-img-top" alt="{{$brg->nama_barang}}">
                    @endif
                    <div class="card-body">
                        
                        <h5 class="card-title">{{$brg->nama_barang}}</h5>
                        <p class="card-text">{{$brg->deskripsi}}</p>
                        <p class="card-text">{{$brg->harga}}</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                      <a href="{{url('/barang/edit/' . $brg->id_barang)}}" class="btn btn-success">Edit</a>
                        <form action="{{url('barang/delete')}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id_barang" value="{{$brg->id_barang}}">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12 text-center">
                <p>Barang tidak ditemukan.</p>
            </div>
            @endforelse
        </div>
    </div>
@endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
