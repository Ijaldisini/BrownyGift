<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_produk',
        'id_kategori',
        'deskripsi_produk',
        'harga_produk',
        'stok_produk',
        'gambar_produk',
    ];
}
