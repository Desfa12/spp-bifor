@extends('layouts.master')

@section('title')
@endsection

@section('page-title')
 <h3 class="card-title"><i class="fas fa-users"></i><b> Data Siswa</b></h3>
@endsection

@section('content')
@if (Session::has('success'))
    <div class="pt-3">
        <div class="alert alert-success">
                {{ Session::get('success') }}
        </div>
    </div>
@endif
@if ($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<!-- FORM PENCARIAN -->
<div class="pb-3">
    <form method="GET" action="{{ route('datasiswa.index') }}">
        <div class="row">
            <div class="ol-12 col-md-4 mb-2">
                <input type="text" name="katakunci" class="form-control" placeholder="Cari nama, NIS, atau NISN" value="{{ request('katakunci') }}">
            </div>
            <div class="ol-12 col-md-4 mb-2">
                <select name="jenis_kelamin" class="form-control">
                    <option value="">-- Semua Jenis Kelamin --</option>
                    <option value="L" {{ request('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="P" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="col-12 col-md-4 mb-2">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('datasiswa.index') }}" class="btn btn-danger">Reset</a>
            </div>
        </div>
    </form>
</div>

<!-- TOMBOL TAMBAH DATA -->
<div class="pb-3">
    <a href="{{ url('datasiswa/create') }}" class="btn btn-primary">+ Tambah Data</a>
</div>

{{-- <div class="mb-3">
    <form action="{{ route('datasiswa.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
        @csrf
        <input type="file" name="file" class="form-control d-inline" style="width: auto; display: inline-block;" required>
        <button type="submit" class="btn btn-success">Import Excel</button>
    </form>

    <a href="{{ route('datasiswa.export') }}" class="btn btn-primary">Export Excel</a>
</div> --}}


<!-- TABEL DATA -->
<div class="card p-3 shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $datasiswa->firstItem() ?>
                @foreach ($datasiswa as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->kelas->tingkat ?? '-' }} {{ $item->kelas->jurusan ?? '-' }} - {{ $item->kelas->angkatan ?? '-' }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->tgl_lahir }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>
                            <a href="{{ url('datasiswa/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm ">Edit</a>
                            <form action="{{ url('datasiswa/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf 
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="Hapus">
                            </form>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
        {{ $datasiswa->withQueryString()->links() }}
    </div>
</div>
@endsection
