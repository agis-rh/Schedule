<?php
/* 
 * *****************************************************************************
 * Filename  : alarm.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
echo "<div class='row'>
              <div class='col-lg-12'>
                <div class='box'>
                  <header>
                  <div class='icons'>
                      <i class='fa fa-clock-o'></i>
                    </div>
                    <h5 class='text-info'>DATA ALARM SEKOLAH</h5>
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
$jumlah     =   $fquery->jumlahAlarm();
if($jumlah < 1) {
echo "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
      <h3>Data kosong :</h3>
      Belum ada data alarm.<br>
      Silahkan untuk menambahkan data alarm baru !
      <br><br>
      </div></div></div>";
}
else {
?>

                    
<form action="admin.php?page=multiaksi_alarm&aksi=multi" method="post">
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
$data   = $fquery->pagingAlarm($posisi,$batas);
?>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr bgcolor="#ececec">
            <th width="10"><i class="fa fa-check"></i></th>
            <th width="35">No.</th>
            <th>Judul alarm</th>
            <th width="80">Waktu</th>
            <th width="50">ID nada</th>
            <th>Keterangan</th>
            <th width="60">Aksi</th>
        </tr>    
    </thead>
    <tbody>
        <?php
        $no = $posisi+1;
        foreach($data as $row) { ?>
        <tr>
            <td><input type="checkbox" name="alarmid[]" id="id-<?php echo $no;?>"
                       value="<?php echo $row['id_alarm'];?>"></td>
            <td><?php echo $no;?>.</td>
            <td><?php echo $row['topik'];?></td>
            <td><?php echo $row['waktu'];?></td>
            <td><a href='#play-<?php echo $row['id_nada'];?>' data-toggle='modal'><?php echo $row['id_nada'];?></a></td>
            <td><?php echo $row['keterangan'];?></td>
            <td><a href="admin.php?page=multiaksi_alarm&aksi=edit_one&id_alarm=<?php echo $row['id_alarm'];?>"><i class='fa fa-pencil-square-o'></i></a>
                &nbsp;
                <a href='#hapus-<?php echo $row['id_alarm'];?>' data-toggle='modal'><i class='fa fa-trash-o'>
                </i></a>
            </td>
        </tr>
        <?php
        $play   =   $fquery->getNada($row['id_nada']); ?>
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



        
        
        <?php
        $no++;
        }
        ?>
    </tbody>
</table>

<?php
$jumlah     = $fquery->jumlahAlarm();
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
        echo "<li $active><a href='$_SERVER[PHP_SELF]?page=alarm&halaman=$i'>$i</a></li>";
    }
    else {
        echo "<li $active><a href='$_SERVER[PHP_SELF]?page=alarm&halaman=$i'>$i</a></li>";
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
                                             <form action="" method="POST">
                                             <div class="alert alert-primary">
                                                 <div class='form-group'><label class='control-label col-lg-4'>Judul alarm</label>
                                                     <div class='col-lg-8'>
                                                         <input required type="text" name="topik" class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Waktu</label>
                                                     <div class='col-lg-8'>
                                                         <input required type="text" name="waktu" class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Pilih nada alarm</label>
                                                     <div class='col-lg-8'>
                                                         <select name="id_nada" class="form-control">
                                                        <?php
                                                        $data   =   $fquery->nada();
                                                        foreach ($data as $row) {
                                                            echo "<option value='$row[id_nada]'>"
                                                                 ."$row[judul] - <span style='padding-left: 400px'>$row[type]</span>"
                                                                 ."</option>";
                                                        }
                                                        ?>
                                                      </select>
                                                     </div>
                                                 </div>
                                                 <div class='form-group'><label class='control-label col-lg-4'>Keterangan alarm</label>
                                                     <div class='col-lg-8'>
                                                         <textarea required name="keterangan" class="form-control"></textarea>
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
    $topik      =   $_POST['topik'];
    $waktu      =   $_POST['waktu'];
    $id_nada    =   $_POST['id_nada'];
    $keterangan =   $_POST['keterangan'];
    
    $fquery->tambahAlarm($topik,$waktu,$id_nada,$keterangan);
    echo "<script>window.location='admin.php?page=alarm';</script>";
}
?>

<?php
$data   =   $fquery->alarm();
foreach ($data as $hapus) { ?>
<div id="hapus-<?php echo $hapus['id_alarm'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
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
                                        <a href="admin.php?page=multiaksi_alarm&aksi=hapus_one&id_alarm=<?php echo $hapus['id_alarm'];?>"
                                           class="btn btn-danger btn-sm">
                                          <i class="fa fa-trash-o"> Hapus</i>
                                      </a>
                                    </div>
                                </div>

                            </div>
                        </div>
<?php }
