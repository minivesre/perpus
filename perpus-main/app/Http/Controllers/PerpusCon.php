<?php

namespace App\Http\Controllers;

use App\Models\Coba;
use App\Models\Perpus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerpusCon extends Controller
{
    // Menampilkan daftar barang
    public function index()
    {
        $perpuses = Coba::orderBy('stok', 'ASC')->get();
        return view('index', compact('perpuses'));
    }

    // Menampilkan form untuk menambah barang
    public function create()
    {
        return view('create');
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:perpuses',
            'nama' => 'required',
            'stok' => 'required|integer',
        ]);

        Coba::create($request->all());
        return redirect()->route('perpus.index')->with('success', 'Barang berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit barang
    public function edit($id)
    {
        $perpus = Coba::findOrFail($id); // Menggunakan findOrFail untuk menangani error
        return view('edit', compact('perpus')); // Menggunakan $perpus
    }

    // Mengupdate barang yang ada
    public function update(Request $request, $id)
    {
        $perpus = Coba::findOrFail($id);
        $request->validate([
            'kode_barang' => 'required|unique:perpuses,kode_barang,' . $perpus->id,
            'nama' => 'required',
            'stok' => 'required|integer',
        ]);

        $perpus->update($request->only(['kode_barang', 'nama', 'stok'])); // Menggunakan $request->only()
        return redirect()->route('perpus.index')->with('success', 'Barang berhasil diperbarui');
    }

    // Menghapus barang
    public function destroy($id)
    {
        $perpus = Coba::findOrFail($id);
        $perpus->delete();
        return redirect()->route('perpus.index')->with('success', 'Barang berhasil dihapus');
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Menangani registrasi pengguna baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Menangani login pengguna
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('perpus.index')->with('success', 'Login berhasil.');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Menangani logout pengguna
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
