@extends('layouts.master')

@section('title')
    APLIKASI PEMBAYARAN SPP YAYASAN PENDIDIKAN NURUL ILMA - Edit Data Siswa
@endsection

@section('page-title')
    <h3 class="card-title"><i class="fas fa-edit"></i><b> Edit Data Siswa</b></h3>
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
        <form action="{{ url('datasiswa/' . $datasiswa->id) }}" method="post">
            @csrf
            @method('PUT')        
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" name="nis" value="{{ $datasiswa->nis }}" id="nis">
                    </div>
                    
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" name="nisn" value="{{ $datasiswa->nisn }}" id="nisn">
                    </div>
                    
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" value="{{ $datasiswa->nama_siswa }}" id="nama_siswa">
                    </div>
                    
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" name="kelas" value="{{ $datasiswa->kelas }}" id="kelas">
                    </div>
                    
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="RPL" {{ $datasiswa->jurusan == 'RPL' ? 'selected' : '' }}>RPL</option>
                            <option value="MULTIMEDIA" {{ $datasiswa->jurusan == 'MULTIMEDIA' ? 'selected' : '' }}>MULTIMEDIA</option>
                            <option value="PEMASARAN" {{ $datasiswa->jurusan == 'PEMASARAN' ? 'selected' : '' }}>PEMASARAN</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L" {{ $datasiswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $datasiswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="{{ $datasiswa->tgl_lahir }}" id="tgl_lahir">
                    </div>
                    
                    <div class="form-group">
                        <label for="no_telp">No. Telepon</label>
                        <input type="text" class="form-control" name="no_telp" value="{{ $datasiswa->no_telp }}" id="no_telp">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <a href="{{ url('datasiswa') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <!-- AKHIR FORM -->
@endsection