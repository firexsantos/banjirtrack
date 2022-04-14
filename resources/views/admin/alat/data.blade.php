@extends('admin.main')


@section('header')
<link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/datatables.css">
<link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/photoswipe.css">
@endsection

@section('container')

        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Data Alat</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ base_url() }}dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Alat</li>
                  </ol>
                </div>
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    <ul>
                      <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Cetak Data"><i data-feather="printer"></i></a></li>
                      <li><a href="{{ url("master-alat/tambah") }}"><i data-feather="plus"></i></a></li>
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
                              <th>Gambar</th>
                              <th>Nama Alat</th>
                              <th>Lokasi Alat</th>
                              <th class="text-center">Jarak</th>
                              <th class="text-center">Act</th>
                            </tr>
                          </thead>
                          <tbody>


                                @foreach($alat as $no => $ddata)

                                        <tr>
                                            <td class='text-center'>{{ ++$no }}</td>
                                            <td class="gallery my-gallery">
                                                <figure itemprop="associatedMedia" itemscope="">
                                                <a itemprop="contentUrl" href="{{ base_url() }}file/alat/{{ $ddata->gambar }}" data-size="1600x950">
                                                    <img itemprop="thumbnail" class="img-thumbnail" src="{{ base_url() }}file/alat/{{ $ddata->gambar }}" style="width:100px;">
                                                </a>
                                                </figure>
                                            </td>
                                            <td><i><b>{{ $ddata->kode_alat }}</b></i><br>{{ $ddata->nm_alat }}</td>
                                            <td>
                                                {{ $ddata->alamat }}<br>
                                                <a href="https://www.google.com/maps/search/?api=1&amp;query={{ $ddata->lat }},{{ $ddata->lng }}" target="_blank">{{ $ddata->lat }}, {{ $ddata->lng }}</a>
                                            </td>
                                            <td class="text-center">
                                                <div>N: {{ $ddata->jarak_normal }} cm</div>
                                                <div>W: {{ $ddata->jarak_warning }} cm</div>
                                                <div>D: {{ $ddata->jarak_danger }} cm</div>
                                            </td>
                                            <td class='text-center'>
                                                <div class='btn-group'>
                                                    <a href='{{ base_url() }}master-alat/edit/{{ $ddata->id }}' class='btn btn-primary btn-xs'><i data-feather='edit'></i></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalHapus" class='btn btn-danger btn-xs bthapus' data-id="{{ $ddata->id }}" data-nama='{{ $ddata->nm_alat }}'><i data-feather='trash'></i></a>
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


        <!-- Root element of PhotoSwipe. Must have class pswp.-->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
              <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
              </div>
              <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                  <div class="pswp__counter"></div>
                  <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                  <button class="pswp__button pswp__button--share" title="Share"></button>
                  <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                  <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                  <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                  <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                  <div class="pswp__caption__center"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->


      @endsection

    @section('footer')
    <script src="{{ base_url() }}assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ base_url() }}assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="{{ base_url() }}assets/js/photoswipe/photoswipe.min.js"></script>
    <script src="{{ base_url() }}assets/js/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="{{ base_url() }}assets/js/photoswipe/photoswipe.js"></script>
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
