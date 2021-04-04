<?php include 'header.php'; ?>
<?php mysqli_query($koneksi,"delete from tmp_relasi"); ?>
<div class="container">
<div class="card">
  <header class="card-header">
    <p class="card-header-title">
    Diagnosa
    </p>
  </header>
  <div class="card-content">
    <div class="content">
        <h3>isi data berikut :</h3>
        <form action="diagnosa_act.php" method="post" data-toggle="validator" data-focus="false">
        <div class="field">
                <label class="label">Nama lengkap</label>
                <div class="control">
                    <input name="nama" class="input" type="text" placeholder="" required>
                </div>
                </div>
                <div class="field">
  <label class="label">No HP</label>
  <div class="control">
    <input type="number" name="hp" class="input" placeholder="" required>
  </div>
</div>
<div class="form-group">
                                            <button type="submit" class="button is-info">SIMPAN</button>
                                        </div>

                                    </form> 
    </div>
  </div>
</div>
</div>

<?php include 'footer.php'; ?>