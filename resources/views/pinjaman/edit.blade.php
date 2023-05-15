@extends('pinjaman.master')
@section('judul')
Edit Pinjaman - Koperasi
@endsection
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <form action="{{ route('pinjaman.update' , $pinjaman->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kode Pinjaman</label>
                        <input type="number" class="form-control
@error('kode') is-invalid @enderror" name="kode" value="{{ old('kode', $pinjaman->kode) }}"
                            placeholder="Masukkan kode ">
                        <!-- error message untuk title -->
                        @error('kode')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                      <div class="mb-3">
                        <label class="form-label fw-bold">Nama Anggota</label>
                        <select class="form-select @error('anggota') is-invalid @enderror" name="anggota"  readonly>
                            @foreach($customers as $customer)
                            <option value="{{ $customer->nama }}" {{ ($pinjaman->anggota == $customer->nama) ? 'selected' : '' }}>
                                {{ $customer->nama }}
                            </option>
                            @endforeach
                        </select>

                        @error('anggota')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama angsuran</label>
                        <select class="form-select @error('angsuran') is-invalid @enderror" name="angsuran"  readonly>
                            @foreach($angsurans as $angsuran)
                            <option value="{{ $angsuran->nm_angsuran }}" {{ ($pinjaman->angsuran == $angsuran->nm_angsuran) ? 'selected' : '' }}>
                                {{ $angsuran->nm_angsuran }}
                            </option>
                            @endforeach
                        </select>

                        @error('angsuran')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama petugas</label>
                        <select class="form-select @error('petugas') is-invalid @enderror" name="petugas"  readonly>
                            @foreach($officers as $officer)
                            <option value="{{ $officer->nama }}" {{ ($pinjaman->petugas == $officer->nama) ? 'selected' : '' }}>
                                {{ $officer->nama }}
                            </option>
                            @endforeach
                        </select>

                        @error('petugas')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
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
