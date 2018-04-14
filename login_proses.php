<?php
/* 
 * *****************************************************************************
 * Filename  : login_proses.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 * koneksi database
 */
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

require_once ("system/functions.php");
// membuat objek baru
$fquery = new Functions();
	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax) {
            $username   = antiinjection($_REQUEST['username']);
            $password   = antiinjection($_REQUEST['password']);
            // sistem login dengan teknik OOP
            $login      = $fquery->loginSystem($username, $password);
            $jml_rows   = mysql_num_rows($login);
            $r          = mysql_fetch_array($login);
            
    if ($jml_rows > 0){ // Apabila username dan password ada
      session_start();  // Mulai sesi
      $_SESSION['username']     = $r['user'];
      $_SESSION['nama_lengkap'] = $r['nama_lengkap'];
      $_SESSION['password']     = $r['pass'];  
      $_SESSION['login_status'] = "yes";
      // cek cookie
      if(!empty($_REQUEST['cookie'])) {
          // membuat cookie
          setcookie('status_login', 'remember', time()+8640);
      }
      // response AJAX
      echo "success";
    }
}



