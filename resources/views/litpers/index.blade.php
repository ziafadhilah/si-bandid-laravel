@extends('layouts.main')
@section('content')
    <div class="">
        <p class="fs-1">LITPERS</p>
        <a href="{{ url('litpers/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah Penelitian Personel</a>
        <table class="table mt-5 table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>PKT/NRP/JAB</th>
                    <th>Hasil Litpers</th>
                    <th>Dokumen</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($litpers as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->pkt }}</td>
                        <td>{{ $data->hasil }}</td>
                        <td> @if ($data->dokumen)
                                <a href="{{ asset('storage/dokumen/' . $data->dokumen) }}" target="_blank">
                                    {{ $data->dokumen }}
                                </a>
                            @else
                                <span class="text-muted">Tidak ada dokumen</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/litpers/edit/{{ $data->id }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <a href="/litpers/show/{{ $data->id }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="/litpers/{{ $data->id }}" method="post" class="d-inline">
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
