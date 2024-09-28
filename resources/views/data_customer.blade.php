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
    <div class="container mt-4">
        <h2>Data Customer</h2>
            <form action="{{ url('/data_customer') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search customer" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $cstmr)
                <tr>
                    <td>{{ $cstmr->id_customer }}</td>
                    <td>{{ $cstmr->nama_customer }}</td>
                    <td>{{ $cstmr->email }}</td>
                    <td>{{ $cstmr->alamat }}</td>
                    <td>{{ $cstmr->no_hp }}</td>
                    <td>
                        <a href="{{ url('customer/edit/'. $cstmr->id_customer) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ url('/customer/delete') }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id_customer" value="{{ $cstmr->id_customer }}">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>