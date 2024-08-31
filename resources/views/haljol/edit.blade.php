@extends('layouts/main')
@section('content')
    <form action="/haljol/{{ $haljol->id }}" method="POST">
        @method('patch')
        @csrf
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="name" placeholder="EX: Your Name" autocomplete="off"
                        value="{{ $haljol->name }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
@endsection
