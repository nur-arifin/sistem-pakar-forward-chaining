<?php 
include 'koneksi.php';
session_start();

$id_user = $_REQUEST['id_user'];
$inisial = $_POST['inisial'];
$jawaban = $_POST['jawaban'];

$cek = mysqli_query($koneksi,"select * from konsultasi where user='$id_user' and gejala='$inisial' and nilai='$jawaban'");
if(mysqli_num_rows($cek) == "0"){	
	mysqli_query($koneksi,"insert into konsultasi values(null,'$id_user','$inisial','$jawaban')");
}

if($jawaban == "1"){

	$al="";
	$a = mysqli_query($koneksi,"select * from tmp_relasi where gejala='$inisial' and nilai='1'");
	while($aa = mysqli_fetch_array($a)){
		$penyakit = $aa['penyakit'];
		$al .= ",'".$penyakit."'";
	}
	$xxx=substr($al,1);
	// echo $xxx;
	mysqli_query($koneksi,"delete from tmp_relasi where penyakit not in ($xxx)");

	mysqli_query($koneksi,"delete from tmp_relasi where nilai !='1'");

	// jawaban user
	$b="";
	$bb = mysqli_query($koneksi,"select * from konsultasi where user='$id_user' and nilai='1'");
	while($bbb = mysqli_fetch_array($bb)){
		$bbbb = $bbb['gejala'];
		$b .= ",'".$bbbb."'";
	}
	$bbbbb=substr($b,1);

	
	// cek gejala yang tersisa
	// jika tersisa 1, maka dia adalah penyakit yang di temukan
	$d = mysqli_query($koneksi,"select * from tmp_relasi where gejala not in ($bbbbb)");
	$dd = mysqli_fetch_array($d);
	$gejala_selanjutnya = $dd['gejala'];
	

	$penyakit = $dd['penyakit'];
	
	$ddd = mysqli_num_rows($d);
	if($ddd == '0'){
		$f = mysqli_query($koneksi,"select * from tmp_relasi");
		$ff = mysqli_fetch_array($f);
		$fff = $ff['penyakit'];
		// echo $fff;

		$g = mysqli_query($koneksi,"select * from penyakit where alt_inisial='$fff'");
		$gg = mysqli_fetch_array($g);
		$ggg = $gg['alt_id'];

		// echo $penyakit;
		mysqli_query($koneksi,"update user set user_hasil='$ggg' where user_id='$id_user'");
		header("location:diagnosa_hasil.php?id=$id_user");
	}else{
		header("location:diagnosa_mulai.php?id=$id_user&gejala=$gejala_selanjutnya");
	}


}else if($jawaban == "0"){
	
	// untuk mendapatkan data penyakit yang tidak terkait
	$data = mysqli_query($koneksi,"select * from tmp_relasi where gejala='$inisial' and nilai='1'");
	// while($d=mysqli_fetch_array($data)){
	// $d = mysqli_fetch_assoc($data);
	while($d = mysqli_fetch_array($data)){
		// hapus penyakit yang tidak sesuai (penyakit yang bukan pilihan dari si user)
		$penyakit = $d['penyakit'];
		mysqli_query($koneksi,"delete from tmp_relasi where penyakit='$penyakit'");
	}

	// cek jumlah tmp_relasi yang tersisa / jika masih tersisa, berarti kita akan mendapatkan pertanyaan gejala selanjutnya. jika tidak maka tampilkan hasil tidak di temukan.
	$b = mysqli_query($koneksi,"select * from tmp_relasi");
	$bb = mysqli_num_rows($b);
	if($bb > 0){

		$c="";
		$cc = mysqli_query($koneksi,"select * from konsultasi where user='$id_user'");
		while($ccc = mysqli_fetch_array($cc)){			
			$c .= ",'".$ccc['gejala']."'";						
		}

		$ccccc=substr($c,1);
		
		// cek gejala yang tersisa
		// jika tersisa 1, maka dia adalah penyakit yang di temukan
		
		$d = mysqli_query($koneksi,"select * from tmp_relasi where gejala not in ($ccccc) and nilai='1'");
		$dd = mysqli_fetch_array($d);
		$gejala_selanjutnya = $dd['gejala'];

		header("location:diagnosa_mulai.php?id=$id_user&gejala=$gejala_selanjutnya");
	}else{

		mysqli_query($koneksi,"update user set user_hasil='0' where user_id='$id_user'");
		// echo "hasil tidak di temukan atau anak anda baik-baik saja";
		header("location:diagnosa_hasil.php?id=$id_user");

	}
	
}


?>
