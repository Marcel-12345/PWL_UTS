<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'm_barang';

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }
}