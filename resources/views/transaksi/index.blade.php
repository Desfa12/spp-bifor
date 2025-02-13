@extends('layouts.master')

@section('title')
    APLIKASI PEMBAYARAN SPP YAYASAN PENDIDIKAN NURUL ILMA
@endsection

@section('page-title')
    <h3 class="card-title"><i class="fas fa-user"></i><b> Daftar Transaksi</b></h3>
@endsection

@section('content')
    @if (Session::has('success'))
    <div class="pt-3">
        <div class="alert alert-success">
                {{ Session::get('success') }}
        </div>
    </div>
    @endif

<div class="container mt-4">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('transaksi') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ request('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
  
    <!-- TABEL DATA -->
    <div class="card p-3 shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Bulan</th>
                        <th>Jumlah Tagihan</th>
                        <th>Telah Dibayar</th>
                        <th>Sisa</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $transaksi->firstItem() ?>
                    @foreach ($transaksi as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->datasiswa->nama_siswa }}</td> <!-- Menampilkan nama siswa -->
                            <td>{{ $item->datasiswa->nisn }}</td> <!-- Menampilkan NISN -->
                            <td>{{ $item->bulan }}</td>
                            <td>{{ $item->jumlah_tagihan }}</td>
                            <td>{{ $item->telah_dibayar }}</td>
                            <td>{{ $item->sisa }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <a href="{{ url('transaksi/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('transaksi/'.$item->id) }}" method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            {{ $transaksi->withQueryString()->links() }}
        </div>
    </div>
</div>

@endsection
