<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    protected $table = 'desa';
    protected $primaryKey = 'id_desa';
    protected $fillable = [
        'id_kecamatan',
        'nama_desa',
        'ongkir'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }
}
