
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
<h3 align="center">Edit Absensi siswa Perpustakaan</h3>
	</div>
	<a href="tampil_pengunjung_guru.php" class="btn btn-danger btn-sm" >kembali</a>
	
	<hr>
<form action="" method="post">
	<table class="table" >

    <div class="container">
<a href="./?a=buku#buku">Kembali Ke Daftar Buku</a>
<h3>Edit Siswa: <b><?php echo $data['nama']?></b></h3><hr>
	<center>
	<?php
	if (isset($_POST['edit'])) {
		$edit = mysqli_query($konek, "UPDATE pengunjung SET nama='$_POST[nama]', kelas='$kelas', jurusan='$_POST[jurusan]', tglkunjung='$_POST[tglkunjung]', tgllahir='$_POST[tgllahir]' WHERE id='$_GET[id]'");
		// if ($edit > 0) {
		// 	mysqli_query($db, "UPDATE tgr_peminjaman SET no_buku='$_POST[no]' WHERE no_buku='$_GET[no]'");
		// }
		if ($ubah) {
			echo "<div class='alert alert-info'>Buku Ini Berhasil Diubah!</div>";
		}
		else{
			echo "<div class='alert alert-warning'>Gagal Mengubah Buku.</div>";
		}
	}
	?>
	<form method="post">
		<table width="100%">
			<tr>
				<th>Nama Pengunjung</th>
				<td>:</td>
				<td><input required type="text" name="nama" value="<?php echo $data['nama'];?>"></td>
			</tr>
			<tr>
				<th>Kelas</th>
				<td>:</td>
				<td><input required type="text" name="kelas" value="<?php echo $data['kelas'];?>"></td>
			</tr>
			<tr>
				<th>Tanggal Lahir</th>
				<td>:</td>
				<td><input required type="date" name="tgllahir" value="<?php echo $data['pengarang'];?>"></td>
			</tr>
			<tr>
				<th>Jurusan</th>
				<td>:</td>
				<td><input required type="text" name="penerbit" value="<?php echo $data['jurusan'];?>"></td>
			</tr>
			<tr>
				<th>Tujuan Kunjungan</th>
				<td>:</td>
				<td><input required type="number" name="tujuan" value="<?php echo $data['tujuan'];?>"></td>
			</tr>
			
			<tr>
				<td></td>
				<td></td>
				<td><button type="submit" name="ubah" class="btn btn-primary" style="width:25%">Ubah</button> <button class="btn btn-warning" type="reset" style="width:25%">Reset</button></td>
			</tr>
		</table>
	</form>
	</center>
</div>