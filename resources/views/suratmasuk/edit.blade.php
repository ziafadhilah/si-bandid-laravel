@extends('layouts/main')
@section('content')
    <form action="/suratmasuk/{{ $suratmasuk->id }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Tanggal</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control" name="tanggal" autocomplete="off"
                        value="{{ $suratmasuk->tanggal }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Nomor Surat</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="no_surat" placeholder="EX: Lomba 17 Agustus"
                        autocomplete="off" value="{{ $suratmasuk->no_surat }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Asal Surat</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="asal_surat" autocomplete="off"
                        value="{{ $suratmasuk->asal_surat }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Keterangan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="keterangan" autocomplete="off"
                        value="{{ $suratmasuk->keterangan }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Dokumen</label>
                <div class="col-lg-4">
                    <!-- Input file untuk upload dokumen baru -->
                    <input type="file" class="form-control" name="dokumen" autocomplete="off">
                    @if ($suratmasuk->dokumen)
                        <small class="form-text text-muted mt-2">
                            File sebelumnya:
                            <a href="{{ asset('storage/dokumen/' . $suratmasuk->dokumen) }}" target="_blank">
                                {{ $suratmasuk->dokumen }}
                            </a>
                        </small>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
