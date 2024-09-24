@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <!-- Judul dan Tombol Tambah -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fs-1">Penelitian Personel (LITPERS)</h1>
            <a href="{{ url('litpers/create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Penelitian Personel
            </a>
        </div>

        <!-- Tabel Data LITPERS -->
        <div class="table-responsive">
            <table class="table table-hover table-striped shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>PKT/NRP/JAB</th>
                        <th>Hasil Litpers</th>
                        <th>Dokumen</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($litpers as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->pkt }}</td>
                            <td>{{ $data->hasil }}</td>
                            <td>
                                @if ($data->dokumen)
                                    <a href="{{ asset('storage/dokumen/' . $data->dokumen) }}" target="_blank">
                                        {{ $data->dokumen }}
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada dokumen</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <!-- Tombol Edit -->
                                <a href="/litpers/edit/{{ $data->id }}" class="btn btn-outline-success btn-sm mx-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <!-- Tombol Lihat -->
                                <a href="/litpers/show/{{ $data->id }}" class="btn btn-outline-primary btn-sm mx-1">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="/litpers/{{ $data->id }}" method="post" class="d-inline">
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
