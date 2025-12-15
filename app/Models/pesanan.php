<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';

    // Matikan timestamps otomatis karena tidak ada kolom updated_at
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_alamat',
        'id_metode_pembayaran',
        'id_status_pembayaran',
        'id_status_pemesanan',
        'total',
        'bukti_pembayaran',
        'catatan',
        'tanggal_pemesanan',
        'tanggal_pengambilan',
        'tanggal_konfirmasi',
    ];

    public function detailPesanan()
    {
        return $this->hasMany(detail_pesanan::class, 'id_pesanan', 'id_pesanan');
    }

    public function statusPemesanan()
    {
        return $this->belongsTo(status_pemesanan::class, 'id_status_pemesanan', 'id_status_pemesanan');
    }

    public function statusPembayaran()
    {
        return $this->belongsTo(status_pembayaran::class, 'id_status_pembayaran', 'id_status_pembayaran');
    }

    public function metodePembayaran()
    {
        return $this->belongsTo(metode_pembayaran::class, 'id_metode_pembayaran', 'id_metode_pembayaran');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'id_alamat', 'id_alamat');
    }
}
