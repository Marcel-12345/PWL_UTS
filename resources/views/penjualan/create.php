<h1>Transaksi Penjualan</h1>

<form method="POST" action="/penjualan">
    @csrf

    Nama Pembeli:
    <input type="text" name="pembeli"><br><br>

    <div id="items">
        <div>
            Barang:
            <select name="barang_id[]">
                @foreach($barang as $b)
                    <option value="{{ $b->barang_id }}">
                        {{ $b->barang_nama }}
                    </option>
                @endforeach
            </select>

            Harga:
            <input type="number" name="harga[]">

            Jumlah:
            <input type="number" name="jumlah[]">
        </div>
    </div>

    <button type="submit">Simpan</button>
</form>