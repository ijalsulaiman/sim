<!doctype html>
<html>
	<head>
		<title>Gudang CV.Abadi Mitra Utama</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
	</head>
		<body style="background:linear-gradient(to right, #009dff, #00ffdd);">
			<div class="mt-5" align="center" style="color: white; font-size: 45px;">CV. ABADI MITRA UTAMA</div>
			<div class="shadow-lg w-50 p-3 mx-auto mt-5 mb-5 bg-white rounded">
			<table align="center" class="  mt-5">
			<tr>
			<td>
				<?php
			if(isset($_GET['pesan'])){
				if($_GET['pesan']=="gagal"){
					echo "<div class='alert alert-danger p-3 mx-auto mb-1'>Username atau Passowrd Salah!!</div>";
				}
			}
			?>
			<table>
				<tr>
					<td><img src="logo.jpg" width="80%" class="mb-5"></td>
					<td>
			<form action="cek_login.php" method="post">
				<div class="mb-3">
				<h3 align="center">LOGIN</h3>
				</div>
			<div class="mb-2 mt-2">
				<label>Username</label>
				<input type="text" class="form-control" name='username' required>
			</div>
			<div class="mb-3 mt-3">
				<label>Password</label>
				<input type="password" class="form-control" name='password' required>
			</div>
			<div align=center class="my-5">
			<button type="submit" class="btn btn-primary" value="login">Login</button>
			</div>
			<div align=center class="my-5">
			<a href="lupa.php">Lupa Password</a>
			</div>
			</form>
			</td>
			</tr>
	</table>
</div>
		</body>
</html>