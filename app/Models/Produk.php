<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'harga', 'image'];
    protected $visible  = ['nama', 'deskripsi', 'harga', 'image'];

    public function transaksi()
    {
// membuat relasi many-to-many dengan model Transaksi melalui tabel pivot detail_transaksis
// dan menyertakan kolom tambahan jumlah dan subtotal dari tabel pivot
        return $this->belongsToMany(Transaksi::class, 'detail_transaksis', 'id_produk', 'id_transaksi')
                    ->withPivot('jumlah', 'subtotal')
                    ->withTimestamps();

}

}
