<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    $enableGetDeviceInfo = true;
    $enableGetUsers = true;
    $enableGetData = true;

    include('zklib/ZKLib.php');
include "iptampil.php";
include "koneksi.php";

// inisialisasi IP address dan port dari mesin fingerprint
$ipaddress = $ipaddress;
$zkPort = 4370;

// inisialisasi koneksi ke mesin fingerprint
$zk = new ZKLib($ipaddress, $zkPort);
$zk->connect();
$zk->disableDevice();

// ambil data absensi dari mesin fingerprint
$attendance = $zk->getAttendance();
if (count($attendance) > 0) {
    $attendance = array_reverse($attendance, true);
    sleep(1);
  //var_dump($attendance);
    foreach ($attendance as $att) {
    if (isset($att['uid']) && isset($att['id']) && isset($att['timestamp'])) {

        $no = $att['uid'];
        $uid = $att['id'];
        $time = date("Y-m-d", strtotime($att['timestamp']));

        $time1 = date("H:i", strtotime($att['timestamp']));
           $time = mysqli_real_escape_string($koneksi, $time);
            $time1 = mysqli_real_escape_string($koneksi, $time1);
            $query = mysqli_query($koneksi, "SELECT * FROM presensi WHERE uid='$uid' AND time1='$time1'");
            if ($query === false) {
                echo "Error: " . mysqli_error($koneksi);
            } else {
                $validasi = mysqli_num_rows($query);
                if ($validasi > 0) {
                   // echo "DATA SUDAH ADA";
                    echo " <meta http-equiv='refresh' content='1;url=index.php?halaman=presensi'>";
                } else {
                    $result = mysqli_query($koneksi, "INSERT INTO presensi (id, uid, time, time1) VALUES (NULL, $uid, '$time', '$time1')");
                    echo " <meta http-equiv='refresh' content='1;url=index.php?halaman=presensi'>";
                    if ($result === false) {
                        echo "Error: " . mysqli_error($koneksi);
                    }
                }
            }
        }
    }
}

// aktifkan mesin fingerprint kembali setelah selesai mengambil data absensi
$zk->enableDevice();
