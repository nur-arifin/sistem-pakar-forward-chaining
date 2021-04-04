<?php 

include '../koneksi.php';
$nama = $_POST['nama'];
$inisial = $_POST['inisial'];
$penyebab = $_POST['penyebab'];
$solusi = $_POST['solusi'];

mysqli_query($koneksi, "insert into penyakit values(null,'$inisial','$nama','$penyebab','$solusi')");
header("location:penyakit.php");