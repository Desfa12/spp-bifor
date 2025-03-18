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

            /* text-align: center; */
            margin-top: 40px;
        }
        /* .signature {
            text-align: center;
            margin-top: 40px;
        } */
        .footer img {
            width: 150px; /* Sesuaikan ukuran tanda tangan */
            height: auto;
        }
        .footer p {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h3><i class="fas fa-clipboard-list"></i> <b>Data Rekap Pembayaran</b></h3><br>
    {{-- <p>Tanggal: {{ date('d F Y') }}</p> --}}
    
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
        $tanggalCetak = Carbon::now('Asia/Jakarta')->translatedFormat('l, d F Y H:i');
    @endphp

    <p>Dicetak pada: {{ $tanggalCetak }} WIB</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>NISN</th>
                <th>Kelas</th>
                <th>Tipe</th>
                <th>Tanggal</th>
                <th>Tagihan</th>
                <th>Bayar</th>
                <th>Sisa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->siswa?->nama_siswa ?? '-' }}</td>
                    <td>{{ $item->siswa?->nisn ?? '-' }}</td>
                    <td>{{ $item->siswa?->kelas?->tingkat ?? '-' }} {{ $item->siswa?->kelas?->jurusan ?? '-' }} - {{ $item->siswa?->kelas?->angkatan ?? '-' }}</td>
                    <td>{{ $item->tipe }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->bulan)->translatedFormat('d F Y') }}</td>
                    <td>Rp{{ number_format($item->tagihan, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($item->bayar, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($item->sisa, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="8"><b>Total Sisa :</b></td>
                <td><b>Rp{{ number_format($totalSisa, 0, ',', '.') }}</b></td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
            <p>Bagian Keuangan</p>
           
    </div>


</body>
</html>
