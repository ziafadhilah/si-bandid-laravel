@extends('layouts/main')
@section('content')
    <form action="/activity/{{ $activities->id }}" method="POST">
        @method('patch')
        @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Judul Kegiatan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="name" placeholder="EX: Lomba 17 Agustus"
                        autocomplete="off" value="{{ $activities->name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Tanggal Kegiatan</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control" name="date" autocomplete="off"
                        value="{{ $activities->date }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Deskripsi Kegiatan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="description" autocomplete="off"
                        value="{{ $activities->description }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
