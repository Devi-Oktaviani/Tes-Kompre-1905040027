
<!DOCTYPE html>
<html>
<head>

	
	  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Perpustakaan SMK Muhammadiyah 2 Mertoyudan</title>
      <link rel="icon" type="image/png" href="img/logo.jpg">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <div class="container">
	<div class="page-header">
<h3 align="center">Absensi Pengunjung Perpustakaan</h3>
	</div>
	<a href="tampil_pengunjung_guru.php" class="btn btn-danger btn-sm" >kembali</a>
	
	<hr>
<form action="" method="post">
	<table class="table" >

		<tr>
			<td>Nama Pengunjung</td>
			<td></td>
			<td>
				<input class="form-control" type="text" name="name" placeholder="Masukan Nama Pengunjung" size="30">
			</td>
		</tr>

		<tr>
			<td>Status </td>
			<td></td>
			<td>
			<select  class="form-control" name ="status"> 
					<option value="" selected>- Status -</option>
					<option> Guru</option>
					<option> Karyawan</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>Tujuan</td>
			<td></td>
			<td>
				<select  class="form-control" name="tujuan"> 
					<option value="" selected>- Tujuan Kunjungan -</option>
					<option>Kunjungan Biasa Membaca</option>
					<option>Refreshing</option>
					<option>Tugas Sekolah</option>
					<option>Pencarian Literatur</option>
					<option>Pengembalian Buku</option>
					<option>Peminjaman Buku</option>
					<option>Lain- Lain</option>
				</select>
			</td>
		</tr>
		<!-- <tr>
			<td></td>
			<td></td>
			<td>
				<button class="btn btn-success btn-lg" type="submit" name="save">Simpan</button>
				</td>
		</tr> -->
	</table>
	<hr heigth="100px">
	<center><button class="btn btn-success btn-lg" type="submit" name="simpan">Simpan</button></center>
</form>

<?php
 
 if (isset($_POST['simpan'])){
 	include 'koneksi.php';
 	$nama    = htmlspecialchars(ucfirst($_POST['name']));
 	$status = htmlspecialchars(ucfirst($_POST['status']));
 	$tujuan  = htmlspecialchars(ucfirst($_POST['tujuan']));

 	if ($nama == '' || $status == '' || $tujuan == '' ){
 		echo "
 		<script>
 		alert('data belum lengkap');
 		document.location.href = 'tambah_guru.php';
 		</script>
 		";
 	}else {
 		// $today = '20' . sprintf(date('y-m-d'));
 		// $tglkunjung = $today;
		 $tglkunjung = date('Y-m-d');
		//  echo $tglkunjung;

 		$simpan = mysqli_query($konek , "INSERT INTO pengunjung2 (nama, status, tujuan, tglkunjung) VALUES ('$nama', '$status', '$tujuan', '$tglkunjung')
 			");

 		if ($simpan){
 			echo "
 		<script>
 		alert('data berhasil disimpan');
 		alert('SELEMAT DATANG DI PERPUSATAKAAN CEMERLANG');
 		document.location.href = 'tambah_guru.php';
 		</script>
 		";
 		}else {
 			echo "
 		<script>
 		alert('data gagal disimpan');
 		document.location.href = 'tambah_guru.php';
 		</script>
 		";
 		}
 	}
 }
 


 ?>
