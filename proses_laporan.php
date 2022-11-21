<?php 
include 'koneksi.php';
$data = mysqli_query($konek ,"SELECT * FROM pengunjung WHERE tglkunjung BETWEEN '$_GET[tgl1]'
		AND '$_GET[tgl2]' ORDER BY tglkunjung ASC");
 ?>
 <style >
 @media print{
 		.print{
 			color: blue
 			background-color: blue;
 		
 		}
 		.id{
 			display: none;
 		}

 	}
 	.print{
 		border-collapse: collapse;
 	}
 </style>
 <center>
 <h3>REKAP ABSENSI PENGUNJUNG SISWA PERPUSTAKAAN CEMERLANG</h3>
 <h4>SMK Muhammadiyah 2 Mertoyudan</h4>
 <P> Mayjend Bambang Soegeng Km. 5, Sumberrejo, Kec Mertoyudan, Kab Magelang</P>
 <hr/>
</center>
 <div class="container">
		<div class="page-header">
		<button type="button" class="id" target="_BLANK" onclick="window.print();">CETAK</button>
		
		</div>

        <table class="print" style="margin-top: 50px;" border="1" width="100%">

            <tr>
                <th>NO</th>
                <th>NAMA PENGUNJUNG</th>
                <th>KELAS</th>
                <th>JURUSAN</th>
                <th>TUJUAN</th>
            </tr>
 	<?php 
 	$i=1;
 	while($dta = mysqli_fetch_assoc($data)) :
 	 ?>
 	<tr>
 		<td align="center"><?= $i ?></td>
 		<td align="center"><?= $dta['nama'] ?></td>
 		<td align="center"><?= $dta['kelas'] ?></td>
 		<td align="center"><?= $dta['jurusan']?></td>
 		<td align="center"><?= $dta['tujuan']?></td>
 	</tr>
 	
 	<?php $i++; ?>
 <?php endwhile; ?>
 </table>
 <table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Magelang , <?= date('d/m/y') ?> <br/>
				Administrator,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>


     </center>