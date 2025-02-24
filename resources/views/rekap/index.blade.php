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
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="katakunci" class="form-control" placeholder="Cari nama, NIS, atau NISN" value="{{ request('katakunci') }}">
            </div>
            <div class="col-md-4">
                <select class="form-control" name="tipe" id="tipe">
                    <option value="">-- Pilih Pembayaran --</option>
                    <option value="SPP" {{ request('tipe') == 'SPP' ? 'selected' : '' }}>SPP</option>
                    <option value="DSP" {{ request('tipe') == 'DSP' ? 'selected' : '' }}>DSP</option>
                    <option value="Lainnya" {{ request('tipe') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('rekap.index') }}" class="btn btn-danger">Reset</a>
            </div>
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
                    <th>NIS</th>
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
                        <td>{{ $item->siswa?->nis ?? '-' }}</td>
                        <td>{{ $item->tipe }}</td>
                        <td>{{ $item->bulan }}</td>
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
