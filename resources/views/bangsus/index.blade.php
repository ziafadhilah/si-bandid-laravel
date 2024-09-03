@extends('layouts.main')
@section('content')
    <div class="">
        <p class="fs-1">BANGSUS</p>
        <a href="{{ url('bangsus/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah Perkembangan Kasus</a>
        <table class="table mt-5 table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Perkembangan Kasus</th>
                    <th>Nomor Surat</th>
                    <th>Dokumen</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bangsus as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->bang_sus }}</td>
                        <td>{{ $data->no_surat }}</td>
                        <td>{{ $data->dokumen}}</td>
                        <td class="text-center">
                            <a href="/bangsus/edit/{{ $data->id }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <a href="/bangsus/show/{{ $data->id }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="/bangsus/{{ $data->id }}" method="post" class="d-inline">
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
