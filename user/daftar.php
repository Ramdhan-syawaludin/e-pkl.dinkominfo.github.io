<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include '../cek.php';
    if($role!=='User'){
        header("location:../login.php");
    };
    $userid = $_SESSION['userid'];

    include 'submit.php';

    //cek dulu sudah pernah submit belum
    $cekdulu = mysqli_query($conn,"select * from userdata where userid='$userid'");
    $lihathasil = mysqli_num_rows($cekdulu);
    
    //kalau udah pernah submit
    if($lihathasil>0){
        header("location:mydata.php");
    } else {

    };
	?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dinkominfo: Pendaftaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/logo.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <link rel="stylesheet" href="../assets/select2-4.0.6-rc.1/dist/css/select2.min.css">
    
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                    <a href="index.php"><img src="../logo.png" alt="logo" width="100%"></a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
							<li><a href="index.php"><span>Dashboard</span></a></li>
                            <li class="active">
                                <a href="daftar.php"><i class="ti-layout"></i><span>Pendaftaran</span></a>
                            </li>
                            <li>
                                <a href="hasilseleksi.php"><i class="ti-layout"></i><span>Hasil Seleksi</span></a>
                            </li>
                            <li>
                                <a href="indexpres.php?halaman=presensi" target="_blank"><i class="ti-layout"></i><span>Presensi</span></a>
                            </li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                                
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
			
            <!-- page title area end -->
            <div class="main-content-inner">

                <!-- panduan -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h1>Pendaftaran</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<!------------------ Pisahin ------------------->


                <form method="post" enctype="multipart/form-data">
                <!-- formulir -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h3>Data Sekolah / Perguruan Tinggi</h3>
                                    <br>
                                    
                                </div>
                                <p>* Data yang telah diinput tidak dapat diubah kembali, harap isi dengan teliti dan benar</p>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Sekolah / Perguruan Tinggi*</label>
                                                <input name="namainstansi" type="text" class="form-control" placeholder="Nama" maxlength="50" required>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Email Sekolah / Perguruan Tinggi*</label>
                                                <input name="emailinstansi" type="text" class="form-control" placeholder="Email" maxlength="50" required>
                                            </div>
                                            </div>
                                        </div>

                                        
                                            <div class="form-group">
                                                <label>Alamat Sekolah / Perguruan Tinggi</label>
                                                <input name="alamat" type="text" class="form-control" placeholder="Alamat" required>
                                            </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                            <label>Provinsi*:</label>
                                            <div class="col-sm-9">
                                            <?php                    
                                                $sql_provinsi = mysqli_query($conn,"SELECT * FROM provinces ORDER BY name ASC");
                                            ?>
                                            <select class="form-control" name="provinsi" id="provinsi">
                                                <option></option>
                                                <?php                       
                                                    while($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)){ 
                                                    echo '<option value="'.$rs_provinsi['id'].'">'.$rs_provinsi['name'].'</option>';
                                                    }                        
                                                ?>
                                            </select>
                                            <img src="asset/img/loading.gif" width="35" id="load1" style="display:none;" />
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-group">
                                            <label>Kota/Kabupaten*:</label>
                                            <div class="col-sm-9">          
                                            <select class="form-control" name="kota" id="kota">
                                                <option></option>
                                            </select>
                                            <img src="asset/img/loading.gif" width="35" id="load2" style="display:none;" />
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                        <div class="form-group">
                                            <label>Kecamatan*:</label>
                                            <div class="col-sm-9">          
                                            <select class="form-control" name="kecamatan" id="kecamatan">
                                                <option></option>
                                            </select>
                                            <img src="asset/img/loading.gif" width="35" id="load3" style="display:none;" />
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-group">
                                            <label>Kelurahan*:</label>
                                            <div class="col-sm-9">          
                                            <select class="form-control" name="kelurahan" id="kelurahan">
                                                <option></option>
                                            </select>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nomor Telepon Sekolah / Perguruan Tinggi*</label>
                                                <input name="tlpinstansi" type="text" class="form-control" placeholder="Nomor Telepon" maxlength="16" required>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pilihan Bidang*</label>
                                                <select class="form-control" name="bidangpkl">
                                                <option value="Informasi Teknologi">Informasi Teknologi</option>
                                                <option value="Perkantoran">Perkantoran</option>
                                                <option value="Multimedia">Multimedia</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                                </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Mulai PKL*</label>
                                                <input name="mulaipkl" type="date" class="form-control">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Selesai PKL*</label>
                                                <input name="selesaipkl" type="date" class="form-control">
                                            </div>
                                            </div>
                                        </div>
                                                </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                        <label for="suratpermohonan" class=" form-control-label">Surat Permohonan PKL (PDF), maks 4Mb</label>
                                                        <input type="file" id="suratpermohonan" name="suratpermohonan" class="form-control-file">
                                                    </div>
                                                </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                        <label for="proposal" class=" form-control-label">Proposal PKL (PDF), maks 4Mb</label>
                                                        <input type="file" id="proposal" name="proposal" class="form-control-file">
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                

                    <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h3>Data Peserta</h3>
                                </div>
                                <br>
                                    <h5>Peserta</h5>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">

                                    <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIS/NIM Peserta*</label>
                                                <input name="nim1" type="text" class="form-control" placeholder="Nomor Induk" maxlength="16">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Peserta*</label>
                                                <input name="nama1" type="text" class="form-control" placeholder="Nama" maxlength="50">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Jurusan Peserta*</label>
                                                <input name="jurusan1" type="text" class="form-control" placeholder="Jurusan" maxlength="20">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nomor Telepon Peserta*</label>
                                                <input name="tlp1" type="text" class="form-control" placeholder="Nomor Telepon" maxlength="15">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Email Peserta*</label>
                                                <input name="email1" type="text" class="form-control" placeholder="Email" maxlength="25">
                                            </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <h5>Peserta 2</h5>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIS/NIM Peserta*</label>
                                                <input name="nim2" type="text" class="form-control" placeholder="Nomor Induk" maxlength="16">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Peserta*</label>
                                                <input name="nama2" type="text" class="form-control" placeholder="Nama" maxlength="50">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Jurusan Peserta*</label>
                                                <input name="jurusan2" type="text" class="form-control" placeholder="Jurusan" maxlength="20">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nomor Telepon Peserta*</label>
                                                <input name="tlp2" type="text" class="form-control" placeholder="Nomor Telepon" maxlength="15">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Email Peserta*</label>
                                                <input name="email2" type="text" class="form-control" placeholder="Email" maxlength="25">
                                            </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <h5>Peserta 3</h5>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIS/NIM Peserta*</label>
                                                <input name="nim3" type="text" class="form-control" placeholder="Nomor Induk" maxlength="16">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Peserta*</label>
                                                <input name="nama3" type="text" class="form-control" placeholder="Nama" maxlength="50">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Jurusan Peserta*</label>
                                                <input name="jurusan3" type="text" class="form-control" placeholder="Jurusan" maxlength="20">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nomor Telepon Peserta*</label>
                                                <input name="tlp3" type="text" class="form-control" placeholder="Nomor Telepon" maxlength="15">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Email Peserta*</label>
                                                <input name="email3" type="text" class="form-control" placeholder="Email" maxlength="25">
                                                <input type="hidden" value="<?=$userid;?>" name="id">
                                            </div>
                                            </div>
                                        </div>     

                                        <div class="modal-footer">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>









                </div>
                  

                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Copyright © 2023 Dinas Komunikasi dan Informatika Kabupaten Blora</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>   
    <script src="../assets/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>   
    <script src="../assets/js/app.js"></script>
</body>

</html>
