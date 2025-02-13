@extends('layouts.master')

@section('title')
 APLIKASI PEMBAYARAN SPP YAYASAN PENDIDIKAN NURUL ILMA
@endsection

@section('page-title')
 <h3 class="card-title"><i class="fa fa-cog"></i><b> Identitas Lembaga</b></h3>
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form Data Sekolah</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama_sekolah">Nama Satuan Pendidikan</label>
                    <input type="text" class="form-control" id="nama_sekolah" placeholder="Masukkan Nama Sekolah">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nomor_lembaga">Nomor Lembaga NPSN/NPSM</label>
                            <input type="text" class="form-control" id="nomor_lembaga" placeholder="Masukkan Nomor Lembaga">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="no_telp">Nomor Telepon Satuan Pendidikan</label>
                            <input type="text" class="form-control" id="no_telp" placeholder="Masukkan No. Telepon">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat">Alamat Satuan Pendidikan</label>
                    <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Sekolah">
                </div>

                <div class="mb-3">
                    <label for="kab_kota">Kab/Kota Satuan Pendidikan</label>
                    <input type="text" class="form-control" id="kab_kota" placeholder="Masukkan Kab/Kota">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kepala_sekolah">Nama Kepala Sekolah</label>
                            <input type="text" class="form-control" id="kepala_sekolah" placeholder="Masukkan Nama Kepala Sekolah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nip_kepsek">Nomor NIP</label>
                            <input type="text" class="form-control" id="nip_kepsek" placeholder="Masukkan NIP Kepala Sekolah">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="bendahara">Nama Bendahara Sekolah</label>
                            <input type="text" class="form-control" id="bendahara" placeholder="Masukkan Nama Bendahara">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nip_bendahara">Nomor NIP</label>
                            <input type="text" class="form-control" id="nip_bendahara" placeholder="Masukkan NIP Bendahara">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="upload_logo">Upload Logo Sekolah</label>
                    <input type="file" class="form-control" id="upload_logo">
                </div>
                <div class="mt-3 text-center">
                    <img id="preview" src="#" alt="Preview Logo" 
                        style="max-width: 150px; height: auto; display: none; border: 1px solid #ddd; padding: 5px;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


