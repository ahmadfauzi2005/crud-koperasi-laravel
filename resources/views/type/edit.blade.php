    @extends('type.master')
@section('judul')
Edit Jenis Angsuran - Koperasi
@endsection
@section('konten')
<div class="row">
    <div class="col-md-12">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                @if (session('error'))
                <script>
                    swal({
                        title: 'Error',
                        text: '{{ session('error') }}',
                        icon: 'error'
                    });
                </script>
            @endif

            @if (session('success'))
                <script>
                    swal({
                        title: 'Success',
                        text: '{{ session('success') }}',
                        icon: 'success'
                    });
                </script>
            @endif

                <form action="{{ route('type.update', $type->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="mb-3">
                        <label class="form-label fw-bold">Id Jenis</label>
                        <input type="number" class="form-control
@error('id_jenis') is-invalid @enderror" name="id_jenis" value="{{ old('id_jenis', $type->id_jenis) }}"
                            placeholder="Masukkan id jenis ">
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
    @error('jenis') is-invalid @enderror" name="jenis" value="{{ old('jenis', $type->jenis) }}"
                            placeholder="Masukkan jenis ">
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
