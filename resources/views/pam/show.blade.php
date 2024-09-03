@extends('layouts/main')
@section('content')
<div>
     {{ $pam->proses }}
     {{ $pam->no_surat }}
     {{ $pam->dokumen }}
</div>
@endsection