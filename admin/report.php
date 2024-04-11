<?php
include('../dbconnect.php');
$u = $_GET['u'];
$cekdulu = mysqli_query($conn,"select * from userdata where namainstansi='$u'");
    $ambil = mysqli_fetch_array($cekdulu);
    //get alamat
    $ambilprov = $ambil['provinsi'];
    $prov1 = mysqli_query($conn,"select name from provinces where id='$ambilprov'");
    $prov = mysqli_fetch_array($prov1)['name'];
    $ambilkota = $ambil['kabupaten'];
    $kab1 = mysqli_query($conn,"select name from regencies where id='$ambilkota'");
    $kab = mysqli_fetch_array($kab1)['name'];
    $ambilkec = $ambil['kecamatan'];
    $kec1 = mysqli_query($conn,"select name from districts where id='$ambilkec'");
    $kec = mysqli_fetch_array($kec1)['name'];
    $ambilkel = $ambil['kelurahan'];
    $kel1 = mysqli_query($conn,"select name from villages where id='$ambilkel'");
    $kel = mysqli_fetch_array($kel1)['name'];

require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($conn,"select * from userdata where namainstansi='$u'");
$html = '
<center><h3>Pendaftaran Praktek Kerja Lapangan Dinkominfo Blora</h3></center><hr/><br/>';
$html .= '<div class="row mt-5 mb-5">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-center">
                <h2>Data Sekolah / Perguruan Tinggi</h2>
            </div>
            <div class="market-status-table mt-4">
                <div class="table-responsive" style="overflow-x:hidden;">
                    
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Nama Sekolah / Perguruan Tinggi</label>
                            <input name="namainstansi" type="text" class="form-control" value="'.$u.'">
                        </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <label>Email Sekolah / Perguruan Tinggi</label>
                            <input name="emailinstansi" type="text" class="form-control" value="'.$ambil['emailinstansi'].'">
                        </div>
                        </div>
                    </div>
                    
                        <div class="form-group">
                            <label>Alamat Sekolah / Perguruan Tinggi</label>
                            <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="'. $ambil['alamat'].'">
                        </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <label>Provinsi:</label>
                        <input type="text" class="form-control" value="'. $prov.'">
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <label>Kota/Kabupaten:</label>
                        <input type="text" class="form-control" value="'. $kab.'">
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    <div class="form-group">
                        <label>Kecamatan:</label>
                        <input type="text" class="form-control" value="'. $kec.'">
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <label>Kelurahan:</label>
                        <input type="text" class="form-control" value="'. $kel.'">
                    </div>
                    </div>
                </div>
                    
                        
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Nomor Telepon Sekolah / Perguruan Tinggi</label>
                            <input name="tlpinstansi" type="text" class="form-control" value="'. $ambil['tlpinstansi'].'">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Pilihan Bidang</label>
                            <input type="text" class="form-control" value="'.  $ambil['bidangpkl'].'">
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Mulai PKL</label>
                            <input name="mulaipkl" type="date" class="form-control" value="'. $ambil['mulaipkl'].'">
                        </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <label>Selesai PKL</label>
                            <input name="selesaipkl" type="date" class="form-control" value="'. $ambil['selesaipkl'].'">
                        </div>
                        </div>
                    </div>
                    <img src="../user/'. $ambil['foto'].'" width="50%">
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
                <h2>Data Peserta</h2>
            </div>
            <br>
            <h2>Peserta 1</h2>
            <div class="market-status-table mt-4">
                <div class="table-responsive" style="overflow-x:hidden;">
                    
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>NIS/NIM Peserta</label>
                            <input name="nim1" type="text" class="form-control" value="'. $ambil['nim1'].'">
                        </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <label>Nama Peserta</label>
                            <input name="nama1" type="text" class="form-control" value="'. $ambil['nama1'].'">
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Jurusan Peserta</label>
                            <input name="jurusan1" type="text" class="form-control" value="'. $ambil['jurusan1'].'">
                        </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <label>Nomor Telepon Peserta</label>
                            <input name="tlp1" type="text" class="form-control" value="'. $ambil['tlp1'].'">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Email Peserta</label>
                            <input name="email1" type="text" class="form-control" value="'. $ambil['email1'].'">
                        </div>
                        </div>
                    </div>
                    <hr>

                    <h2>Peserta 2</h2>
                    <br>
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>NIS/NIM Peserta</label>
                            <input name="nim2" type="text" class="form-control" value="'. $ambil['nim2'].'">
                        </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <label>Nama Peserta</label>
                            <input name="nama2" type="text" class="form-control" value="'. $ambil['nama2'].'">
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Jurusan Peserta</label>
                            <input name="jurusan2" type="text" class="form-control" value="'. $ambil['jurusan2'].'">
                        </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <label>Nomor Telepon Peserta</label>
                            <input name="tlp2" type="text" class="form-control" value="'. $ambil['tlp2'].'">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label>Email Peserta</label>
                            <input name="email2" type="text" class="form-control" value="'. $ambil['email2'].'">
                        </div>
                        </div>
                    </div>
                    <hr>

                    <h2>Peserta 3</h2>
                    <br>
                    <div class="row">
                    <div class="col">
                    <div class="form-group">
                        <label>NIS/NIM Peserta</label>
                        <input name="nim3" type="text" class="form-control" value="'. $ambil['nim3'].'">
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <label>Nama Peserta</label>
                        <input name="nama3" type="text" class="form-control" value="'. $ambil['nama3'].'">
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    <div class="form-group">
                        <label>Jurusan Peserta</label>
                        <input name="jurusan3" type="text" class="form-control" value="'. $ambil['jurusan3'].'">
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        <label>Nomor Telepon Peserta</label>
                        <input name="tlp3" type="text" class="form-control" value="'. $ambil['tlp3'].'">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="form-group">
                        <label>Email Peserta</label>
                        <input name="email3" type="text" class="form-control" value="'. $ambil['email3'].'">
                    </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream($u.'.pdf');
?>
