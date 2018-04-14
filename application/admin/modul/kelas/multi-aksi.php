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
$kelas_id   =   $_GET['kelas_id'];
if($page=='multiaksi_kelas' && $aksi=='hapus_one') {
    $fquery->hapusKelas($kelas_id);
    echo "<script>window.location='admin.php?page=kelas';</script>";
}

else if($page=='multiaksi_kelas' && $aksi=='multi') {
    if(isset($_POST['multi_hapus'])) {
        $cekid  =   $_POST['kelasid'];
        if(count($cekid) < 1) {
            echo "<br><div class='row'><div class='col-md-12'><div class='alert alert-danger'>
		          Tidak ada data kelas yang dipilih<br><br>
		          <a href='admin.php?page=kelas' class='btn btn-primary btn-sm'>
		          Kembali ke halaman sebelumnya</a></div></div></div>";
        }
        else {
            $cekid  =   $_POST['kelasid'];
            for($i=0;$i<count($cekid);$i++) {
                mysql_query("DELETE FROM kelas WHERE kelas_id='$cekid[$i]'");
                echo "<script>window.location='admin.php?page=kelas';</script>";
            }
        }
    }

}