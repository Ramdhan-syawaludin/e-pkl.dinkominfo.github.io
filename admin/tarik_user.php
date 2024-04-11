<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "iptampil.php";
include "koneksi.php";
include('zklib/ZKLib.php');
//ip fingerprint
$zk = new ZKLib($ipaddress, 4370);
$zk->connect();
$zk->disableDevice();
$users = $zk->getUser();

//var_dump($users);
foreach($users as $key=>$user)
{
	$uid	  = $key;
	$id 	  = $user['userid'];
	$name	  = $user['name'];
	$level	  = ZK\Util::getUserRole($user['role']);
	$password = $user['password'];

	$cek = $koneksi->query("SELECT * FROM userfinger WHERE id='$id' AND name='$name' AND level='$level' AND password='$password'");
	$validasi = $cek->num_rows;

	if ($validasi>0) {

		
		echo " <meta http-equiv='refresh' content='1;url=indexpres.php?halaman=userfinger'>";
	}else{

		 $query = $koneksi->query("INSERT INTO userfinger (uid, id, name, level, password) VALUES (NULL,'$id', '$name', '$level', '$password')");
	}

   
   
}

$zk->enableDevice();
header("location:indexpres.php?halaman=userfinger");
?>