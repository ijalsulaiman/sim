<?php

session_start();
include 'koneksi.php';

$username = $_POST['username'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$ubah = mysqli_query($koneksi,"update login set password = '$pass1' where '$pass1'='$pass2' and username='$username'");
if ($pass1 != $pass2) {
      echo "<script>alert('Data yang dimasukan tidak sesuai! ');window.location='lupa.php';</script>;";
    }else{
      echo "<script>alert('Password berhasil diubah');window.location='index.php';</script>;";
  }
  ?>