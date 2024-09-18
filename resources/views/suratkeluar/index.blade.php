@extends('layouts.main')
@section('content')
    <div class="">
        <p class="fs-1">SURAT KELUAR</p>
        <a href="{{ url('suratkeluar/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah Surat Keluar</a>
        <table class="table mt-5 table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nomor Surat</th>
                    <th>Tujuan Surat</th>
                    <th>Keterangan</th>
                    <th>Dokumen</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suratkeluar as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->no_surat }}</td>
                        <td>{{ $data->tujuan_surat}}</td>
                        <td>{{ $data->keterangan}}</td>
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
                            <a href="/suratkeluar/edit/{{ $data->id }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <a href="/suratkeluar/show/{{ $data->id }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="/suratkeluar/{{ $data->id }}" method="post" class="d-inline">
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
