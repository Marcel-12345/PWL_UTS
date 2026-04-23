<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('kategori')->get();
        return view('barang.index', compact('barang'));
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }
}