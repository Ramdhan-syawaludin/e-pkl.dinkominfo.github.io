<?php 

		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM `ip`");
		while($d = mysqli_fetch_array($data)){ 
$ipaddress=$d['ip'];
//echo $ipaddress;
	}
 ?>

