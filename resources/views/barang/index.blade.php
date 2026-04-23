<h1>Daftar Barang</h1>

<a href="/penjualan">Transaksi</a>

<ul>
@foreach($barang as $b)
    <li>
        {{ $b->barang_nama }} - Rp{{ $b->harga_jual }}
        <a href="/barang/{{ $b->barang_id }}">Detail</a>
    </li>
@endforeach
</ul>