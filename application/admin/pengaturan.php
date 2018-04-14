<?php
/* 
 * *****************************************************************************
 * Filename  : pengaturan.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */

?>
<div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-info-circle"></i>
                    </div>
                      <h5 class="text-info">PENGATURAN INFORMASI PROGRAM</h5>

                    <!-- .toolbar -->
                    <div class="toolbar">
                      <nav style="padding: 8px;">
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
                  
                      <form action="" enctype="multipart/form-data" method="POST">
                          <div class="form-group">
                               <label class="control-label col-lg-4">Nama sekolah</label>
                               <div class="col-lg-8">
                                   <input type="text" required 
                                          name="nama_sekolah" value="<?php echo $program['nama_sekolah'];?>" class="form-control col-lg-6">
                               </div>
                          </div>
                          
                          <div class="form-group">
                               <label class="control-label col-lg-4">Alamat sekolah</label>
                               <div class="col-lg-8">
                                   <textarea required name="alamat_sekolah" class="form-control col-lg-6"><?php echo $program['alamat_sekolah'];?></textarea>
                               </div>
                          </div>
                          
                          <div class="form-group">
                               <label class="control-label col-lg-4">Nama kepala sekolah</label>
                               <div class="col-lg-8">
                                   <input type="text" required 
                                          name="kepala_sekolah" value="<?php echo $program['kepala_sekolah'];?>" class="form-control col-lg-6">
                               </div>
                          </div>
                          
                           <div class="form-group">
                        <label class="control-label col-lg-4">Foto profil kepala sekolah</label>
                        <div class="col-lg-8">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="media/photos/kepala_sekolah/<?php echo $program['foto'];?>" alt="...">
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
                          
                          <hr>
                          
                          <div class="form-group">
                              <label class="control-label col-lg-4">
                                  <button type="submit" name="submit" class="btn btn-sm btn-primary">
                                      Simpan Informasi
                                  </button>
                              </label>
                          </div>
                          
                      </form>
                      
                      
                      
                      
                  </div>
                </div>
              </div>
            </div>

    <link rel="stylesheet" href="assets/lib/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css">
    <link rel="stylesheet" href="assets/lib/jquery.gritter/css/jquery.gritter.css">
    <link rel="stylesheet" href="assets/lib/jquery.uniform/themes/default/css/uniform.default.min.css">
    <link rel="stylesheet" href="assets/lib/jasny-bootstrap/css/jasny-bootstrap.min.css">
    <script>
      $(function() {
        formWizard();
      });
    </script>
    
        
 <?php
if(isset($_POST['submit'])) {
    
    $nm_sekolah  =   $_POST['nama_sekolah'];
    $al_sekolah  =   $_POST['alamat_sekolah'];
    $ka_sekolah  =   $_POST['kepala_sekolah'];
    $file        =   $_FILES['pfile']['tmp_name'];
    if(empty($file)) {
        $fquery->updateProgram($nm_sekolah,$al_sekolah,$ka_sekolah);
        echo "<script>window.location='admin.php?page=pengaturan';</script>";
    }
    else {
        $filesname  =   $_FILES['pfile']['name'];
        $fname      =   str_replace(" ", "_", $filesname);
        $random     =   rand(000000,999999).'_';
        $filename   =   $random.$fname;
        $dir        =   "media/photos/kepala_sekolah/";
        $upload     =   $dir.$filename;
        if(move_uploaded_file($file,$upload)) {
            $data   =   $fquery->program();
            unlink("media/photos/kepala_sekolah/".$data['foto']."");
            $fquery->updateProgramFoto($nm_sekolah,$al_sekolah,$ka_sekolah,$filename);
            echo "<script>window.location='admin.php?page=pengaturan';</script>";
        }
        else {
            // redirect error page
            echo "<script>window.location='admin.php?page=error_upload_foto';</script>";
        }
    }
    
}