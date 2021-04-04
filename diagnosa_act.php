<?php 
include 'koneksi.php';

// data user
$nama = $_POST['nama'];
$hp = $_POST['hp'];

$a = mysqli_query($koneksi,"select * from relasi,gejala,penyakit where relasi.kec_gejala=gejala.gej_id and relasi.kec_penyakit=penyakit.alt_id");
while($aa=mysqli_fetch_array($a)){
	$penyakit = $aa['alt_inisial'];
	$gejala = $aa['gej_inisial'];
	$nilai = $aa['kec_nilai'];
	mysqli_query($koneksi,"insert into tmp_relasi values('$penyakit','$gejala','$nilai')");
}


mysqli_query($koneksi, "insert into user values(null,'$nama','$hp',null)");

$id_terakhir = mysqli_insert_id($koneksi);

header("location:diagnosa_mulai.php?id=$id_terakhir");
?>
