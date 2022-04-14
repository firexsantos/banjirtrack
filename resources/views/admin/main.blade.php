<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $desk }} - {{ identitas("judulweb") }}">
    <meta name="keywords" content="{{ $keyword }}">
    <meta name="author" content="Firman Santosa">
    <link rel="icon" href="{{ base_url() }}assets/images/icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ base_url() }}assets/images/icon.png" type="image/x-icon">
    <title>{{ $title }} - {{ identitas("judulweb") }}</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/prism.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/style.css">
    <link id="color" rel="stylesheet" href="{{ base_url() }}assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/responsive.css">

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

        <!-- Page Header Start-->
<div class="page-main-header">
    <div class="main-header-right row m-0">
      <div class="main-header-left">
        <div class="logo-wrapper"><a href="{{ base_url() }}dashboard"><img class="img-fluid" src="{{ base_url() }}assets/images/icon.png" style="width:30px;" alt="{{ identitas("judulweb") }}">{{ identitas("judulweb") }}</a></div>
        <div class="dark-logo-wrapper"><a href="{{ base_url() }}dashboard"><img class="img-fluid" src="{{ base_url() }}assets/images/icon.png" style="width:30px;" alt="{{ identitas("judulweb") }}">{{ identitas("judulweb") }}</a></div>
        <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
      </div>

      <div class="nav-right col pull-right right-menu p-0">
        <ul class="nav-menus">
          <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>

          <li>
            <div class="mode"><i class="fa fa-moon-o"></i></div>
          </li>

          <li class="onhover-dropdown p-0">
            <button class="btn btn-primary-light" type="button"><a href="./logout"><i data-feather="log-out"></i>Log out</a></button>
          </li>
        </ul>
      </div>
      <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
  </div>
  <!-- Page Header Ends                              -->


      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">


        <!-- Page Sidebar Start-->
<header class="main-nav">
    <nav>
      <div class="main-navbar">
        <div id="mainnav">
          <ul class="nav-menu custom-scrollbar">
            <li class="back-btn">
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li><a class="nav-link menu-title" href="{{ base_url() }}dashboard"><i data-feather="home"></i><span>Dashboard</span></a></li>
            {{-- <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="anchor"></i><span>Starter kit</span></a>
              <ul class="nav-submenu menu-content">
                <li><a class="submenu-title" href="javascript:void(0)">color version<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                  <ul class="nav-sub-childmenu submenu-content">
                    <li><a href="index.html">Layout Light</a></li>
                    <li><a href="layout-dark.html">Layout Dark</a></li>
                  </ul>
                </li>
                <li>     <a class="submenu-title" href="javascript:void(0)">Page layout<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                  <ul class="nav-sub-childmenu submenu-content">
                    <li><a href="boxed.html">Boxed</a></li>
                    <li><a href="layout-rtl.html">RTL             </a></li>
                  </ul>
                </li>
                <li>     <a class="submenu-title" href="javascript:void(0)">Footers<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                  <ul class="nav-sub-childmenu submenu-content">
                    <li><a href="footer-light.html">Footer Light</a></li>
                    <li><a href="footer-dark.html">Footer Dark</a></li>
                    <li><a href="footer-fixed.html">Footer Fixed</a></li>
                  </ul>
                </li>
              </ul>
            </li> --}}
            <li class="dropdown"><a class="nav-link menu-title" href="{{ base_url() }}data-pengguna"><i data-feather="users"></i><span>Data Pengguna</span></a></li>
            <li class="dropdown"><a class="nav-link menu-title" href="{{ base_url() }}master-alat"><i data-feather="anchor"></i><span>Data Alat</span></a></li>
            {{-- <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="headphones"></i><span>Raise Support</span></a></li> --}}
            <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="file-text"></i><span>Panduan</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- Page Sidebar Ends-->



        @yield('container')

        <footer class="footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 footer-copyright">
                  <p class="mb-0">Copyright 2022 - <?= date("Y") ?> ©  {{ identitas("judulweb") }}. All rights reserved.</p>
                </div>
                <div class="col-md-6">
                  <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i> by Badan Penelitian dan Pengembangan Kota Pekanbaru</p>
                </div>
              </div>
            </div>
          </footer>

      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ base_url() }}assets/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="{{ base_url() }}assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{ base_url() }}assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="{{ base_url() }}assets/js/sidebar-menu.js"></script>
    <script src="{{ base_url() }}assets/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="{{ base_url() }}assets/js/bootstrap/popper.min.js"></script>
    <script src="{{ base_url() }}assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="{{ base_url() }}assets/js/prism/prism.min.js"></script>
    <script src="{{ base_url() }}assets/js/clipboard/clipboard.min.js"></script>
    <script src="{{ base_url() }}assets/js/custom-card/custom-card.js"></script>
    <script src="{{ base_url() }}assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ base_url() }}assets/js/script.js"></script>
    {{-- <script src="{{ base_url() }}assets/js/theme-customizer/customizer.js"></script> --}}
    <!-- login js-->

    @yield('footer')

  </body>
</html>
