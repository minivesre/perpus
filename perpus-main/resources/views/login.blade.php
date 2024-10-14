@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background: #ffffff; padding: 50px 0;">
    <h2 class="text-center mb-4" style="color: #333; font-weight: bold;">Login</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg" style="border-radius: 15px; border: 1px solid #6495ED;">
                <div class="card-header text-center" style="background-color: #6495ED; color: #fff; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <h4>Silakan Masuk</h4>
                </div>
                <div class="card-body" style="padding: 30px; background-color: #fff;">
                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" required style="border-radius: 10px; border: 1px solid #6495ED;">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" required style="border-radius: 10px; border: 1px solid #6495ED;">
                        </div>
                        <button type="submit" class="btn btn-warning w-100" style="border-radius: 50px; padding: 10px 0; font-size: 16px; background-color: #ffca28; border: none;">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center" style="background-color: #f9f9f9; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                    <p>Belum punya akun? <a href="{{ route('register') }}" style="color: #6495ED;">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
