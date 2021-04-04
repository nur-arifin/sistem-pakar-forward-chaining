<?php include 'header.php'; ?>
<?php mysqli_query($koneksi,"delete from tmp_relasi"); ?>

<div class="hero-body">
                <div class="container">
                <div class="card">
  <header class="card-header">
    <p class="card-header-title">
    Riwayat Diagnosa
    </p>
    <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </a>
  </header>
  <div class="card-content">
    <div class="content">
    <div class="container">

        <div class="table-responsive">             
            <table class="table" id="tableku">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama</th>
                        <th>No.HP</th>
                        <th>penyakit</th>
                        <th width="1%">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    $data = mysqli_query($koneksi,"select * from user,penyakit where user.user_hasil=penyakit.alt_id order by user.user_id desc");
                    while($d=mysqli_fetch_array($data)){
                        ?>            
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['user_nama']; ?></td>
                            <td><?php echo $d['user_hp']; ?></td>
                            <td><?php echo $d['alt_inisial']; ?> - <?php echo $d['alt_nama']; ?></td>
                            <td><a class="btn btn-primary" href="diagnosa_hasil.php?id=<?php echo $d['user_id']; ?>"> Detail</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>
    </div>
  </div>
 
</div>

                </div>
            </div>


<?php include 'footer.php'; ?>