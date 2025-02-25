@extends('layouts.master')

@section('title')
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
                            <option value="RPL" {{ $datakelas->jurusan == 'RPL' ? 'selected' : '' }}>REKAYASA PERANGKAT LUNAK (RPL)</option>
                            <option value="MULTIMEDIA" {{ $datakelas->jurusan == 'MULTIMEDIA' ? 'selected' : '' }}>MULTIMEDIA</option>
                            <option value="TEKNIK JARINGAN KOMPUTER" {{ $datakelas->jurusan == 'TEKNIK JARINGAN KOMPUTER' ? 'selected' : '' }}>TEKNIK JARINGAN KOMPUTER (TKJ)</option>
                            <option value="OTOMATISASI TATA KELOLA PERKANTORAN " {{ $datakelas->jurusan == 'OTOMATISASI TATA KELOLA PERKANTORAN ' ? 'selected' : '' }}>OTOMATISASI TATA KELOLA PERKANTORAN (OTKP)</option>
                            <option value="PERBANKAN DAN KEUANGAN MIKRO" {{ $datakelas->jurusan == 'PERBANKAN DAN KEUANGAN MIKRO' ? 'selected' : '' }}>PERBANKAN DAN KEUANGAN MIKRO (PKM)</option>
                            <option value="KEPERAWATAN" {{ $datakelas->jurusan == 'KEPERAWATAN' ? 'selected' : '' }}>KEPERAWATAN</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" value="{{ $datakelas->angkatan }}" id="angkatan">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="aktif" id="aktif" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="1" {{ old('status', $datakelas->aktif ?? '') == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('status', $datakelas->aktif ?? '') == '0' ? 'selected' : '' }}>Inaktif</option>
                        </select>
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
