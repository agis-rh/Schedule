<?php
/* 
 * *****************************************************************************
 * Filename  : login.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
session_start();
if(empty($_SESSION['login_status'])) {
echo   "<!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta name='description' content='Sistem Informasi Jadwal Pelajaran'>
        <meta name='author' content='IBeESNay'>
        <link rel='shortcut icon' href='assets/img/favicon/favicon.png'>
        <link href='assets/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='assets/lib/font-awesome/css/font-awesome.min.css'>
        <link href='assets/css/bootstrap-theme.min.css' rel='stylesheet'>
        <link href='assets/css/login.css' rel='stylesheet'>
        <title>Sistem Informasi Jadwal Pelajaran</title>
        <script src='assets/lib/jquery/jquery.min.js'></script>
        <script src='assets/lib/bootstrap/js/bootstrap.min.js'></script>
        <script src='assets/js/login.js'></script>";
?>
  </head>
  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> 
                Sistem Informasi Jadwal Pelajaran <?php echo date("Y");?>
            </a>
        </div>
      
      </div>
    </div>


    <div class="container">

        <div class="row well">
    <div class="col-sm-6">
        <h3 class="text-info">
            Login Panel Administrator
        </h3>
                    <div class='login-alert'>
                      <div class='alert alert-danger'>
                      <button type='button' class='close'>×</button>
                          Username Atau Password Masih Kosong</div>
                    </div>
                      <form id='login' method='post' action='login_proses.php'>
                          <table class="table table-condensed table-hover">
                              <tr><td>
                                 <input class='form-control' id='username' type='text' name='username' placeholder='Username'>
                                  </td>
                              </tr>
                              <tr><td>
                          
                                 <input class='form-control' id='password' name='password' type='password' placeholder='Password'>
                                  </td>
                              </tr>
                                      <tr>
                                          <td>
                                              <input id="cookie" type="checkbox" value="remember" name="cookie"> Biarkan saya tetap masuk..
                                          </td>
                                      </tr>
                                  </td>
                              <tr><td>
                             <button id='submit' class='btn btn-success btn-block btn-login' type='submit'>
                                 <i class="fa fa-check-square"></i> MASUK
                             </button>
                                  </td></tr>
                                 </table>
                     </form>
        <div id="message">
            
        </div>
    </div>
    <div class="col-sm-6">
        <h3 class="text-info">
            SMK Negeri 1 Lemahsugih
        </h3>
        <p class="text-muted" align="justify">
         &nbsp;&nbsp;&nbsp;&nbsp;
         Selamat datang dihalaman login panel SIJP tahun <?php echo date("Y");?>.
         Silahkan masukan username dan password untuk mengelola Sistem Informasi Akademik SIJP atau
          Sistem Informasi Jadwal Pelajaran. </p>
    </div>
</div>

    </div> <!-- /container -->
   
  </body>
</html>

<?php
}
else {
    echo "<script>window.location='admin.php';</script>";
}
