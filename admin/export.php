<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
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

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Presensi.xls");
	?>

	<center>
		<h1>Data Presensi</h1>
	</center>

	<?php include'koneksi.php'; ?>
		<table border="1">
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
                    <td><?php echo $pecah['time']; ?></td>   
                    <td><?php echo $pecah['time1']; ?></td> 
				</tr>
			</tbody>
		<?php } ?>
		</table>
</body>
</html>