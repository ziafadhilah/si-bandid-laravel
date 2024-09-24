@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fs-1">NODIS/PENGAJUAN</h1>
            <a href="{{ url('pengajuan/create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Pengajuan
            </a>
        </div>

        <!-- Tabel Data Pengajuan -->
        <div class="table-responsive">
            <table class="table table-hover table-striped shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Jenis Pengajuan</th>
                        <th>Tujuan</th>
                        <th>Nomor Surat</th>
                        <th>Dokumen</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuan as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->jenis_pengajuan }}</td>
                            <td>{{ $data->tujuan }}</td>
                            <td>{{ $data->no_surat }}</td>
                            <td>
                                @if ($data->dokumen)
                                    <a href="{{ asset('storage/dokumen/' . $data->dokumen) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-file-alt"></i> Lihat Dokumen
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada dokumen</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <!-- Tombol Edit -->
                                <a href="/pengajuan/edit/{{ $data->id }}" class="btn btn-outline-success btn-sm mx-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <!-- Tombol View -->
                                <a href="/pengajuan/show/{{ $data->id }}" class="btn btn-outline-primary btn-sm mx-1">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="/pengajuan/{{ $data->id }}" method="post" class="d-inline">
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
