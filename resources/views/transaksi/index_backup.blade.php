@extends('layouts.master')

@section('title')
@endsection

@section('page-title')
    <h3 class="card-title"><i class="fas fa-money-bill"></i><b> Tambah Transaksi</b></h3>
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

    <div class="card p-3 shadow-sm">
        <form action="{{ url('transaksi') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">        
                        <label for="student_id">Cari Siswa</label>
                        <select class="form-control" name="id_siswa" id="student_id" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach ($students as $s)
                                <option value="{{ $s->id }}" 
                                    data-nisn="{{ $s->nisn }}" 
                                    data-kelas="{{ $s->kelas->tingkat }} {{ $s->kelas->jurusan }} - {{ $s->kelas->angkatan }}" 
                                    data-jenis_kelamin="{{ $s->jenis_kelamin }}" 
                                    data-tgl_lahir="{{ $s->tgl_lahir }}">
                                    {{ $s->nama_siswa }} ({{ $s->nis }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" disabled>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tgl_lahir" disabled>
                    </div>
                    
                  
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipe">Tipe Pembayaran</label>
                        <select class="form-control" name="tipe" id="tipe" required>
                            <option value="">-- Pilih Pembayaran --</option>
                            <option value="SPP">SPP</option>
                            <option value="DSP">DSP</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <input type="month" class="form-control" name="bulan" id="bulan" required>
                    </div>
                    <div class="form-group">
                        <label for="tagihan">Jumlah Tagihan</label>
                        <input type="number" class="form-control" name="tagihan" id="tagihan" required>
                    </div>
                    <div class="form-group">
                        <label for="bayar">Telah Dibayar</label>
                        <input type="number" class="form-control" name="bayar" id="bayar" required>
                    </div>
                    <div class="form-group">
                        <label for="sisa">Sisa</label>
                        <input type="number" class="form-control" name="sisa" id="sisa" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <a href="{{ url('transactions') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('student_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('nisn').value = selectedOption.getAttribute('data-nisn');
            document.getElementById('kelas').value = selectedOption.getAttribute('data-kelas');
            document.getElementById('jenis_kelamin').value = selectedOption.getAttribute('data-jenis_kelamin');
            document.getElementById('tgl_lahir').value = selectedOption.getAttribute('data-tgl_lahir');
        });
    </script>    
@endsection
