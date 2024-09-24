@extends('layouts.main')
@section('content')
    <form action="/ter/komsos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Sasaran</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="sas" placeholder="EX: Your Name" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Tanggal</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control" name="tanggal" autocomplete="off">
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
