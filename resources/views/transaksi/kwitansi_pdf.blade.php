<!DOCTYPE html>
<html>
<head>
    <title>Kwitansi Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 40px;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }
        h3 {
            text-align: center;
            margin-bottom: 5px;
            color: #004085;
        }
        .header {
            text-align: center;
            background: #007bff;
            color: white;
            padding: 12px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #e9ecef;
            text-align: center;
            font-size: 14px;
        }
        .no-border {
            border: none;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
        }
        .signature {
            margin-top: 40px;
            text-align: center;
        }
        .highlight {
            background: #ffc107;
            font-weight: bold;
        }
        .approved {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>

        <div class="container">

            <!-- Header -->
            <div class="header">
                {{ $setting->nama_satuan }}
            </div>
            <p class="text-center"> {{ $setting->no_lembaga }}, Kota  {{ $setting->kota }}  |  {{ $setting->alamat }} |  {{ $setting->no_tlp }}</p>

            <!-- Informasi Transaksi -->
            <table>
                {{-- <tr>
                    <td><b>No</b></td>
                    <td>:</td>
                    <td>001</td>
                    <td colspan="3"></td>
                    <td rowspan="2" class="text-center highlight"><b>Bukti Pembayaran</b></td>
                </tr> --}}
                <tr>
                    <td><b>Tanggal</b></td>
                    <td>:</td>
                    <td>{{ date('d-m-Y', strtotime($transaksi->created_at)) }}</td>
                    <td class="text-center highlight"><b>Bukti Pembayaran</b></td>
                </tr>
                <tr>
                    <td><b>Nama</b></td>
                    <td>:</td>
                    <td>{{ $transaksi->siswa->nama_siswa }}</td>
                    <td rowspan="3"><b>Untuk Pembayaran:</b> {{ $transaksi->tipe ?? '-' }}</td>
                </tr>
                <tr>
                    <td><b>Kelas</b></td>
                    <td>:</td>
                    <td>{{ $transaksi->siswa->kelas->nama_kelas }}</td>
                </tr>
                <tr>
                    <td><b>Jumlah Bayar</b></td>
                    <td>:</td>
                    <td><b>Rp {{ number_format($transaksi->bayar, 0, ',', '.') }}</b></td>
                </tr>
            </table>

            <!-- Bukti Pembayaran -->
            <div class="approved" style="margin-top: 20px;">
                Bukti Pembayaran: Pembayaran ini sah dan telah diterima.
            </div>

            <!-- Footer -->
            <div class="footer">
                <table>
                    <tr>
                        <td class="no-border" style="width: 50%;">
                            <b>Ketentuan:</b><br>
                            - Simpan bukti pembayaran ini sebagai arsip.<br>
                            - Pembayaran yang sudah dilakukan tidak dapat dikembalikan.
                        </td>
                        <td class="text-center no-border" style="width: 25%;">
                            <b>Pembayar</b><br><br><br>
                            <u>{{ $transaksi->siswa->nama_siswa }}</u>
                        </td>
                        <td class="text-center no-border" style="width: 25%;">
                            <b>Bagian Keuangan</b><br><br><br>
                            <u>{{ $setting->bendahara }}</u>
                        </td>
                    </tr>
                </table>
            </div>

        </div>

</body>
</html>
