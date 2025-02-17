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

{{-- <div class="container mt-4"> --}}
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('datasiswa') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ request('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <div class="px-2">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>
    </div>
    <br>
    
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
                    
                </tbody>
            </table>
            {{-- {{ $datasiswa->withQueryString()->links() }} --}}
        </div>
    </div>
{{-- </div> --}}

@endsection