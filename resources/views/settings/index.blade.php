@extends('layouts.master')

@section('title')
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

        <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama_satuan">Nama Satuan Pendidikan</label>
                        <input type="text" class="form-control" name="nama_satuan" value="{{ $setting->nama_satuan }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_lembaga">Nomor Lembaga NPSN/NPSM</label>
                                <input type="text" class="form-control" name="no_lembaga" value="{{ $setting->no_lembaga }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_tlp">Nomor Telepon Satuan Pendidikan</label>
                                <input type="text" class="form-control" name="no_tlp" value="{{ $setting->no_tlp }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat">Alamat Satuan Pendidikan</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $setting->alamat }}">
                    </div>

                    <div class="mb-3">
                        <label for="kota">Kab/Kota Satuan Pendidikan</label>
                        <input type="text" class="form-control" name="kota" value="{{ $setting->kota }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kepala_sekolah">Nama Kepala Sekolah</label>
                                <input type="text" class="form-control" name="kepala_sekolah" value="{{ $setting->kepala_sekolah }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nip_kepsek">Nomor NIP Kepala Sekolah</label>
                                <input type="text" class="form-control" name="nip_kepsek" value="{{ $setting->nip_kepsek }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bendahara">Nama Bendahara Sekolah</label>
                                <input type="text" class="form-control" name="bendahara" value="{{ $setting->bendahara }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nip_bendahara">Nomor NIP Bendahara</label>
                                <input type="text" class="form-control" name="nip_bendahara" value="{{ $setting->nip_bendahara }}">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="logo">Upload Logo Sekolah</label>
                        <input type="file" class="form-control" name="logo" id="logo">
                    </div>

                    <div class="mt-3 text-center">
                        @if ($setting->logo)
                            <img id="preview" src="{{ asset('logo/' . $setting->logo) }}" alt="Logo Sekolah" 
                                style="max-width: 150px; height: auto; border: 1px solid #ddd; padding: 5px;">
                        @else
                            <img id="preview" src="#" alt="Preview Logo" 
                                style="max-width: 150px; height: auto; display: none; border: 1px solid #ddd; padding: 5px;">
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
