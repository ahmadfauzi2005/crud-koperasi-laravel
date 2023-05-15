@extends('officer.master')
@section('judul')
Edit Petugas - Koperasi
@endsection
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <form action="{{ route('officer.update', $officer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="mb-3">
                        <label class="form-label fw-bold">Username</label>
                        <input type="text" class="form-control
@error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $officer->nama) }}"
                            placeholder="Masukkan Username">
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
    @error('pasword') is-invalid @enderror" name="pasword" value="{{ old('pasword', $officer->pasword) }}"
                            placeholder="Masukkan pasword ">
                        <!-- error message untuk stok -->
                        @error('pasword')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Lengkap
                        </label>
                        <input type="text" class="form-control
        @error('nama_lkp') is-invalid @enderror" name="nama_lkp" value="{{ old('nama_lkp', $officer->nama_lkp) }}"
                            placeholder="Masukkan Nama Lengkap">
                        <!-- error message untuk stok -->
                        @error('nama_lkp')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Contact
                        </label>
                        <input type="number" class="form-control
            @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact', $officer->contact) }}"
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
                            <input type="radio" value="admin" name="pejabat" {{ old('admin', $officer->pejabat) == 'admin' ? 'checked' : '' }}> Admin
                            <input type="radio" value="petugas" name="pejabat" {{ old('petugas', $officer->pejabat) == 'petugas' ? 'checked' : '' }}> Petugas

                            <!-- error message untuk pejabat -->
                            @error('pejabat')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
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
