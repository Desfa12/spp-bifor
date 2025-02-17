@extends('layouts.master')

@section('title')
    APLIKASI PEMBAYARAN SPP YAYASAN PENDIDIKAN NURUL ILMA
@endsection

@section('page-title')
    <h3 class="card-title"><i class="fas fa-user"></i><b> Data Kelas</b></h3>
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
        <form action="{{ url('datakelas') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nis">Tingkat</label>
                        <select class="form-control" name="tingkat" id="tingkat">
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nisn">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="RPL">RPL</option>
                            <option value="MULTIMEDIA">MULTIMEDIA</option>
                            <option value="PEMASARAN">PEMASARAN</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" value="" id="angkatan">
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
