
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
	<a href="tampil_pengunjung_siswa.php" class="btn btn-danger btn-sm" >kembali</a>
	
	<hr>
<form action="" method="post">
	<table class="table" >

		<tr>
			<td>Nama Pengunjung</td>
			<td></td>
			<td>
				<input class="form-control" type="text" name="nama" placeholder="Masukan Nama Pengunjung" size="30">
			</td>
		</tr>

		<tr>
			<td>Kelas </td>
			<td></td>
			<td>
			<select  class="form-control" name ="kelas"> 
					<option value="" selected>- Kelas -</option>
					<option> 10</option>
					<option> 11</option>
					<option> 12 </option>
				</select>
			</td>
		</tr>

		<tr>
			<td>Tanggal Lahir</td>
			<td></td>
			<td>
				<input class="form-control" type="date" name="tgllahir" placeholder="Masukan Tanggal Lahir" size="30">
			</td>
		</tr>
		
		<tr>
		<td>Jurusan </td>
			<td></td>
			<td>
			<select  class="form-control" name ="jurusan"> 
					<option value="" selected> - Jurusan -</option>
					<option> API</option>
					<option> TPKI</option>
					<option> ATPH </option>
					<option> TPHP </option>
					
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

		<tr>
			<td>Email</td>
			<td></td>
			<td>
				<input class="form-control" type="email" name="email" placeholder="Masukan Email" size="30">
			</td>
		</tr>
	</table>
	<hr heigth="100px">
	<center><button class="btn btn-success btn-lg" type="submit" name="simpan">Simpan</button></center>
</form>

<?php
 
 if (isset($_POST['simpan'])){
 	include 'koneksi.php';
 	$nama    = htmlspecialchars(ucfirst($_POST['nama']));
 	$jurusan = htmlspecialchars(strtoupper($_POST['jurusan']));
 	$kelas   = htmlspecialchars(strtoupper($_POST['kelas']));
	$email 	 = (($_POST['email']));
 	$tujuan  = htmlspecialchars(ucfirst($_POST['tujuan']));

 	if ($nama == '' || $jurusan == '' || $kelas == '' ||  $tujuan == '' ){
 		echo "
 		<script>
 		alert('data belum lengkap');
 		document.location.href = 'tambah_siswa.php';
 		</script>
 		";
 	}else {
 		$today = '20' . sprintf(date('y-m-d'));
 		$tglkunjung = $today;
		$tgllahir = date('Y-m-d');
		

 		$simpan = mysqli_query(
			$konek , "INSERT INTO pengunjung VALUES (null, '$nama', '$kelas', '$jurusan','$tujuan', '$tglkunjung', '$tgllahir','$email')
 			");
 		if ($simpan){
 			echo "
 		<script>
 		alert('data berhasil disimpan');
 		alert('SELEMAT DATANG DI PERPUSATAKAAN CEMERLANG');
 		document.location.href = 'tambah_siswa.php';
 		</script>
 		";
 		}else {
 			echo "
 		<script>
 		alert('data gagal disimpan');
 		document.location.href = 'tambah_siswa.php';
 		</script>
 		";
 		}
 	}
 }
 


 ?>
