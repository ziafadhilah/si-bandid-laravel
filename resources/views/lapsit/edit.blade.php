@extends('layouts/main')
@section('content')
    <form action="/lapsit/{{ $lapsit->id }}" method="POST">
    @method('patch')    
    @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Tanggal</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control" name="tanggal" autocomplete="off" value="{{ $lapsit->tanggal }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Uraian Kejadian</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="uraian_kejadian" placeholder="Deskripsikan" autocomplete="off" value="{{ $lapsit->uraian_kejadian }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Keterangan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="keterangan" autocomplete="off" value="{{ $lapsit->keterangan }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
