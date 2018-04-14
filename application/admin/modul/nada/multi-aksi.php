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
$id_nada    =   $_GET['id_nada'];
if($page=='multiaksi_nada' && $aksi=='hapus_one') {
    $data   =   $fquery->getNada($id_nada);
    $fquery->hapusNada($id_nada);
    unlink("media/alarm/$data[nama_nada]");
    echo "<script>window.location='admin.php?page=nada';</script>";
}

else if($page=='multiaksi_nada' && $aksi=='multi') {
    if(isset($_POST['multi_hapus'])) {
        $cekid  =   $_POST['nadaid'];
        if(count($cekid) < 1) {
            echo "<br><div class='row'><div class='col-md-12'><div class='alert alert-danger'>
		          Tidak ada data nada yang dipilih untuk dihapus<br><br>
		          <a href='admin.php?page=nada' class='btn btn-primary btn-sm'>
		          Kembali ke halaman sebelumnya</a></div></div></div>";
        }
        else {
            $cekid  =   $_POST['nadaid'];
            for($i=0;$i<count($cekid);$i++) {
                $data   =   $fquery->getNada($cekid[$i]);
                mysql_query("DELETE FROM nada WHERE id_nada='$cekid[$i]'");
                unlink("media/alarm/$data[nama_nada]");
                echo "<script>window.location='admin.php?page=nada';</script>";
            }
        }
    }

}


/*
 * Ini adalah bagian untuk pengeditan
 * Ada 2 bagian
 */

if($page=='multiaksi_nada' && $aksi=='edit_one') {
    // Memanggil fungsi pengambilan data dari id
    $data   =   $fquery->getNada($id_nada);
    // membuat form edit
    ?>
    <div class='row'>
              <div class='col-lg-12'>
                <div class='box'>
                  <header>
                    <div class='icons'>
                      <i class='fa fa-pencil-square-o'></i>
                    </div>
                      <h5 class='text-info'>EDIT NADA / MUSIK ALARM</h5>
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
                                                         <input value="<?php echo $data['judul'];?>" required type="text" name="judul" class="form-control">
                                                     </div>
                                                 </div>                                            
                                                 
                                             </div> 
                                             </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-default btn-sm" href="admin.php?page=nada">
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
    $judul      =   $_POST['judul'];
    
    $fquery->updateNada($judul,$id_nada);
    echo "<script>window.location='admin.php?page=nada';</script>";
}
?>