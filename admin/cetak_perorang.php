<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Presensi</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		text-align: center;
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>


	<center>
		<h1>Data Presensi</h1>
	</center>

	<?php include'koneksi.php'; ?>
		<table border="1">
			<thead>
				<tr>					
					<th>No</th>
                    <th width="100">ID</th>
                    <th width="250">Nama</th>
                    <th width="130">TGL</th>
                    <th width="130">TIME</th>
				</tr>

			</thead>
			<?php 
			$no =1;
			$ambil= $koneksi->query("SELECT * FROM presensi WHERE uid='$_GET[id]' ORDER BY time ASC"); 
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

				</tr>			
					
			</tbody>
		<?php } ?>
		</table>

		<table>
			
				<?php 
            	$ambil2= $koneksi->query("SELECT COUNT( * ) AS total FROM presensi WHERE uid= '$_GET[id]'"); 
				while($pecah2=mysqli_fetch_assoc($ambil2) ){;
				 ?>
				<tr>
					<td>Total Presensi :</td>
					<td><?php echo $pecah2['total']; ?></td>
				</tr>
			
				<?php }?>
		</table>	 
</body>
<script>window.print()</script>
</html>