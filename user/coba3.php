<?php

// $time1='12:00' ;
// $time2='14:00';



include 'koneksi.php';

$waktu=mysqli_query($koneksi,"SELECT * FROM mk");
$jam=mysqli_fetch_assoc($waktu);

$time1=$jam['masuk'];
$time2=$jam['keluar'];

if ($time1 < $time2) {
	echo "masuk";
}else{
	echo "keluar";
}


	?>