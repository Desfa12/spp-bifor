@extends('layouts.master')

@section('title')
    APLIKASI PEMBAYARAN SPP YAYASAN PENDIDIKAN NURUL ILMA - Edit datakelas
@endsection

@section('page-title')
    <h3 class="card-title"><i class="fas fa-edit"></i><b> Edit Data datakelas</b></h3>
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

    <!-- START FORM -->
    <div class="card p-3 shadow-sm">
        <form action="{{ url('datakelas/' . $datakelas->id) }}" method="post">
            @csrf
            @method('PUT')        
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tingkat">Tingkat</label>
                        <select class="form-control" name="tingkat" id="tingkat">
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="X" {{ $datakelas->tingkat == 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ $datakelas->tingkat == 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ $datakelas->tingkat == 'XII' ? 'selected' : '' }}>XII</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="RPL" {{ $datakelas->jurusan == 'RPL' ? 'selected' : '' }}>RPL</option>
                            <option value="MULTIMEDIA" {{ $datakelas->jurusan == 'MULTIMEDIA' ? 'selected' : '' }}>MULTIMEDIA</option>
                            <option value="PEMASARAN" {{ $datakelas->jurusan == 'PEMASARAN' ? 'selected' : '' }}>PEMASARAN</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" value="{{ $datakelas->angkatan }}" id="angkatan">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <a href="{{ url('datakelas') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <!-- AKHIR FORM -->
@endsection
