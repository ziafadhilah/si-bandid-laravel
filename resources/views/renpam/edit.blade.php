@extends('layouts/main')
@section('content')
    <form action="/renpam/{{ $renpam->id }}" method="POST">
    @method('patch')    
    @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Tanggal</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control" name="tanggal" autocomplete="off" value="{{ $renpam->proses }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Kegiatan Pengamanan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="giat_pam" placeholder="Deskripsikan" autocomplete="off" value="{{ $renpam->giat_pam }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Dokumen</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="dokumen" autocomplete="off" value="{{ $renpam->dokumen }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
