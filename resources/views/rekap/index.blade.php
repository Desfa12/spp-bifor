@extends('layouts.master')

@section('title')
@endsection

@section('page-title')
<h3 class="card-title"><i class="fas fa-clipboard-list"></i> <b>Data Rekap</b></h3>
@endsection

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="pb-3">
    <form method="GET" action="{{ route('rekap.index') }}">
       <div class="pb-3">
    <form method="GET" action="{{ route('rekap.index') }}">
        <div class="row align-items-end">
            <div class="col-12 col-md-3 mb-2">
                <input type="text" name="katakunci" class="form-control" placeholder="Cari nama, NIS, atau NISN" value="{{ request('katakunci') }}">
            </div>
            <div class="col-12 col-md-3 mb-2">
                <select class="form-control" name="tipe" id="tipe">
                    <option value="">-- Pilih Pembayaran --</option>
                    <option value="SPP" {{ request('tipe') == 'SPP' ? 'selected' : '' }}>SPP</option>
                    <option value="DSP" {{ request('tipe') == 'DSP' ? 'selected' : '' }}>DSP</option>
                    <option value="Lainnya" {{ request('tipe') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>
            <div class="col-12 col-md-3 mb-2">
                <input type="month" class="form-control" name="bulan" id="bulan" value="{{ request('bulan') }}">
            </div>
            <div class="col-12 col-md-3 mb-2">
                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <a href="{{ route('rekap.index') }}" class="btn btn-danger me-2">Reset</a>
                <a href="{{ route('rekap.exportPdf', request()->query()) }}" class="btn btn-success">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
            </div>
        </div>
    </form>
</div>
    </form>
</div>

<div class="card p-3 shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Tipe</th>
                    <th>Bulan</th>
                    <th>Tagihan</th>
                    <th>Bayar</th>
                    <th>Sisa</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->siswa?->nama_siswa ?? '-' }}</td>
                        <td>{{ $item->siswa?->nisn ?? '-' }}</td>
                        <td>{{ $item->siswa?->nis ?? '-' }}</td>
                        <td>{{ $item->siswa?->kelas?->tingkat ?? '-' }} {{ $item->siswa?->kelas?->jurusan ?? '-' }} - {{ $item->siswa?->kelas?->angkatan ?? '-' }}</td>
                        <td>{{ $item->tipe }}</td>
                        <td>{{ date('Y-m', strtotime($item->bulan)) }}</td>
                        <td>Rp{{ number_format($item->tagihan, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($item->bayar, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($item->sisa, 0, ',', '.') }}</td>
                        <td>{{ $item->keterangan ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $transaksi->links() }}
    </div>
</div>

@endsection