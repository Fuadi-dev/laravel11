<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1 class='text-center mb-4'>Konfirmasi Pesanan</h1>
            </div>
        </div>
        <div class="row">
            <form action="{{ url('submit-order') }}" method="POST"></form>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan Pesanan</h5>
                        <p class="card-text">Detail pesanan Anda:</p>
                        @php
                        $subtotal = 0;
                        @endphp
                        @foreach($trans as $transaction)
                        <p class="card-text">{{$transaction->nama_barang}} (x{{$transaction->qty}})</p>
                        <hr/>
                        @php
                            $subtotal = $transaction->harga * $transaction->qty;
                            $total = $total =+ $subtotal;
                        @endphp
                        @endforeach
                        <hr/>
                        <h4>Total Pesanan: Rp {{ number_format($total, 0, ',', '.') }}</h4>
                        
                        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>