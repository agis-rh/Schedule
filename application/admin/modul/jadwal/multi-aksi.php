<?php
/* 
 * *****************************************************************************
 * Filename  : multi-aksi.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$page       =   $_GET['page'];
$aksi       =   $_GET['aksi'];
$hari       =   $_GET['hari'];
$check      =   $_POST['jadwalid'];
$id         =   $_GET['id'];
$guru       =   $fquery->guru();
$kelas      =   $fquery->kelas();

/*
 * Ini adalah bagian untuk penghapusan
 * Ada 2 bagian
 */

if($page=='multiaksi' && $aksi=='hapus_one') {
    $fquery->hapus($hari,$id);
    echo "<script>window.location='admin.php?page=$hari';</script>";
}
else if($page=='multiaksi' && $aksi=='multi') {
    if(isset($_POST['multi_hapus'])) {
        $cekid  =   $_POST['jadwalid'];
        if(count($cekid) < 1) {
            echo "<br><div class='row'><div class='col-md-12'><div class='alert alert-danger'>
		          Tidak ada data jadwal yang dipilih untuk dihapus<br><br>
		          <a href='admin.php?page=$hari' class='btn btn-primary btn-sm'>
		          Kembali ke halaman sebelumnya</a></div></div></div>";
        }
        else {
            $cekid  =   $_POST['jadwalid'];
            for($i=0;$i<count($cekid);$i++) {
                mysql_query("DELETE FROM $hari WHERE id='$cekid[$i]'");
                echo "<script>window.location='admin.php?page=$hari';</script>";
            }
        }
    }
}

/*
 * Ini adalah bagian untuk pengeditan
 * Ada 2 bagian
 */

if($page=='multiaksi' && $aksi=='edit_one') {
    // Memanggil fungsi pengambilan data dari id
    $data   =   $fquery->getOne($hari,$id);
    // membuat form edit
    echo "<div class='row'>
              <div class='col-lg-12'>
                <div class='box'>
                  <header>
                    <div class='icons'>
                      <i class='fa fa-pencil-square-o'></i>
                    </div>
                      <h5 class='text-info'>EDIT DATA JADWAL PELAJARAN HARI JUMAT</h5>
                    <div class='toolbar'>
                      <nav style='padding: 8px;'>
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
                  <div id='calendar_content' class='body'>
                  <div class='row well'>";
    echo "<form action='' method='POST'>";
    echo "<input type='hidden' name='id_jadwal' value='".$data['id']."' class='form-control'>";
    echo "<div class='form-group'><label class='control-label col-lg-4'>Waktu mulai pelajaran</label>
          <div class='col-lg-8'><input type='text' name='mulai' value='".$data['waktu_awal']."' class='form-control'></div></div>";
    echo "<div class='form-group'><label class='control-label col-lg-4'>Waktu selesai pelajaran</label>
          <div class='col-lg-8'><input type='text' name='selesai' value='".$data['waktu_akhir']."' class='form-control'></div></div>";
    echo "<div class='form-group'><label class='control-label col-lg-4'>Jam ke</label>
          <div class='col-lg-8'><input type='text' name='jam_ke' value='".$data['jam_ke']."' class='form-control'></div></div>";
    // combobox data guru
    echo "<div class='form-group'><label class='control-label col-lg-4'>Pilih guru</label>
          <div class='col-lg-8'><select name='kd_guru' class='form-control'>";
    foreach ($guru as $row) {
    echo "<option value='".$row['kode_guru']."'";
    echo  $row['kode_guru']==$data['kode_guru'] ? 'selected' : '';
    echo ">$row[nama]";
    echo "</option>";
    } // end of looping data guru
    echo "</select></div></div>";
    // combobox data kelas
    echo "<div class='form-group'><label class='control-label col-lg-4'>Pilih kelas</label>
          <div class='col-lg-8'><select name='kelas_id' class='form-control'>";
    foreach ($kelas as $row) {
    echo "<option value='".$row['kelas_id']."'";
    echo  $row['kelas_id']==$data['kelas_id'] ? 'selected' : '';
    echo ">$row[nama]";
    echo "</option>";
    } // end of looping data kelas
    echo "</select></div></div>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<button name='update_one' style='margin-right: 10px' class='btn btn-primary btn-sm' type='submit'>Simpan perubahan</button>";
    echo "<a href='admin.php?page=$hari' class='btn btn-default btn-sm'>Kembali ke halaman sebelumnya</a>";
    echo "</form>";
    echo "</div></div></div></div></div>";
}

/*
 * Multiple edit
 */
