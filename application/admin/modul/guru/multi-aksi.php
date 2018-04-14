<?php
/* 
 * *****************************************************************************
 * Filename  : hapus.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$page       =   $_GET['page'];
$aksi       =   $_GET['aksi'];
$kd_guru    =   $_GET['kd_guru'];

if($page=='multiaksi_guru' && $aksi=='hapus_one') {
    $data   =   $fquery->getGuru($kd_guru);
    if(unlink("media/photos/guru/$data[foto]")) {
        $fquery->hapusGuru($kd_guru);
        echo "<script>window.location='admin.php?page=guru';</script>";
    }
    
}

else if($page=='multiaksi_guru' && $aksi=='multi') {
    if(isset($_POST['multi_hapus'])) {
        $cekid  =   $_POST['guruid'];
        if(count($cekid) < 1) {
            echo "<br><div class='row'><div class='col-md-12'><div class='alert alert-danger'>
		          Tidak ada data guru yang dipilih untuk dihapus<br><br>
		          <a href='admin.php?page=guru' class='btn btn-primary btn-sm'>
		          Kembali ke halaman sebelumnya</a></div></div></div>";
        }
        else {
            $cekid  =   $_POST['guruid'];
            for($i=0;$i<count($cekid);$i++) {
                $data   =   $fquery->getGuru($cekid[$i]);
                unlink("media/photos/guru/$data[foto]");
                mysql_query("DELETE FROM guru WHERE kode_guru='$cekid[$i]'");
                echo "<script>window.location='admin.php?page=guru';</script>";
            }
        }
    }

}