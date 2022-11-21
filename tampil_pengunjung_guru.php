<?php 
include 'koneksi.php';
$data = mysqli_query($konek ,"SELECT * FROM pengunjung2");

include 'header.php';
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Perpustakaan SMK Muhammadiyah 2 Mertoyudan</title>
      <link rel="icon" type="image/png" href="img/logo.jpg">
	<style >
		/*table{
			width: 200px;
		}*/
	</style>
</head>
<body>
	<div class="container">
	<div class="page-header">
      <h3>Absensi Pengunjung Guru dan Karyawan Perpustakaan</h3> 
	</div>
<a class="btn btn-primary btn-sm" href="tambah_guru.php">+ TAMBAH</a>
<a class="btn btn-light btn-sm" href="laporan_guru.php">PRINT</a>
<br><br>
<table style="margin-top: 10px;" class="table table-bordered table-striped">
 		<tr>
		<th style="text-align: center;">No</th>
		<th>Nama </th>
		<th>Status</th>
		<th>Tujuan Kunjungan </th>
		<th>Tanggal Kunjung</th>
		
	</tr>
	<?php 
	if (isset($_POST['hapus'])) {
		include 'koneksi.php';
		$hapus = mysqli_query($konek, "DELETE FROM pengunjung2 WHERE id = '$_POST[hapus]'");
		if ($hapus) {
		echo "<div class='alert alert-info'>Berhasil Menghapus Data</div>";
		}
		else{
		echo "<div class='alert alert-warning'>Gagal Menghapus Data</div>";
		}
		header("location:tampil_pengunjung_guru.php");
	}
	
	$batas = 10;
	$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
	$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

	$i=1;
	$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
	$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

	$previous = $halaman - 1;
	$next = $halaman + 1;

	$jumlah_data = mysqli_num_rows($data);
	$total_halaman = ceil($jumlah_data / $batas);
	

	$querytamu = mysqli_query($konek, "SELECT*FROM pengunjung2 ORDER BY id DESC");
	if (mysqli_num_rows($querytamu) < 1) {
		echo "<div class='alert alert-warning'>Tidak Ada Data</div>";
	}
	while($dta = mysqli_fetch_assoc($data) ) :
		
	 ?>
	<tr>
		<td width="50px" style="text-align: center;"><?= $i; ?></td>
		<td width="300px"><?= $dta['nama'] ?></td>
		<td width="100px"><?= $dta['status'] ?></td>
		<td width="300px"><?= $dta['tujuan'] ?></td>
		<td width="200px"><?= $dta['tglkunjung'] ?></td>
		<td><form method="post">
		<button class="btn btn-link" type="submit" onclick="return confirm ('Hapus Data ?')" name="hapus" value="<?php echo $dta['id'];?>">Hapus
	<?php $i++; ?>
<?php endwhile; ?>
</table>
<nav>
	<ul class="pagination justify-content-center">
		<li class="page-item">
			<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>>Previous</a>
		</li>
		<?php 
		for($x=1;$x<=$total_halaman;$x++){
		?> 
			<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
		<?php
		}
		?>				
			<li class="page-item">
				<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
			</li>
		</ul>
	</nav>
</div>
</body>
</html>
<?php include 'footer.php'; ?>