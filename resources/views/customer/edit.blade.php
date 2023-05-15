@extends('customer.master')
@section('judul')
Edit Barang - Toko
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('customer.update', $customer->id) }}"
method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')


<div class="mb-3">
<label class="form-label fw-bold">Nama Anggota</label>
<input type="text" class="form-control
@error('nama') is-invalid @enderror" name="nama"
value="{{ old('nama', $customer->nama) }}"
placeholder="Masukkan Nama Anggota">
<!-- error message untuk title -->
@error('nama')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Jenis Kelamin</label>
    <div class="mb-3">
        <input type="radio" value="laki-laki" name="jk" {{ old('laki-laki', $customer->jk) == 'laki-laki' ? 'checked' : '' }}> laki-laki
    <input type="radio" value="perempuan" name="jk" {{ old('perempuan', $customer->jk) == 'perempuan' ? 'checked' : '' }}> perempuan

        @error('jk')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Gambar</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
    <!-- error message untuk Gambar -->
    @error('image')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
    @if ($customer->image)
        <div class="mt-2">
            <img src="{{ asset('storage/customer/' . $customer->image) }}" alt="{{ $customer->image }}" style="max-height: 100px;"/>
        </div>
    @endif
</div>

<div class="mb-3">
<label class="form-label fw-bold">No telephone</label>
<input type="number" class="form-control
@error('no') is-invalid @enderror" name="no"
value="{{ old('no', $customer->no) }}"
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
    <input type="date" name="tgl" id="" class="form-control"
        value="{{ date('Y-m-d', strtotime($customer->tgl)) }}">
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
