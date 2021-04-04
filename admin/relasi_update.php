<?php 
include '../koneksi.php';
$penyakit = $_POST['penyakit'];
$gejala = $_POST['gejala'];
$nilai = $_POST['nilai'];

mysqli_query($koneksi, "delete from relasi where kec_penyakit='$penyakit'");
for($a=0;$a<count($gejala);$a++){	
	mysqli_query($koneksi, "insert into relasi values(null,'$penyakit','$gejala[$a]','$nilai[$a]')");
}
header("location:relasi.php");
?>