@extends('layouts.master')

@section('title', 'Edit Data Kelas')

@section('page-title')
    <h3 class="card-title"><i class="fas fa-edit"></i><b> Edit Data Kelas</b></h3>
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
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tingkat">Tingkat</label>
                        <select class="form-control" name="tingkat" id="tingkat">
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="X" {{ old('tingkat', $datakelas->tingkat) == 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ old('tingkat', $datakelas->tingkat) == 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ old('tingkat', $datakelas->tingkat) == 'XII' ? 'selected' : '' }}>XII</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option value="">-- Pilih Jurusan --</option>
                            @php
                                $jurusanList = [
                                    'REKAYASA PERANGKAT LUNAK (RPL)',
                                    'MULTIMEDIA (MM)',
                                    'TEKNIK JARINGAN KOMPUTER (TKJ)',
                                    'OTOMATISASI TATA KELOLA PERKANTORAN (OTKP)',
                                    'PERBANKAN DAN KEUANGAN MIKRO (PKM)',
                                    'KEPERAWATAN'
                                ];
                            @endphp
                            @foreach ($jurusanList as $jurusan)
                                <option value="{{ $jurusan }}" {{ old('jurusan', $datakelas->jurusan) == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" id="angkatan" value="{{ old('angkatan', $datakelas->angkatan) }}">
                    </div>

                    <div class="form-group">
                        <label for="aktif">Status</label>
                        <select class="form-control" name="aktif" id="aktif" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="1" {{ old('aktif', $datakelas->aktif) == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('aktif', $datakelas->aktif) == '0' ? 'selected' : '' }}>Inaktif</option>
                        </select>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    @php
                        $fields = ['spp', 'dsp', 'pts1', 'pas1', 'pts2', 'pas2', 'daftar_ulang', 'lainnya'];
                    @endphp

                    @foreach ($fields as $field)
                        <div class="form-group">
                            <label for="{{ $field }}">{{ strtoupper(str_replace('_', ' ', $field)) }}</label>
                            <input type="text" class="form-control format-rupiah" id="{{ $field }}_formatted" 
                                   value="{{ old($field, $datakelas->$field) ? 'Rp '.number_format(old($field, $datakelas->$field), 0, ',', '.') : '' }}"
                                   oninput="formatInput('{{ $field }}')">
                            <input type="hidden" name="{{ $field }}" id="{{ $field }}" value="{{ old($field, $datakelas->$field) }}">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <a href="{{ url('datakelas') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
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
