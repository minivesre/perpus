<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator; // Pastikan Anda mengimpor Validator

class Coba extends Model
{
    use HasFactory;
    
    // Nama tabel di database
    protected $table = 'perpuses';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'kode_barang',
        'nama',
        'stok',
    ]; // Tambahkan koma di sini
    
    // Mengaktifkan timestamp untuk kolom created_at dan updated_at
    public $timestamps = true;

    // Contoh relasi, jika ada
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Metode untuk validasi data sebelum disimpan
    public static function validate($data)
    {
        return Validator::make($data, [
            'kode_barang' => 'required|unique:perpuses', // Pastikan nama tabel benar
            'nama' => 'required',
            'stok' => 'required|integer',
        ]);
    }

    // Scope untuk mendapatkan barang dengan stok lebih dari nol
    public function scopeWithStock($query)
    {
        return $query->where('stok', '>', 0);
    }

    // Metode untuk menambah stok
    public function increaseStock($amount)
    {
        $this->stok += $amount;
        $this->save();
    }
}
