@extends('angsuran.master')
@section('judul')
Tambah angsuran - Koperasi
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <center>
        <h3>Tambah data</h3>
<hr><br>
    </center>
    @if (session('success'))
    <script>
        swal({
            title: 'success',
            text: '{{ session('success') }}',
            icon: 'success'
        });
    </script>
@endif
<form action="{{ route('angsuran.store') }}" method="POST"
encangsuran="multipart/form-data">
@csrf
<div class="mb-3">
<label class="form-label fw-bold">Nama Angsuran</label>
<input angsuran="text" class="form-control
@error('nm_angsuran') is-invalid @enderror" name="nm_angsuran"
value="{{ old('nm_angsuran') }}"
placeholder="Masukkan nama angsuran">
<!-- error message untuk title -->
@error('nm_angsuran')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Jenis</label>
    <div class="mb-3">
        <select name="jenis" id="jenis" class="form-select">
            <option disabled selected>Pilih Jenis angsuran</option>
            @foreach($types as $type)
            <option value="{{$type->jenis}}">{{$type->jenis}}</option>
            @endforeach
        </select>
        <!-- error message untuk title -->
        @error('jenis')
        <div class="alert alert-danger mt-2">
            Harap di isi
        </div>
        @enderror
    </div>

<button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-md btn-danger">RESET</button>
<a href="{{ route('angsuran.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
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
