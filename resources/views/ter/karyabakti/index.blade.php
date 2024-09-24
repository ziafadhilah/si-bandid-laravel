@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h1 class="fs-1">Halaman Karya Bakti</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ url('ter/karyabakti/create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Create
            </a>
        </div>

        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Sasaran</th>
                    <th>Tanggal</th>
                    <th>Dokumen</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyabakti as $get)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $get->sas }}</td>
                        <td>{{ $get->tanggal }}</td>
                        <td>
                            @if ($get->dokumen)
                                <a href="{{ asset('storage/dokumen/' . $get->dokumen) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-file-alt"></i> Lihat
                                </a>
                            @else
                                <span class="text-muted">Tidak ada dokumen</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/ter/karyabakti/edit/{{ $get->id }}" class="btn btn-outline-success btn-sm mx-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="/ter/karyabakti/show/{{ $get->id }}" class="btn btn-outline-primary btn-sm mx-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('karyabakti.destroy', $get->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-warning btn-sm mx-1" onclick="return confirm('Anda yakin ingin menghapus?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
