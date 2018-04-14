<?php
/* 
 * *****************************************************************************
 * Filename  : nada.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
echo "<div class='row'>
              <div class='col-lg-12'>
                <div class='box'>
                  <header>
                  <div class='icons'>
                      <i class='fa fa-music'></i>
                    </div>
                    <h5 class='text-info'>DATA NADA / MUSIK ALARM SEKOLAH</h5>
                        <div class='toolbar'>
                      <nav style='padding: 8px;'>
                        <a href='#tambah' data-toggle='modal' class='btn btn-sm btn-primary'>
                          Tambah data
                        </a> 
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
                  <div class='body'>";
$jumlah     =   $fquery->jumlahNada();
if($jumlah < 1) {
echo "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
      <h3>Data kosong :</h3>
      Belum ada data media musik.<br>
      Silahkan untuk menambahkan media musik baru !
      <br><br>
      </div></div></div>";
}
else {
?>
                    
<form action="admin.php?page=multiaksi_nada&aksi=multi" method="post">
<?php
$batas  = 10;
$halaman    = $_GET['halaman'];
if($halaman=='') {
    $posisi     = 0;
    $halaman    = 1;
}
else {
    $posisi     =($halaman-1)*$batas;
}
$data   = $fquery->pagingNada($posisi,$batas);
?>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr bgcolor="#ececec">
            <th width="10"><i class="fa fa-check"></i></th>
            <th width="35">No.</th>
            <th>Judul file</th>
            <th width="150">Type file</th>
            <th width="50">Ukuran file</th>
            <th width="80">Operasi</th>
        </tr>    
    </thead>
    <tbody>
        <?php
        $no = $posisi+1;
        foreach($data as $row) { ?>
        <tr>
            <td><input type="checkbox" name="nadaid[]" id="id-<?php echo $no;?>"
                       value="<?php echo $row['id_nada'];?>"></td>
            <td><?php echo $no;?>.</td>
            <td><a href='#play-<?php echo $row['id_nada'];?>' data-toggle='modal'><?php echo $row['judul'];?></a></td>
            <td><?php echo $row['type'];?></td>
            <td><?php echo $row['ukuran'];?></td>
            <td>
                <a href='#play-<?php echo $row['id_nada'];?>' data-toggle='modal'><i class='fa fa-play'>
                </i></a>&nbsp;
                <a href="admin.php?page=multiaksi_nada&aksi=edit_one&id_nada=<?php echo $row['id_nada'];?>"><i class='fa fa-pencil-square-o'></i></a>
                &nbsp;
                <a href='#hapus-<?php echo $row['id_nada'];?>' data-toggle='modal'><i class='fa fa-trash-o'>
                </i></a>
                
            </td>
        </tr>
        <?php
        $no++;
        }
        ?>
    </tbody>
</table>

<?php
$jumlah     = $fquery->jumlahNada();
$jml_page   = ceil($jumlah/10);
echo "<ul class='pagination'>";
echo "<li><a>Halaman </a></li>";
for($i=1;$i<=$jml_page;$i++) {
    if($i==$halaman) {
        $active =   "class='active'";
    }
    else {
        $active="";
    }
    if($i!=$jml_page) {
        echo "<li $active><a href='$_SERVER[PHP_SELF]?page=nada&halaman=$i'>$i</a></li>";
    }
    else {
        echo "<li $active><a href='$_SERVER[PHP_SELF]?page=nada&halaman=$i'>$i</a></li>";
    }
}
echo "</ul>";
?>

    <div class="alert alert-success">
        <input type="radio" name="pilih" 
               onclick="for(i=1;1<=<?php echo $no;?>;i++){document.getElementById('id-'+i).checked=true;}">
        Check All
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="pilih"
               onclick="for(i=1;1<=<?php echo $no;?>;i++){document.getElementById('id-'+i).checked=false;}">
        Uncheck All
        <span style="float: right">
        <a href="#hapus" data-toggle="modal" class="btn btn-danger btn-sm">
        <i class="fa fa-trash-o"></i> Delete by checked
        </a>    
        </span>
        <br>
        <br>
    </div>

    <div id="hapus" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    </div>
                                         <div class="modal-body">
                                           Yakin ingin menghapus data yang ditandai ?
                                         </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">
                                            Tutup
                                        </button>
                                        <button type="submit" name="multi_hapus" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
    
    
</form>


<?php
}
echo "</div>
            </div>
            </div>";
?>







<div id="tambah" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                         <div class="modal-body">
                                             <form enctype='multipart/form-data' action="" method="POST">
                                             <div class="alert alert-primary">
                                                 <div class='form-group'><label class='control-label col-lg-4'>Judul nada</label>
                                                     <div class='col-lg-8'>
                                                         <input required type="text" name="judul" class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>File upload</label>
                                                     <div class='col-lg-8'>
                                                         <input required type="file" name="pfile" class="form-control">
                                                     </div>
                                                 </div>
                                             </div> 
                                             </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">
                                            Tutup
                                        </button>
                                        <button type="submit" name="tambah" class="btn btn-primary btn-sm">
                                            Simpan
                                        </button>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>

<?php
if(isset($_POST['tambah'])) {
    $judul      =   $_POST['judul'];
    $file       =   $_FILES['pfile']['tmp_name'];
    $type       =   $_FILES['pfile']['type'];
    $ukuran     =   $_FILES['pfile']['size'];
    $filesname  =   $_FILES['pfile']['name'];
    $fname      =   str_replace(" ", "_", $filesname);
    $random     =   rand(000000,999999).'_';
    $filename   =   $random.$fname;
    $dir        =   "media/alarm/";
    $upload     =   $dir.$filename;
    if(move_uploaded_file($file,$upload)) {
        // add data to database
        $fquery->tambahNada($judul,$filename,$type,$ukuran);
        echo "<script>window.location='admin.php?page=nada';</script>";
    }
    else {
        // redirect error page
        echo "<script>window.location='admin.php?page=error_upload';</script>";
    }
}

$data   =   $fquery->nada();
foreach ($data as $hapus) { ?>
<div id="hapus-<?php echo $hapus['id_nada'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    </div>
                                         <div class="modal-body">
                                           Yakin ingin menghapus data yang dipilih ?
                                         </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">
                                            Tutup
                                        </button>
                                        <a href="admin.php?page=multiaksi_nada&aksi=hapus_one&id_nada=<?php echo $hapus['id_nada'];?>"
                                           class="btn btn-danger btn-sm">
                                          <i class="fa fa-trash-o"> Hapus</i>
                                      </a>
                                    </div>
                                </div>

                            </div>
                        </div>
<?php } 
$data   =   $fquery->nada();
foreach ($data as $play) { ?>
<div id="play-<?php echo $play['id_nada'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3><i class="fa fa-music"></i> play music</h3>
                                    </div>
                                         <div class="modal-body">
                                            <audio controls>
                                                <source src="media/alarm/<?php echo $play['nama_nada']; ?>" type="<?php echo $play['type']; ?>">
                                            </audio>
                                         </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true">
                                            Tutup
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
<?php } ?>

