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
error_reporting(0);
  session_start();
  if($_SESSION['level']==""){
   echo "<script>alert('Anda Tidak Memiliki Akses');window.location='index.php';</script>;";
  }
  if($_SESSION['level']=="mgr"){
   echo "<script>alert('Anda Tidak Memiliki Akses');window.location='detailbarangreturmgr.php';</script>;";
  }
  if($_SESSION['level']=="stf"){
    echo "<script>alert('Anda Tidak Memiliki Akses');window.location='detailbarangretur.php';</script>;";
  }
  if($_SESSION['level']=="pcs"){
    echo "<script>alert('Anda Tidak Memiliki Akses');window.location='barangpcs.php';</script>;";
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
		<h1 align="center">DETAIL BARANG RETUR</h1>
			<table width="75%" align="center"><tr>
				<td align="left"><a href="databarangretur.php" target="_blank"><button class="btn btn-light btn-outline-dark">Print</button></a>
			<td width="50%" align="right">
			<td align="right" width="25%"><div class="mb-1">
				<form class="d-flex" action="detailbarangretur.php" method="post">
        <input class="form-control me-2" type="text" name ="cari" placeholder="cari">
        <input class="btn btn-primary" type="submit" value="Cari">
      </form></div></td></tr></td></tr></table>
	 <table id="example2" class="table table-bordered table-hover dataTable dtr-inline w-75 mx-auto" aria-describedby="example2_info">
					<thead class="table-dark" align="center">
							<th>Nama Barang</th>
							<th>Tanggal</th>
							<th>Jumlah</th>
							<th>Satuan</th>
							<th>Customer</th>
              <th>Spesifkasi</th>
              <th>Petugas</th>
							<th>Keterangan</th>
					<thead>
					<tbody>
            <?php
            if (isset($_POST['cari'])) {
              $cari = $_POST['cari'];
              $ambildata = mysqli_query($koneksi,"select detailbarangretur.id_detailbarangretur, detailbarangretur.id_barangretur, detailbarangretur.id_barang, detailbarangretur.id_user, detailbarangretur.customer, detailbarangretur.spesifikasi, barang.nama_barang, barang_retur.tanggalretur, barang_retur.jumlah, barang_retur.satuan, barang_retur.keterangan, login.nama from detailbarangretur inner join barang on barang.id_barang = detailbarangretur.id_barang inner join barang_retur on barang_retur.id_barangretur=detailbarangretur.id_barangretur inner join login on login.id_user=detailbarangretur.id_user where where barang.nama_barang like '%".$cari."%' or barang_retur.tanggalretur like '%".$cari."%' or barang_retur.jumlah like '%".$cari."%' or barang_retur.customer like '%".$cari."%'");
            } else{
              $ambildata = mysqli_query($koneksi,"select detailbarangretur.id_detailbarangretur, detailbarangretur.id_barangretur, detailbarangretur.id_barang, detailbarangretur.id_user, detailbarangretur.customer, detailbarangretur.spesifikasi, barang.nama_barang, barang_retur.tanggalretur, barang_retur.jumlah, barang_retur.satuan, barang_retur.keterangan, login.nama from detailbarangretur inner join barang on barang.id_barang = detailbarangretur.id_barang inner join barang_retur on barang_retur.id_retur=detailbarangretur.id_barangretur inner join login on login.id_user=detailbarangretur.id_user");
            }
                while($data=mysqli_fetch_array($ambildata)){
                $i = 1; 
                $id_barangretur = $data['id_barangretur'];
                $id_detailbarangretur = $data['id_detailbarangretur'];
                $id_barang = $data['id_barang'];
                $nama_barang = $data['nama_barang'];
                $tanggalretur = $data['tanggalretur'];
                $jumlah = $data['jumlah'];
                $satuan = $data['satuan'];
                $customer = $data['customer'];
                $spesifikasi= $data['spesifikasi'];
                $petugas = $data['nama'];
                $keterangan = $data['keterangan'];
            ?>
            <tr align="center">
                <td><?=$nama_barang;?></td>
                <td><?=date('d-F-Y', strtotime($tanggalretur));?></td>
                <td><?=$jumlah;?></td>
                <td><?=$satuan;?></td>
                <td><?=$customer;?></td>
                <td><?=$spesifikasi;?></td>
                <td><?=$petugas;?></td>
                <td><?=$keterangan;?></td>
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