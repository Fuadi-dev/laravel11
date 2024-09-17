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
@include('header')
<body>
    <div class="container">
        <div class="row">
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
                         <form action="{{url('cart/process')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_barang" value="{{$brg->id_barang}}">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" class="btn btn-success">Tambah Ke Keranjang</button>
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
    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
