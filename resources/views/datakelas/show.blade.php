@extends('layouts.master')

@section('title')
    Data Siswa Kelas {{ $datakelas->tingkat }} - {{ $datakelas->jurusan }} {{ $datakelas->angkatan }}
@endsection

@section('page-title')
    <h3 class="card-title"><i class="fas fa-users"></i> <b>Data Siswa Kelas</b></h3><br>
    {{ $datakelas->tingkat }} - {{ $datakelas->jurusan }} {{ $datakelas->angkatan }}
@endsection

@section('content')

<!-- Tampilkan pesan sukses jika ada -->
@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

<!-- Tombol Export & Import -->
<div class="pb-3">
    <a href="{{ route('datakelas.export', $datakelas->id) }}" class="btn btn-success">Export Excel</a>

    <form action="{{ route('datakelas.import', $datakelas->id) }}" method="POST" enctype="multipart/form-data" class="d-inline">
        @csrf
        <input type="file" name="file" accept=".xlsx, .csv" required class="form-control d-inline w-auto">
        <button type="submit" class="btn btn-primary">Import Excel</button>
    </form>
</div>

<!-- Tabel Data Siswa -->
<div class="card p-3 shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>No. Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datakelas->siswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->tgl_lahir }}</td>
                        <td>{{ $item->no_telp }}</td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>

@endsection
