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
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php 
include 'koneksi.php';
  ?>
  <?php
  session_start();
  error_reporting(0);
   if($_SESSION['level']==""){
   echo "<script>alert('Anda Tidak Memiliki Akses');window.location='index.php';</script>;";
  }
  if($_SESSION['level']=="mgr"){
   echo "<script>alert('Anda Tidak Memiliki Akses');window.location='barangkeluarmgr.php';</script>;";
  }
  if($_SESSION['level']=="stf"){
    echo "<script>alert('Anda Tidak Memiliki Akses');window.location='barangkeluarstf.php';</script>;";
  }
  if($_SESSION['level']=="pcs"){
    echo "<script>alert('Anda Tidak Memiliki Akses');window.location='barangpcs.php';</script>;";
  }
  if(isset($_POST['brgkeluar'])) {
      $id_barang = $_POST['id_barang'];
      $tanggalkeluar = $_POST['tanggalkeluar'];
      $jumlah = $_POST['jumlah'];
      $satuan = $_POST['satuan'];
      $customer = $_POST['customer'];
      $keterangan = $_POST['keterangan'];
      $customer = $_POST['customer'];
      $spesifikasi = $_POST['spesifikasi'];
      $id_user = $_POST['user'];

      $cekstok = mysqli_query($koneksi,"select * from persediaan_barang where id_barang='$id_barang'");
      $stokbaru = mysqli_fetch_array($cekstok);
      $stoksekarang=$stokbaru['stok'];
      $stokterbaru= $stoksekarang-$jumlah;
      if($jumlah > $stoksekarang)
    {
       echo "<script>alert('Pastikan semua kolom terisi dengan benar! ');window.location='barangkeluaradm.php';</script>;";
    }
    else{
    $brgkeluar = mysqli_query($koneksi,"insert into barang_keluar (id_barangkeluar, id_barang, tanggalkeluar, jumlah, satuan, keterangan) values('','$id_barang','$tanggalkeluar','$jumlah','$satuan', '$keterangan')");
    $detailbrgkeluar = mysqli_query($koneksi,"insert into detailbarangkeluar (id_detailbarangkeluar, id_barang, id_user, customer, spesifikasi) values('','$id_barang','$id_user','$customer','$spesifikasi')");
    $updetail = mysqli_query($koneksi,"update detailbarangkeluar set id_barangkeluar = id_detailbarangkeluar");
      $updatestok = mysqli_query($koneksi, "update persediaan_barang set stok='$stokterbaru' where id_barang='$id_barang'");
      if (!$brgkeluar) {
      echo "<script>alert('Pastikan semua kolom terisi dengan benar! ');window.location='barangkeluaradm.php';</script>;";
    }else{
     $ambildatass = mysqli_query($koneksi,"select barang_masuk.id_barang, IFNULL(round(1.64*SQRT((avg(detailbarangmasuk.lead)*(STDDEV_SAMP(barang_keluar.jumlah)*STDDEV_SAMP(barang_keluar.jumlah)))+((avg(barang_keluar.jumlah)*(avg(barang_keluar.jumlah))*(stddev_samp(detailbarangmasuk.lead)*stddev_samp(detailbarangmasuk.lead)))))),1) as ss,ifnull(round((avg(detailbarangmasuk.lead))*AVG(barang_keluar.jumlah)+round(1.64*SQRT((avg(detailbarangmasuk.lead)*(STDDEV_SAMP(barang_keluar.jumlah)*STDDEV_SAMP(barang_keluar.jumlah)))+((avg(barang_keluar.jumlah)*(avg(barang_keluar.jumlah))*(stddev_samp(detailbarangmasuk.lead)*stddev_samp(detailbarangmasuk.lead))))))),1)as rop from barang_masuk inner join detailbarangmasuk on detailbarangmasuk.id_barang=barang_masuk.id_barang inner join barang_keluar on barang_keluar.id_barang=barang_masuk.id_barang where barang_masuk.id_barang='$id_barang' group by barang_masuk.id_barang;");
      $datass=mysqli_fetch_array($ambildatass);
      $rop=$datass['rop'];
      $ss=$datass['ss'];
      $updaterop= mysqli_query($koneksi,"update perencanaan set rop='$rop' where id_barang='$id_barang'");
    $updatess = mysqli_query($koneksi,"update persediaan_barang set safety_stock='$ss' where id_barang='$id_barang'");
      echo "<script>alert('Data Berhasil Ditambahkan');window.location='barangkeluaradm.php';</script>;";
    }
    }
    }
    if(isset($_POST['updatekeluar'])) {
      $id_barangkeluar = $_POST['id_barangkeluar'];
      $id_barang = $_POST['id_barang'];
      $tanggalkeluar = $_POST['tanggalkeluar'];
      $jumlah = $_POST['jumlah'];
      $satuan = $_POST['satuan'];
      $customer = $_POST['customer'];
      $keterangan = $_POST['keterangan'];
      $spesifikasi = $_POST['spesifikasi'];

      $cekstok = mysqli_query($koneksi,"select * from persediaan_barang where id_barang='$id_barang'");
      $stokbaru = mysqli_fetch_array($cekstok);
      $stoksekarang=$stokbaru['stok'];

      $cekstokkeluar = mysqli_query($koneksi,"select * from barang_keluar where id_barangkeluar='$id_barangkeluar'");
      $stokbarukeluar = mysqli_fetch_array($cekstokkeluar);
      $stokkeluarsekarang=$stokbarukeluar['jumlah'];
          if($jumlah > $stoksekarang)
    {
       echo "<script>alert('Pastikan semua kolom terisi dengan benar! ');window.location='barangkeluaradm.php';</script>;";
    }
    else{
      if ($jumlah>$stokkeluarsekarang) {
        $selisih=$jumlah-$stokkeluarsekarang;
        $kurang=$stoksekarang-$selisih;
        $mengurangi= mysqli_query($koneksi,"update persediaan_barang set stok='$kurang' where id_barang='$id_barang'");
        $updatekeluar= mysqli_query($koneksi,"update barang_keluar set tanggalkeluar='$tanggalkeluar',jumlah='$jumlah',keterangan='$keterangan' where id_barangkeluar='$id_barangkeluar'");
        $updatedetailkeluar= mysqli_query($koneksi,"update detailbarangkeluar set customer='$customer',spesifikasi='$spesifikasi' where id_barangkeluar='$id_barangkeluar'");
        if (!$updatekeluar) {
      echo "<script>alert('Pastikan semua kolom terisi dengan benar! ');window.location='barangkeluaradm.php';</script>;";
    }else{
    $ambildatass = mysqli_query($koneksi,"select barang_masuk.id_barang, IFNULL(round(1.64*SQRT((avg(detailbarangmasuk.lead)*(STDDEV_SAMP(barang_keluar.jumlah)*STDDEV_SAMP(barang_keluar.jumlah)))+((avg(barang_keluar.jumlah)*(avg(barang_keluar.jumlah))*(stddev_samp(detailbarangmasuk.lead)*stddev_samp(detailbarangmasuk.lead)))))),1) as ss,ifnull(round((avg(detailbarangmasuk.lead))*AVG(barang_keluar.jumlah)+round(1.64*SQRT((avg(detailbarangmasuk.lead)*(STDDEV_SAMP(barang_keluar.jumlah)*STDDEV_SAMP(barang_keluar.jumlah)))+((avg(barang_keluar.jumlah)*(avg(barang_keluar.jumlah))*(stddev_samp(detailbarangmasuk.lead)*stddev_samp(detailbarangmasuk.lead))))))),1)as rop from barang_masuk inner join detailbarangmasuk on detailbarangmasuk.id_barang=barang_masuk.id_barang inner join barang_keluar on barang_keluar.id_barang=barang_masuk.id_barang where barang_masuk.id_barang='$id_barang' group by barang_masuk.id_barang;");
      $datass=mysqli_fetch_array($ambildatass);
      $rop=$datass['rop'];
      $ss=$datass['ss'];
      $updaterop= mysqli_query($koneksi,"update perencanaan set rop='$rop' where id_barang='$id_barang'");
    $updatess = mysqli_query($koneksi,"update persediaan_barang set safety_stock='$ss' where id_barang='$id_barang'");
      echo "<script>alert('Data Berhasil Diubah');window.location='barangkeluaradm.php';</script>;";
    }
      }else{
        $selisih=$stokkeluarsekarang-$jumlah;
        $kurang=$stoksekarang+$selisih;
        $mengurangi= mysqli_query($koneksi,"update persediaan_barang set stok='$kurang' where id_barang='$id_barang'");
        $updatekeluar= mysqli_query($koneksi,"update barang_keluar set tanggalkeluar='$tanggalkeluar',jumlah='$jumlah',keterangan='$keterangan' where id_barangkeluar='$id_barangkeluar'");
        $updatedetailkeluar= mysqli_query($koneksi,"update detailbarangkeluar set customer='$customer',spesifikasi='$spesifikasi' where id_barangkeluar='$id_barangkeluar'");
        if (!$updatekeluar) {
      echo "<script>alert('Pastikan semua kolom terisi dengan benar! ');window.location='barangkeluaradm.php';</script>;";
    }else{
    $ambildatass = mysqli_query($koneksi,"select barang_masuk.id_barang, IFNULL(round(1.64*SQRT((avg(detailbarangmasuk.lead)*(STDDEV_SAMP(barang_keluar.jumlah)*STDDEV_SAMP(barang_keluar.jumlah)))+((avg(barang_keluar.jumlah)*(avg(barang_keluar.jumlah))*(stddev_samp(detailbarangmasuk.lead)*stddev_samp(detailbarangmasuk.lead)))))),1) as ss,ifnull(round((avg(detailbarangmasuk.lead))*AVG(barang_keluar.jumlah)+round(1.64*SQRT((avg(detailbarangmasuk.lead)*(STDDEV_SAMP(barang_keluar.jumlah)*STDDEV_SAMP(barang_keluar.jumlah)))+((avg(barang_keluar.jumlah)*(avg(barang_keluar.jumlah))*(stddev_samp(detailbarangmasuk.lead)*stddev_samp(detailbarangmasuk.lead))))))),1)as rop from barang_masuk inner join detailbarangmasuk on detailbarangmasuk.id_barang=barang_masuk.id_barang inner join barang_keluar on barang_keluar.id_barang=barang_masuk.id_barang where barang_masuk.id_barang='$id_barang' group by barang_masuk.id_barang;");      
      $datass=mysqli_fetch_array($ambildatass);
      $rop=$datass['rop'];
      $ss=$datass['ss'];
      $updaterop= mysqli_query($koneksi,"update perencanaan set rop='$rop' where id_barang='$id_barang'");
    $updatess = mysqli_query($koneksi,"update persediaan_barang set safety_stock='$ss' where id_barang='$id_barang'");
      echo "<script>alert('Data Berhasil Diubah');window.location='barangkeluaradm.php';</script>;";
    }
      }
    }
    }
    if (isset($_POST['delkel'])) {
    $id_barangkeluar=$_POST['id_barangkeluar'];
    $id_barang=$_POST['id_barang'];
    $jumlah=$_POST['jumlah'];

    $datastok = mysqli_query($koneksi," select * from persediaan_barang where id_barang='$id_barang'");
    $data = mysqli_fetch_array($datastok);
    $stok = $data['stok'];

    $selisih = $stok+$jumlah;

    $updt =mysqli_query($koneksi,"update persediaan_barang set stok='$selisih' where id_barang='$id_barang'");
    $delmas= mysqli_query($koneksi,"delete from barang_keluar where id_barangkeluar='$id_barangkeluar'");
if (!$delmas) {
      echo "<script>alert('Data tidak terhapus ');window.location='barangkeluaradm.php';</script>;";
    }else{
      $ambildatass = mysqli_query($koneksi,"select barang_masuk.id_barang, IFNULL(round(1.64*SQRT((avg(detailbarangmasuk.lead)*(STDDEV_SAMP(barang_keluar.jumlah)*STDDEV_SAMP(barang_keluar.jumlah)))+((avg(barang_keluar.jumlah)*(avg(barang_keluar.jumlah))*(stddev_samp(detailbarangmasuk.lead)*stddev_samp(detailbarangmasuk.lead)))))),1) as ss,ifnull(round((avg(detailbarangmasuk.lead))*AVG(barang_keluar.jumlah)+round(1.64*SQRT((avg(detailbarangmasuk.lead)*(STDDEV_SAMP(barang_keluar.jumlah)*STDDEV_SAMP(barang_keluar.jumlah)))+((avg(barang_keluar.jumlah)*(avg(barang_keluar.jumlah))*(stddev_samp(detailbarangmasuk.lead)*stddev_samp(detailbarangmasuk.lead))))))),1)as rop from barang_masuk inner join detailbarangmasuk on detailbarangmasuk.id_barang=barang_masuk.id_barang inner join barang_keluar on barang_keluar.id_barang=barang_masuk.id_barang where barang_masuk.id_barang='$id_barang' group by barang_masuk.id_barang;");
      $datass=mysqli_fetch_array($ambildatass);
      $rop=$datass['rop'];
      $ss=$datass['ss'];
      $updaterop= mysqli_query($koneksi,"update perencanaan set rop='$rop' where id_barang='$id_barang'");
    $updatess = mysqli_query($koneksi,"update persediaan_barang set safety_stock='$ss' where id_barang='$id_barang'");
      echo "<script>alert('Data Berhasil dihapus');window.location='barangkeluaradm.php';</script>;";
    }
  }
  if (isset($_POST['delkel'])) {
    $id_barangkeluar=$_POST['id_barangkeluar'];
    $deldet= mysqli_query($koneksi,"delete from detailbarangkeluar where id_barangkeluar='$id_barangkeluar'");
    
  }
  ?>
   <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <b>Keluar</b>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> 

     </ul>
   </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">CV. Abadi Mitra Utama</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="font-size: 15px; color: white;">
         Admin
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="barangadm.php" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
              <p>
                Daftar Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="persediaanadm.php" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
              <p>
                Persediaan Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="barangmasukadm.php" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
              <p>
                Barang Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="detailbarangmasukadm.php" class="nav-link">
                <i class="fas fa-info nav-icon"></i>
              <p>
                Detail Barang Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="barangkeluaradm.php" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
              <p>
                Barang Keluar
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="detailbarangkeluaradm.php" class="nav-link">
                <i class="fas fa-info nav-icon"></i>
              <p>
                Detail Barang Keluar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="barangreturadm.php" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
              <p>
                Barang Retur
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="detailbarangreturadm.php" class="nav-link">
                <i class="fas fa-info nav-icon"></i>
              <p>
                Detail Barang Retur
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="perencanaanadm.php" class="nav-link">
            <i class="fas fa-book nav-icon"></i>    
              <p>
                Perencanaan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <h1 align="center">BARANG KELUAR</h1>
      <table width="75%" align="center"><tr>
        <td align="left"><a href="databarangkeluar.php" target="_blank"><button class="btn btn-light btn-outline-dark">Print</button></a>
      <td width="50%" align="right">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#brgkeluar">
 <img src="tambah.png" width="20px" height="20px">Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="brgkeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="brgkeluar">Tambah Data Barang Keluar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST">
          <div class="form-group" align="left">
            <label for="id_barang">Nama Barang</label>
            <select name="id_barang" class="form-control" required>
            <option>Pilih Barang</option>  
              <?php
                  $ambilid = mysqli_query($koneksi,"select persediaan_barang.id_barang, barang.nama_barang from persediaan_barang join barang on barang.id_barang = persediaan_barang.id_barang where persediaan_barang.stok >=1");
                  while ($fetcharray = mysqli_fetch_array($ambilid)) {
                    $kdbrg = $fetcharray['id_barang'];
                    $nama_barang = $fetcharray['nama_barang'];
                  ?>
                  <option value="<?=$kdbrg;?>"><?=$kdbrg;?>|<?=$nama_barang;?></option>
                  <?PHP
                  }
                  ?>
            </select>          
          </div>    
          <div class="form-group" align="left">
            <label for="date">Tanggal</label>
            <input type="date" class="form-control" name="tanggalkeluar" value="<?php echo date('Y-m-d');?>" required>       
          </div>
          <div class="form-group" align="left">
            <label for="number">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" placeholder="Jumlah barang keluar" min="0" required>            
          </div> 
          <div class="form-group" align="left">
            <label for="text">Satuan </label>
            <input type="text" class="form-control" name="satuan" placeholder="Masukkan Jenis Satuan" required>            
          </div>
          <div class="form-group" align="left">
            <label for="text">Customer </label>
            <input type="text" class="form-control" name="customer" placeholder="Customer"required>            
          </div>
          <div class="form-group" align="left">
            <label for="text">Spesifikasi </label>
            <input type="text" class="form-control" name="spesifikasi" placeholder="Spesifikasi barang"required>            
          </div>
          <div class="form-group" align="left">
            <label for="text">Keterangan </label>
            <input type="text" class="form-control" name="keterangan" placeholder="keterangan"required>            
          </div>
          <div class="form-group" align="left">
            <label for="text">Petugas </label>
            <?php
            $username = $_SESSION['username'];
              $ambilnama = mysqli_query($koneksi,"select * from login where username ='$username'");
              while($ambil = mysqli_fetch_array($ambilnama)){
                $id_user = $ambil['id_user'];
                $nama = $ambil['nama'];
              }
            ?>
            <input type="hidden" class="form-control" name="user" value="<?=$id_user;?>"readonly>
            <input type="text" class="form-control" placeholder="<?=$nama;?>"readonly>            
          </div>
          <div class="modal-footer">            
            <button type="submit" class="btn btn-primary" name="brgkeluar">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
    </td>
      <td align="right" width="25%"><div class="mb-1">
        <form class="d-flex" action="barangkeluaradm.php" method="post">
        <input class="form-control me-2" type="text" name ="cari" placeholder="cari">
        <input class="btn btn-primary" type="submit" value="Cari">
      </form></div></td></tr></td></tr></table>
   <table id="example2" class="table table-bordered table-hover dataTable dtr-inline w-75 mx-auto" aria-describedby="example2_info">
          <thead class="table-dark" align="center">
              <th>Nama Barang</th>
              <th>Tanggal</th>
              <th>Jumlah</th>
              <th>Satuan</th>
              <th>Keterangan</th>
              <th>Action</th>
          <thead>
          <tbody>
            <?php
            if (isset($_POST['cari'])) {
              $cari = $_POST['cari'];
              $ambildata = mysqli_query($koneksi,"select barang_keluar.id_barangkeluar,barang_keluar.id_barang, barang.nama_barang, barang_keluar.tanggalkeluar, barang_keluar.jumlah, barang_keluar.satuan, barang_keluar.keterangan, detailbarangkeluar.customer, detailbarangkeluar.spesifikasi from barang_keluar join barang on barang.id_barang=barang_keluar.id_barang join detailbarangkeluar on detailbarangkeluar.id_barangkeluar = barang_keluar.id_barangkeluar where barang.nama_barang like '%".$cari."%' or barang_keluar.tanggalkeluar like '%".$cari."%' or barang_keluar.jumlah like '%".$cari."%'");
            } else{
              $ambildata = mysqli_query($koneksi,"select barang_keluar.id_barangkeluar,barang_keluar.id_barang, barang.nama_barang, barang_keluar.tanggalkeluar, barang_keluar.jumlah, barang_keluar.satuan, barang_keluar.keterangan,detailbarangkeluar.customer, detailbarangkeluar.spesifikasi from barang_keluar join barang on barang.id_barang=barang_keluar.id_barang join detailbarangkeluar on detailbarangkeluar.id_barangkeluar = barang_keluar.id_barangkeluar");
            }
                while($data=mysqli_fetch_array($ambildata)){
                $i = 1; 
                $id_barangkeluar = $data['id_barangkeluar'];
                $id_barang = $data['id_barang'];
                $nama_barang = $data['nama_barang'];
                $tanggalkeluar = $data['tanggalkeluar'];
                $jumlah = $data['jumlah'];
                $satuan = $data['satuan'];
                $keterangan = $data['keterangan'];
                $customer = $data['customer'];
                $spesifikasi = $data['spesifikasi'];
            ?>
            <tr align="center">
                <td><?=$nama_barang;?></td>
                <td><?=$tanggalkeluar;?></td>
                <td><?=$jumlah;?></td>
                <td><?=$satuan;?></td>
                <td><?=$keterangan;?></td>
                <td><button class=" btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit<?=$id_barangkeluar;?>"><img src="edit.png" width="20px" height="20px"></button>&emsp;
                  <button class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#delete<?=$id_barangkeluar;?>"><img src="hapus.png" width="20px" height="20px"></button></td>
            </tr>
            <div class="modal fade" id="edit<?=$id_barangkeluar;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="brgkeluar">Ubah Data Barang keluar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST">
        <div class="form-group" align="left"> 
            <input type="hidden" class="form-control" name="id_barangkeluar" value="<?=$id_barangkeluar;?>" readonly>      
          </div> 
          <div class="form-group" align="left"> 
            <input type="text" class="form-control" name="id_barang" value="<?=$id_barang?>" readonly>      
          </div> 
          <div class="form-group" align="left">
            <label for="id_barang">Nama Barang</label>  
            <input type="text" class="form-control" name="nama_barang" value="<?=$nama_barang?>" readonly>      
          </div>    
          <div class="form-group" align="left">
            <label for="date">Tanggal keluar</label>
            <input type="date" class="form-control" name="tanggalkeluar" value="<?=$tanggalkeluar;?>" required>       
          </div>
           <div class="form-group" align="left">
            <label for="number">Jumlah</label>
            <input type="number"class="form-control" name="jumlah" min="0" value="<?=$jumlah?>" required>    
          </div>
          <div class="form-group" align="left">
            <label for="text">Satuan </label>
            <input type="text" class="form-control" name="satuan" value="<?=$satuan?>" readonly>            
          </div>
          <div class="form-group" align="left">
            <label for="text">Customer </label>
            <input type="text" class="form-control" name="customer" value="<?=$customer?>" required>            
          </div>
           <div class="form-group" align="left">
            <label for="text">Spesifikasi </label>
            <input type="text" class="form-control" name="spesifikasi" value="<?=$spesifikasi?>" required>            
          </div>
          <div class="form-group" align="left">
            <label for="text">Keterangan </label>
            <input type="text" class="form-control" name="keterangan" value="<?=$keterangan;?>" required>            
          </div>
          <div class="modal-footer">            
            <button type="submit" class="btn btn-primary" name="updatekeluar">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delete<?=$id_barangkeluar;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete">Hapus Data Barang Keluar? ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST">
      <div class="modal-body">
        Apakah anda ingin menghapus data ini?
        <input type="hidden" name="id_barangkeluar" value="<?=$id_barangkeluar;?>">
        <input type="hidden" name="id_barang" value="<?=$id_barang;?>">
        <input type="hidden" name="jumlah" value="<?=$jumlah;?>">
      </div>
      <div class="modal-footer">            
            <button type="submit" class="btn btn-danger" name="delkel">Hapus</button>
          </div>
      </div>
    </form>
    </div>
  </div>
</div>
<?php
            };
            ?>
          </tbody>
    </table>
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
  <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
   $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
