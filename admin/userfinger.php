
<a href="tarik_user.php" class="btn btn-info" style="float: right;"><i class="fa fa-download"></i> Tarik Data</a><br><br>
<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data User</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>ID USER</th>
                    <th>NAMA</th>
 <th>LEVEL</th>
                    <!-- <th>PASSWORD</th>  -->
                    <th>OPSI</th>
                  </tr>
                </thead> 
                  <?php 
                      $ambil = $koneksi->query('SELECT * FROM userfinger');

                      while($pecah = $ambil->fetch_assoc()){
                   ?>
                <tbody>
                  
                  <tr>
                    <td><?php echo $pecah['uid']; ?></td>
                    <td><?php echo $pecah['id']; ?></td>
                    <td><?php echo $pecah['name']; ?></td>
                    <td><?php echo $pecah['level']; ?></td>
                    <!-- <td><?php echo $pecah['password']; ?></td> -->
                    <td>
                      <a href="indexpres.php?halaman=tambah_user&id=<?php echo $pecah['id']; ?>"><i class="fa fa-edit"></i> Ubah</a>
                      <a href="indexpres.php?halaman=hapus_user&id=<?php echo $pecah['id']; ?>"><i class="fa fa-trash"></i> Hapus</a>
                    </td>

                </tbody>
              <?php } ?>
              </table>
            </div>
          </div>
         
        </div>

