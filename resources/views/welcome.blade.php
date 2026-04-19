<!DOCTYPE html>
<html>
<head>
    <title>Kue App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #fff7f7;
        }

        h2 {
            font-weight: bold;
            color: #ff6b81;
        }

        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .btn-primary {
            background-color: #ff6b81 !important;
            border: none !important;
        }

        .btn-primary:hover {
            background-color: #ff4d6d !important;
        }

        th {
            background-color: #ff6b81 !important;
            color: white !important;
        }
    </style>
</head>

<body class="container mt-5">

<h2 class="mb-4">🎂 Data Produk Kue</h2>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('kue.create') }}" class="btn btn-primary">+ Tambah Kue</a>

    <form action="{{ route('kue.index') }}" method="GET" class="d-flex w-50">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari nama kue..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-danger">Cari</button>
    </form>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kue</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        {{-- Menggunakan forelse agar jika data kosong ada pesan yang muncul --}}
        @forelse($kues as $no => $kue)
        <tr>
            <td class="text-center">{{ $no + 1 }}</td>
            <td>{{ $kue->nama_kue }}</td>
            <td>Rp {{ number_format($kue->harga, 0, ',', '.') }}</td>
            <td class="text-center">{{ $kue->stok }}</td>
            <td>{{ $kue->deskripsi ?? '-' }}</td>
            <td>
                <div class="d-flex gap-1">
                    <a href="{{ route('kue.edit', $kue->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('kue.destroy', $kue->id) }}" method="POST" class="d-inline form-hapus">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center py-4">Data kue tidak ditemukan.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@if(session('success'))
<script>
Swal.fire(
    "Sukses!",
    "{{ session('success') }}",
    "success"
)
</script>
@endif

<script>
    // Ganti confirm browser yang jadul dengan SweetAlert biar seragam
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.form-hapus');
            Swal.fire({
                title: 'Hapus Data?',
                text: "Kue ini akan dihapus selamanya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff6b81',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

</body>
</html>