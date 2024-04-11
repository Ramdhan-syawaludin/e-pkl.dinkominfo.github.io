<?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi,"SELECT * FROM `ip`");
        while($d = mysqli_fetch_array($data)){ 
$ipaddress=$d['ip'];

}
    include("zklib/zklib.php");
    $zk = new ZKLib($ipaddress, 4370);
    //$zk = new ZKLibrary($ipaddress, 4370);
    //$zk = new ZKLib("192.168.1.2", 1024);
    
    $ret = $zk->connect();
if ($ret) {
    $st='<mark style="background-color: green">koneksi</mark>';
}elseif(!$ret){
    $st= '<mark style="background-color: red">tidak koneksi</mark>';
}


    ?>
        
 



