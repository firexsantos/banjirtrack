@extends('peta.main')

@section('header')
    <link rel="stylesheet" type="text/css" href="core/css/publicdash.css">
@endsection

@section('container')
    <div style="position: absolute;left: 60px;top: 10px;">
        <div>
            <img src="assets/images/logo_header.png" style="cursor: pointer; height: 120px; position: absolute; z-index: 1001;">
        </div>
    </div>
    <div class="horizontal-menu">
        <div class="page-body">
            <div class="map-js-height" id="peta_pekanbaru" style="width:100%;height:100vh;"></div>
            <style>
                .legend_cuaca{

                    position:absolute;
                    bottom: 1%;
                    left: 1%;
                    z-index: 999999;
                    background: #fff;
                    padding:25px;
                    border-radius:15px;
                    background:#faf7d4;
                }
                .temp {
                    border-radius: 10px;
                    background-color: #012443;
                    color: rgb(211, 211, 211);
                    display: inline-block;
                    padding: 5px 8px;
                }
            </style>
            <div class="legend_cuaca"></div>
        </div>
    </div>
@endsection

@section('footer')


    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-database.js"></script>
    <script src="core/js/publicdash.js"></script>
    <script src="core/js/dashfirebase.js"></script>

    <!-- Ini untuk menu di sidebar kanan -->
    {{-- <script src="assets/js/theme-customizer/customizer.js"></script> --}}
    <!-- Akhir menu sidebar kanan -->
@endsection
