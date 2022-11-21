<?php 
include 'koneksi.php';

$search = "SELECT * FROM pengunjung ";
if (isset($_POST['cari'])) {
	$cari = $_POST['cari'];
	$search = "SELECT * FROM pengunjung where jurusan LIKE '$cari' OR nama LIKE '$cari' OR kelas LIKE '$cari' ";
	echo $cari;
}
$data = mysqli_query($konek, $search);


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
	<!-- <a href="menu_pengunjung.php" class="btn btn-danger btn-sm" >KEMBALI</a>
	<br> -->
	<div> <center>
        <img src="img/group.png" width="7%" align="center">
		<b><i><u>  Absensi Siswa Perpustakaan Cemerlang</u></i></b>
		<hr>
	</div>

<a class="btn btn-primary btn-sm" href="tambah_siswa.php">+ TAMBAH</a>
<a class="btn btn-light btn-sm" href="laporan.php">PRINT</a>
<hr>
<center>
  <form action="tampil_pengunjung_siswa.php" method="post">
	<table>
		<tr>
			<td><input type="text" name="cari" placeholder="Search " /></td><hr>
			<td><input type="submit" value="Search" /></td>
		</tr>
	</table>
</form>

<?php
$query = $konek->query($search);
?> 
</center>

<br>
<br>
<table style="margin-top: 10px;" class="table table-bordered table-striped">
 		<tr>
		<th style="text-align: center;">No</th>
		<th>Nama </th>
		<th>Tgl Lahir </th>
		<th>Kelas </th>
        <th>Jurusan</th>
        <th>Tujuan</th>
		<th>Email</th>
		<th>Tanggal Kunjung</th>
		<th></th>
		
	</tr>
	<?php 
	if (isset($_POST['hapus'])) {
		include 'koneksi.php';
		$hapus = mysqli_query($konek, "DELETE FROM pengunjung WHERE id = '$_POST[hapus]'");
		if ($hapus) {
		echo "<div class='alert alert-info'>Berhasil Menghapus Data</div>";
		}
		else{
		echo "<div class='alert alert-warning'>Gagal Menghapus Data</div>";
		}
		header("location:tampil_pengunjung_siswa.php");
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
	

	$querytamu = mysqli_query($konek, $search );
	if (mysqli_num_rows($querytamu) < 1) {
		echo "<div class='alert alert-warning'>Tidak Ada Data</div>";
	}
	while($dta = mysqli_fetch_assoc($data) ) :
	 ?>
	<tr>
		<td width="50px" style="text-align: center;"><?= $i; ?></td>
		<td width="150px"><?= $dta['nama'] ?></td>
		<td width="150px"><?= $dta['tgllahir'] ?></td>
		<td width="100px"><?= $dta['kelas'] ?></td>
        <td width="100px"><?= $dta['jurusan'] ?></td>
        <td width="200px"><?= $dta['tujuan'] ?></td>
		<td width="250px"><?= $dta['email'] ?></td>
		<td width="200px"><?= $dta['tglkunjung'] ?></td>
		<td><form method="post">
		<button class="btn btn-link" type="submit" onclick="return confirm ('Hapus Data ?')" name="hapus" value="<?php echo $dta['id'];?>">Hapus 
		<!-- <button class="btn btn-link" type="submit" onclick="return confirm ('Edit Data ?')" name="edit" value="<?php echo $dta['id'];?>">Edit
	</tr> -->
	</tr>
	</form>
		</td>
	</tr>
	
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