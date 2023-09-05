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
  <script>window.print()</script>
      <div class="container-fluid">

		<h1 align="center">BARANG RETUR</h1>
			<br>
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
</body>
</html>
