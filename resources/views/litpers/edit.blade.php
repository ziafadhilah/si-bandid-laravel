@extends('layouts/main')
@section('content')
    <form action="/litpers/{{ $litpers->id }}" method="POST" enctype="multipart/form-data">
    @method('patch')    
    @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Nama</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $litpers->name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">PKT/NRP/JAB</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="pkt" placeholder="Deskripsikan" autocomplete="off" value="{{ $litpers->pkt }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Hasil Litpers</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="hasil" autocomplete="off" value="{{ $litpers->hasil }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Dokumen</label>
                <div class="col-lg-4">
                    <!-- Input file untuk upload dokumen baru -->
                    <input type="file" class="form-control" name="dokumen" autocomplete="off">
                    @if ($litpers->dokumen)
                        <small class="form-text text-muted mt-2">
                            File sebelumnya:
                            <a href="{{ asset('storage/dokumen/' . $litpers->dokumen) }}" target="_blank">
                                {{ $litpers->dokumen }}
                            </a>
                        </small>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
