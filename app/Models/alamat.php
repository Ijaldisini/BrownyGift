<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alamat extends Model
{
    protected $table = 'alamat';
    protected $primaryKey = 'id_alamat';
    protected $fillable = [
        'id_user',
        'id_kecamatan',
        'id_desa',
        'detail_alamat',
        'nama_penerima',
        'no_hp_penerima',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_user');
    }

    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }

    public function desa()
    {
        return $this->belongsTo(desa::class, 'id_desa', 'id_desa');
    }
}
