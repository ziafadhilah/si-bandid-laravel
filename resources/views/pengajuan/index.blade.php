@extends('layouts.main')
@section('content')
    <div class="">
        <p class="fs-1">NODIS/PENGAJUAN</p>
        <a href="{{ url('pengajuan/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah Pengajuan</a>
        <table class="table mt-5 table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Pengajuan</th>
                    <th>Tujuan</th>
                    <th>Nomor Surat</th>
                    <th>Dokumen</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->jenis_pengajuan }}</td>
                        <td>{{ $data->tujuan }}</td>
                        <td>{{ $data->no_surat }}</td>
                        <td> @if ($data->dokumen)
                                <a href="{{ asset('storage/dokumen/' . $data->dokumen) }}" target="_blank">
                                    {{ $data->dokumen }}
                                </a>
                            @else
                                <span class="text-muted">Tidak ada dokumen</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/pengajuan/edit/{{ $data->id }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <a href="/pengajuan/show/{{ $data->id }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="/pengajuan/{{ $data->id }}" method="post" class="d-inline">
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
