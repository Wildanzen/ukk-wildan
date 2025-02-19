<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, rgba(48, 48, 48, 0.838), rgba(0, 0, 0, 0.482)),
                url('/gambar/wildan2.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #000; /* Font color changed to black */
            overflow-x: hidden;
            text-align: center;
        }

        .hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80vh; /* Reduced height to bring text closer to top */
            padding: 20px;
            margin-top: -50px; /* Moved hero section up */
        }

        .hero img {
            max-width: 100%;
            height: auto;
            animation: bounce 2s infinite;
            border-radius: 15px;
        }

        .hero h1 {
            font-size: 3.5em;
            margin: 20px 0;
            color: white; /* Font color changed to white */
        }

        .hero p {
            font-size: 1.3em;
            margin-bottom: 20px;
            max-width: 600px;
            color: white; /* Font color changed to white */
        }

        .hero .cta {
            background-color: #ff007f;
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 30px;
            font-size: 1.3em;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            text-decoration: none;
        }

        .hero .cta:hover {
            background-color: #e60073;
            transform: scale(1.1);
        }

        /* Cards Section moved above */
        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
            margin-top: -40px; /* Slightly moved the cards section up */
        }

        .card {
            background: linear-gradient(135deg, #ffffff, #ffffff);
            color: #000; /* Font color changed to black */
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin: 15px;
            width: 300px;
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s;
            padding: 20px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 1.6em;
        }

        .card p {
            font-size: 1.1em;
        }
    </style>
</head>

<body>
    <section class="hero">
        <h1>Hijab Wilz🧕</h1>
        <p>toko hijab terbaik dan termurah</p>
        <a href="/login" class="cta">Mulai sekarang</a>
    </section>

    <!-- Cards Section moved above -->
    <section class="cards" id="fitur">
        <div class="card">
            <h3>📦Manajemen Stok</h3>
            <p>Catat dan pantau stok barang dengan akurat dan mudah.</p>
        </div>
        <div class="card">
            <h3>📊 Laporan</h3>
            <p>Dapatkan laporan barang masuk, keluar, dan stok secara real-time.</p>
        </div>
        <div class="card">
            <h3>👥 Multi Pengguna</h3>
            <p>Kelola toko dengan akses berbeda untuk admin, petugas, dan owner.</p>
        </div>
        <div class="card">
            <h3>💰 Keuangan</h3>
            <p>Pantau transaksi penjualan dan pembelian dengan detail lengkap.</p>
        </div>
        <div class="card">
            <h3>🛍️ Supplier Management</h3>
            <p>Kelola daftar supplier dan pemesanan barang dengan lebih efisien.</p>
        </div>
        <div class="card">
            <h3>📅 Jadwal Restock</h3>
            <p>Atur jadwal pengisian ulang barang otomatis agar tidak kehabisan stok.</p>
        </div>
    </section>

</body>

</html>
