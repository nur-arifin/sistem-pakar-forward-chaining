<?php include 'header.php'; ?>
<?php mysqli_query($koneksi,"delete from tmp_relasi"); ?>

<header id="header" class="ex-header" style="padding-top: 8rem;padding-bottom: 2rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Pakar</h1>
            </div>
        </div>
    </div>
</header>

<div class="container">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="card-title m-0">Data Gejala</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th width="15%">Inisial</th>
                        <th>Nama Gejala</th>                  
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1; 
                    $data = mysqli_query($koneksi,"select * from gejala");    
                    while($d=mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['gej_inisial'] ?></td>
                            <td><?php echo $d['gej_nama'] ?></td>                   
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="card mt-4">
        <div class="card-header">
            <h4 class="card-title m-0">Data Alternatif/penyakit</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">            
                <tr>
                    <th width="1%">No</th>
                    <th width="1%">Inisial</th>
                    <th width="20%">Nama Alternatif</th>   
                    <th width="30%">Penyebab</th>   
                    <th width="30%">Solusi</th>               
                </tr>
                <?php
                $no = 1; 
                $data = mysqli_query($koneksi,"select * from penyakit");   
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['alt_inisial'] ?></td>
                        <td><?php echo $d['alt_nama'] ?></td>     
                        <td><?php echo $d['alt_penyebab'] ?></td>     
                        <td><?php echo $d['alt_solusi'] ?></td>                 
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>



    <div class="card mt-4">
        <div class="card-header">
            <h4 class="card-title m-0">Data Relasi</h4>
        </div>
        <div class="card-body">
            <p>Data relasi antara penyakit(penyakit) dan gejala(kriteria).</p>
            <div class="table-responsive">
                <table class="table table-bordered" border="1" style="width: 100%;">   
                    <tr>      
                        <th width="1%">No</th>
                        <th width="40%">ALTERNATIF</th>
                        <?php
                        $kriteria = mysqli_query($koneksi,"select * from gejala");    
                        while($k=mysqli_fetch_array($kriteria)){
                            ?>
                            <th width="1%"><?php echo $k['gej_inisial'] ?></th>          
                            <?php
                        }
                        ?>      
                    </tr>
                    <?php
                    $no = 1;
                    $penyakit = mysqli_query($koneksi,"select * from penyakit");    
                    while($ker=mysqli_fetch_array($penyakit)){
                        $a=$ker['alt_id'];

                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td>(<?php echo $ker['alt_inisial'] ?>) <?php echo $ker['alt_nama'] ?></td>
                            <?php 
                            $g = mysqli_query($koneksi,"select * from gejala");   
                            while($ge=mysqli_fetch_array($g)){
                                $b = $ge['gej_id'];
                                ?>
                                <td>

                                    <?php       
                                    $relasi = mysqli_query($koneksi,"select * from relasi where relasi.kec_penyakit='$a' and relasi.kec_gejala='$b'");
                                    $ke = mysqli_fetch_array($relasi);
                                    if($ke['kec_nilai'] == "1"){
                                        echo "1";
                                    }else{
                                        echo "-";
                                    }
                                    ?>

                                </td>   
                            <?php } ?>

                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>


</div>

<?php include 'footer.php'; ?>