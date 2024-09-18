@extends('layouts/main')
@section('content')
    <form action="/haljol/{{ $haljol->id }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="name" placeholder="EX: Your Name" autocomplete="off"
                        value="{{ $haljol->name }}">
                </div>
            </div>
        </div>
        <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Dokumen</label>
                <div class="col-lg-4">
                    <!-- Input file untuk upload dokumen baru -->
                    <input type="file" class="form-control" name="dokumen" autocomplete="off">
                    @if ($haljol->dokumen)
                        <small class="form-text text-muted mt-2">
                            File sebelumnya:
                            <a href="{{ asset('storage/dokumen/' . $haljol->dokumen) }}" target="_blank">
                                {{ $haljol->dokumen }}
                            </a>
                        </small>
                    @endif
                </div>
            </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
