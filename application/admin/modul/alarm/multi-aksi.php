<?php
/* 
 * *****************************************************************************
 * Filename  : hapus.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$page       =   $_GET['page'];
$aksi       =   $_GET['aksi'];
$id_alarm   =   $_GET['id_alarm'];
if($page=='multiaksi_alarm' && $aksi=='hapus_one') {
    $fquery->hapusAlarm($id_alarm);
    echo "<script>window.location='admin.php?page=alarm';</script>";
}

else if($page=='multiaksi_alarm' && $aksi=='multi') {
    if(isset($_POST['multi_hapus'])) {
        $cekid  =   $_POST['alarmid'];
        if(count($cekid) < 1) {
            echo "<br><div class='row'><div class='col-md-12'><div class='alert alert-danger'>
		          Tidak ada data alarm yang dipilih untuk dihapus<br><br>
		          <a href='admin.php?page=alarm' class='btn btn-primary btn-sm'>
		          Kembali ke halaman sebelumnya</a></div></div></div>";
        }
        else {
            $cekid  =   $_POST['alarmid'];
            for($i=0;$i<count($cekid);$i++) {
                mysql_query("DELETE FROM alarm WHERE id_alarm='$cekid[$i]'");
                echo "<script>window.location='admin.php?page=alarm';</script>";
            }
        }
    }

}


/*
 * Ini adalah bagian untuk pengeditan
 * Ada 2 bagian
 */

if($page=='multiaksi_alarm' && $aksi=='edit_one') {
    // Memanggil fungsi pengambilan data dari id
    $data   =   $fquery->getAlarm($id_alarm);
    // membuat form edit
    ?>
    <div class='row'>
              <div class='col-lg-12'>
                <div class='box'>
                  <header>
                    <div class='icons'>
                      <i class='fa fa-pencil-square-o'></i>
                    </div>
                      <h5 class='text-info'>EDIT DATA ALARM</h5>
                    <div class='toolbar'>
                      <nav style='padding: 8px;'>
                        <a href='javascript:;' class='btn btn-default btn-sm collapse-box'>
                          <i class='fa fa-minus'></i>
                        </a> 
                        <a href='javascript:;' class='btn btn-default btn-sm full-box'>
                          <i class='fa fa-expand'></i>
                        </a> 
                        <a href='javascript:;' class='btn btn-danger btn-sm close-box'>
                          <i class='fa fa-times'></i>
                        </a> 
                      </nav>
                    </div>
                  </header>
                  <div class='body'>
                  <div class='row well'>  
                      <form action="" method="POST">
                                             <div class="alert alert-primary">
                                                 <div class='form-group'><label class='control-label col-lg-4'>Judul alarm</label>
                                                     <div class='col-lg-8'>
                                                         <input value="<?php echo $data['topik'];?>" required type="text" name="topik" class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Waktu</label>
                                                     <div class='col-lg-8'>
                                                         <input value="<?php echo $data['waktu'];?>" required type="text" name="waktu" class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Pilih nada alarm</label>
                                                     <div class='col-lg-8'>
                                                         <select name="id_nada" class="form-control">
                                                        <?php
                                                        $nada   =   $fquery->nada();
                                                        foreach ($nada as $row) {
                                                            echo "<option value='$row[id_nada]'";
                                                            echo $data['id_nada']==$row['id_nada'] ? 'selected' : '';
                                                            echo ">$row[judul] - <span style='padding-left: 400px'>$row[type]</span>"
                                                                 ."</option>";
                                                        }
                                                        ?>
                                                      </select>
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Keterangan alarm</label>
                                                     <div class='col-lg-8'>
                                                         <textarea required name="keterangan" class="form-control"><?php echo $data['keterangan'];?></textarea>
                                                     </div>
                                                 </div>
                                             </div> 
                                             </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-default btn-sm" href="admin.php?page=alarm">
                                            Kembali
                                        </a>
                                        <button type="submit" name="update" class="btn btn-primary btn-sm">
                                            Simpan
                                        </button>
                                    </div>
                                    </form>
                  </div></div></div></div></div>
<?php
}
if(isset($_POST['update'])) {
    $topik      =   $_POST['topik'];
    $waktu      =   $_POST['waktu'];
    $id_nada    =   $_POST['id_nada'];
    $keterangan =   $_POST['keterangan'];
    
    $fquery->updateAlarm($topik,$waktu,$id_nada,$keterangan,$id_alarm);
    echo "<script>window.location='admin.php?page=alarm';</script>";
}
?>