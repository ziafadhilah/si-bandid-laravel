@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <!-- Judul dan Tombol Tambah -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fs-1">Laporan Situasi</h1>
            <a href="{{ url('lapsit/create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Laporan Situasi
            </a>
        </div>

        <!-- Tabel Data Laporan Situasi -->
        <div class="table-responsive">
            <table class="table table-hover table-striped shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Uraian Kejadian</th>
                        <th>Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lapsit as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $data->uraian_kejadian }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td class="text-center">
                                <!-- Tombol Edit -->
                                <a href="/lapsit/edit/{{ $data->id }}" class="btn btn-outline-success btn-sm mx-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                
                                <!-- Tombol Lihat -->
                                <a href="/lapsit/show/{{ $data->id }}" class="btn btn-outline-primary btn-sm mx-1">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="/lapsit/{{ $data->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-warning btn-sm mx-1"
                                        onclick="return confirm('Anda yakin ingin menghapus?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
