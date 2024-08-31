@extends('layouts.main')
@section('content')
    <div class="">
        <p class="fs-1">DAFTAR KEGIATAN</p>
        <a href="{{ url('activity/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Buat Kegiatan
            Baru</a>
        <table class="table mt-5 table-striped">
            <thead>
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
                        <td>{{ $activity->date }}</td>
                        <td class="text-center">
                            <a href="/activity/edit/{{ $activity->id }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <a href="/activity/show/{{ $activity->id }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="/activity/{{ $activity->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-outline-warning btn-sm"
                                    onclick="return confirm('Anda yakin ingin menghapus?')"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
