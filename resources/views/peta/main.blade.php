<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $desk }} - Banjir Track Pekanbaru">
    <meta name="keywords" content="{{ $keyword }}">
    <meta name="author" content="Firman Santosa">
    <link rel="icon" href="assets/images/icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/icon.png" type="image/x-icon">
    <title>{{ $title }} - {{ identitas("judulweb") }}</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/feather-icon.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/leaflet/leaflet.css">
    <link rel="stylesheet" type="text/css" href="assets/leaflet/Control.MiniMap.css">
    <link href='assets/leaflet/leaflet.fullscreen.css' rel='stylesheet' />

    @yield('header')

  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" id="pageWrapper">

      @yield('container')

    </div>
    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->

    <script src="assets/leaflet/leaflet.js"></script>
    <script src="assets/leaflet/leaflet-providers.js"></script>
    <script src="assets/leaflet/Control.MiniMap.js"></script>
    <script src='assets/leaflet/Leaflet.fullscreen.min.js'></script>


    <!-- Script untuk Group CLuster --->
    <link rel="stylesheet" href="assets/leaflet/MarkerCluster.css" />
	<link rel="stylesheet" href="assets/leaflet/MarkerCluster.Default.css" />
	<script src="assets/leaflet/leaflet.markercluster-src.js"></script>
	<script src="assets/leaflet/layersupport.js"></script>
    <!-- Akhir group claster --->

    @yield('footer')

    <script src="assets/js/script.js"></script>



  </body>
</html>
