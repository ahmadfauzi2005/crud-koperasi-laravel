<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <title>jenis</title>
</head>
<style>
    body{
    background-image:url(assets/img/slide-1.jpg);
    background-repeat:no-repeat;
    background-size:cover;
    }
</style>
<body>
    <nav class="navbar navbar-default  navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <a class="navbar-brand text-brand" href="index.html">Kope<span class="color-b">Rasi</span></a>

          <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link " href="customer">Anggota</a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="officer">Petugas</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="type">Jenis Angsuran</a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="angsuran">angsuran</a>
              </li>

              </li>
              <li class="nav-item">
                <a class="nav-link " href="pinjaman">pinjaman</a>
              </li>
              </li> &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0">
                    {{-- <button class="btn btn-outline-success my-2 my-sm-0" href="{{ route('login') }}" >Logout</button> --}}
                    <a href="{{ route('logout') }}" class="btn btn-outline-success my-2 my-sm-0">Logout</a>
                </form>
            </li>
            </ul>
          </div>
        </div>

    </nav>
    <div class="container mt-5"><br><br><br><br>
        <title>Data type</title>
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
            title: 'success',
            text: '{{ session('success') }}',
            icon: 'success'
        });
    </script>
@endif
                     <!-- Page Heading -->
                                <div class="card border-0 shadow rounded">
                                <div class="card-body">
                                    <center><h2>Data Jenis Angsuran</h2></center>
                                <a href="http://127.0.0.1:8000/dashboard" class="btn btn-md btn-danger mb-3">KEMBALI KE MENU</a>
                                <a href="{{ route('type.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                                <table class="table table-bordered">
                                <thead>
                                <tr>
                                <th scope="col">Id Jenis</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($types as $type)
                                <tr>
                                <td>{{ $type->id_jenis }}</td>
                                <td>{{ $type->jenis }}</td>
                                <td>
                                    <form id="delete-form-{{ $type->id }}" action="{{ route('type.destroy', $type->id) }}" method="POST">
                                        <a href="{{ route('type.edit', $type->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger" onclick="deletetype({{ $type->id }})">HAPUS</button>
                                        @if (session('status'))
                                            <script>
                                                Swal.fire({
                                                    icon: "{{ session('status')['type'] }}",
                                                    title: "{{ session('status')['message'] }}",
                                                    showConfirmButton: false,
                                                    timer: 3000
                                                });
                                            </script>
                                        @endif
                                    </form>
                                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        function deletetype(id) {
                                            Swal.fire({
                                                title: 'Anda yakin ingin menghapus data ini?',
                                                text: "Anda tidak akan dapat mengembalikan data ini!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Ya, hapus saja!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.getElementById('delete-form-'+id).submit();
                                                }
                                            })
                                        }
                                    </script>
                                </td>
                                </tr>
                                @empty
                                <tr>
                                </td>
                                </tr>
                                @endforelse
                                </tbody>
                                </table>
                                @if (count($types) == 0)
                                <div class="alert alert-danger">
                                    Data jenis angsuran belum Tersedia.
                                    </div>
                                @endif
                                {{ $types->links() }}
                                </div>
                                </div>
                                </div>
                                </div>
                        </div>
                            </body>
                        </html>
