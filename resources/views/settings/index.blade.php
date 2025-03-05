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
                        <input type="text" class="form-control @error('nama_satuan') is-invalid @enderror" 
                            name="nama_satuan" value="{{ old('nama_satuan', $setting->nama_satuan) }}" required>
                        @error('nama_satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_lembaga">Nomor Lembaga NPSN/NPSM</label>
                                <input type="text" class="form-control @error('no_lembaga') is-invalid @enderror" 
                                    name="no_lembaga" value="{{ old('no_lembaga', $setting->no_lembaga) }}">
                                @error('no_lembaga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_tlp">Nomor Telepon Satuan Pendidikan</label>
                                <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" 
                                    name="no_tlp" value="{{ old('no_tlp', $setting->no_tlp) }}">
                                @error('no_tlp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat">Alamat Satuan Pendidikan</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" 
                            name="alamat" value="{{ old('alamat', $setting->alamat) }}">
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kota">Kab/Kota Satuan Pendidikan</label>
                        <input type="text" class="form-control @error('kota') is-invalid @enderror" 
                            name="kota" value="{{ old('kota', $setting->kota) }}">
                        @error('kota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kepala_sekolah">Nama Kepala Sekolah</label>
                                <input type="text" class="form-control @error('kepala_sekolah') is-invalid @enderror" 
                                    name="kepala_sekolah" value="{{ old('kepala_sekolah', $setting->kepala_sekolah) }}">
                                @error('kepala_sekolah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nip_kepsek">Nomor NIP Kepala Sekolah</label>
                                <input type="text" class="form-control @error('nip_kepsek') is-invalid @enderror" 
                                    name="nip_kepsek" value="{{ old('nip_kepsek', $setting->nip_kepsek) }}">
                                @error('nip_kepsek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bendahara">Nama Bendahara Sekolah</label>
                                <input type="text" class="form-control @error('bendahara') is-invalid @enderror" 
                                    name="bendahara" value="{{ old('bendahara', $setting->bendahara) }}">
                                @error('bendahara')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nip_bendahara">Nomor NIP Bendahara</label>
                                <input type="text" class="form-control @error('nip_bendahara') is-invalid @enderror" 
                                    name="nip_bendahara" value="{{ old('nip_bendahara', $setting->nip_bendahara) }}">
                                @error('nip_bendahara')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="logo">Upload Logo Sekolah (Max: 2MB)</label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3 text-center">
                        @if ($setting->logo)
                            <img id="preview-logo" src="{{ asset('logo/' . $setting->logo) }}" alt="Logo Sekolah" 
                                style="max-width: 150px; height: auto; border: 1px solid #ddd; padding: 5px;">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="ttd_bendahara">Upload Tanda Tangan Bendahara  (Max: 2MB)</label>
                        <input type="file" class="form-control @error('ttd_bendahara') is-invalid @enderror" name="ttd_bendahara">
                        @error('ttd_bendahara')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mt-3 text-center">
                        @if ($setting->ttd_bendahara)
                            <img id="preview-ttd" src="{{ asset('ttd/' . $setting->ttd_bendahara) }}" alt="Tanda Tangan Bendahara" 
                                style="max-width: 150px; height: auto; border: 1px solid #ddd; padding: 5px;">
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
