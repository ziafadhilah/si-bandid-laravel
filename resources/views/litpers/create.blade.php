@extends('layouts/main')
@section('content')
    <form action="/litpers" method="POST">
        @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Nama</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="name" autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">PKT/NRP/JAB</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="pkt" placeholder="EX: Serda/1234567890/Ba Yon Arh 7/ABC"
                        autocomplete="off">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Hasil Litpers</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="hasil" autocomplete="off">
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
