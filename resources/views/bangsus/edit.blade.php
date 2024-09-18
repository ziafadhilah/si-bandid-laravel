@extends('layouts/main')
@section('content')
    <form action="/bangsus/{{ $bangsus->id }}" method="POST" enctype="multipart/form-data">
    @method('patch')    
    @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Perkembangan Kasus</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="bang_sus" autocomplete="off" value="{{ $bangsus->bang_sus }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Nomor Surat</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="no_surat" placeholder="Deskripsikan" autocomplete="off" value="{{ $bangsus->no_surat }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Dokumen</label>
                <div class="col-lg-4">
                    <!-- Input file untuk upload dokumen baru -->
                    <input type="file" class="form-control" name="dokumen" autocomplete="off">
                    @if ($bangsus->dokumen)
                        <small class="form-text text-muted mt-2">
                            File sebelumnya:
                            <a href="{{ asset('storage/dokumen/' . $bangsus->dokumen) }}" target="_blank">
                                {{ $bangsus->dokumen }}
                            </a>
                        </small>
                    @endif
                </div>
            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
