<div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-calendar"></i>
                    </div>
                      <h5 class="text-info">DAFTAR DATA JADWAL PELAJARAN HARI KAMIS</h5>

                    <!-- .toolbar -->
                    <div class="toolbar">
                      <nav style="padding: 8px;">
                        <a href="#tambah" data-toggle="modal" class="btn btn-primary btn-sm">
                          Tambah data
                        </a> 
                        <a href="javascript:;" class="btn btn-default btn-sm collapse-box">
                          <i class="fa fa-minus"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-default btn-sm full-box">
                          <i class="fa fa-expand"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-danger btn-sm close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </nav>
                    </div><!-- /.toolbar -->
                  </header>
                  <div id="calendar_content" class="body">
                      <?php
                      $jumlah   =   $fquery->jumlahJadwal('kamis');
                      if($jumlah < 1) {
                          echo "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                                <h3>Data kosong :</h3>
                                Belum ada data jadwal pelajaran untuk hari kamis.<br>
                                Silahkan untuk menambahkan data jadwal baru !
                                <br><br>
                                </div></div></div>";
                      }
                      else {
                      ?>
                      <form action="admin.php?page=multiaksi&hari=kamis&aksi=multi" method="POST">
                      <table class="table table-bordered table-striped table-hover">
                          <thead>
                              <tr bgcolor="#ececec">
                                <th width="15"><i class="fa fa-check"></i></th>
                                <th width="35">No.</th>
                                <th>Nama kelas</th>
                                <th>Jam ke</th>
                                <th>Nama guru</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          $batas    =   20;
                          $halaman  =   $_GET['halaman'];
                          if(empty($halaman)) {
                              $posisi   = 0;
                              $halaman  = 1;
                          }
                          else {
                              $posisi   = ($halaman-1)*$batas;
                          }
                          $jadwal   =   $fquery->pagingJadwal('kamis',$posisi,$batas);
                          $no=$posisi+1;
                          foreach ($jadwal as $row) {
                              if($row['jam_ke']=='-') {
                                  $nama_kelas   = "-";
                                  $jam_ke       = "ISTIRAHAT";
                                  $style_break  = "style='background: #00ffcc'";
                                  $nama_guru    = "-";
                                  $mapel        = "-";
                                  $mulai        = $row['waktu_awal'];
                                  $selesai      = $row['waktu_akhir'];
                              }
                              else {
                                  $nama_kelas   = $row['nama_kelas'];
                                  $jam_ke       = $row['jam_ke'];
                                  $style_break  = "";
                                  $nama_guru    = $row['nama_guru'];
                                  $mapel        = $row['mapel'];
                                  $mulai        = $row['waktu_awal'];
                                  $selesai      = $row['waktu_akhir'];
                              }
                              ?>
                              <tr>
                                  <td>
                                      <input type="checkbox" name="jadwalid[]"
                                             value="<?php echo $row['id'];?>"
                                             id="id-<?php echo $no;?>">
                                      <input type="hidden" value="<?php echo $row['id'];?>"
                                             name="id[]">
                                  </td>
                                  <td><?php echo $no;?>.</td>
                                  <td <?php echo $style_break; ?>>
                                      <?php echo $nama_kelas;?>
                                  </td>
                                  <td <?php echo $style_break; ?>>
                                      <?php echo $jam_ke;?>
                                  </td>
                                  <td <?php echo $style_break; ?>>
                                      <?php echo $nama_guru;?>
                                  </td>
                                  <td><?php echo $mulai;?></td>
                                  <td><?php echo $selesai;?></td>
                                  <td>
                                      <a href="admin.php?page=multiaksi&hari=kamis&aksi=edit_one&id=<?php echo $row['id'];?>">
                                          <i class="fa fa-pencil"></i>
                                      </a> 
                                      <a href="#hapus-<?php echo $row['id'];?>" data-toggle="modal">
                                          <i class="fa fa-trash-o"></i>
                                      </a>
                                  </td>
                                  
                              </tr>
                          <?php $no++; } ?>
                          </tbody>
                      </table>
                          <?php
                          $jumlah   = $fquery->jumlahJadwal('kamis');
                          $per_page = ceil($jumlah/20);
                          echo "<ul class='pagination'>";
                          echo "<li><a>Halaman </a></li>";
                          for($i=1;$i<=$per_page;$i++) {
                                if($i==$halaman) {
                                    $active =   "class='active'";
                                }
                                else {
                                    $active="";
                                }
                            if($i!=$per_page) {
                                echo "<li $active><a href='$_SERVER[PHP_SELF]?page=kamis&halaman=$i'>$i</a></li>";
                            }
                            else {
                                echo "<li $active><a href='$_SERVER[PHP_SELF]?page=kamis&halaman=$i'>$i</a></li>";
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
                              <button type="submit" name="multi_edit" class="btn btn-success btn-sm">
                                  <i class="fa fa-pencil-square-o"></i> Edit by checked
                              </button>
                              <a href="#hapus" data-toggle="modal" class="btn btn-danger btn-sm">
                                  <i class="fa fa-trash-o"></i> Delete by checked
                              </a>
                              
                          </span>
                          <br>
                          <br>
                          <a target="_blank" href="laporan.php?jadwal=hari&hari=kamis" class="btn btn-primary btn-sm">
                                  <i class="fa fa-print"></i> Download Jadwal Pelajaran
                          </a>
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
                      ?>
                  </div>
                </div>
              </div>
            </div>

<div id="tambah" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <input type="checkbox" id="masuk" onclick="masuk();"> Jam masuk pelajaran
                                        &nbsp;&nbsp;
                                        <input type="checkbox" id="break" onclick="istirahat();"> Jam istirahat
                                        &nbsp;&nbsp;
                                        <a class="btn btn-sm btn-danger" onclick="reset();">
                                            Reset Options
                                        </a>
                                    </div>
                                         <div class="modal-body">
                                             <div class="form-jadwal">
                                             <form action="admin.php?page=tambah&hari=kamis" method="POST">
                                                <div class="form-group">
                                                    <label class="control-label col-lg-4">Waktu jam mulai</label>
                                                    <div class="col-lg-8">
                                                      <input maxlength="5" type="text" required name="mulai" class="form-control col-lg-6">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-lg-4">Waktu jam selesai</label>
                                                    <div class="col-lg-8">
                                                      <input maxlength="5" type="text" required name="selesai" class="form-control col-lg-6">
                                                    </div>
                                                </div>
                                                 <div class="form-group" id="jam_ke">
                                                    <label class="control-label col-lg-4">Jam ke</label>
                                                    <div class="col-lg-8">
                                                        <input maxlength="2"  value="-" type="text" required name="jam_ke" class="form-control col-lg-6">
                                                    </div>
                                                </div>
                                                <div class="form-group" id="kd_guru">
                                                    <label class="control-label col-lg-4">Pilih nama guru</label>
                                                    <div class="col-lg-4">
                                                        <select name="kd_guru" class="form-control">
                                                        <?php
                                                        $data   =   $fquery->guru();
                                                        foreach ($data as $row) {
                                                            echo "<option value='$row[kode_guru]'>$row[nama]</option>";
                                                        }
                                                        ?>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="kd_kelas">
                                                    <label class="control-label col-lg-4">Pilih nama kelas</label>
                                                    <div class="col-lg-4">
                                                      <select name="kelas_id" class="form-control ">
                                                        <?php
                                                        $data   =   $fquery->kelas();
                                                        foreach ($data as $row) {
                                                            echo "<option value='$row[kelas_id]'>$row[nama]</option>";
                                                        }
                                                        ?>
                                                      </select>
                                                    </div>
                                                </div>

                                             
                                         </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">
                                            Tutup
                                        </button>
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            Simpan
                                        </button>
                                    </form>
                                    </div>
                                         </div>
                                </div>

                            </div>
                        </div>

<?php
$jadwal =   $fquery->jadwal('kamis');
foreach ($jadwal as $hapus) { ?>
<div id="hapus-<?php echo $hapus['id'];?>" tab-index="-1" class="modal fade" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
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
                                        <a href="admin.php?page=multiaksi&hari=kamis&aksi=hapus_one&id=<?php echo $hapus['id'];?>"
                                           class="btn btn-danger btn-sm">
                                          <i class="fa fa-trash-o"> Hapus</i>
                                      </a>
                                    </div>
                                </div>

                            </div>
                        </div>
<?php } ?>

<script type="text/javascript">
        function reset() {
            document.getElementById('break').checked=false;
            document.getElementById('masuk').checked=false;
            document.getElementById('masuk').disabled=false;
            document.getElementById('break').disabled=false;
            $('.form-jadwal').hide(1000);
            $("#kd_guru").show(500);
            $("#kd_kelas").show(500);
            $("#jam_ke").show(500);
        }

        function masuk() {
            document.getElementById('break').disabled=true;
            $('.form-jadwal').show(1000);
        }
        function istirahat() {
            $('.form-jadwal').show(1500);
            $("#kd_guru").hide(500);
            $("#kd_kelas").hide(500);
            $("#jam_ke").hide(500);
            document.getElementById('masuk').disabled=true;
        }
</script>