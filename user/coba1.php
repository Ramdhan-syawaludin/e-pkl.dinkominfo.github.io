<?php
include 'koneksi.php';
    include("zklib/zklib.php");
    
    $zk = new ZKLib("192.168.1.205", 4370);
    //$zk = new ZKLib("192.168.1.2", 1024);
    
    $ret = $zk->connect();
    sleep(1);
    if ( $ret ): 
        $zk->disableDevice();
        sleep(1);
    ?>

            <?php
            $attendance = $zk->getAttendance();
            sleep(1);
            while(list($idx, $attendancedata) = each($attendance)):
                if ( $attendancedata[2] == 14 )
                    $status = 'Check Out';
                else
                    $status = 'Check In';
            ?>
            <?php 

                    $uid= $attendancedata[1];
                    $time= date( "Y-m-d", strtotime( $attendancedata[3] ) );
                    $time1= date( "H:i", strtotime( $attendancedata[3] ) );

$cek = mysqli_query($koneksi,"SELECT * FROM presensi WHERE uid='$uid' AND time1='$time1'");
    $validasi = mysqli_num_rows($cek);
if ($validasi>0) {

        echo " DATA SUDAH ADA";
      //  echo " <meta http-equiv='refresh' content='1;url=index.php?halaman=presensi'>";
    }else{

         mysqli_query($koneksi,"INSERT INTO presensi VALUES ('NULL', '$uid', '$time', '$time1')");
         
    }



                     ?>
            




            <?php
            endwhile
            ?>
        </table>
            <?php
        $zk->enableDevice();
        sleep(1);
        $zk->disconnect();
    endif
?>