<!DOCTYPE html>
<html>
<head>
    <title>Rekap Data Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h3 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-style: italic;
        }
    </style>
</head>
<body>

    <h3><i class="fas fa-clipboard-list"></i> <b>Data Rekap Pembayaran</b></h3>
    <p>Tanggal: {{ date('d-m-Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th class="text-left">Nama Siswa</th>
                <th>NIS</th>
                <th>Tipe</th>
                <th>Bulan</th>
                <th class="text-right">Tagihan</th>
                <th class="text-right">Bayar</th>
                <th class="text-right">Sisa</th>
                <th class="text-left">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $item->siswa?->nama_siswa ?? '-' }}</td>
                    <td>{{ $item->siswa?->nis ?? '-' }}</td>
                    <td>{{ $item->tipe }}</td>
                    <td>{{ date('Y-m', strtotime($item->bulan)) }}</td>
                    <td class="text-right">Rp{{ number_format($item->tagihan, 0, ',', '.') }}</td>
                    <td class="text-right">Rp{{ number_format($item->bayar, 0, ',', '.') }}</td>
                    <td class="text-right">Rp{{ number_format($item->sisa, 0, ',', '.') }}</td>
                    <td class="text-left">{{ $item->keterangan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
        $tanggalCetak = Carbon::now('Asia/Jakarta')->translatedFormat('l, d F Y H:i');
    @endphp

    <div class="footer">
        <p>Dicetak pada: {{ $tanggalCetak }} WIB</p>
    </div>

</body>
</html>
