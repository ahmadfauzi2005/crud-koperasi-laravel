@extends('type.master')
@section('judul')
Tambah type - Koperasi
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="card border-0 shadow rounded">
<div class="card-body">

    <center>
        <h3>Tambah data</h3>
<hr><br>
    </center>
<form action="{{ route('type.store') }}" method="POST"
enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label class="form-label fw-bold">id Jenis</label>
<input type="number" class="form-control
@error('id_jenis') is-invalid @enderror" name="id_jenis"
value="{{ old('id_jenis') }}"
placeholder="Masukkan id jenis">
<!-- error message untuk title -->
@error('id_jenis')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Jenis</label>
    <input type="text" class="form-control
    @error('jenis') is-invalid @enderror" name="jenis"
    value="{{ old('jenis') }}"
    placeholder="Masukkan jenis">
    <!-- error message untuk stok -->
    @error('jenis')
    <div class="alert alert-danger mt-2">
    {{ $message }}
    </div>
    @enderror
    </div>

<button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-md btn-danger">RESET</button>
<a href="{{ route('type.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
</form>
</div>
</div>
</div>
</div>
@endsection
@section('skrip')
<script
src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('content');
</script>
@endsection
