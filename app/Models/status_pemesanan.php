<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class status_pemesanan extends Model
{
    protected $table = 'status_pemesanan';
    protected $primaryKey = 'id_status_pemesanan';
    protected $fillable = ['status_pemesanan'];

    public function pesanans()
    {
        return $this->hasMany(pesanan::class, 'id_status_pemesanan', 'id_status_pemesanan');
    }
}
