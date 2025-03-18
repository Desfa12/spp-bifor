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
            color: rgb(255, 255, 255);
            padding: 12px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            background-color: {{ $transaksi->sekolah == 'SMK Kesehatan Bina Husada' ? '#006400' : '#02447d' }};
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid  {{ $transaksi->sekolah == 'SMK Kesehatan Bina Husada' ? '#006400' : '#02447d' }};
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
            background:  {{ $transaksi->sekolah == 'SMK Kesehatan Bina Husada' ? '#006400' : '#02447d' }};
            font-weight: bold;
        }
        .approved {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .text-center b{
            color: #ffffff
        }
        .text-centerr{
            color: black
        }
    </style>
</head>
<body>
    
    <div class="container">
        <!-- Header -->
        <div class="header">
            <table>
                <tr>
                    <td style="width: 10%">
                        <img src="{{ public_path($transaksi->sekolah == 'SMK Kesehatan Bina Husada' ? 'images/logohusada.png' : 'images/logobifor.png') }}" alt="Logo Sekolah" style="height: 80px;">
                    </td>
                    <td>
                        <div style="margin-left: -100px;text-align:center">
                            {{ $setting->nama_satuan }} <br>
                            {{ $transaksi->sekolah }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <p class="text-center"> 
            {{ $setting->no_lembaga }}, Kota {{ $setting->kota }}  |  
            {{ $setting->alamat }} |  
            {{ $setting->no_tlp }}
        </p>
       
        <!-- Informasi Transaksi -->
        <table>
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
                <td>{{ $transaksi->siswa->kelas->tingkat ?? '-' }} {{ $transaksi->siswa->kelas->jurusan ?? '-' }}</td>
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
                    <td class="text-centerr no-border" style="width: 25%;">
                        <b>Bagian Keuangan</b><br><br><br><br><br>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
