@extends('layouts.main')
@section('content')
    <div class="">
        <p class="fs-1">RENPAM</p>
        <a href="{{ url('renpam/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah Rencana Pengamanan</a>
        <table class="table mt-5 table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kegiatan Pengamanan</th>
                    <th>Dokumen</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($renpam as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->giat_pam }}</td>
                        <td>{{ $data->dokumen}}</td>
                        <td class="text-center">
                            <a href="/renpam/edit/{{ $data->id }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <a href="/renpam/show/{{ $data->id }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="/renpam/{{ $data->id }}" method="post" class="d-inline">
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
