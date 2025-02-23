@extends('layouts.master')

@section('title')
        APLIKASI PEMBAYARAN SPP {{ $setting->nama_satuan }}
 @endsection

@section('page-title')
       <h3 class="card-title"><i class="nav-icon fas fa-tachometer-alt"></i><b> Dashboard</b></h3>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalSiswa }}</h3>
                            <p>Jumlah Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/datasiswa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $jumlahPerempuan }}</h3>
                            <p>Perempuan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('datasiswa.index', ['jenis_kelamin' => 'P']) }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahLaki }}</h3>
                            <p>Laki-Laki</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('datasiswa.index', ['jenis_kelamin' => 'L']) }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalKelas }}</h3>
                            <p>Jumlah Kelas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="/datakelas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div> <!-- Tutup row -->
        </div> <!-- Tutup container-fluid -->
    </section> <!-- Tutup section -->

     <div class="row">
    <!-- Form Kiri -->
    <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data Status Pendidikan</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-md-3 col-form-label">NPSN/NPSM</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" value="{{ $setting->no_lembaga }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-3 col-form-label">Kab/Kota</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" value="{{ $setting->kota }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-3 col-form-label">Kepala</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" value="{{ $setting->kepala_sekolah }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-3 col-form-label">Bendahara</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" value="{{ $setting->bendahara }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-3 col-form-label">Telp</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" value="{{ $setting->no_tlp }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Kanan -->
    <div class="col-md-6">
        {{-- <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Log Activity</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-md-3 col-form-label">Pemasukan</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" placeholder="Masukkan Alamat Sekolah">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-3 col-form-label">Transaksi</label>
                    <div class="col-md-9">
                        <input class="form-control" type="email" placeholder="Masukkan Email Sekolah">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-3 col-form-label">Login Terakhir</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" placeholder="Masukkan Website Sekolah">
                    </div>
                </div>

               
                    </div>
                </div>
            </div>
        </div> --}}



@endsection
