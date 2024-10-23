@extends('layouts/main')
@section('content')
    <form action="/activity/{{ $activity->id }}" method="POST">
        @method('patch')
        @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Judul Kegiatan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="name" placeholder="EX: Lomba 17 Agustus"
                        autocomplete="off" value="{{ $activity->name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Mulai Tanggal Kegiatan</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control" name="date" autocomplete="off">
                </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Selesai Tanggal Kegiatan</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control" name="enddate" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Deskripsi Kegiatan</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="description" autocomplete="off"
                        value="{{ $activity->description }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Start Time</label>
                <div class="col-lg-4">
                    <input type="time" class="form-control" name="starttime" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">End Time</label>
                <div class="col-lg-4">
                    <input type="time" class="form-control" name="endtime" autocomplete="off">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
@endsection
