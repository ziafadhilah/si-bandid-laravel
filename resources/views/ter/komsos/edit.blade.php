@extends('layouts.main')
@section('content')
    <form action="/ter/komsos/update/{{ $komsos->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card-body mt-4">
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Sasaran</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="sas" value="{{ $komsos->sas }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Tanggal</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control" name="tanggal" value="{{ $komsos->tanggal }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label">Dokumen</label>
                <div class="col-lg-4">
                    <!-- Input file untuk upload dokumen baru -->
                    <input type="file" class="form-control" name="dokumen" autocomplete="off">
                    @if ($karyabakti->dokumen)
                        <small class="form-text text-muted mt-2">
                            File sebelumnya:
                            <a href="{{ asset('storage/dokumen/' . $karyabakti->dokumen) }}" target="_blank">
                                {{ $karyabakti->dokumen }}
                            </a>
                        </small>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Update</button>
        <!-- Tombol Cancel -->
        <button type="button" class="btn btn-outline-danger" id="cancel-btn">Cancel</button>
    </form>

    <script>
        document.getElementById('cancel-btn').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah tombol submit
            if (confirm('Apakah Anda yakin ingin membatalkan? Semua perubahan akan hilang.')) {
                window.location.href = '/ter/karyabakti'; // Redirect ke halaman index
            }
        });
    </script>
@endsection
