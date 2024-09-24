@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fs-1">HAL MENONJOL</h1>
            <a href="{{ url('haljol/create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Buat Baru
            </a>
        </div>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-hover table-striped shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Dokumen</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getAll as $get)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $get->name }}</td>
                            <td>
                                @if ($get->dokumen)
                                    <a href="{{ asset('storage/dokumen/' . $get->dokumen) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-file-alt"></i> Lihat Dokumen
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada dokumen</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <!-- Edit Button -->
                                <a href="/haljol/edit/{{ $get->id }}" class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <!-- View Button -->
                                <a href="/haljol/show/{{ $get->id }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Download Button -->
                                @if ($get->dokumen)
                                    <a href="{{ asset('storage/dokumen/' . $get->dokumen) }}" class="btn btn-outline-danger btn-sm" download>
                                        <i class="fas fa-file-download"></i>
                                    </a>
                                @endif

                                <!-- Delete Button -->
                                <form action="/haljol/{{ $get->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-warning btn-sm"
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
