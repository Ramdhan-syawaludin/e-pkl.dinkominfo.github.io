<h2>PENGATURAN MASUK DAN KELUAR</h2><hr>
<?php 
include 'coba2.php';
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM `mk`");
		while($d = mysqli_fetch_array($data)){ 
$masuk=$d['masuk'];
$keluar=$d['keluar'];
$telat=$d['telat'];
			?>
			
<form action="" method="POST">
	<div class="form-group">
		<label>MASUK JAM</b></label><br>
		<input type="time" class="form-control" name="masuk" value="<?php echo $d['masuk']; ?>">
		<label>JAM HITUNG TERLAMBAT</b></label><br>
		<input type="time" class="form-control" name="telat" value="<?php echo $d['telat']; ?>">
		<label>KELUAR JAM</b></label><br>
		<input type="time" class="form-control" name="keluar" value="<?php echo $d['keluar']; ?>">

	</div>
	<div class="form-group">
		<button class="btn btn-success" name="save"><i class="fa fa-check"></i> Simpan</button>
	</div>
</form>
			
<?php			}
 ?>
 

<?php 
error_reporting(0);
$masuk=$_POST['masuk'];
$keluar=$_POST['keluar'];
$telat=$_POST['telat'];

// echo $masuk;
// echo $keluar;

	if (isset($_POST['save'])) {
		$koneksi->query("UPDATE mk SET masuk='$masuk', keluar='$keluar', telat='$telat' WHERE id=1;");
		// $koneksi->query("UPDATE mk SET masuk='$_POST[masuk]', keluar='$_POST[keluar]' WHERE id=1 ");

		echo " <div class='alert alert-success'>Data Berhasil Di Simpan.!</div>";
		echo " <meta http-equiv='refresh' content='1;url=indexpres.php?halaman=mk'>";
		
	}
 ?>
