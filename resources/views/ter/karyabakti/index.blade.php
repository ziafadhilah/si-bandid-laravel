@extends('layouts.main')
@section('content')
    <div class="">
        <p class="fs-1">HALAMAN KARYA BAKTI</p>
        <a href="{{ url('ter/karyabakti/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Create</a>
        <table class="table mt-5">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($getAll as $get)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $get->name }}</td>
                        <td class="text-center">
                            <a href="/ter/karyabakti/edit/{{ $get->id }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <a href="/ter/karyabakti/show/{{ $get->id }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/ter/karyabakti/show/{{ $get->id }}" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <form action=" /ter/karyabakti/{{ $get->id }}" method="post" class="d-inline">
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
