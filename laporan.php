

<!DOCTYPE html>
<html>
<head>

	
	  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Perpustakaan SMK Muhammadiyah 2 Mertoyudan</title>
      <link rel="icon" type="image/png" href="img/logo.jpg">
</head>
<body>
	<style>
		.tombol{
		
			margin-top: 20px;
		}
		footer{
			margin-top: 200px;
		}

	</style>
	<?php include 'header.php'; ?>
	<hr/> 
	<div class="container">
		<div class="page-header">
        <BR></BR>
			<h3 >PILIH PERIODE KUNJUNG</h3>
		</div>
	<form action="proses_laporan.php" method="GET">
	<table class="table " align="center">
		<tr width="100px">
			<td>
				DARI :<input class="form-control" type="date" name="tgl1" value="<?= date('Y-m-d')?>">
			</td>
        </tr>
        <tr width="100px">
			<td > 
				SAMPAI :<input class="form-control" type="date" name="tgl2" value="<?= date('Y-m-d')?>">
			</td>
		</tr>
			<tr >
			<td >
				<a style="margin-bottom: 10px;" href=""><button class="btn btn-success bnt-sm"> CETAK </button></a>
			
			</td>
		</tr>
</table>
</form>

</div>


<?php include 'footer.php'; ?>