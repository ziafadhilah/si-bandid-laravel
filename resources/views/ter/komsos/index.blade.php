@extends('layouts.main')
@section('content')
    <div class="container">
        <p class="fs-1">HALAMAN KOMSOS</p>
        <a href="{{ url('ter/komsos/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Create</a>
        <table class="table mt-5">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Sasaran</td>
                    <td>Tanggal</td>
                    <td>Dokumen</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($komsos as $get)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $get->sas }}</td>
                        <td>{{ $get->tanggal }}</td>
                        <td>
                            @if ($get->dokumen)
                                <a href="{{ asset('storage/dokumen/' . $get->dokumen) }}" target="_blank">{{ $get->dokumen }}</a>
                            @else
                                <span class="text-muted">Tidak ada dokumen</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/ter/komsos/edit/{{ $get->id }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <a href="/ter/komsos/show/{{ $get->id }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/ter/komsos/show/{{ $get->id }}" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <form action="{{ route('komsos.destroy', $get->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-warning btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')">
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
