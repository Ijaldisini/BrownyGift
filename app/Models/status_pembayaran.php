<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class status_pembayaran extends Model
{
    protected $table = 'status_pembayaran';
    protected $primaryKey = 'id_status_pembayaran';
    protected $fillable = ['status_pembayaran'];
}
