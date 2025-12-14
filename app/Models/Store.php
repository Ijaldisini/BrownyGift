<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';
    protected $primaryKey = 'id_store';

    protected $fillable = [
        'nama_toko',
        'deskripsi',
        'tentang_kami',
    ];
}
