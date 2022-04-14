@extends('admin.main')


@section('header')
<link rel="stylesheet" type="text/css" href="assets/css/datatables.css">
@endsection

@section('container')

        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Data Pengguna</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Pengguna</li>
                  </ol>
                </div>
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    <ul>
                      <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Cetak Data"><i data-feather="printer"></i></a></li>
                      <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="modal" data-bs-target="#modalTambah"><i data-feather="plus"></i></a></li>
                    </ul>
                  </div>
                  <!-- Bookmark Ends-->
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="starter-main">

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card">
                    {{-- <div class="card-header">
                      <h5>Data Pengguna</h5>
                    </div> --}}
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="display" id="basic-1" data-form="deleteForm">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th>Nama Lengkap</th>
                              <th>Email</th>
                              <th class="text-center">Act</th>
                            </tr>
                          </thead>
                          <tbody>


                                @foreach($users as $no => $ddata)

                                        <tr>
                                            <td class='text-center'>{{ ++$no }}</td>
                                            <td>{{ $ddata->name }}</td>
                                            <td>{{ $ddata->email }}</td>
                                            <td class='text-center'>
                                                <div class='btn-group'>
                                                    <a href='#' class='btn bg-dark btn-xs bteditpass' data-bs-toggle='modal' data-bs-target='#modalEditPass' data-id='{{ $ddata->id }}' data-nama='{{ $ddata->name }}'><i data-feather='lock'></i></a>
                                                    <a href='#' class='btn btn-primary btn-xs btedit' data-bs-toggle='modal' data-bs-target='#modalEdit' data-id='{{ $ddata->id }}' data-nama='{{ $ddata->name }}' data-email='{{ $ddata->email }}'><i data-feather='edit'></i></a>
                                                    {{-- <a href="{{ url('data-pengguna-hapus/'.$ddata->id) }}" class='btn btn-danger btn-xs'><i data-feather='trash'></i></a> --}}
                                                    {{-- <form method="post" class="delete-form" action="pengguna/delete">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $ddata->id }}"/>
                                                        <button onclick="return confirm('Are you sure?');" type="submit" class='btn btn-danger btn-xs'><i data-feather='trash'></i></button>
                                                    </form> --}}
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalHapus" class='btn btn-danger btn-xs bthapus' data-id="{{ $ddata->id }}" data-nama='{{ $ddata->name }}'><i data-feather='trash'></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>


        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="pengguna/tambah" class="modal-content" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Lengkap :</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama lengkap user" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password :</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}">
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <form method="post" action="pengguna/delete" class="modal-content">
                    @csrf
                    <input type="hidden" name="id" id="id_user_hapus">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            Anda yakin akan menghapus data <b id="nama_hapus"></b>? Data yang sudah dihapus tidak bisa dikembalikan lagi.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-danger" type="submit">Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="modal fade" id="modalEditPass" tabindex="-1" role="dialog" aria-labelledby="modalEditPass" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="pengguna/editpass" class="modal-content" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id_user_editpass">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Password : <b id="nama_editpass"></b></h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>New Password :</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Edit Password</button>
                    </div>
                </form>
            </div>
        </div>


          <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="pengguna/edit" class="modal-content" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id_user_edit">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Lengkap :</label>
                            <input type="text" name="name" id="name_edit" class="form-control @error('name') is-invalid @enderror" placeholder="Nama lengkap user" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" name="email" id="email_edit" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Edit Data</button>
                    </div>
                </form>
            </div>
        </div>

      @endsection

    @section('footer')
    <script src="assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/datatables/datatable.custom.js"></script>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.bthapus', function() {
				const id 	= $(this).data('id');
				const nama 	= $(this).data('nama');
				$('#id_user_hapus').val(id);
				document.getElementById("nama_hapus").innerHTML = nama;
			});

            $(document).on('click', '.btedit', function() {
				const id 	= $(this).data('id');
				const nama 	= $(this).data('nama');
				const email 	= $(this).data('email');
				$('#id_user_edit').val(id);
				$('#name_edit').val(nama);
				$('#email_edit').val(email);
				// document.getElementById("nama_hapus").innerHTML = nama;
			});

            $(document).on('click', '.bteditpass', function() {
				const id 	= $(this).data('id');
				const nama 	= $(this).data('nama');
				$('#id_user_editpass').val(id);
				document.getElementById("nama_editpass").innerHTML = nama;
			});
        });
    </script>
  @endsection
