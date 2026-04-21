<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'level_id',
        'username',
        'nama',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'user_id');
    }

    public function stok()
    {
        return $this->hasMany(Stok::class, 'user_id');
    }
}