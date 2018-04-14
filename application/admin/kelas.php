<?php
/* 
 * *****************************************************************************
 * Filename  : kelas.php                                                      
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
$data   =   $fquery->pagingKelas($posisi,$batas);
echo "<div class='row'>
              <div class='col-lg-12'>
                <div class='box'>
                  <header>
                    <div class='icons'>
                      <i class='fa fa-pencil-square-o'></i>
                    </div>
                      <h5 class='text-info'>DAFTAR DATA KELAS</h5>
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
$jumlah     =   $fquery->jumlahKelas();
if($jumlah < 1) {
echo "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
      <h3>Data kosong :</h3>
      Belum ada data kelas.<br>
      Silahkan untuk menambahkan kelas baru !
      <br><br>
      </div></div></div>";
}
else {
echo "<form action='admin.php?page=multiaksi_kelas&aksi=multi' method='POST'>";
echo "<table class='table table-striped table-bordered table-hover'>";
echo "<thead><tr bgcolor='e9e9e9'><th width='15'><i class='fa fa-check'></i></th><th width='35'>
      No.</th><th>Nama kelas</th><th width='80'>Operasi</th></tr></thead>";
echo "<tbody>";
$no=$posisi+1;
foreach($data as $row) {
    echo "<tr><td><input type='checkbox' name='kelasid[]'"
         . "value='$row[kelas_id]' id='id-$no'></td>";
    echo "<td>$no.</td>";
    echo "<td>$row[nama]</td>";
    echo "<td><a href='#edit-$row[kelas_id]' data-toggle='modal'><i class='fa fa-pencil-square-o'></a>"
          . "</i>&nbsp;&nbsp;&nbsp;<a href='#hapus-$row[kelas_id]' data-toggle='modal'><i class='fa fa-trash-o'>"
          . "</i></a></td></tr>";
    $no++;
}
echo "</tr></tbody>";
echo "</table>";
// Pagination data kelas
$data   = mysql_query("SELECT * FROM kelas");
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
        echo "<li $active><a href='$_SERVER[PHP_SELF]?page=kelas&halaman=$i'>$i</a></li>";
    }
    else {
        echo "<li $active><a href='$_SERVER[PHP_SELF]?page=kelas&halaman=$i'>$i</a></li>";
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
$data   =   $fquery->kelas();
foreach ($data as $edit) { ?>

  <div id="edit-<?php echo $edit['kelas_id'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                         <div class="modal-body">
                                             <form action="" method="POST">
                                             <div class="alert alert-primary">
                                                 <div class='form-group'><label class='control-label col-lg-4'>Nama kelas</label>
                                                     <div class='col-lg-8'>
                                                         <input type="hidden" name="kelas_id" value="<?php echo $edit['kelas_id'];?>">
                                                         <input type="text" name="nama" value="<?php echo $edit['nama'];?>"
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
                                                 <div class='form-group'><label class='control-label col-lg-4'>Nama kelas</label>
                                                     <div class='col-lg-8'>
                                                         <input type="text" name="nama" class="form-control">
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
    $kelas  =   $_POST['kelas_id'];
    $nama   =   $_POST['nama'];
    
    $fquery->updateKelas($nama,$kelas);
    echo "<script>window.location='admin.php?page=kelas';</script>";
    
}
else if(isset($_POST['tambah'])) {
    $nama   =   $_POST['nama'];
    
    $fquery->tambahKelas($nama);
    echo "<script>window.location='admin.php?page=kelas';</script>";
}
?>

<?php
$data   =   $fquery->kelas();
foreach ($data as $hapus) { ?>
<div id="hapus-<?php echo $hapus['kelas_id'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
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
                                        <a href="admin.php?page=multiaksi_kelas&aksi=hapus_one&kelas_id=<?php echo $hapus['kelas_id'];?>"
                                           class="btn btn-danger btn-sm">
                                          <i class="fa fa-trash-o"> Hapus</i>
                                      </a>
                                    </div>
                                </div>

                            </div>
                        </div>
<?php } ?>

