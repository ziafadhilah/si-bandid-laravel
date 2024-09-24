@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fs-1">Laporan PAM Tubuh Per TW</h1>
            <a href="{{ url('pam/create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Laporan
            </a>
        </div>

        <!-- Tabel Data Laporan -->
        <div class="table-responsive">
            <table class="table table-hover table-striped shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Proses</th>
                        <th>Nomor Surat</th>
                        <th>Dokumen</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pam as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->proses }}</td>
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
                                <a href="/pam/edit/{{ $data->id }}" class="btn btn-outline-success btn-sm mx-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <!-- Tombol View -->
                                <a href="/pam/show/{{ $data->id }}" class="btn btn-outline-primary btn-sm mx-1">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="/pam/{{ $data->id }}" method="post" class="d-inline">
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
