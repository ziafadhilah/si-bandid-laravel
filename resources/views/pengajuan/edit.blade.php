@extends('layouts/main')
@section('content')
    <form action="/pengajuan/{{ $pengajuan->id }}" method="POST">
    @method('patch')    
    @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Jenis Pengajuan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="jenis_pengajuan" autocomplete="off" value="{{ $pengajuan->jenis_pengajuan }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Tujuan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="tujuan" placeholder="Deskripsikan" autocomplete="off" value="{{ $pengajuan->tujuan }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Nomor Surat</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="no_surat" autocomplete="off" value="{{ $pengajuan->no_surat }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Dokumen</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="dokumen" autocomplete="off" value="{{ $pengajuan->dokumen }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
