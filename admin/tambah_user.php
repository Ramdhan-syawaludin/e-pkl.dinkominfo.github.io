<form  method="POST">
  <?php 
    $ambil=$koneksi->query("SELECT * FROM userfinger WHERE id='$_GET[id]'");
    $d = $ambil->fetch_assoc();
   ?>
	<div class="form-group">
	  <label>ID</label>
	 <input type="text" name="id" class="form-control" value="<?php echo $d['id']; ?>" hidden>
   <input type="text" class="form-control" value="<?php echo $d['id']; ?>" disabled>
	</div>
	<div class="form-group">
	  <label>Nama</label>
	  <input type="text" name="nama" class="form-control" value="<?php echo $d['name']; ?>">
	</div>
	<button class="btn btn-success" name="save">Simpan</button>
</form>

           <?php 
           include'koneksi.php';
              if (isset($_POST['save'])) {
               
               $insert = $koneksi->query("UPDATE userfinger SET name = '$_POST[nama]' WHERE id = '$_POST[id]'");
               if ($insert) {
               
                    echo "<div class='alert alert-success'>Berhasil ..!</div>";
                    echo "<meta http-equiv='refresh' content='1;url=indexpres.php?halaman=userfinger'>";      
                             
               }else{
               	echo "gagal";
               }
              }
           ?>