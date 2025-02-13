@extends('layouts.master')

@section('title')
    APLIKASI PEMBAYARAN SPP YAYASAN PENDIDIKAN NURUL ILMA
@endsection

@section('page-title')
    <h3 class="card-title"><i class="fas fa-user"></i><b> Data Siswa</b></h3>
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
        <form action="{{ url('datasiswa') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" name="nis" value="{{ Session::get('nis') }}" id="nis">
                    </div>

                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" name="nisn" value="{{ Session::get('nisn') }}" id="nisn">
                    </div>

                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" value="{{ Session::get('nama') }}" id="nama_siswa">
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <option value="">-- Pilih Kelas --</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" value="{{ Session::get('jurusan') }}" id="jurusan">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="{{ Session::get('tgl_lahir') }}" id="tgl_lahir">
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" class="form-control" name="no_telp" value="{{ Session::get('no_telp') }}" id="no_telp">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <a href="{{ url('datasiswa') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- AKHIR FORM -->

@endsection
