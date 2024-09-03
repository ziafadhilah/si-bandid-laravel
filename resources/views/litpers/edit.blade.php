@extends('layouts/main')
@section('content')
    <form action="/litpers/{{ $litpers->id }}" method="POST">
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
                    <input type="text" class="form-control" name="dokumen" autocomplete="off" value="{{ $litpers->dokumen }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
