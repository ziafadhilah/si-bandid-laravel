@extends('layouts/main')
@section('content')
    <form action="/suratkeluar" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Tanggal</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control" name="tanggal" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Nomor Surat</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="no_surat" placeholder="EX: R/1234/X/2024"
                        autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Tujuan Surat</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="tujuan_surat" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Keterangan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="keterangan" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Dokumen</label>
                <div class="col-lg-4">
                    <input type="file" class="form-control" name="dokumen" autocomplete="off">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
@endsection
