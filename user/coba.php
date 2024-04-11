<a href="tarik_presensi.php" class="btn btn-info" style="float: right;"><i class="fa fa-download"></i> Tarik Data</a><br><br>

<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Presensi</div>
          <div class="card-body">
            
                  <?php 
                  include 'koneksi.php';
                  $no = 1;
                      $ambil1 = $koneksi->query('SELECT SUM(state) As total FROM presensi WHERE id =2');
                      while($pecah1 = $ambil1->fetch_assoc()){;
                       
                      $tgl = $pecah1['time'];

                      if ($tgl >0) {
                      	echo $pecah1['total'];
                      }

                      echo "data ada";
                  
                 } ?>
              
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
