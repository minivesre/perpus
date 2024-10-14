@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background: linear-gradient(to right, #e0eafc, #cfdef3); padding: 50px 0;">
    <h2 class="text-center mb-4" style="color: #333; font-weight: bold;">Registrasi</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg" style="border-radius: 15px;">
                <div class="card-header text-center" style="background-color: #FFB6C1; color: #fff; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <h4>Buat Akun Baru</h4>
                </div>
                <div class="card-body" style="padding: 30px;">
                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama:</label>
                            <input type="text" name="name" class="form-control" required style="border-radius: 10px;">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" required style="border-radius: 10px;">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" required style="border-radius: 10px;">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password:</label>
                            <input type="password" name="password_confirmation" class="form-control" required style="border-radius: 10px;">
                        </div>
                        <button type="submit" class="btn btn-primary w-100" style="border-radius: 50px; padding: 10px 0; font-size: 16px;">Registrasi</button>
                    </form>
                </div>
                <div class="card-footer text-center" style="background-color: #f9f9f9; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                    <p>Sudah punya akun? <a href="{{ route('login') }}" style="color: #FFB6C1;">Masuk di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
