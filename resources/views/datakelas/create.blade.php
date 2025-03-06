@extends('layouts.master')

@section('title', 'Tambah Data Kelas')

@section('page-title')
    <h3 class="card-title"><i class="fas fa-user"></i><b> Tambah Data Kelas</b></h3>
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
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tingkat">Tingkat</label>
                        <select class="form-control" name="tingkat" id="tingkat">
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="X" {{ old('tingkat') == 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ old('tingkat') == 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ old('tingkat') == 'XII' ? 'selected' : '' }}>XII</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="REKAYASA PERANGKAT LUNAK (RPL)" {{ old('jurusan') == 'REKAYASA PERANGKAT LUNAK (RPL)' ? 'selected' : '' }}>REKAYASA PERANGKAT LUNAK (RPL)</option>
                            <option value="MULTIMEDIA (MM)" {{ old('jurusan') == 'MULTIMEDIA (MM)' ? 'selected' : '' }}>MULTIMEDIA (MM)</option>
                            <option value="TEKNIK JARINGAN KOMPUTER (TKJ)" {{ old('jurusan') == 'TEKNIK JARINGAN KOMPUTER (TKJ)' ? 'selected' : '' }}>TEKNIK JARINGAN KOMPUTER (TKJ)</option>
                            <option value="OTOMATISASI TATA KELOLA PERKANTORAN (OTKP)" {{ old('jurusan') == 'OTOMATISASI TATA KELOLA PERKANTORAN (OTKP)' ? 'selected' : '' }}>OTOMATISASI TATA KELOLA PERKANTORAN (OTKP)</option>
                            <option value="PERBANKAN DAN KEUANGAN MIKRO (PKM)" {{ old('jurusan') == 'PERBANKAN DAN KEUANGAN MIKRO (PKM)' ? 'selected' : '' }}>PERBANKAN DAN KEUANGAN MIKRO (PKM)</option>
                            <option value="KEPERAWATAN" {{ old('jurusan') == 'KEPERAWATAN' ? 'selected' : '' }}>KEPERAWATAN</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" id="angkatan" value="{{ old('angkatan') }}">
                    </div>

                    <div class="form-group">
                        <label for="aktif">Status</label>
                        <select class="form-control" name="aktif" id="aktif" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="1" {{ old('aktif') == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('aktif') == '0' ? 'selected' : '' }}>Inaktif</option>
                        </select>
                    </div>
                </div>

               
            </div>

            <div class="form-group">
                <a href="{{ url('datakelas') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- AKHIR FORM -->

    <script>
        function formatRupiah(angka) {
            let numberString = angka.replace(/[^\d]/g, ""); // Hanya angka
            let formatted = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Tambahkan titik pemisah ribuan
            return formatted ? "Rp " + formatted : ""; // Tambahkan "Rp " di depan
        }

        function formatInput(field) {
            let inputFormatted = document.getElementById(field + "_formatted");
            let inputHidden = document.getElementById(field);
            
            let angka = inputFormatted.value.replace(/\D/g, ""); // Hanya angka
            inputFormatted.value = formatRupiah(angka);
            inputHidden.value = angka; // Simpan angka asli untuk dikirim ke backend
        }

        document.querySelectorAll('.format-rupiah').forEach(input => {
            input.addEventListener('input', function() {
                formatInput(this.id.replace('_formatted', ''));
            });
        });
    </script>
@endsection
