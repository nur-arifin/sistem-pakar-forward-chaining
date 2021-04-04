<?php 

include '../koneksi.php';
$id = $_POST['id'];
$inisial = $_POST['inisial'];
$nama = $_POST['nama'];
$penyebab = $_POST['penyebab'];
$solusi = $_POST['solusi'];

mysqli_query($koneksi, "update penyakit set alt_nama='$nama', alt_inisial='$inisial', alt_penyebab='$penyebab', alt_solusi='$solusi' where alt_id='$id'");
header("location:penyakit.php");