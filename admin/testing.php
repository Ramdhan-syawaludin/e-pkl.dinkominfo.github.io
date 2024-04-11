
                  <?php 

                  $koneksi= new mysqli("localhost","root","","e-pkl");

                      $ambil1 = $koneksi->query('SELECT * FROM presensi');
                      while($pecah1 = $ambil1->fetch_assoc()){

                        $in = $pecah1['time1'];
                        $out = $pecah1['time1'];
                        $w = date("10:00:00");

                        $id = $pecah1['id'];
                        $masuk = $pecah1['time1'];
                        $pulang = $pecah1['time1'];
var_dump($in);

                        if ($in > $w) {
                          
                           $query = $koneksi->query("INSERT INTO pulang ( id, pulang) VALUES ('$id', '$pulang')");
                        }else{
                           $query = $koneksi->query("INSERT INTO masuk ( id, masuk) VALUES ('$id', '$masuk')");
                        }
                      }
                      
                   ?>
                  