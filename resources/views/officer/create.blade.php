@extends('officer.master')
@section('judul')
Tambah officer - Koperasi
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
    <center>
        <h3>Tambah data</h3>
<hr><br>
    </center>
<form action="{{ route('officer.store') }}" method="POST"
enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label class="form-label fw-bold">Username</label>
<input type="text" class="form-control
@error('nama') is-invalid @enderror" name="nama"
value="{{ old('nama') }}"
placeholder="Masukkan Nama">
<!-- error message untuk title -->
@error('nama')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Password</label>
    <input type="number" class="form-control
    @error('pasword') is-invalid @enderror" name="pasword"
    value="{{ old('pasword') }}"
    placeholder="Masukkan pasword">
    <!-- error message untuk stok -->
    @error('pasword')
    <div class="alert alert-danger mt-2">
    {{ $message }}
    </div>
    @enderror
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Nama Lengkap</label>
        <input type="text" class="form-control
        @error('nama_lkp') is-invalid @enderror" name="nama_lkp"
        value="{{ old('nama_lkp') }}"
        placeholder="Masukkan Nama Lengkap">
        <!-- error message untuk stok -->
        @error('nama_lkp')
        <div class="alert alert-danger mt-2">
        {{ $message }}
        </div>
        @enderror
        </div>

<div class="mb-3">
<label class="form-label fw-bold">Contact</label>
<input type="number" class="form-control
@error('contact') is-invalid @enderror" name="contact"
value="{{ old('contact') }}"
placeholder="Masukkan contact">
<!-- error message untuk stok -->
@error('contact')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Pejabat</label>
    <div class="mb-3">

        <input type="radio"  name="pejabat" value="admin" value="{{old('pejabat')}}" {{old('pejabat') == 'admin' ? 'checked' : '' }}>
        <label for="">Admin</label>

        <input type="radio"  name="pejabat" value="petugas" value="{{old('pejabat')}}" {{old('pejabat') == 'petugas' ? 'checked' : '' }}>
        <label for="">Petugas</label>

    <!-- error message untuk stok -->
    @error('pejabat')
    <div class="alert alert-danger mt-2">
    {{ $message }}
    </div>
    @enderror
    </div>


<button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-md btn-danger">RESET</button>
<a href="{{ route('officer.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
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
