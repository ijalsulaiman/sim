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
  if($_SESSION['level']=="adm"){
    echo "<script>alert('Anda Tidak Memiliki Akses');window.location='persediaanadm.php';</script>;";
  }
	if($_SESSION['level']=="stf"){
   echo "<script>alert('Anda Tidak Memiliki Akses');window.location='persediaanstf.php';</script>;";
  }
  if($_SESSION['level']=="pcs"){
   echo "<script>alert('Anda Tidak Memiliki Akses');window.location='barangpcs.php';</script>;";
  }
	if(isset($_POST['tambahpersediaan'])){
        $id_barang = $_POST['id_barang'];
        $stok = $_POST['stok'];
        $satuan =$_POST['satuan'];
        $id_gudang = $_POST['id_gudang'];
        

    $tambahpersediaan = mysqli_query($koneksi,"insert into persediaan_barang (id_persediaan, id_barang, stok, satuan, id_gudang, safety_stock) values('','$id_barang','$stok','$satuan','$id_gudang','$safety_stock')");
    $tambahrop = mysqli_query($koneksi,"insert into perencanaan (id_perencanaan, id_barang, rop) values('','$id_barang','1')");
      if (!$tambahpersediaan) {
      echo "<script>alert('Pastikan semua kolom terisi dengan benar! ');window.location='persediaanmgr.php';</script>;";
    }else{
      echo "<script>alert('Data Berhasil Ditambahkan');window.location='persediaanmgr.php';</script>;";
    }
}
if(isset($_POST['updatepersediaan'])){
        $id_barang = $_POST['id_barang'];
        $stok = $_POST['stok'];
        $satuan =$_POST['satuan'];
        $id_gudang = $_POST['id_gudang'];
        $safety_stock = $_POST['safety_stock'];

    $updatepersediaan = mysqli_query($koneksi,"update persediaan_barang set safety_stock='$safety_stock', stok='$stok', id_gudang='$id_gudang', safety_stock='$safety_stock' where id_barang='$id_barang'");
    if (!$updatepersediaan) {
      echo "<script>alert('Pastikan semua kolom terisi dengan benar! ');window.location='persediaanmgr.php';</script>;";
    }else{
      echo "<script>alert('Data Berhasil Diubah');window.location='persediaanmgr.php';</script>;";
    }
   }
   if (isset($_POST['delpersediaan'])) {
		$id_barang= $_POST['id_barang'];

		$delpersediaan = mysqli_query($koneksi,"delete from persediaan_barang where id_barang='$id_barang'");
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
         Manager Logistik & Gudang
        </div>
      </div>

      <!-- Sidebar Menu -->
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="barangmgr.php" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
              <p>
                Daftar Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="persediaanmgr.php" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
              <p>
                Persediaan Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="barangmasukmgr.php" class="nav-link">
                <i class="fas fa-edit nav-icon"></i>
              <p>
                Barang Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="barangkeluarmgr.php" class="nav-link">
                <i class="fas fa-edit nav-icon"></i>
              <p>
                Barang Keluar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="barangreturmgr.php" class="nav-link">
                <i class="fas fa-edit nav-icon"></i>
              <p>
                Barang Retur
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="perencanaanmgr.php" class="nav-link">
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
		<h1 align="center">PERSEDIAAN BARANG</h1>
			<table width="75%%" align="center"><tr>
			<td align="left"><a href="persediaan.php" target="_blank"><button class="btn btn-light btn-outline-dark">Print</button></a>
			<td align="right" width="25%"><div class="mb-1">
				<form class="d-flex" action="persediaanmgr.php" method="post">
        <input class="form-control me-2" type="text" name ="cari" placeholder="cari">
        <input class="btn btn-primary" type="submit" value="Cari">
      </form></div></td></tr></td></tr></table>
		  <table id="example2" class="table table-bordered table-hover dataTable dtr-inline w-75 mx-auto" aria-describedby="example2_info">
          <thead class="table-dark" align="center">
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Stok</th>
              <th>Satuan</th>
              <th>Gudang</th>
              <th>Lokasi</th>
              <th>Safety Stock</th>
              <th>Persediaan Minimum</th>
              <th>Persediaan Maksimum</th>
              <th>Status</th>
          <thead>
          <tbody>
            <?php
              if (isset($_POST['cari'])) {
              $cari = $_POST['cari'];
            $ambildata = mysqli_query($koneksi,"select persediaan_barang.id_persediaan, persediaan_barang.id_barang, barang.nama_barang, persediaan_barang.stok, persediaan_barang.satuan, gudang.nama_gudang, persediaan_barang.safety_stock, persediaan_barang.lokasi, avg(detailbarangmasuk.lead), avg(barang_keluar.jumlah) from persediaan_barang inner join barang on barang.id_barang=persediaan_barang.id_barang inner join gudang on gudang.id_gudang=persediaan_barang.id_gudang inner join detailbarangmasuk on detailbarangmasuk.id_barang=persediaan_barang.id_barang inner join barang_keluar on barang_keluar.id_barang=persediaan_barang.id_barang where persediaan_barang.id_barang like '%".$cari."%' or barang.nama_barang like '%".$cari."%' or persediaan_barang.stok like '%".$cari."%' or persediaan_barang.safety_stock like '%".$cari."%' group by persediaan_barang.id_barang;");
            } else{
            $ambildata = mysqli_query($koneksi,"select persediaan_barang.id_persediaan, persediaan_barang.id_barang, barang.nama_barang, persediaan_barang.stok, persediaan_barang.satuan, gudang.nama_gudang, persediaan_barang.safety_stock, persediaan_barang.lokasi, avg(detailbarangmasuk.lead), avg(barang_keluar.jumlah) from persediaan_barang inner join barang on barang.id_barang=persediaan_barang.id_barang inner join gudang on gudang.id_gudang=persediaan_barang.id_gudang inner join detailbarangmasuk on detailbarangmasuk.id_barang=persediaan_barang.id_barang inner join barang_keluar on barang_keluar.id_barang=persediaan_barang.id_barang group by persediaan_barang.id_barang;");
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
                $lokasi = $data['lokasi'];
                $ratalead = $data ['avg(detailbarangmasuk.lead)'];
                $ratapermintaann = $data ['avg(barang_keluar.jumlah)'];
            ?>
            <tr align="center">
                <td><?=$id_barang;?></td>
                <td><?=$nama_barang;?></td>
                <td><?=$stok;?></td>
                <td><?=$satuan;?></td>
                <td><?=$nama_gudang;?></td>
                <td><?=$lokasi;?></td>
                <td><?=$safety_stock;?></td>
                <td><?=floor(($ratapermintaann*$ratalead)+$safety_stock);?></td>
                <td><?=floor(2*($ratapermintaann*$ratalead)+$safety_stock);?></td>
                <?php if($stok < floor(($ratapermintaann*$ratalead)+$safety_stock) ){
                  echo "<td style='background-color: red;color: white;'><b>Tidak Aman</b></td>";
                }
                elseif ($stok <=0 ) {
                  echo "<td style='background-color: red;color: white;'><b>Tidak Aman</b></td>";
                }
                  else{
                  echo "<td style='background-color: #03CA4A;color: white;''><b>Aman</b></td>";
                }

                ?>
          </tr>
					
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
