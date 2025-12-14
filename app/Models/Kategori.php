<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori');
    }

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
}
