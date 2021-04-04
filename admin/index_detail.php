<?php include 'header.php'; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h4">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="index.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
  </div>

  <div class="row">

    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <h6 class="title class m-0">Detail Riwayat Diagnosa</h6>
        </div>
        <div class="card-body">

          <div class="table-responsive">              
            <?php 
            if(isset($_GET['id']) && $_GET['id'] != ""){
              ?>
              <?php 
              $id_user = $_GET['id'];
              $data = mysqli_query($koneksi, "select * from user where user.user_id='$id_user'");
              $cek = mysqli_num_rows($data);
              if($cek>0){
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <table class="table table-bordered">
                    <tr>
                      <th width="20%">NAMA</th>
                      <td><?php echo $d['user_nama']; ?></td>
                    </tr>
                    <tr>
                      <th width="20%">NO.HP</th>
                      <td><?php echo $d['user_hp']; ?></td>
                    </tr> 
                    <tr>
                      <th width="20%">INPUTAN USER</th>
                      <td>
                        <ul>
                          <?php               
                          $konsultasi = mysqli_query($koneksi, "select * from konsultasi,gejala where konsultasi.gejala=gejala.gej_inisial and konsultasi.user='$id_user'");
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
                      $penyakit = mysqli_query($koneksi, "select * from penyakit where penyakit.alt_id='$hasil'");
                      while($k=mysqli_fetch_array($penyakit)){
                        ?>
                        <tr>
                          <th width="20%">HASIL penyakit <br/> <small>Forward Chaining</small></th>
                          <td><?php echo $k['alt_inisial']; ?> - <?php echo $k['alt_nama']; ?></td>
                        </tr>                               
                        <tr>
                          <th width="20%">PENYEBAB</th>
                          <td><?php echo $k['alt_penyebab']; ?></td>
                        </tr>    
                        <tr>
                          <th width="20%">SOLUSI</th>
                          <td><?php echo $k['alt_solusi']; ?> </td>
                        </tr>                                 
                        <?php 
                      }
                    }else{
                      ?>
                      <tr>
                        <th width="20%">HASIL <br/> <small>Forward Chaining</small></th>
                        <td><b><i>Data penyakit tidak ditemukan. mungkin mobil anda baik-baik saja.</i></b></td>
                      </tr>                               
                      <tr>
                        <th width="20%">PENYEBAB</th>
                        <td>-</td>
                      </tr>    
                      <tr>
                        <th width="20%">SOLUSI</th>
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
          </div>

        </div>
      </div>

    </div>  

  </div>

</main>

<?php include 'footer.php'; ?>