@extends('layouts.master')

@section('title')
    APLIKASI PEMBAYARAN SPP YAYASAN PENDIDIKAN NURUL ILMA
@endsection

@section('page-title')
    <h3 class="card-title"><i class="fas fa-user"></i><b> Daftar Siswa</b></h3>
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
        <form class="d-flex" action="{{ url('datasiswa') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ request('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href="{{ url('datasiswa/create') }}" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <!-- TABEL DATA -->
    <div class="card p-3 shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Siswa</th>
                        <th>NIS/NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>L/P</th>
                        <th>Tgl Lahir</th>
                        <th>No Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i =$datasiswa->firstItem()?>
                    @foreach ($datasiswa as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nis }}/{{ $item->nisn }}</td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->tgl_lahir }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td>
                                <a href="{{ url('datasiswa/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('datasiswa/'.$item->id) }}" method="POST" class="d-inline">
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
            {{ $datasiswa->withQueryString()->links() }}
        </div>
    </div>
</div>

@endsection