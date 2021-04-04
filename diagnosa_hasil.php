<?php include 'header.php'; ?>
<?php mysqli_query($koneksi,"delete from tmp_relasi"); ?>

<header id="header" class="ex-header" style="padding-top: 8rem;padding-bottom: 2rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Hasil Diagnosa</h1>
                <p class="text-white">Hasil diagnosa penyakit balita dengan metode forward chaining.</p>
                <div class="form">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-container">

                                    <?php 
                                    if(isset($_GET['id']) && $_GET['id'] != ""){
                                        ?>
                                        <?php 
                                        $id_user = $_GET['id'];
                                        $data = mysqli_query($koneksi,"select * from user where user.user_id='$id_user'");
                                        $cek = mysqli_num_rows($data);
                                        if($cek>0){
                                            while($d = mysqli_fetch_array($data)){
                                                ?>
                                                <table class="table table-bordered text-left">
                                                    <tr>
                                                        <th width="30%">NAMA PENGGUNA</th>
                                                        <td class="text-uppercase"><?php echo $d['user_nama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="30%">NO. HP</th>
                                                        <td><?php echo $d['user_hp']; ?></td>
                                                    </tr> 
                                                    <tr>
                                                        <th width="30%">JAWABAN PENGGUNA</th>
                                                        <td>
                                                            <ul>
                                                                <?php               
                                                                $konsultasi = mysqli_query($koneksi,"select * from konsultasi,gejala where konsultasi.gejala=gejala.gej_inisial and konsultasi.user='$id_user'");
                                                                while($i=mysqli_fetch_array($konsultasi)){
                                                                    ?>
                                                                    <li>
                                                                        <?php echo $i['gej_inisial']." - ".$i['gej_nama']; ?>

                                                                        <?php 
                                                                        if($i['nilai'] == "0"){
                                                                            echo "( Salah - tidak )";
                                                                        }else{
                                                                            echo "( Benar - ya )";
                                                                        }
                                                                        ?>
                                                                    </li>

                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </td>
                                                    </tr>        
                                                    <?php 
                                                    $hasil = $d['user_hasil'];
                                                    if($hasil != "0"){
                                                        $penyakit = mysqli_query($koneksi,"select * from penyakit where penyakit.alt_id='$hasil'");
                                                        while($k=mysqli_fetch_array($penyakit)){
                                                            ?>
                                                            <tr>
                                                                <th width="30%">HASIL <br/> <small>Forward Chaining</small></th>
                                                                <td><b><?php echo $k['alt_inisial']; ?> - <?php echo $k['alt_nama']; ?></b></td>
                                                            </tr>                    
                                                            <tr>
                                                                <th width="30%">PENYEBAB penyakit</th>
                                                                <td><?php echo $k['alt_penyebab']; ?></td>
                                                            </tr>    
                                                            <tr>
                                                                <th width="30%">SOLUSI PERBAIKAN</th>
                                                                <td><?php echo $k['alt_solusi']; ?> </td>
                                                            </tr>  

                                                            <?php 
                                                        }
                                                    }else{
                                                        ?>
                                                        <tr>
                                                            <th width="30%">HASIL <br/> <small>Forward Chaining</small></th>
                                                            <td><b><i>penyakit tidak ditemukan. mungkin anak anda baik-baik saja.</i></b></td>
                                                        </tr>                     
                                                        <tr>
                                                            <th width="30%">PENYEBAB penyakit</th>
                                                            <td>-</td>
                                                        </tr>    
                                                        <tr>
                                                            <th width="30%">SOLUSI PERBAIKAN</th>
                                                            <td>-</td>
                                                        </tr> 
                                                        <?php 
                                                    }
                                                    ?>
                                                </table>
                                                <?php             
                                            }
                                        }else{
                                            header("location:diagnosa.php");
                                        }
                                    }
                                    ?>

                                    <br>

                                    <center>
                                        <a class="btn btn-primary mt-5 w-50" href="diagnosa.php">DIAGNOSA LAGI</a>
                                    </center>

                                </div> 
                            </div> 
                        </div> 

                    </div> 
                </div> 

            </div>
        </div>
    </div>
</header>

<?php include 'footer.php'; ?>