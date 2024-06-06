<!DOCTYPE html>
<html>

<head>
    <title>Tiket Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .header,
        .footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            margin-bottom: 20px;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
        }

        .content table,
        .content th,
        .content td {
            border: 1px solid black;
        }

        .content th,
        .content td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Tiket Pembelian</h2>
        </div>
        <div class="content">
            <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
            <p><strong>Tanggal Pembelian:</strong> {{ $transaksi->tanggalbeli }}</p>
            <p><strong>Nama Pembeli:</strong> {{ $transaksi->nama }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($transaksi->totalbeli) }}</p>
            <h3>Detail Wisata</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Lokasi</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wisata as $index => $w)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $w->judul }}</td>
                            <td>{{ $w->lokasi }}</td>
                            <td>Rp {{ number_format($w->harga) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Terima kasih telah bertransaksi dengan kami.</p>
        </div>
    </div>
</body>

</html>
