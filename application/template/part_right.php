<div class="well well-small dark">
    <a id="right-btn" style="width: 100%" data-placement="bottom" data-original-title="Show / Hide Right" data-toggle="tooltip" class="btn btn-danger btn-sm toggle-right"> 
        <span class="fa fa-arrow-circle-left"></span> Tutup navigasi
    </a> 
    <hr>
<div class="alert alert-info">
    Jadwal pelajaran berdasarkan<br> kelas...
</div>
    <?php
    $jumlah     =   $fquery->jumlahKelas();
    if($jumlah < 1) {
    echo "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
          <h3>Data kosong :</h3>
          Belum ada data kelas.<br>
          Silahkan untuk menambahkan<br> kelas baru !
          <br><br>
          </div></div></div>";
    }
    else {
          $kelas    =   $fquery->kelasNull();
          foreach ($kelas as $row) {
          ?>
            <a class="btn btn-metis-5 btn-md" 
               href="admin.php?page=details_jadwal&hari=senin&kelas_id=<?php echo $row['kelas_id'];?>&nama=<?php echo $row['nama'];?>">
                <span> Kelas <?php echo $row['nama'];?></span></a> 
            <span class="pull-right"><small>100%</small> </span> 
          <div class="progress xs">
              <div class="progress-bar progress-bar-success" style="width: 100%"></div>
          </div>
          <?php
          }
    }
          ?>
        </div>
      