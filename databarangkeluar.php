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
  }?>
  <script> window.print()</script>
      <h1 align="center">BARANG KELUAR</h1>
      <br>
  <table id="example2" class="table table-bordered table-hover dataTable dtr-inline w-75 mx-auto" aria-describedby="example2_info">
          <thead class="table-dark" align="center">
              <th>Nama Barang</th>
              <th>Tanggal</th>
              <th>Jumlah</th>
              <th>Satuan</th>
              <th>Customer</th>
              <th>Spesifkasi</th>
              <th>Keterangan</th>
          <thead>
          <tbody>
            <?php
            if (isset($_POST['cari'])) {
              $cari = $_POST['cari'];
              $ambildata = mysqli_query($koneksi,"select detailbarangkeluar.id_detailbarangkeluar, detailbarangkeluar.id_barangkeluar, detailbarangkeluar.id_barang, detailbarangkeluar.id_user, detailbarangkeluar.customer, detailbarangkeluar.spesifikasi, barang.nama_barang, barang_keluar.tanggalkeluar, barang_keluar.jumlah, barang_keluar.satuan, barang_keluar.keterangan, login.nama from detailbarangkeluar inner join barang on barang.id_barang = detailbarangkeluar.id_barang inner join barang_keluar on barang_keluar.id_barangkeluar=detailbarangkeluar.id_barangkeluar inner join login on login.id_user=detailbarangkeluar.id_user where where barang.nama_barang like '%".$cari."%' or barang_keluar.tanggalkeluar like '%".$cari."%' or barang_keluar.jumlah like '%".$cari."%' or barang_keluar.customer like '%".$cari."%'");
            } else{
              $ambildata = mysqli_query($koneksi,"select detailbarangkeluar.id_detailbarangkeluar, detailbarangkeluar.id_barangkeluar, detailbarangkeluar.id_barang, detailbarangkeluar.id_user, detailbarangkeluar.customer, detailbarangkeluar.spesifikasi, barang.nama_barang, barang_keluar.tanggalkeluar, barang_keluar.jumlah, barang_keluar.satuan, barang_keluar.keterangan, login.nama from detailbarangkeluar inner join barang on barang.id_barang = detailbarangkeluar.id_barang inner join barang_keluar on barang_keluar.id_barangkeluar=detailbarangkeluar.id_barangkeluar inner join login on login.id_user=detailbarangkeluar.id_user");
            }
                while($data=mysqli_fetch_array($ambildata)){
                $i = 1; 
                $id_barangkeluar = $data['id_barangkeluar'];
                $id_detailbarangkeluar = $data['id_detailbarangkeluar'];
                $id_barang = $data['id_barang'];
                $nama_barang = $data['nama_barang'];
                $tanggalkeluar = $data['tanggalkeluar'];
                $jumlah = $data['jumlah'];
                $satuan = $data['satuan'];
                $customer = $data['customer'];
                $spesifikasi= $data['spesifikasi'];
                $keterangan = $data['keterangan'];
            ?>
            <tr align="center">
                <td><?=$nama_barang;?></td>
                <td><?=date('d-F-Y', strtotime($tanggalkeluar));?></td>
                <td><?=$jumlah;?></td>
                <td><?=$satuan;?></td>
                <td><?=$customer;?></td>
                <td><?=$spesifikasi;?></td>
                <td><?=$keterangan;?></td>
              </tr>
<?php
            };
            ?>
          </tbody>
    </table>

</body>
</html>
