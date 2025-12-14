<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_pesanan extends Model
{
    protected $table = 'detail_pesanan';
    protected $primaryKey = 'id_detail';

    // Tetap true jika di migrasi Anda menggunakan $table->timestamps()
    public $timestamps = true;

    protected $fillable = [
        'id_pesanan',
        'id_produk',
        'quantity_per_produk',
        'harga_produk',
        'subtotal',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
