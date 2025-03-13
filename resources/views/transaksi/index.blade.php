@extends('layouts.master')

@section('title')
@endsection

@section('page-title')
 <h3 class="card-title"><i class="fas fa-money-bill"></i><b> Data Transaksi</b></h3>
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

<!-- FORM PENCARIAN -->
<div class="pb-3">
    <form method="GET" action="{{ route('transaksi.index') }}">
        <div class="row">
            <div class="col-12 col-md-8 mb-2">
                <input type="text" name="katakunci" class="form-control" placeholder="Cari nama, NIS, atau NISN" >
            </div>
            <div class="col-12 col-md-4 mb-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
</div>

<!-- TABEL DATA (Hanya Ditampilkan Jika Ada Filter) -->
@if (request('katakunci'))
    <div class="card p-3 shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $datasiswa->firstItem() ?>
                    @foreach ($datasiswa as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->kelas->tingkat ?? '-' }} {{ $item->kelas->jurusan ?? '-' }} - {{ $item->kelas->angkatan ?? '-' }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->tgl_lahir }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm pilih-siswa"
                                    data-id-siswa="{{ $item->id }}"
                                    data-nama="{{ $item->nama_siswa }}"
                                    data-nisn="{{ $item->nisn }}"
                                    data-kelas="{{ $item->kelas->tingkat ?? '-' }} {{ $item->kelas->jurusan ?? '-' }} - {{ $item->kelas->angkatan ?? '-' }}"
                                    data-jenis_kelamin="{{ $item->jenis_kelamin }}"
                                    data-tgl_lahir="{{ $item->tgl_lahir }}">
                                    Pilih
                                </button>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
            {{ $datasiswa->withQueryString()->links() }}
        </div>
    </div>

    <!-- FORM PEMBAYARAN (Disembunyikan Awalnya) -->
    <div id="form-pembayaran" style="display: none;">
        <form action="{{ url('transaksi') }}" method="post" onsubmit="return validateForm()">
            @csrf
            <div class="form-group">
                <input type="hidden" class="form-control" name="id_siswa" id="id_siswa">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama" disabled>
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
                        <label for="sekolah">Sekolah</label>
                        <select class="form-control" name="sekolah" id="sekolah" required>
                            <option value="">-- Pilih Sekolah --</option>
                            <option value="SMK Bina Informatika">SMK Bina Informatika</option>
                            <option value="SMK Bina Husada">SMK Bina Husada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Pembayaran</label>
                        <select class="form-control" name="tipe" id="tipe" required>
                            <option value="">-- Pilih Pembayaran --</option>
                            <option value="SPP">SPP</option>
                            <option value="DSP">DSP</option>
                            <option value="PTS 1 Ganjil">PTS 1 Ganjil</option>
                            <option value="PAS 1 Ganjil">PAS 1 Ganjil</option>
                            <option value="PAS 2 Genap">PAS 2 Genap</option>
                            <option value="PAS 2 Genap">PAS 2 Genap</option>
                            <option value="Daftar Ulang">Daftar Ulang</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                       <div class="form-group">
                        <label for="Tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="bulan" id="bulan" required>
                    </div>
                    <div class="form-group">
                        <label for="tagihan">Jumlah Tagihan</label>
                        <input type="text" class="form-control" name="tagihan" id="tagihan" required>
                    </div>
                    <div class="form-group">
                        <label for="bayar">Telah Dibayar</label>
                        <input type="text" class="form-control" name="bayar" id="bayar" required>
                    </div>
                    <div class="form-group">
                        <label for="sisa">Sisa</label>
                        <input type="text" class="form-control" name="sisa" id="sisa" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <a href="{{ url('transaksi') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" name="cetak" value="true"  class="btn btn-primary">Simpan & Cetak Kwitansi</button>
            </div>
        </form>
    </div>
@endif

