@extends('layouts/main')
@section('content')
    <form action="/pengajuan" method="POST">
        @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Jenis Pengajuan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="jenis_pengajuan" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Tujuan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="tujuan" placeholder="EX: Lomba 17 Agustus"
                        autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Nomor Surat</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="no_surat" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Dokumen</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="dokumen" autocomplete="off">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
