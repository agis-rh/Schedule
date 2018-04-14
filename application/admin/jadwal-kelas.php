<div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-calendar"></i>
                    </div>
                      <h5 class="text-info">JADWAL PELAJARAN HARI <?php echo strtoupper($_GET['hari']); ?> &twoheadrightarrow; KELAS &twoheadrightarrow; <?php echo $_GET['nama'];?></h5>

                    <!-- .toolbar -->
                    <div class="toolbar">
                      <nav style="padding: 8px;">
                          <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href=""> Pilih hari &nbsp;&nbsp;&nbsp;
                              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="divider"></li>
                    <li><a href="admin.php?page=details_jadwal&hari=senin&kelas_id=<?php echo $_GET['kelas_id']; ?>&nama=<?php echo $_GET['nama']; ?>">Senin</a></li>
                    <li><a href="admin.php?page=details_jadwal&hari=selasa&kelas_id=<?php echo $_GET['kelas_id']; ?>&nama=<?php echo $_GET['nama']; ?>">Selasa</a></li>
                    <li><a href="admin.php?page=details_jadwal&hari=rabu&kelas_id=<?php echo $_GET['kelas_id']; ?>&nama=<?php echo $_GET['nama']; ?>">Rabu</a></li>
                    <li><a href="admin.php?page=details_jadwal&hari=kamis&kelas_id=<?php echo $_GET['kelas_id']; ?>&nama=<?php echo $_GET['nama']; ?>"">Kamis</a></li>
                    <li><a href="admin.php?page=details_jadwal&hari=jumat&kelas_id=<?php echo $_GET['kelas_id']; ?>&nama=<?php echo $_GET['nama']; ?>">Jumat</a></li>
                    <li><a href="admin.php?page=details_jadwal&hari=sabtu&kelas_id=<?php echo $_GET['kelas_id']; ?>&nama=<?php echo $_GET['nama']; ?>">Sabtu</a></li>
            </ul>

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
                      $jumlah   =   $fquery->jumlahJadwalKelas($_GET['hari'],$_GET['kelas_id']);
                      if($jumlah < 1) {
                          echo "<div class='row'><div class='col-md-12'><div class='alert alert-danger'>
                                <h3>Data kosong :</h3>
                                Belum ada data jadwal untuk kelas <b>$_GET[nama]</b>.<br>
                                Silahkan untuk menambahkan data jadwal kelas baru !
                                <br><br>
                                </div></div></div>";
                      }
                      else {
                      ?>
                      <form action="admin.php?page=multiaksi&hari=senin&aksi=multi" method="POST">
                      <table class="table table-bordered table-striped table-hover">
                          <thead>
                              <tr bgcolor="#ececec">
                                <th width="15"><i class="fa fa-check"></i></th>
                                <th width="35">No.</th>
                                <th>Jam ke</th>
                                <th>Nama guru</th>
                                <th>Mata pelajaran</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          $hari     =   $_GET['hari'];
                          $kelas_id =   $_GET['kelas_id'];
                          $jadwal   =   $fquery->jadwalKelas($hari,$kelas_id);
                          $no=1;
                          foreach ($jadwal as $row) {
                               if($row['jam_ke']=='-') {
                                  $jam_ke       = "ISTIRAHAT";
                                  $style_break  = "style='background: #00ffcc'";
                                  $nama_guru    = "-";
                                  $mapel        = "-";
                                  $mulai        = $row['mulai'];
                                  $selesai      = $row['akhir'];
                              }
                              else {
                                  $jam_ke       = $row['jam_ke'];
                                  $style_break  = "";
                                  $nama_guru    = $row['nama'];
                                  $mapel        = $row['mapel'];
                                  $mulai        = $row['mulai'];
                                  $selesai      = $row['akhir'];
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
                                      <?php echo $jam_ke;?>
                                  </td>
                                  <td <?php echo $style_break; ?>>
                                      <?php echo $nama_guru;?>
                                  </td>
                                  <td <?php echo $style_break; ?>>
                                      <?php echo $mapel;?>
                                  </td>
                                  <td><?php echo $mulai;?></td>
                                  <td><?php echo $selesai;?></td>
                                  <td>
                                      <a href="admin.php?page=multiaksi&hari=senin&aksi=edit_one&id=<?php echo $row['id'];?>">
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
                          <a target="_blank" href="laporan.php?jadwal=kelas&hari=<?php echo $_GET['hari'];?>&kelas_id=<?php echo $_GET['kelas_id'];?>" 
                             class="btn btn-primary btn-sm">
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
                                    </div>
                                         <div class="modal-body">
                                           
                                             <form action="admin.php?page=tambah&hari=senin" method="POST">
                                                <div class="form-group">
                                                    <label class="control-label col-lg-4">Waktu mulai pelajaran</label>
                                                    <div class="col-lg-8">
                                                      <input type="text" required name="mulai" class="form-control col-lg-6">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-lg-4">Waktu selesai pelajaran</label>
                                                    <div class="col-lg-8">
                                                      <input type="text" required name="selesai" class="form-control col-lg-6">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-lg-4">Jam ke</label>
                                                    <div class="col-lg-8">
                                                      <input type="text" required name="jam_ke" class="form-control col-lg-6">
                                                    </div>
                                                </div>
                                                <div class="form-group">
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
                                                <div class="form-group">
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

<?php
$jadwal =   $fquery->jadwal('senin');
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
                                        <a href="admin.php?page=multiaksi&hari=senin&aksi=hapus_one&id=<?php echo $hapus['id'];?>"
                                           class="btn btn-danger btn-sm">
                                          <i class="fa fa-trash-o"> Hapus</i>
                                      </a>
                                    </div>
                                </div>

                            </div>
                        </div>
<?php } ?>