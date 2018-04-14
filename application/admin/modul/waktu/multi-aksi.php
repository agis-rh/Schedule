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
$id_waktu   =   $_GET['id_waktu'];
if($page=='multiaksi_waktu' && $aksi=='hapus_one') {
    $fquery->hapusWaktu($id_waktu);
    echo "<script>window.location='admin.php?page=waktu';</script>";
}

else if($page=='multiaksi_waktu' && $aksi=='multi') {
    if(isset($_POST['multi_hapus'])) {
        $cekid  =   $_POST['waktuid'];
        if(count($cekid) < 1) {
            echo "<br><div class='row'><div class='col-md-12'><div class='alert alert-danger'>
		          Tidak ada data waktu yang dipilih untuk dihapus<br><br>
		          <a href='admin.php?page=waktu' class='btn btn-primary btn-sm'>
		          Kembali ke halaman sebelumnya</a></div></div></div>";
        }
        else {
            $cekid  =   $_POST['waktuid'];
            for($i=0;$i<count($cekid);$i++) {
                mysql_query("DELETE FROM waktu WHERE id_waktu='$cekid[$i]'");
                echo "<script>window.location='admin.php?page=waktu';</script>";
            }
        }
    }

}