@extends('layouts.main')
@section('content')
    <div class="">
        <p class="fs-1">LAP PAM TUBUH PER TW</p>
        <a href="{{ url('pam/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah Laporan</a>
        <table class="table mt-5 table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Proses</th>
                    <th>Nomor Surat</th>
                    <th>Dokumen</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pam as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->proses }}</td>
                        <td>{{ $data->no_surat }}</td>
                        <td>{{ $data->dokumen}}</td>
                        <td class="text-center">
                            <a href="/pam/edit/{{ $data->id }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <a href="/pam/show/{{ $data->id }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="/pam/{{ $data->id }}" method="post" class="d-inline">
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
