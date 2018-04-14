<?php
/* 
 * *****************************************************************************
 * Filename  : akun_login.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$data   = $fquery->getAkun();
?>
<div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-info-circle"></i>
                    </div>
                      <h5 class="text-info">PENGATURAN AKUN ADMINISTRATOR</h5>

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
                               <label class="control-label col-lg-4">Nama lengkap</label>
                               <div class="col-lg-8">
                                   <input type="text" required 
                                          name="nama" value="<?php echo $data['nama_lengkap'];?>" class="form-control col-lg-6">
                               </div>
                          </div>
                          
                          
                          <div class="form-group">
                               <label class="control-label col-lg-4">Usernaame</label>
                               <div class="col-lg-8">
                                   <input type="text" required 
                                          name="user" value="<?php echo $data['user'];?>" class="form-control col-lg-6">
                               </div>
                          </div>
                          
                          <div class="form-group">
                               <label class="control-label col-lg-4">Password</label>
                               <div class="col-lg-8">
                                   <input type="password" name="pass" class="form-control col-lg-6">
                              </div>
                          </div>
                          
                          
                          
                          
                          <hr>
                          
                          <div class="form-group">
                              <label class="control-label col-lg-4">
                                  <button type="submit" name="submit" class="btn btn-sm btn-primary">
                                      Simpan
                                  </button>
                              </label>
                          </div>
                          
                      </form>
                      
                      
                      
                      
                  </div>
                </div>
              </div>
            </div>

        
 <?php
if(isset($_POST['submit'])) {
    
    $user   = $_POST['user'];
    $pass   = $_POST['pass'];
    $nama   = $_POST['nama'];
    
    if(empty($pass)) {
        $fquery->updateAkun($user,$nama);
        echo "<script>window.location='admin.php?page=akun_login';</script>";
    }
    
    else {
        $fquery->updateAkunPass($user,$pass,$nama);
        echo "<script>window.location='admin.php?page=akun_login';</script>";
    }
}

