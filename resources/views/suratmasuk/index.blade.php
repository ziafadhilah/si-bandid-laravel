@extends('layouts.main')
@section('content')
    <div class="">
        <p class="fs-1">SURAT MASUK</p>
        <a href="{{ url('suratmasuk/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah Surat
            Masuk</a>
        <table class="table mt-5 table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nomor Surat</th>
                    <th>Asal Surat</th>
                    <th>Keterangan</th>
                    <th>Dokumen</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suratMasuk as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->no_surat }}</td>
                        <td>{{ $data->asal_surat }}</td>
                        <td>{{ $data->keterangan }}</td>
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
                            <a href="/suratmasuk/edit/{{ $data->id }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <a href="/suratmasuk/show/{{ $data->id }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="/suratmasuk/{{ $data->id }}" method="post" class="d-inline">
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
