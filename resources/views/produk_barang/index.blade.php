<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h1>Daftar Barang</h1>
    <ul>
        @foreach ($produkBarang as $produk)
            <li>
                {{ $produk->nama_produk }} -
                Kategori: {{ $produk->kategori_barangs->nama_kategori ?? 'Kategori tidak ditemukan' }}
            </li>
        @endforeach
    </ul>

</body>
</html>
