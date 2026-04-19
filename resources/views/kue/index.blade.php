<!DOCTYPE html>
<html>
<head>
    <title>Kue App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="container mt-5">

<h2 class="mb-4">🎂 Data Produk Kue</h2>

<div class="d-flex justify-content-between mb-3">
    <a href="{{ route('kue.create') }}" class="btn btn-primary">+ Tambah Kue</a>
    
    <form action="{{ route('kue.index') }}" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari nama kue..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-secondary">Cari</button>
    </form>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
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
        @forelse($kues as $no => $kue)
        <tr>
            <td>{{ $no + 1 }}</td>
            <td>{{ $kue->nama_kue }}</td>
            <td>Rp {{ number_format($kue->harga, 0, ',', '.') }}</td>
            <td>{{ $kue->stok }}</td>
            <td>{{ $kue->deskripsi ?? '-' }}</td>
            <td>
                <a href="{{ route('kue.edit', $kue->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('kue.destroy', $kue->id) }}" method="POST" class="d-inline form-hapus">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Data kue tidak ditemukan.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@if(session('success'))
<script>
    Swal.fire("Sukses!", "{{ session('success') }}", "success");
</script>
@endif

<script>
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.form-hapus');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data kue ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
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