else if($page=='multiaksi' && $aksi=='multi') {
    if(isset($_POST['multi_edit'])) {
        $cekid =   $_POST['jadwalid'];
        if(count($cekid) < 1) {
            echo "<br><div class='row'><div class='col-md-12'><div class='alert alert-danger'>
	              Tidak ada data jadwal yang dipilih untuk disunting<br><br>
	              <a href='admin.php?page=$hari' class='btn btn-primary btn-sm'>
	              Kembali ke halaman sebelumnya</a></div></div></div>";
        }
        else {
            for($i=0;$i<count($cekid);$i++) {
                $data   =   $fquery->getOne($hari,$cekid[$i]);
                // membuat form edit
                echo "<div class='row'>
		              <div class='col-lg-12'>
		                <div class='box'>
		                  <header>
		                    <div class='icons'>
	                      <i class='fa fa-pencil-square-o'></i>
	                    </div>
	                      <h5 class='text-info'>EDIT DATA JADWAL PELAJARAN HARI ".strtoupper($hari)."</h5>
	                    <div class='toolbar'>
	                      <nav style='padding: 8px;'>
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
                  <div id='calendar_content' class='body'>
                  <div class='row well'>";
                echo "<form action='' method='POST'>";
                echo "<input type='hidden' name='id' value='".$data['id']."' class='form-control'><br>";
                echo "<div class='form-group'><label class='control-label col-lg-4'>Waktu mulai pelajaran</label>
                      <div class='col-lg-8'><input type='text' name='mulai' value='".$data['waktu_awal']."' class='form-control'></div></div>";
                echo "<div class='form-group'><label class='control-label col-lg-4'>Waktu selesai pelajaran</label>
                      <div class='col-lg-8'><input type='text' name='selesai' value='".$data['waktu_akhir']."' class='form-control'></div></div>";
                echo "<div class='form-group'><label class='control-label col-lg-4'>Jam ke</label>
                      <div class='col-lg-8'><input type='text' name='jam_ke' value='".$data['jam_ke']."' class='form-control'></div></div>";
                // combobox data guru
                echo "<div class='form-group'><label class='control-label col-lg-4'>Pilih guru</label>
                      <div class='col-lg-8'><select name='kd_guru' class='form-control'>";
                foreach ($guru as $row) {
                echo "<option value='".$row['kode_guru']."'";
                echo $row['kode_guru']==$data['kode_guru'] ? 'selected' : '';
                echo ">$row[nama]";
                echo "</option>";
                }
                echo "</select></div></div>";
                // combobox data kelas
                echo "<div class='form-group'><label class='control-label col-lg-4'>Pilih kelas</label>
                      <div class='col-lg-8'><select name='kelas_id' class='form-control'>";
                foreach ($kelas as $row) {
                echo "<option value='".$row['kelas_id']."'";
                echo $row['kelas_id']==$data['kelas_id'] ? 'selected' : '';
                echo ">$row[nama]";
                echo "</option>";
                }
                echo "</select><br>";
                echo "<button type='submit' name='update' class='btn btn-primary btn-sm'>";
                echo "Simpan perubahan";
                echo "</button>";
                echo "</div></div>";
                echo "</form>";
                echo "</div></div></div></div></div><br>";                
            }
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "<a href='admin.php?page=$hari' class='btn btn-default btn-sm'>";
                echo "Kembali ke halaman sebelumnya";
                echo "</a><br><br>";
        }
    }
}

/* 
 * update jadwal satu record
 */

if(isset($_POST['update_one'])) {
	// variabel data inputan
    $id_jadwal  =   $_POST['id_jadwal'];
    $mulai      =   $_POST['mulai'];
    $selesai    =   $_POST['selesai'];
    $jam_ke     =   $_POST['jam_ke'];
    $guru       =   $_POST['kd_guru'];
    $kelas      =   $_POST['kelas_id'];
    $fquery->editOne($hari,$guru,$mulai,$selesai,$jam_ke,$kelas,$id_jadwal);
    // Redirect halaman
    echo "<script>window.location='admin.php?page=$hari';</script>";
}

/* 
 * update jadwal satu record dari multiple edit
 */
if(isset($_POST['update'])) {
	// variabel data inputan
    $id_jadwal  =   $_POST['id'];
    $mulai      =   $_POST['mulai'];
    $selesai    =   $_POST['selesai'];
    $jam_ke     =   $_POST['jam_ke'];
    $guru       =   $_POST['kd_guru'];
    $kelas      =   $_POST['kelas_id'];
    $query      =   "UPDATE  $hari SET kode_guru='$guru', waktu_awal='$mulai',
                     waktu_akhir='$selesai', jam_ke='$jam_ke', kelas_id='$kelas'
                     WHERE id='$id_jadwal'";
    mysql_query($query);
    echo "<script>window.location='admin.php?page=$hari';</script>";
}