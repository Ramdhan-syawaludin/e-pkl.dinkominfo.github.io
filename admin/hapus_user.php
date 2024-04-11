<?php 
	$koneksi->query("DELETE FROM userfinger WHERE id = '$_GET[id]'");

	echo "<script>alert('Data Terhapus..');</script>";
	echo"<script>location='indexpres.php?halaman=userfinger';</script>";
 ?>