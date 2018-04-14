<?php
/* 
 * *****************************************************************************
 * Filename  : guru.php                                                      
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
$data   =   $fquery->pagingGuru($posisi,$batas);
echo "<div class='row'>
              <div class='col-lg-12'>
                <div class='box'>
                  <header>
                    <div class='icons'>
                      <i class='fa fa-pencil-square-o'></i>
                    </div>
                      <h5 class='text-info'>DAFTAR DATA GURU</h5>
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
                  <div  class='body'>";
$jumlah     =   $fquery->jumlahGuru();
if($jumlah < 1) {
echo "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
      <h3>Data kosong :</h3>
      Belum ada data guru.<br>
      Silahkan untuk menambahkan data guru baru !
      <br><br>
      </div></div></div>";
}
else {
echo "<form action='admin.php?page=multiaksi_guru&aksi=multi' method='POST'>";
echo "<table class='table table-striped table-bordered table-hover'>";
echo "<thead><tr bgcolor='e9e9e9'><th width='15'><i class='fa fa-check'></i></th><th width='35'>
      No.</th><th>Kode Guru</th><th>Nama Lengkap</th><th>Mata Pelajaran</th><th width='80'>Operasi</th></tr></thead>";
echo "<tbody>";
$no=$posisi+1;
// Loop data
foreach($data as $row) {
    echo "<tr><td><input type='checkbox' name='guruid[]'"
         . "value='$row[kode_guru]' id='id-$no'></td>";
    echo "<td>$no.</td>";
    echo "<td>$row[kode_guru]</td>";
    echo "<td>$row[nama]</td>";
    echo "<td>$row[mapel]</td>";
    echo "<td><a href='#edit-$row[kode_guru]' data-toggle='modal'><i class='fa fa-pencil-square-o'></a>"
          . "</i>&nbsp;&nbsp;<a href='#hapus-$row[kode_guru]' data-toggle='modal'><i class='fa fa-trash-o'>"
          . "</i></a>&nbsp;&nbsp;<a href='#foto-$row[kode_guru]' data-toggle='modal'><i class='fa fa-picture-o'>"
          . "</i></a></td></tr>";
    $no++;
}
echo "</tr></tbody>";
echo "</table>";
// Pagination data kelas
$data       =  mysql_query("SELECT * FROM guru where kode_guru!='0'");
$jmldata    =  mysql_num_rows($data);
$jml_page   =  ceil($jmldata/10);
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
        echo "<li $active><a href='$_SERVER[PHP_SELF]?page=guru&halaman=$i'>$i</a></li>";
    }
    else {
        echo "<li $active><a href='$_SERVER[PHP_SELF]?page=guru&halaman=$i'>$i</a></li>";
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
$data   =   $fquery->guruNull();
foreach ($data as $edit) { ?>

  <div id="edit-<?php echo $edit['kode_guru'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                         <div class="modal-body">
                                             <form enctype="multipart/form-data" action="" method="POST">
                                             <div class="alert alert-primary">
                                                 <div class='form-group'><label class='control-label col-lg-4'>Kode Guru</label>
                                                     <div class='col-lg-8'>
                                                         <input type="hidden" name="kode_lama" value="<?php echo $edit['kode_guru'];?>">
                                                      <input type="text" name="kode_baru" value="<?php echo $edit['kode_guru'];?>"
                                                                class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Nama Guru</label>
                                                     <div class='col-lg-8'>
                                                         <input type="text" name="nama" value="<?php echo $edit['nama'];?>"
                                                                class="form-control">
                                                         
                                                         
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Nama Mata Pelajaran</label>
                                                     <div class='col-lg-8'>
                                                      <input type="text" name="mapel" value="<?php echo $edit['mapel'];?>"
                                                                class="form-control">
                                                         
                                                         
                                                     </div>
                                                 </div>
                                                 
                                                    <div class="form-group">
                        <label class="control-label col-lg-4">Foto profil</label>
                        <div class="col-lg-8">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="media/photos/guru/<?php echo $edit['foto'];?>" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Browse gambar</span> <span class="fileinput-exists">Pilih</span> 
                                  <input type="file" name="pfile">
                              </span> 
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a> 
                            </div>
                          </div>
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
                                             <form enctype="multipart/form-data" action="" method="POST">
                                             <div class="alert alert-primary">
                                                 <div class='form-group'><label class='control-label col-lg-4'>Kode Guru</label>
                                                     <div class='col-lg-8'>
                                                         <input required type="text" name="kode" class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Nama Guru</label>
                                                     <div class='col-lg-8'>
                                                         <input required type="text" name="nama" class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Mata Pelajaran</label>
                                                     <div class='col-lg-8'>
                                                         <input required type="text" name="mapel" class="form-control">
                                                     </div>
                                                 </div>
                                            
                                                  <div class="form-group">
                        <label class="control-label col-lg-4">Upload file</label>
                        <div class="col-lg-8">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="assets/img/foto.png" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Browse gambar</span> <span class="fileinput-exists">Pilih</span> 
                                  <input type="file" required name="pfile">
                              </span> 
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a> 
                            </div>
                          </div>
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
    
    $kd_lama  =   $_POST['kode_lama'];
    $kd_baru  =   $_POST['kode_baru'];
    $mapel    =   $_POST['mapel'];
    $nama   =   $_POST['nama'];
    $file       =   $_FILES['pfile']['tmp_name'];
    if(empty($file)) {
        $fquery->updateGuru($kd_baru,$nama,$mapel,$kd_lama);
        echo "<script>window.location='admin.php?page=guru';</script>";
    }
    else {
        $filesname  =   $_FILES['pfile']['name'];
        $fname      =   str_replace(" ", "_", $filesname);
        $random     =   rand(000000,999999).'_';
        $filename   =   $random.$fname;
        $dir        =   "media/photos/guru/";
        $upload     =   $dir.$filename;
        if(move_uploaded_file($file,$upload)) {
            $data   =   $fquery->getGuru($kd_lama);
            unlink("media/photos/guru/".$data['foto']."");
            $fquery->updateGuruFoto($kd_baru,$nama,$mapel,$filename,$kd_lama);
            echo "<script>window.location='admin.php?page=guru';</script>";
        }
        else {
            // redirect error page
            echo "<script>window.location='admin.php?page=error_upload_foto';</script>";
        }
    }
    
}
else if(isset($_POST['tambah'])) {
    $kode       =   $_POST['kode'];
    $nama       =   $_POST['nama'];
    $mapel      =   $_POST['mapel'];
    $file       =   $_FILES['pfile']['tmp_name'];
    $filesname  =   $_FILES['pfile']['name'];
    $fname      =   str_replace(" ", "_", $filesname);
    $random     =   rand(000000,999999).'_';
    $filename   =   $random.$fname;
    $dir        =   "media/photos/guru/";
    $upload     =   $dir.$filename;
    if(move_uploaded_file($file,$upload)) {
        // add data
        $fquery->tambahGuru($kode,$nama,$mapel,$filename);
        echo "<script>window.location='admin.php?page=guru';</script>";
    }
    else {
        // redirect error page
        echo "<script>window.location='admin.php?page=error_upload_foto';</script>";
    }
}
?>

<?php
$data   =   $fquery->guruNull();
foreach ($data as $hapus) { ?>
<div id="hapus-<?php echo $hapus['kode_guru'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
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
                                        <a href="admin.php?page=multiaksi_guru&aksi=hapus_one&kd_guru=<?php echo $hapus['kode_guru'];?>"
                                           class="btn btn-danger btn-sm">
                                          <i class="fa fa-trash-o"> Hapus</i>
                                      </a>
                                    </div>
                                </div>

                            </div>
                        </div>
<?php } ?>
                      
                      
                      
                      
                      
<?php
$data   =   $fquery->guruNull();
foreach ($data as $foto) { ?>
<div id="foto-<?php echo $foto['kode_guru'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    </div>
                                         <div class="modal-body">
                                             <img src="media/photos/guru/<?php echo $foto['foto'];?>">
                                         </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">
                                            Tutup
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
<?php } ?>
                      
                      
    <link rel="stylesheet" href="assets/lib/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css">
    <link rel="stylesheet" href="assets/lib/jquery.gritter/css/jquery.gritter.css">
    <link rel="stylesheet" href="assets/lib/jquery.uniform/themes/default/css/uniform.default.min.css">
    <link rel="stylesheet" href="assets/lib/jasny-bootstrap/css/jasny-bootstrap.min.css">
    <script>
      $(function() {
        formWizard();
      });
    </script>