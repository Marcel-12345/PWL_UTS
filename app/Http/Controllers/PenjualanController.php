<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Barang;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function create()
    {
        $barang = Barang::all();
        return view('penjualan.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $penjualan = Penjualan::create([
            'user_id' => 1,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => 'TRX-' . time(),
            'penjualan_tanggal' => now(),
        ]);

        foreach ($request->barang_id as $key => $barang_id) {
            PenjualanDetail::create([
                'penjualan_id' => $penjualan->id,
                'barang_id' => $barang_id,
                'harga' => $request->harga[$key],
                'jumlah' => $request->jumlah[$key],
            ]);
        }

        return redirect('/')->with('success', 'Transaksi berhasil');
    }
}