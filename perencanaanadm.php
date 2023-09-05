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
   if($_SESSION['level']==""){
   echo "<script>alert('Anda Tidak Memiliki Akses');window.location='index.php';</script>;";
  }
  if($_SESSION['level']=="mgr"){
   echo "<script>alert('Anda Tidak Memiliki Akses');window.location='perencanaanmgr.php';</script>;";
  }
  if($_SESSION['level']=="stf"){
    echo "<script>alert('Anda Tidak Memiliki Akses');window.location='barangstf.php';</script>;";
  }
  if($_SESSION['level']=="pcs"){
    echo "<script>alert('Anda Tidak Memiliki Akses');window.location='perencanaanpcs.php';</script>;";
  }
	if(isset($_POST['perencanaan'])){
        $id_barang = $_POST['id_barang'];
       	$rop = $_POST['rop'];

    $perencanaan = mysqli_query($koneksi,"insert into perencanaan (id_perencanaan, id_barang, rop) values('','$id_barang','$rop')");
    if (!$perencanaan) {
      echo "<script>alert('Pastikan semua kolom terisi dengan benar! ');window.location='perencanaanadm.php';</script>;";
    }else{
      echo "<script>alert('Data Berhasil Ditambahkan');window.location='perencanaanadm.php';</script>;";
    }
  }
  if(isset($_POST['updateperencanaan'])){
        $id_barang = $_POST['id_barang'];
       	$rop = $_POST['rop'];

    $updateperencaan = mysqli_query($koneksi,"update perencanaan set rop='$rop' where id_barang='$id_barang'");
    if (!$updateperencaan) {
      echo "<script>alert('Pastikan semua kolom terisi dengan benar! ');window.location='perencanaanadm.php';</script>;";
    }else{
      echo "<script>alert('Data Berhasil Diubah');window.location='perencanaanadm.php';</script>;";
    }
  }
  if (isset($_POST['delper'])) {
    $id_perencanaan= $_POST['id_perencanaan'];

    $delper = mysqli_query($koneksi,"delete from perencanaan where id_perencanaan='$id_perencanaan'");
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
    <!-- Sidebar -->
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
		<h1 align="center">Usulan Perencanaan Pengaadaan Barang</h1>
			<table width="75%" align="center"><tr>
			<td align="left"><a href="perencanaan.php" target="_blank"><button class="btn btn-light btn-outline-dark">Print</button></a>
				<td width="50%" align="right">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#perencanaan">
 <img src="tambah.png" width="20px" height="20px">Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="perencanaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="perencanaan">Tambah Data Perencanaan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST">
          <div class="form-group" align="left">
            <label for="id_barang">Nama Barang</label>
            <select name="id_barang" class="form-control" required>
            	  <option>Pilih Barang</option>  
              <?php
                  $ambilid = mysqli_query($koneksi,"select persediaan_barang.id_barang, barang.nama_barang from persediaan_barang join barang on barang.id_barang = persediaan_barang.id_barang");
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
            <label for="number">ROP</label>
            <input type="number"class="form-control" name="rop" placeholder="Reorder Point" min="0"required>    
          </div>
          <div class="modal-footer">            
            <button type="submit" class="btn btn-primary" name="perencanaan">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
		</td>
			<td align="right" width="25%"><div class="mb-1">
				  <form class="d-flex" action="perencanaanadm.php" method="post">
        <input class="form-control me-2" type="text" name ="cari" placeholder="cari">
        <input class="btn btn-primary" type="submit" value="Cari">
      </form></div></td></tr></td></tr></table>
	 <table id="example2" class="table table-bordered table-hover dataTable dtr-inline w-75 mx-auto" aria-describedby="example2_info">
          <thead class="table-dark" align="center">
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Stok</th>
							<th>Safety Stock</th>
              <th>Jumlah yang diusulkan</th>
					<thead>
					<tbody>
						<?php
              if (isset($_POST['cari'])) {
              $cari = $_POST['cari'];
            $ambildata = mysqli_query($koneksi,"select perencanaan.id_perencanaan, perencanaan.id_barang, barang.nama_barang, persediaan_barang.stok,persediaan_barang.safety_stock from perencanaan inner join barang on barang.id_barang=perencanaan.id_barang inner join persediaan_barang on persediaan_barang.id_barang=perencanaan.id_barang where perencanaan.id_barang like '%".$cari."%' or barang.nama_barang like '%".$cari."%' or persediaan_barang.stok like '%".$cari."%' and persediaan_barang.safety_stock > persediaan_barang.stok");
            } else{
            $ambildata = mysqli_query($koneksi,"select perencanaan.id_perencanaan, perencanaan.id_barang, barang.nama_barang, persediaan_barang.stok,persediaan_barang.safety_stock from perencanaan inner join barang on barang.id_barang=perencanaan.id_barang inner join persediaan_barang on persediaan_barang.id_barang=perencanaan.id_barang where persediaan_barang.safety_stock > persediaan_barang.stok");
            }
								while($data=mysqli_fetch_array($ambildata)){
								$i = 1; 
								$id_perencanaan = $data['id_perencanaan'];
								$id_barang = $data['id_barang'];
								$nama_barang = $data['nama_barang'];
								$stok = $data['stok'];
								$safety_stock = $data['safety_stock'];
                $jumlah = $data['jumlah']
                
						?>
						<tr align="center">
								<td><?=$id_barang;?></td>
								<td><?=$nama_barang;?></td>
								<td><?=$stok;?></td>
								<td><?=$safety_stock;?></td>
                <td><?=$safety_stock - $stok;?></td>
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
