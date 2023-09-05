<!DOCTYPE html>
<html>
<head>
  <title>Gudang CV.Abadi Mitra Utama</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
  </script>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php 
include 'koneksi.php';
  ?>
  <?php 
  session_start();
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
  ?>
 
    <section class="content">
      <div class="container-fluid">
    <h1 align="center">PERSEDIAAN BARANG</h1>
  <br>
      <table id="example2" class="table table-bordered table-hover dataTable dtr-inline w-75 mx-auto" aria-describedby="example2_info">
          <thead class="table-dark" align="center">
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Stok</th>
              <th>Satuan</th>
              <th>Gudang</th>
              <th>Safety Stock</th>
              <th>Status</th>
          <thead>
          <tbody>
            <?php
              if (isset($_POST['cari'])) {
              $cari = $_POST['cari'];
            $ambildata = mysqli_query($koneksi,"select persediaan_barang.id_persediaan, persediaan_barang.id_barang, barang.nama_barang, persediaan_barang.stok, persediaan_barang.satuan, gudang.nama_gudang, persediaan_barang.safety_stock from persediaan_barang inner join barang on barang.id_barang=persediaan_barang.id_barang inner join gudang on gudang.id_gudang=persediaan_barang.id_gudang where persediaan_barang.id_barang like '%".$cari."%' or barang.nama_barang like '%".$cari."%' or persediaan_barang.stok like '%".$cari."%' or persediaan_barang.safety_stock like '%".$cari."%' order by persediaan_barang.id_barang ASC;");
            } else{
            $ambildata = mysqli_query($koneksi,"select persediaan_barang.id_persediaan, persediaan_barang.id_barang, barang.nama_barang, persediaan_barang.stok, persediaan_barang.satuan, gudang.nama_gudang, persediaan_barang.safety_stock from persediaan_barang inner join barang on barang.id_barang=persediaan_barang.id_barang inner join gudang on gudang.id_gudang=persediaan_barang.id_gudang order by persediaan_barang.id_barang ASC;");
            }
                while($data=mysqli_fetch_array($ambildata)){
                $i = 1;
                $id_persediaan= $data['id_persediaan'];
                $id_barang = $data['id_barang'];
                $nama_barang = $data['nama_barang'];
                $stok = $data['stok'];
                $satuan =  $data['satuan'];
                $nama_gudang = $data['nama_gudang'];
                $safety_stock = $data['safety_stock'];
            ?>
            <tr align="center">
                <td><?=$id_barang;?></td>
                <td><?=$nama_barang;?></td>
                <td><?=$stok;?></td>
                <td><?=$satuan;?></td>
                <td><?=$nama_gudang;?></td>
                <td><?=$safety_stock;?></td>
                <?php if($stok < $safety_stock){
                  echo "<td style='background-color: red;color: white;'><b>Tidak Aman</b></td>";
                }
                else
                {
                  echo "<td style='background-color: #03CA4A;color: white;''><b>Aman</b></td>";
                }

                ?>
<?php
            };
            ?>
          </tbody>
    </table>
    <script>window.print()</script>
</body>
</html>
