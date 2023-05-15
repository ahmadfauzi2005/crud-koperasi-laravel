@extends('angsuran.master')
@section('judul')
Edit Jenis Angsuran - Koperasi
@endsection
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <form action="{{ route('angsuran.update', $angsuran->id) }}" method="POST" encangsuran="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Angsuran</label>
                        <input angsuran="text" class="form-control
@error('nm_angsuran') is-invalid @enderror" name="nm_angsuran" value="{{ old('nm_angsuran', $angsuran->nm_angsuran) }}"
                            placeholder="Masukkan nm_angsuran ">
                        <!-- error message untuk title -->
                        @error('nm_angsuran')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Jenis Angsuran</label>
                        <select class="form-select @error('jenis') is-invalid @enderror" name="jenis"  readonly>
                            @foreach($types as $type)
                            <option value="{{ $type->jenis }}" {{ ($angsuran->jenis == $type->jenis) ? 'selected' : '' }}>
                                {{ $type->jenis }}
                            </option>
                            @endforeach
                        </select>

                        @error('jenis')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
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
