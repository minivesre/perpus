@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background: linear-gradient(to right, #00c6ff, #0072ff); padding: 50px 0; border-radius: 15px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0" style="border-radius: 20px;">
                <div class="card-header bg-primary text-white text-center" style="border-top-left-radius: 20px; border-top-right-radius: 20px; padding: 20px 0;">
                    <h2 class="mb-0" style="font-weight: bold;">Tambah Barang</h2>
                </div>
                <div class="card-body p-5" style="background-color: #f5f7fa;">
                    <form action="{{ route('perpus.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="kode_barang" class="form-label">Kode Barang</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input type="text" name="kode_barang" class="form-control" placeholder="Masukkan kode barang" required style="border-radius: 0 10px 10px 0;">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Barang</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-box-open"></i></span>
                                </div>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama barang" required style="border-radius: 0 10px 10px 0;">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="stok" class="form-label">Stok Barang</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-cubes"></i></span>
                                </div>
                                <input type="number" name="stok" class="form-control" placeholder="Masukkan jumlah stok" required style="border-radius: 0 10px 10px 0;">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-5 py-2" style="border-radius: 50px; font-size: 18px; font-weight: bold; transition: background-color 0.3s ease;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
