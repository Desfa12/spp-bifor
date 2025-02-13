 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="container">
     @include('komponen.pesan')
<!-- START FORM -->
<form action="{{ url('datasiswa/' .$datasiswa->id) }}" method="post">
    @csrf
    @method('PUT')
   <div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="mb-3 row">
        <label for="nis" class="col-sm-2 col-form-label">NIS</label>
        <div class="col-sm-10">
            {{ $datasiswa->nis }}
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
        <div class="col-sm-10">
           {{ $datasiswa->nisn }}
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_siswa" value="{{ $datasiswa->nama_siswa }}" id="nama_siswa">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10">
            <select class="form-control" name="kelas" id="kelas">
                <option value="">-- Pilih Kelas --</option>
                <option value="X" {{ $datasiswa->kelas == 'X' ? 'selected' : '' }}>X</option>
                <option value="XI" {{ $datasiswa->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                <option value="XII" {{ $datasiswa->kelas == 'XII' ? 'selected' : '' }}>XII</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="jurusan" value="{{ $datasiswa->jurusan }}" id="jurusan">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L" {{ $datasiswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="P" {{ $datasiswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="tgl_lahir" value="{{ $datasiswa->tgl_lahir }}" id="tgl_lahir">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="no_telp" class="col-sm-2 col-form-label">No Telp</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="no_telp" value="{{ $datasiswa->no_telp }}" id="no_telp">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->


         </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>   