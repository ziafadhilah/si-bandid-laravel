@extends('layouts/main')
@section('content')
    <form action="/renpam" method="POST">
        @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Tanggal</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control" name="tanggal" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Kegiatan Pengamanan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="giat_pam" placeholder="EX: Lomba 17 Agustus"
                        autocomplete="off">
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
