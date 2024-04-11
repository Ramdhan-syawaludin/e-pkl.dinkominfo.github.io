<?php 
session_start();
include'koneksi.php';

 ?>

 
 
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../logo.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Presensi PKL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/logo.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

   

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
       <a class="navbar-brand mr-1" href="#">Presensi PKL</a>
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
        <div class="input-group-append">
<!--           <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i> -->
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
    <div class="sidebar-header">
        <a href="index.php"><img src="../logo.png" alt="logo" width="70%"></a>
    </div>
      <li class="nav-item">
        <a class="nav-link" href="indexpres.php?halaman=presensi">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Presensi</span></a>
      </li>     

      <li class="nav-item">
        <a class="nav-link" href="indexpres.php?halaman=laporan">
          <i class="fas fa-fw fa-print"></i>
          <span>Laporan Pertanggal</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="indexpres.php?halaman=laporan_perorang">
          <i class="fas fa-fw fa-users"></i>
          <span>Laporan Perorangan</span></a>
      </li>

    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

          <?php 
            if (isset($_GET['halaman'])) {
              if ($_GET['halaman']=="presensi") {
                include'presensi.php';
              }

              elseif ($_GET['halaman']=="laporan") {
                include'laporan.php';
              }

              elseif ($_GET['halaman']=="laporan_perorang") {
                include'laporan_perorang.php';
              }
              elseif ($_GET['halaman']=="testing") {
                include'testing.php';
              }
            }
           ?>

      
        
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © 2023 Dinas Komunikasi dan Informatika Kabupaten Blora</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