<!-- SCRIPT UNTUK MENAMPILKAN FORM DAN MENGISI INPUT -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const pilihSiswaButtons = document.querySelectorAll(".pilih-siswa");

        pilihSiswaButtons.forEach(button => {
            button.addEventListener("click", function() {
                // Mengisi input form dengan data dari tombol yang diklik
                document.getElementById("id_siswa").value = this.getAttribute("data-id-siswa");
                document.getElementById("nama").value = this.getAttribute("data-nama");
                document.getElementById("nisn").value = this.getAttribute("data-nisn");
                document.getElementById("kelas").value = this.getAttribute("data-kelas");
                document.getElementById("jenis_kelamin").value = this.getAttribute("data-jenis_kelamin");
                document.getElementById("tgl_lahir").value = this.getAttribute("data-tgl_lahir");

                // Menampilkan form pembayaran
                document.getElementById("form-pembayaran").style.display = "block";

                // Menyembunyikan tabel dan pagination
                document.querySelector(".card.p-3.shadow-sm").style.display = "none";

                // Mengosongkan kolom pencarian
                document.querySelector("input[name='katakunci']").value = "";
            });
        });

        //=============================== count sisa
        const tagihanInput = document.getElementById("tagihan");
        const bayarInput = document.getElementById("bayar");
        const sisaInput = document.getElementById("sisa");

        function formatRupiah(angka) {
            let numberString = angka.toString().replace(/[^\d]/g, ""); // Hanya angka
            let formatted = numberString.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Tambahkan titik pemisah ribuan
            return formatted ? "Rp" + formatted : ""; // Tambahkan "Rp " di depan
        }

        function parseNumber(value) {
            return Number(value.replace(/[^\d]/g, "")) || 0; // Hapus "Rp" dan titik sebelum konversi ke angka
        }

        function hitungSisa() {
            let tagihan = parseNumber(tagihanInput.value);
            let bayar = parseNumber(bayarInput.value);
            let sisa = tagihan - bayar;
            sisaInput.value = formatRupiah(sisa >= 0 ? sisa : 0);
        }

        function formatOnInput(input) {
            input.addEventListener("input", function () {
                let angka = parseNumber(this.value);
                this.value = angka ? formatRupiah(angka) : "";
                hitungSisa();
            });

            input.addEventListener("focus", function () {
                this.value = parseNumber(this.value); // Tampilkan angka tanpa "Rp " saat fokus
            });

            input.addEventListener("blur", function () {
                this.value = formatRupiah(parseNumber(this.value)); // Tambahkan "Rp " saat blur
            });
        }

        // Pastikan input "sisa" tidak bisa diedit langsung
        sisaInput.setAttribute("readonly", true);

        // Terapkan formatting ke input tagihan dan bayar
        formatOnInput(tagihanInput);
        formatOnInput(bayarInput);
    });
    //=============================== validasi
      document.addEventListener("DOMContentLoaded", function() {
        document.querySelector("form[action='{{ url('transaksi') }}']").addEventListener("submit", function(event) {
            let tipe = document.getElementById("tipe").value;
            let bulan = document.getElementById("bulan").value;
            let tagihan = parseNumber(document.getElementById("tagihan").value);
            let bayar = parseNumber(document.getElementById("bayar").value);
            let sisa = parseNumber(document.getElementById("sisa").value);
            let errorMessage = "";

            if (!tipe) errorMessage += "Tipe Pembayaran harus dipilih!\n";
            if (!bulan) errorMessage += "Tanggal harus diisi!\n";
            if (tagihan <= 0) errorMessage += "Jumlah tagihan harus lebih dari 0!\n";
            if (bayar < 0) errorMessage += "Jumlah pembayaran tidak valid!\n";
            if (sisa < 0) errorMessage += "Sisa tidak boleh negatif!\n";

            if (errorMessage) {
                alert(errorMessage);
                event.preventDefault();
            }
        });
    });
      function validateForm() {
        const tipe = document.getElementById("tipe").value;
        const bulan = document.getElementById("bulan").value;
        const tagihan = document.getElementById("tagihan").value;
        const bayar = document.getElementById("bayar").value;
        const sisa = document.getElementById("sisa").value;
        
        if (!tipe || !bulan || !tagihan || !bayar || !sisa) {
            alert("Harap isi semua bidang sebelum menyimpan!");
            return false;
        }
        return true;
    }
</script>
@endsection
