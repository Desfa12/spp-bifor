@extends('layouts.master')

@section('title')
 APLIKASI PEMBAYARAN SPP YAYASAN NURUL PENDIDIKAN NURUL ILMA
@endsection

@section('page-title')
 <h3 class="card-title"><i class="fas fa-users"></i><b> Data Kelas</b></h3>
@endsection


@section('content')
                {{-- <div class="container mt-4"> --}}
                    <!-- FORM PENCARIAN -->
                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nomor_lembaga">Cari Kelas</label>
                            <div class="input-group gap-2">
                                <input type="text" class="form-control" id="nomor_lembaga" placeholder="Masukkan Nama Kelas">
                                <div class="px-2"></div> <!-- Memberikan sedikit jarak -->
                                <button type="button" class="btn btn-primary" onclick="cariKelas()">Cari</button>
                            </div>
                        </div>
                    </div> --}}
                    <div class="pb-3">
                        <form class="d-flex" action="{{ url('datasiswa') }}" method="get">
                            <input class="form-control me-1" type="search" name="katakunci" value="{{ request('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                            <div class="px-2">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </form>
                    </div>
                    <br>

                    <!-- TOMBOL TAMBAH DATA -->
                    <div class="pb-3">
                        <a href="{{ url('datasiswa/create') }}" class="btn btn-primary">+ Tambah Data</a>
                    </div>
                
                    <!-- TABEL DATA -->
                    <div class="card p-3 shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tingkat</th>
                                        <th>Jurusan</th>
                                        <th>Angkatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($datasiswa as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $item->nis }}/{{ $item->nisn }}</td>
                                            <td>{{ $item->nama_siswa }}</td>
                                            <td>{{ $item->kelas }}</td>
                                            <td>{{ $item->jurusan }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->tgl_lahir }}</td>
                                            <td>{{ $item->no_telp }}</td>
                                            <td>
                                                <a href="{{ url('datasiswa/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ url('datasiswa/'.$item->id) }}" method="POST" class="d-inline">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach --}} 
                                </tbody>
                            </table>
                            {{-- {{ $datasiswa->withQueryString()->links() }} --}}
                        </div>
                    </div>
                {{-- </div> --}}
@endsection


