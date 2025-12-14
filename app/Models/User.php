<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_role',
        'username', // Changed from 'nama'
        'email',
        'no_hp',
        'tanggal_lahir',
        'photo',
        'password',
    ];

    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'id_role', 'id_role');
    }

    public function alamat()
    {
        return $this->hasMany(alamat::class, 'id_user', 'id_user');
    }

    public function keranjang()
    {
        return $this->hasMany(keranjang::class, 'id_user', 'id_user');
    }

    public function pesanan()
    {
        return $this->hasMany(pesanan::class, 'id_user', 'id_user');
    }
}
