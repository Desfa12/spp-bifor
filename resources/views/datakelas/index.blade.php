@extends('layouts.master')

@section('title')
 APLIKASI PEMBAYARAN SPP YAYASAN NURUL PENDIDIKAN NURUL ILMA
@endsection

@section('page-title')
 <h3 class="card-title"><i class="fas fa-users"></i><b> Data Kelas</b></h3>
@endsection


@section('content')
 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nomor_lembaga">Nama Kelas</label>
                            <input type="text" class="form-control" id="nomor_lembaga" placeholder="Masukkan Nama Kelas">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="no_telp">Nomor/ SPP</label>
                            <input type="text" class="form-control" id="no_telp" placeholder="Masukkan Nomor SPP">
                        </div>
                    </div>
                </div>
@endsection


