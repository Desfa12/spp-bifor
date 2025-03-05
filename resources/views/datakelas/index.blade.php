@extends('layouts.master')

@section('title', 'Data Kelas')

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
        <form method="GET" action="{{ route('datakelas.index') }}">
            <div class="row">
                <div class="col-12 col-md-3 mb-2">
                    <input type="text" name="katakunci" class="form-control" placeholder="Cari Tingkat, Jurusan, Angkatan" value="{{ request('katakunci') }}">
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <select name="status" class="form-control">
                        <option value="">-- Semua Status --</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inaktif</option>
                    </select>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('datakelas.index') }}" class="btn btn-danger">Reset</a>
                </div>
            </div>
        </form>
    </div>

    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href="{{ route('datakelas.create') }}" class="btn btn-primary">+ Tambah Data</a>
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
                        <th>SPP</th>
                        <th>DSP</th>
                        <th>PTS 1</th>
                        <th>PAS 1</th>
                        <th>PTS 2</th>
                        <th>PAS 2</th>
                        <th>Daftar Ulang</th>
                        <th>Lainnya</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datakelas as $index => $item)
                        <tr>
                            <td>{{ $datakelas->firstItem() + $index }}</td>
                            <td>{{ $item->tingkat }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->angkatan }}</td>
                            <td>Rp {{ number_format($item->spp, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->dsp, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->pts1, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->pas1, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->pts2, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->pas2, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->daftar_ulang, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->lainnya, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $item->aktif == 1 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->aktif == 1 ? 'Aktif' : 'Inaktif' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('datakelas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('datakelas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf 
                                    @method('DELETE')
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
