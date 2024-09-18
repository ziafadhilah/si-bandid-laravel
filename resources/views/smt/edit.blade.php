@extends('layouts/main')
@section('content')
    <form action="/smt/{{ $smt->id }}" method="POST" enctype="multipart/form-data">
    @method('patch')    
    @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Proses</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="proses" autocomplete="off" value="{{ $smt->proses }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Nomor Surat</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="no_surat" placeholder="Masukkan No Surat"
                        autocomplete="off" value="{{ $smt->no_surat }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Dokumen</label>
                <div class="col-lg-4">
                    <!-- Input file untuk upload dokumen baru -->
                    <input type="file" class="form-control" name="dokumen" autocomplete="off">
                    @if ($smt->dokumen)
                        <small class="form-text text-muted mt-2">
                            File sebelumnya:
                            <a href="{{ asset('storage/dokumen/' . $smt->dokumen) }}" target="_blank">
                                {{ $smt->dokumen }}
                            </a>
                        </small>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
