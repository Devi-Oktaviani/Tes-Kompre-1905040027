
<?php
session_start();
if ( !isset($_SESSION['login']) ) {
	header('location: login.php');
	
} 
?>

<!DOCTYPE html>
<html>
<head>

	
	  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Perpustakaan SMK Muhammadiyah 2 Mertoyudan</title>
      <link rel="icon" type="image/png" href="img/logo.jpg">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
</head>
<body>

	
	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">Aplikasi Pengunjung Perpustakaan</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="tampil_pengunjung_siswa.php">PENGUNJUNG SISWA</a> </li>
		      	<li><a href="tampil_pengunjung_guru.php">PENGUNJUNG GURU DAN KARYAWAN</a> </li>
			      <li><a href="logout.php">LOGOUT</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>