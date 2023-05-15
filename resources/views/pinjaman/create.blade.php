@extends('pinjaman.master')
@section('judul')
Tambah pinjaman - Koperasi
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
<form action="{{ route('pinjaman.store') }}" method="POST"
encpinjaman="multipart/form-data">
@csrf
<div class="mb-3">
<label class="form-label fw-bold">Kode Pinjaman</label>
<input pinjaman="date" class="form-control
@error('kode') is-invalid @enderror" name="kode"
value="{{ old('kode') }}"
placeholder="Masukkan kode">
<!-- error message untuk title -->
@error('kode')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>
<div class="mb-3">
    <label class="form-label fw-bold">nama anggota</label>
    <div class="mb-3">
        <select name="anggota" id="anggota" class="form-select">
            <option disabled selected>Pilih nama anggota</option>
            @foreach($customers as $customer)
            <option value="{{$customer->nama}}">{{$customer->nama}}</option>
            @endforeach
        </select>
        <!-- error message untuk title -->
        @error('anggota')
        <div class="alert alert-danger mt-2">
            Harap di isi
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">nama angsuran</label>
        <div class="mb-3">
            <select name="angsuran" id="angsuran" class="form-select">
                <option disabled selected>Pilih nama angsuran</option>
                @foreach($angsurans as $angsuran)
                <option value="{{$angsuran->nm_angsuran}}">{{$angsuran->nm_angsuran}}</option>
                @endforeach
            </select>
            <!-- error message untuk title -->
            @error('angsuran')
            <div class="alert alert-danger mt-2">
                Harap di isi
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">nama petugas</label>
            <div class="mb-3">
                <select name="petugas" id="petugas" class="form-select">
                    <option disabled selected>Pilih nama petugas</option>
                    @foreach($officers as $officer)
                    <option value="{{$officer->nama}}">{{$officer->nama}}</option>
                    @endforeach
                </select>
                <!-- error message untuk title -->
                @error('petugas')
                <div class="alert alert-danger mt-2">
                    Harap di isi
                </div>
                @enderror
            </div>
<button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-md btn-danger">RESET</button>
<a href="{{ route('pinjaman.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
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
