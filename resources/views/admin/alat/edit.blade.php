@extends('admin.main')


@section('header')
    <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/leaflet/leaflet.css">
    <link href='{{ base_url() }}assets/leaflet/leaflet.fullscreen.css' rel='stylesheet' />
    <style>
        #peta_tambah{
            height: 430px;
        }
        </style>
@endsection

@section('container')

        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Tambah Alat</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ base_url() }}dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ base_url() }}master-alat">Data Alat</a></li>
                    <li class="breadcrumb-item active">Tambah Alat</li>
                  </ol>
                </div>
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    <ul>
                      {{-- <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Cetak Data"><i data-feather="printer"></i></a></li>
                      <li><a href="{{ url("master-alat/tambah") }}"><i data-feather="plus"></i></a></li> --}}
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

                <form method="post" action="{{ base_url() }}master-alat/edit-proses" class="card" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $alat->id }}">
                    {{-- <div class="card-header">
                      <h5>Data Pengguna</h5>
                    </div> --}}
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Alat:</label>
                                    <input type="text" name="nm_alat" class="form-control @error('nm_alat') is-invalid @enderror" placeholder="Nama alat" value="{{ $alat->nm_alat }}">
                                    @error('nm_alat')
                                        <i class="text-danger">* Inputan ini wajib diisi</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat:</label>
                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat alat">{{ $alat->alamat }}</textarea>
                                    @error('alamat')
                                        <i class="text-danger">* Inputan ini wajib diisi</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jarak Normal:</label>
                                    <div class="input-group">
                                        <input class="form-control @error('jarak_normal') is-invalid @enderror" type="number" placeholder="Jarak normal" name="jarak_normal" value="{{ $alat->jarak_normal }}"><span class="input-group-text">cm</span>
                                    </div>
                                    @error('jarak_normal')
                                    <i class="text-danger">* Inputan ini wajib diisi</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jarak Warning:</label>
                                    <div class="input-group">
                                        <input class="form-control @error('jarak_warning') is-invalid @enderror" type="number" placeholder="Jarak warning" name="jarak_warning" value="{{ $alat->jarak_warning }}"><span class="input-group-text">cm</span>
                                    </div>
                                    @error('jarak_warning')
                                    <i class="text-danger">* Inputan ini wajib diisi</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jarak Danger:</label>
                                    <div class="input-group">
                                        <input class="form-control @error('jarak_danger') is-invalid @enderror" type="number" placeholder="Jarak danger" name="jarak_danger" value="{{ $alat->jarak_danger }}"><span class="input-group-text">cm</span>
                                    </div>
                                    @error('jarak_danger')
                                    <i class="text-danger">* Inputan ini wajib diisi</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Gambar:</label>
                                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar"><span class="input-group-text"></span>
                                    @error('jarak_danger')
                                    <i class="text-danger">* Inputan ini wajib diisi</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="peta_tambah"></div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Lattitude:</label>
                                            <input type="text" name="lat" id="lat" class="form-control" placeholder="Lattitude" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Longtitude:</label>
                                            <input type="text" name="lng" id="lng" class="form-control" placeholder="Longtitude" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ base_url() }}master-alat" class="btn btn-light m-r-15">Batal</a>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>


@endsection

@section('footer')
    <script src="{{ base_url() }}assets/leaflet/leaflet.js"></script>
    <script src='{{ base_url() }}assets/leaflet/Leaflet.fullscreen.min.js'></script>
    <script>


    $(function() {
        var curlat      = {{ $alat->lat }};
        var curlng      = {{ $alat->lng }};
        $("#lat").val(curlat);
        $("#lng").val(curlng);

        var curLocation = [0, 0];
        if (curLocation[0] == 0 && curLocation[1] == 0) {
            curLocation = [curlat, curlng];
        }

        var map = L.map('peta_tambah',{
            fullscreenControl: {
                pseudoFullscreen: false
            }
        }).setView(curLocation, 16);

        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', { attribution: 'Tiles &copy; Esri' }).addTo(map);

        map.attributionControl.setPrefix(false);

        var marker = new L.marker(curLocation, {
            draggable: 'true'
        });

        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            $("#lat").val(position.lat);
            $("#lng").val(position.lng).keyup();
        });

        $("#lat, #lng").change(function() {
            var position = [parseInt($("#lat").val()), parseInt($("#lng").val())];
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            map.panTo(position);
        });

        map.addLayer(marker);
    })

    </script>
@endsection
