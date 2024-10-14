@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-color: #98FB98;">
    <div class="row justify-content-between mb-4">
        <div class="col-auto">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-lg shadow-sm" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg shadow-sm me-2">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-success btn-lg shadow-sm">
                            <i class="bi bi-person-plus"></i> Registrasi
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg" style="border-radius: 12px;">
                <div class="card-header bg-info text-white text-center py-4">
                    <h2 class="mb-0 fw-bold">Data Barang</h2>
                </div>
                <div class="card-body" style="background-color: #e9f7ef;">
                    <div class="d-flex justify-content-between mb-4">
                        <a href="{{ route('perpus.create') }}" class="btn btn-warning btn-lg shadow-sm">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Barang
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($perpuses as $perpus)
                                    <tr>
                                        <td>{{ $perpus->kode_barang }}</td>
                                        <td>{{ $perpus->nama }}</td>
                                        <td>{{ $perpus->stok }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('perpus.edit', $perpus->id) }}" class="btn btn-success btn-sm me-2 shadow-sm">
                                                    <i class="bi bi-pencil-fill"></i> Edit
                                                </a>
                                                <form action="{{ route('perpus.destroy', $perpus->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?')" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm delete-btn">
                                                        <i class="bi bi-trash-fill"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.target.classList.add('btn-deleting');
        });
    });
</script>

<style>
    body {
        background-color: #f0f8ff; /* Latar belakang cerah */
    }

    .card {
        border: none;
        border-radius: 12px;
    }

    .card-header {
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
    }

    .table-hover tbody tr:hover {
        background-color: #d1ecf1; /* Hover cerah */
        transition: background-color 0.3s ease-in-out;
    }

    .btn {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .btn:hover {
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
        transform: translateY(-3px);
    }

    .btn-deleting {
        background-color: #d9534f !important;
        opacity: 0.7;
        pointer-events: none;
    }

    .delete-btn:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease-in-out;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #fff3cd; /* Baris ganjil cerah */
    }

    .table-striped tbody tr:nth-of-type(even) {
        background-color: #e2e3e5; /* Baris genap cerah */
    }

    .table-primary {
        background-color: #9370DB; /* Header tabel cerah */
        color: #004085; /* Teks header tabel */
    }

    .btn-warning {
        background-color: #98FB98; /* Tombol tambah barang cerah */
        border: none;
    }

    .btn-warning:hover {
        background-color: #98FB98; /* Hover tombol tambah */
    }

    .btn-danger {
        background-color: #dc3545; /* Tombol hapus cerah */
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333; /* Hover tombol hapus */
    }

    .btn-success {
        background-color: #28a745; /* Tombol edit cerah */
        border: none;
    }

    .btn-success:hover {
        background-color: #32CD32; /* Hover tombol edit */
    }

    .btn-primary {
        background-color: #98FB98; /* Tombol login cerah */
        border: none;
    }

    .btn-primary:hover {
        background-color: #FFB6C1; /* Hover tombol login */
    }
</style>
@endsection

