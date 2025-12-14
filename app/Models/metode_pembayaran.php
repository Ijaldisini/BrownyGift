<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class metode_pembayaran extends Model
{
    protected $table = 'metode_pembayaran';
    protected $primaryKey = 'id_metode_pembayaran';
    protected $fillable = ['metode_pembayaran'];
}
