<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $fillable = ['nama_kecamatan'];

    public function desas()
    {
        return $this->hasMany(desa::class, 'id_kecamatan', 'id_kecamatan');
    }
}
