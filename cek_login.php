<?php

session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi,"select * from login where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	$data = mysqli_fetch_assoc($login);
	if($data['level']=="mgr"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "mgr";
		header("location:barangmgr.php");

	}else if($data['level']=="pcs"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pcs";

		header("location:barangpcs.php");
 
	}else if($data['level']=="stf"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "stf";
		header("location:barangstf.php");
 	}else if($data['level']=="adm"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "adm";
		header("location:barangadm.php");
	}else{
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>
	}
}
?>