@extends('layouts.master')

@section('title')
 APLIKASI PEMBAYARAN SPP YAYASAN NURUL PENDIDIKAN NURUL ILMA
@endsection

@section('page-title')
 <h3 class="card-title"><i class="fas fa-users"></i><b> Data Kelas</b></h3>
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
                        <form class="d-flex" action="{{ url('datakelas') }}" method="get">
                            <input class="form-control me-1" type="search" name="katakunci" value="{{ request('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                            <div class="px-2">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>

                    <!-- TOMBOL TAMBAH DATA -->
                    <div class="pb-3">
                        <a href="{{ url('datakelas/create') }}" class="btn btn-primary">+ Tambah Data</a>
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
                                    <?php $i = $datakelas->firstItem() ?>
                                    @foreach ($datakelas as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->tingkat }}</td>
                                            <td>{{ $item->jurusan }}</td>
                                            <td>{{ $item->angkatan }}</td>
                                            <td>
                                                <a href="{{ url('datakelas/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ url('datakelas/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                    @csrf 
                                                    @method('DELETE')
                                                    {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button> --}}
                                                    <input type="submit" class="btn btn-danger btn-sm" value="Hapus">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            {{ $datakelas->withQueryString()->links() }}
                        </div>
                    </div>
@endsection


