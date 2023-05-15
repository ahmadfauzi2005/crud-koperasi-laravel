@extends('customer.master')
@section('judul')
Tambah customer - Koperasi
@endsection
@section('konten')
<div class="row">
<div class="col-md-19">
<div class="card border-0 shadow rounded">
<div class="card-body">
    <center>
        <h3>Tambah data</h3>
<hr><br>
    </center>
<form action="{{ route('customer.store') }}" method="POST"
enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label class="form-label fw-bold">Nama Anggota</label>
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
<label class="form-label fw-bold">Jenis Kelamin</label><br>
<div class="mb-3">

    <input type="radio"  name="jk" value="laki-laki" value="{{old('jk')}}" {{old('jk') == 'laki-laki' ? 'checked' : '' }}>
    <label for="">Laki-Laki </label>

    <input type="radio"  name="jk" value="perempuan" value="{{old('jk')}}" {{old('jk') == 'perempuan' ? 'checked' : '' }}>
    <label for="">Perempuan</label>
@error('jk')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">GAMBAR</label>
    <input type="file" class="form-control
    @error('image') is-invalid @enderror" name="image">
    <!-- error message untuk image -->
    @error('image')
    <div class="alert alert-danger mt-2">
    {{ $message }}
    </div>
    @enderror
    </div>

<div class="mb-3">
<label class="form-label fw-bold">No Telephone</label>
<input type="number" class="form-control
@error('no') is-invalid @enderror" name="no"
value="{{ old('no') }}"
placeholder="Masukkan no tlp">
<!-- error message untuk stok -->
@error('no')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Tanggal</label>
  <input type="date" name="tgl" id="" class="form-control" value="{{ date('d-m-y') }}">
    <!-- error message untuk title -->
    @error('tgl')
    <div class="alert alert-danger mt-2">
    {{ $message }}
    </div>
    @enderror
    </div>

<button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-md btn-danger">RESET</button>
<a href="{{ route('customer.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
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
