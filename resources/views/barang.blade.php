<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="{{ asset('css/barang.css') }}">
</head>
<body class="bg-light">
    <div class="container shadow-lg rounded p-4 my-5">
        <h1 class="text-center text-primary mb-4">Daftar Barang</h1>
        <div class="row">
            <h3 class="col-md-8">Halo <span class="text-success">{{ $admin->nama_admin }}</span>!<a href="{{url('/logout') }}" class="btn btn-outline-danger btn-sm ml-2">Logout</a></h3>
            <a href="{{ url('/barang/tambah') }}" class="btn btn-primary col-md-4 mb-3">Tambah Barang</a>
            @forelse($barang as $brg)
            <div class="col-md-4 mb-4">
                <div class="barang-card card h-100 shadow-sm">
                    @if($brg->foto_barang)
                    <img src="{{asset('foto_barang/' . $brg->foto_barang)}}" class="card-img-top barang-image" alt="{{$brg->nama_barang}}">
                    @else
                    <img src="{{asset('not_found.jpeg')}}" class="card-img-top barang-image" alt="{{$brg->nama_barang}}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">{{$brg->nama_barang}}</h5>
                        <p class="card-text flex-grow-1">{{$brg->deskripsi}}</p>
                        <p class="card-text text-success font-weight-bold">Rp {{number_format($brg->harga, 0, ',', '.')}}</p>
                        <div class="btn-group mt-auto">
                            <a href="#" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{url('/barang/edit/' . $brg->id_barang)}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{url('barang/delete') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id_barang" value="{{ $brg->id_barang }}">
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <p class="alert alert-info">Barang tidak ditemukan.</p>
            </div>
            @endforelse
        </div>
    </div>
</body>
</html>
