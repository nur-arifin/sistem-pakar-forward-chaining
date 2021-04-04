<?php 

include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from relasi where kec_penyakit='$id'");


mysqli_query($koneksi, "delete from penyakit where alt_id='$id'");


header("location:penyakit.php");