<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Presensi</title>
</head>
<body>
<style>
	@media print {
  table {
    background-color: #f2f2f2;
  }
  th, td {
    border-color: #ddd;
  }
  tr:nth-child(even) {
    background-color: #fff;
  }
}

table {
    width: 100%;
    border-collapse: collapse;
}
th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
@media only screen and (max-width: 600px) {
    table, thead, tbody, th, td, tr {
        display: block;
    }
    th {
        text-align: center;
    }
    td {
        text-align: center;
        border: none;
        position: relative;
    }
    td:before {
        position: absolute;
        top: 6px;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        content: attr(data-column);
        color: #000;
        font-weight: bold;
    }
}
</style>



	<center>
		<h1>Data Presensi</h1>
	</center>

	<?php include'koneksi.php'; ?>
		<table border="1" >
			<thead>
				<tr>					
					<th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>TGL</th>
                    <th>TIME</th>
                    <th>STATUS</th>
                    <th>LEMBUR</th>
				</tr>
			</thead>
			<?php 
			$no =1;
			$ambil= $koneksi->query("SELECT * FROM presensi WHERE time BETWEEN '$_GET[bln1]' AND '$_GET[bln2]' ORDER BY `presensi`.`uid` ASC"); 
			while($pecah=$ambil->fetch_assoc()){
			$nama = $pecah['uid'];
			 ?>
			<tbody>
				<tr>
					<td><?php echo $no++ ; ?></td>
                    <td><?php echo $pecah['uid']; ?></td>
                    <td>
                    	<?php 
                    	$ambil1= $koneksi->query("SELECT * FROM userfinger WHERE id = '$nama'"); 
						while($pecah1=$ambil1->fetch_assoc()){
                    	echo $pecah1['name']; }?>
                    		
                    </td>
                    <td><?php echo  date( "d-m-Y", strtotime( $pecah['time'] ) ); ?></td>   
                    <td><?php echo $pecah['time1']; ?></td> 
                    <td>
                    	<?php 
                    				$waktu=mysqli_query($koneksi,"SELECT * FROM mk");
									$jam=mysqli_fetch_assoc($waktu);

									$masuk=$jam['masuk'];
									$keluar=$jam['keluar'];
									$telat=$jam['telat'];
									$absen=$pecah['time1'];

								if ($absen >= $keluar) {
    echo "<b style='background-color: #ff0033'>Keluar</b>";
} elseif ($absen >= $telat) {
    echo "<b style='background-color: #fff700'>Terlambat</b>";
} else {
    echo "<b style='background-color: #00ff08'>Masuk</b>";
}

            


                    	?>
                    </td>
<td>

<?php
// waktu masuk kerja
$jam_masuk = strtotime($jam['keluar']);

// waktu pulang kerja
$jam_pulang = strtotime($pecah['time1']);

// menghitung lama kerja dalam detik
$lama_kerja = $jam_pulang - $jam_masuk;

// menghitung lama lembur dalam detik
$lama_lembur = $lama_kerja - (8 * 3600);

// mengubah detik menjadi jam dan menit
$jam_lembur = floor($lama_lembur / 3600);
$menit_lembur = floor(($lama_lembur - ($jam_lembur * 3600)) / 60);

// menampilkan hasil
if ($absen < $masuk) {
			echo "0";
}elseif($absen > $keluar){
			echo "Lama kerja: " . gmdate('H:i:s', $lama_kerja) . "<br>";
			$waktu = gmdate('H:i:s', $lama_kerja);

			// memecah waktu menjadi jam, menit, dan detik
list($jam, $menit, $detik) = explode(":", $waktu);

// menghitung jumlah jam dengan format desimal
$jam_decimal = $jam + ($menit / 60) + ($detik / 3600);

// menampilkan hasil
echo "Jumlah Lembur: <b>" . round($jam_decimal, 1). "</b> Jam";


}elseif ($absen < $keluar) {
			echo "0";
}



?>

</td>
				</tr>
			</tbody>
		<?php } ?>
		</table>
</body>
<script>window.print()</script>
</html>