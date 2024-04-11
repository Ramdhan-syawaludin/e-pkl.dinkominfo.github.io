<h2>Laporan Presensi Perorangan</h2><hr>

<form action="" method="post">
	<div class="form-group">
		<label>Nama Peserta</label>
		<select name="id" class="form-control">
			<?php 
				$ambil = $koneksi->query("SELECT * FROM userfinger");
				while($g = $ambil->fetch_assoc()){
			 ?>
			<option value="<?php echo $g['id'] ;?>"><?php echo $g['name'];?></option>
		<?php } ?>
		</select>		

		<br><button class="btn btn-success" name="cari"><i class="fa fa-seach"></i> Cari</button>
	</div>
</form>

<?php 

	

	if (isset($_POST['cari'])) { 

		$uid = $_POST['id'];
		

		
				
		?>

<a target="_blank" href="export_perorang.php?id=<?php echo $uid; ?>"  style="float: right;"><i class="fa fa-upload" ></i> Export Excel</a><br><br>
<a target="_blank" href="cetak_perorang.php?id=<?php echo $uid; ?>"  style="float: right;"><i class="fa fa-print"></i> Cetak</a><br><br>
		<table class="table table-striped">
			<thead>
				<tr>					
				<th>No</th>
                    <th>ID USER</th>
                    <th>Nama</th>
                    <th>TGL</th>
                    <th>TIME</th>
				</tr>
			</thead>
			<?php 
			$no =1;
			$ambil= $koneksi->query("SELECT * FROM presensi WHERE uid ='$uid' "); 
			while($pecah=$ambil->fetch_assoc()){
		
			 ?>
			<tbody>
				<tr>
					<td><?php echo $no++ ; ?></td>
                    <td><?php echo $pecah['uid']; ?></td>
                    <td>
                    	<?php 
                    	$ambil1= $koneksi->query("SELECT * FROM userfinger WHERE id = '$uid'"); 
						while($pecah1=$ambil1->fetch_assoc()){
                    	echo $pecah1['name']; }?>
                    		
                    </td>
                    <td><?php echo $pecah['time']; ?></td>   
                    <td><?php echo $pecah['time1']; ?></td> 
				</tr>
			</tbody>
		<?php } ?>
		</table>
	
<?php } ?>
		