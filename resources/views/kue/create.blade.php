<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kue - Kue App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h2 class="h5 mb-0">➕ Tambah Produk Kue Baru</h2>
                </div>
                <div class="card-body">

                    {{-- Menampilkan Pesan Error jika input tidak valid --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kue.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Kue</label>
                            <input type="text" name="nama_kue" value="{{ old('nama_kue') }}" class="form-control" placeholder="Masukkan nama kue..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="harga" value="{{ old('harga') }}" class="form-control" placeholder="Contoh: 15000" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" value="{{ old('stok') }}" class="form-control" placeholder="Jumlah stok tersedia" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Jelaskan detail kue di sini...">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('kue.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Produk</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>