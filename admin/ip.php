<h2>IP ADDRESS FINGER PRINT</h2><hr>
<?php 
include 'coba2.php';
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM `ip`");
		while($d = mysqli_fetch_array($data)){ 
$ipaddress=$d['ip'];

			?>
			
<form action="" method="POST">
	<div class="form-group">
		<label>IP Addres Sekarang adalah <b><?php echo $ipaddress; ?></b></label><br>
		<label>Status Mesin <b><?php echo $st; ?></b></label>
		<input type="text" class="form-control" name="ip" value="<?php echo $d['ip']; ?>">
	</div>
	<div class="form-group">
		<button class="btn btn-success" name="save"><i class="fa fa-check"></i> Simpan</button>
	</div>
</form>
			
<?php			}
 ?>
 

<?php 
	if (isset($_POST['save'])) {
		$koneksi->query("UPDATE ip SET ip = '$_POST[ip]' WHERE id=1");

		echo " <div class='alert alert-success'>Data Berhasil Di Simpan.!</div>";
		echo " <meta http-equiv='refresh' content='1;url=indexpres.php?halaman=ip'>";
		
	}
 ?>
