<a href="tarik_presensi.php" class="btn btn-info" style="float: right;"><i class="fa fa-download"></i> Tarik Data</a><br><br>

<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Presensi</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>ID USER</th>
                    <th>Nama</th>
                    <!-- <th>STATE</th> -->
                    <th>TGL</th>
                    <th>TIME</th>
                  </tr>
                </thead> 
        
        
                <tbody>
                  <?php 
                  $no = 1;
                      $ambil1 = $koneksi->query('SELECT * FROM presensi JOIN userfinger ON presensi.uid=userfinger.id WHERE presensi.uid = userfinger.id ORDER BY `presensi`.`time` DESC, `presensi`.`time1` DESC');
                      while($pecah1 = $ambil1->fetch_assoc()){
                      
                   ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $pecah1['id']; ?></td>
                    <td><?php echo $pecah1['name']; ?></td>
                  <!--   <td><?php echo $pecah1['state']; ?></td> -->
                    <td><?php echo $pecah1['time']; ?></td>   
                    <td><?php echo $pecah1['time1']; ?></td>                    
                  </tr>
                   <?php } ?>
                </tbody>
               
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
