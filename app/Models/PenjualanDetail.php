<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    protected $table = 't_penjualan_detail';

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }
}