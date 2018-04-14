<?php
/* 
 * *****************************************************************************
 * Filename  : waktu.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$batas  = 10;
$page   =   $_GET['halaman'];
if($page=='') {
    $posisi=0;
    $page=1;
}
else {
    $posisi=($page-1)*$batas;
}
$data   =   $fquery->pagingWaktu($posisi,$batas);
echo "<div class='row'>
              <div class='col-lg-12'>
                <div class='box'>
                  <header>
                    <div class='icons'>
                      <i class='fa fa-pencil-square-o'></i>
                    </div>
                      <h5 class='text-info'>DATA WAKTU LOAD HALAMAN OTOMATIS</h5>
                    <div class='toolbar'>
                      <nav style='padding: 8px;'>
                        <a href='#tambah' data-toggle='modal' class='btn btn-primary btn-sm'>
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
                  <div id='calendar_content' class='body'>";
$jumlah     =   $fquery->jumlahWaktu();
if($jumlah < 1) {
echo "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
      <h3>Data kosong :</h3>
      Belum ada data waktu.<br>
      Silahkan untuk menambahkan data waktu baru untuk load halaman otomatis !
      <br><br>
      </div></div></div>";
}
else {
echo "<form action='admin.php?page=multiaksi_waktu&aksi=multi' method='POST'>";
echo "<table class='table table-striped table-bordered table-hover'>";
echo "<thead><tr bgcolor='e9e9e9'><th width='15'><i class='fa fa-check'></i></th><th width='35'>
      No.</th><th>Data waktu</th><th>Keterangan waktu</th><th width='80'>Operasi</th></tr></thead>";
echo "<tbody>";
$no=$posisi+1;
foreach($data as $row) {
    echo "<tr><td><input type='checkbox' name='waktuid[]'"
         . "value='$row[id_waktu]' id='id-$no'></td>";
    echo "<td>$no.</td>";
    echo "<td>$row[waktu]</td>";
    echo "<td>$row[keterangan]</td>";
    echo "<td><a href='#edit-$row[id_waktu]' data-toggle='modal'><i class='fa fa-pencil-square-o'></a>"
          . "</i>&nbsp;&nbsp;&nbsp;<a href='#hapus-$row[id_waktu]' data-toggle='modal'><i class='fa fa-trash-o'>"
          . "</i></a></td></tr>";
    $no++;
}
echo "</tr></tbody>";
echo "</table>";
// Pagination data kelas
$data   = mysql_query("SELECT * FROM waktu");
$jmldata=  mysql_num_rows($data);
$jml_page   = ceil($jmldata/10);
echo "<ul class='pagination'>";
echo "<li><a>Halaman </a></li>";
for($i=1;$i<=$jml_page;$i++) {
    if($i==$page) {
        $active =   "class='active'";
    }
    else {
        $active="";
    }
    if($i!=$jml_page) {
        echo "<li $active><a href='$_SERVER[PHP_SELF]?page=waktu&halaman=$i'>$i</a></li>";
    }
    else {
        echo "<li $active><a href='$_SERVER[PHP_SELF]?page=waktu&halaman=$i'>$i</a></li>";
    }
}
echo "</ul>";
?>
<div class="alert alert-success">
                          <input type="radio" name="pilih"
                                 onclick="for(i=1;i<=<?php echo $no;?>;i++){document.getElementById('id-'+i).checked=true;}">
                          Check All
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="pilih"
                                 onclick="for(i=1;i<=<?php echo $no;?>;i++){document.getElementById('id-'+i).checked=false;}">
                          Uncheck All
                          <span style="float: right">
                              <a href="#multi-hapus" data-toggle="modal" class="btn btn-danger btn-sm">
                                  <i class="fa fa-trash-o"></i> Delete by checked
                              </a>
                              <div id="multi-hapus" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
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
                                        <button type="submit" name="multi_hapus" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o"></i> Hapus
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                              
                          </span>
                          <br>
                          <br>
                      </div>
                      </form>
<?php }
?>
</div></div></div>

<?php
$data   =   $fquery->waktu();
foreach ($data as $edit) { ?>

  <div id="edit-<?php echo $edit['id_waktu'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                         <div class="modal-body">
                                             <form action="" method="POST">
                                             <div class="alert alert-primary">
                                                 <div class='form-group'><label class='control-label col-lg-4'>Waktu</label>
                                                     <div class='col-lg-8'>
                                                         <input type="hidden" name="id_waktu" value="<?php echo $edit['id_waktu'];?>">
                                                         <input maxlength="8" type="text" name="waktu" value="<?php echo $edit['waktu'];?>"
                                                                class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Isi keterangan</label>
                                                     <div class='col-lg-8'>
                                                         <input type="text" name="keterangan" value="<?php echo $edit['keterangan'];?>"
                                                                class="form-control">
                                                     </div>
                                                 </div>
                                             </div> 
                                             </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">
                                            Tutup
                                        </button>
                                        <button type="submit" name="edit" class="btn btn-primary btn-sm">
                                            Simpan
                                        </button>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>
<?php } ?>

<div id="tambah" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                         <div class="modal-body">
                                             <form action="" method="POST">
                                             <div class="alert alert-primary">
                                                 <div class='form-group'><label class='control-label col-lg-4'>Waktu</label>
                                                     <div class='col-lg-8'>
                                                         <input maxlength="8" type="text" name="waktu" class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Keterangan</label>
                                                     <div class='col-lg-8'>
                                                         <input type="text" name="keterangan" class="form-control">
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
if(isset($_POST['edit'])) {
    $id_waktu     =   $_POST['id_waktu'];
    $waktu        =   $_POST['waktu'];
    $keterangan   =   $_POST['keterangan'];
    
    
    $fquery->updateWaktu($waktu,$keterangan,$id_waktu);
    echo "<script>window.location='admin.php?page=waktu';</script>";
    
}
else if(isset($_POST['tambah'])) {
    $waktu        =   $_POST['waktu'];
    $keterangan   =   $_POST['keterangan'];
    
    $fquery->tambahWaktu($waktu,$keterangan);
    echo "<script>window.location='admin.php?page=waktu';</script>";
}
?>

<?php
$data   =   $fquery->waktu();
foreach ($data as $hapus) { ?>
<div id="hapus-<?php echo $hapus['id_waktu'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
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
                                        <a href="admin.php?page=multiaksi_waktu&aksi=hapus_one&id_waktu=<?php echo $hapus['id_waktu'];?>"
                                           class="btn btn-danger btn-sm">
                                          <i class="fa fa-trash-o"> Hapus</i>
                                      </a>
                                    </div>
                                </div>

                            </div>
                        </div>
<?php } ?>

