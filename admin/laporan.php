<h2>Laporan Presensi Pertanggal</h2><hr>

<form action="" method="post">
	<div class="form-group">
		<label>Bulan</label>
		<input type="date" name="bulan1" >
		<label>s/d</label>
		<input type="date" name="bulan2" >

		<button class="btn btn-success" name="cari"><i class="fa fa-seach"></i> Cari</button>
	</div>
</form>

<?php 

	

	if (isset($_POST['cari'])) { 

		$bln1 = $_POST['bulan1'];
		$bln2 = $_POST['bulan2'];

		
				
		?>

<a target="_blank" href="export.php?bln1=<?php echo $bln1; ?>&bln2=<?php echo $bln2; ?>"  style="float: right;"><i class="fa fa-upload" ></i> Export Excel</a><br><br>
<a target="_blank" href="cetak.php?bln1=<?php echo $bln1; ?>&bln2=<?php echo $bln2; ?>"  style="float: right;"><i class="fa fa-print"></i> Cetak</a><br><br>
		<table class="table table-striped">
			<thead>
				<tr>					
				<th>No</th>
                    <th>USER ID</th>
                    <th>Nama</th>
                 <!--    <th>STATE</th> -->
                    <th>TGL</th>
                    <th>TIME</th>
                    <th>STATUS</th>
                    <th>LEMBUR</th>

				</tr>
			</thead>

			<?php 
			$no =1;
			$ambil= $koneksi->query("SELECT * FROM presensi WHERE time BETWEEN '$bln1' AND '$bln2'"); 
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
                    <!-- <td><?php echo $pecah['state']; ?></td> -->
                    <td><?php echo date( "d-m-Y", strtotime( $pecah['time'] ) ); ?></td>  
                    			
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
	
<?php } ?>
		