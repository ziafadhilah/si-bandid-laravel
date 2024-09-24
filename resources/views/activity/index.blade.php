@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Daftar Kegiatan</h1>
            <a href="{{ url('activity/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Buat Kegiatan Baru</a>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul Kegiatan</th>
                    <th>Deskripsi Kegiatan</th>
                    <th>Tanggal Kegiatan</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}</td> {{-- Format tanggal --}}
                        <td class="text-center">
                            <a href="/activity/edit/{{ $activity->id }}" class="btn btn-sm btn-outline-success me-2">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="/activity/show/{{ $activity->id }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="/activity/{{ $activity->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger"
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
@endsection
