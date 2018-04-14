<?php
/* 
 * *****************************************************************************
 * Filename  : functions.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay        
 *                  
 * *****************************************************************************
 * 
 * OOP System || Object Oriented Programming
 */

error_reporting('E_WARNING | E_NOTICE');

// Menyisipkan file
require_once ("databases.php");
require_once ("tanggal.php");
require_once ("fpdf/fpdf.php");

class Functions {
    // konstrak
    public function __construct() {
        $db= new Databases();
    }
     
    
/*
 * Information Administrator
 * Sistem Tentang Informasi Akun Administrator
 */
    
    
    public function updateAkun($user,$nama) {
        $query  = "UPDATE login SET user='$user', nama_lengkap='$nama' "
                . "WHERE login_id='1'";
        mysql_query($query);
    }
    
    
    
    
    public function updateAkunPass($user,$pass,$nama) {
        $query  = "UPDATE login SET user='$user', pass='$pass', nama_lengkap='$nama' "
                . "WHERE login_id='1'";
        mysql_query($query);
    }
    
    
    
    public function getAkun() {
        $query  = "SELECT * FROM login WHERE login_id='1'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
    }
     
    
 /*
 * Information Program
 * Sistem Tentang Informasi Program Aplikasi
 */
    
    
    public function program() {
        $query  = "SELECT * FROM pengaturan WHERE id='1'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
    }
    
    
    
    
    public function updateProgramFoto($nm_sek,$ala_sek,$kpla_sek,$foto) {
        $query  = "UPDATE pengaturan SET nama_sekolah='$nm_sek', alamat_sekolah='$ala_sek',"
                . "kepala_sekolah='$kpla_sek', foto='$foto' WHERE id='1'";
        mysql_query($query);
    }
    
    
    
    
    public function updateProgram($nm_sek,$ala_sek,$kpla_sek) {
        $query  = "UPDATE pengaturan SET nama_sekolah='$nm_sek', alamat_sekolah='$ala_sek',"
                . "kepala_sekolah='$kpla_sek' WHERE id='1'";
        mysql_query($query);
    }
    

/*
 * Schedule System
 * Sistem Managemen Jadwal Pelajaran
 * Fungsi CRUD data
 */
    
   
    public function tampilJadwal($tabel,$jam_ke) {
        $query  = "SELECT g.nama as nama_guru, g.kode_guru, g.mapel, j.jam_ke,
                   j.waktu_awal, j.waktu_akhir, k.nama as nama_kelas, j.id, g.foto 
                   FROM guru AS g, $tabel AS j, kelas AS k WHERE k.kelas_id = 
                   j.kelas_id && j.kode_guru = g.kode_guru && j.jam_ke='$jam_ke' 
                   ORDER BY j.waktu_awal";

        $data=mysql_query($query);
        while($row =  mysql_fetch_array($data)) {
              $hasil[]    =   $row;
        }
        
        return $hasil;
    }
    
    
    public function jadwal($table) {
        $query  = "SELECT g.nama as nama_guru, g.kode_guru, g.mapel, j.jam_ke,
                   j.waktu_awal, j.waktu_akhir, k.nama as nama_kelas, j.id 
                   FROM guru AS g, $table AS j, kelas AS k WHERE k.kelas_id = 
                   j.kelas_id && j.kode_guru = g.kode_guru ORDER BY j.waktu_awal";
        
        $data=mysql_query($query);
        while($row =  mysql_fetch_array($data)) {
            $hasil[]    =   $row;
        }

        return $hasil;
    }
    

    
    
    public function jumlahJadwal($table) {
        $query  = "SELECT g.nama as nama_guru, g.kode_guru, g.mapel, j.jam_ke,
                   j.waktu_awal, j.waktu_akhir, k.nama as nama_kelas, j.id 
                   FROM guru AS g, $table AS j, kelas AS k WHERE k.kelas_id = 
                   j.kelas_id && j.kode_guru = g.kode_guru ORDER BY j.jam_ke";
        
        $data   = mysql_query($query);
        $hasil  = mysql_num_rows($data);

        return $hasil;
    }
    
    
    
    public function pagingJadwal($table,$posisi,$batas) {
        $query  = "SELECT g.nama as nama_guru, g.kode_guru, g.mapel, j.jam_ke,
                   j.waktu_awal, j.waktu_akhir, k.nama as nama_kelas, j.id 
                   FROM guru AS g, $table AS j, kelas AS k WHERE k.kelas_id = 
                   j.kelas_id && j.kode_guru = g.kode_guru ORDER BY j.waktu_awal
                   LIMIT $posisi,$batas";
        
        $data=mysql_query($query);
        while($row =  mysql_fetch_array($data)) {
            $hasil[]    =   $row;
        }

        return $hasil;
    }




    public function getOne($tabel,$id){
        $query  =   "SELECT * FROM $tabel WHERE id='$id'";
        $data   =   mysql_query($query);
        $row    =   mysql_fetch_array($data);
        
        return $row;
    }
    

    
    
    public function editOne($tabel,$kd_guru,$mulai,$selesai,$jam_ke,$kelas_id,$id) {
        $query  =   "UPDATE  $tabel SET kode_guru='$kd_guru', waktu_awal='$mulai',
                     waktu_akhir='$selesai', jam_ke='$jam_ke', kelas_id='$kelas_id'
                     WHERE id='$id'";
        mysql_query($query);
        
    }
    
    

    public function hapus($tabel,$id){
        $query  =   "DELETE FROM $tabel WHERE id='$id'";
        mysql_query($query);
    }
    



    public function tambahJadwal($tabel,$kd_guru,$mulai,$selesai,$jam_ke,$kelas_id) {
        $query  =   "INSERT INTO $tabel VALUES
                     ('','$kd_guru','$mulai','$selesai','$jam_ke','$kelas_id')";
        
        mysql_query($query);
        
    }

    
    
    public function jumlahJadwalKelas($tabel,$kelas_id) {
        $query  = "SELECT j.jam_ke, j.id, j.waktu_awal AS mulai, j.waktu_akhir
                   AS akhir, g.kode_guru AS kode, g.nama, g.mapel FROM guru AS g, 
                   $tabel AS j, kelas AS k WHERE j.kode_guru = g.kode_guru && 
                   k.kelas_id = j.kelas_id && j.kelas_id IN ('$kelas_id', '0')
                   ORDER BY mulai";
        $data   = mysql_query($query);
        $hasil  = mysql_num_rows($data);

        return $hasil; 
    }
    
    
    
    
    public function jadwalKelas($tabel,$kelas_id) {
        $query  = "SELECT j.jam_ke, j.id, j.waktu_awal AS mulai, j.waktu_akhir
                   AS akhir, g.kode_guru AS kode, g.nama, g.mapel FROM guru AS g, 
                   $tabel AS j, kelas AS k WHERE j.kode_guru = g.kode_guru && 
                   k.kelas_id = j.kelas_id && j.kelas_id IN ('$kelas_id', '0')
                   ORDER BY mulai";
        $data=mysql_query($query);
        
        while($row =  mysql_fetch_array($data)) {
            $hasil[]    =   $row;
        }

        return $hasil; 
    }
    

/*
 * Class Managemen System
 * Pengelolaan CRUD data kelas
 */
    
    public function kelas() {
        $query  = "SELECT * FROM kelas ORDER BY nama";
        $data   = mysql_query($query);
        
        while($row =  mysql_fetch_array($data)) {
            $hasil[]    =   $row;
        }

        return $hasil;
    }
    
    
    
    public function kelasNull() {
        $query  = "SELECT * FROM kelas WHERE kelas_id!='0' ORDER BY nama";
        $data   = mysql_query($query);
        
        while($row =  mysql_fetch_array($data)) {
            $hasil[]    =   $row;
        }

        return $hasil;
    }
    
    
    
    public function jumlahKelas() {
        $query  = "SELECT * FROM kelas WHERE kelas_id!='0'";
        $data   = mysql_query($query);
        $jumlah = mysql_num_rows($data);
        
        return $jumlah;
    }
    
    
    
    public function pagingKelas($posisi,$batas) {
        $query  = "SELECT * FROM kelas WHERE kelas_id!='0' ORDER BY nama LIMIT 
        		   $posisi,$batas";
        $data   = mysql_query($query);
        
        while($row =  mysql_fetch_array($data)) {
            $hasil[]    =   $row;
        }

        return $hasil;
    }
    
    
    
    public function hapusKelas($id) {
        $query  = "DELETE FROM kelas WHERE kelas_id='$id'";
        mysql_query($query);
    }
    

    

    public function updateKelas($nama,$kelas_id) {
        $query  =   "UPDATE kelas SET nama='$nama' WHERE kelas_id='$kelas_id'";
        mysql_query($query);
    }




    public function tambahKelas($nama) {
        $query  =   "INSERT INTO kelas VALUES ('','$nama')";
        mysql_query($query);
    }

    
/*
 * Teacher Managemen System
 * Pengelolaan data guru
 */
    

    public function guru() {
        $query  = "SELECT * FROM guru ORDER BY kode_guru";
        $data   = mysql_query($query);
        
        while($row =  mysql_fetch_array($data)) {
            $hasil[]    =   $row;
        }
        
        return $hasil;
    }
    
    
    
    
    public function getGuru($kd_guru) {
        $query  = "SELECT * FROM guru WHERE kode_guru='$kd_guru'";
        $data   = mysql_query($query);
        
        $hasil  =  mysql_fetch_array($data);
        return $hasil;
    }
    
    
    
    
    public function guruNull() {
        $query  = "SELECT * FROM guru WHERE kode_guru!='0' ORDER BY kode_guru";
        $data   = mysql_query($query);
        
        while($row =  mysql_fetch_array($data)) {
            $hasil[]    =   $row;
        }
        
        return $hasil;
    }
    
    
    
    public function jumlahGuru() {
        $query  = "SELECT * FROM guru WHERE kode_guru!='0'";
        $data   = mysql_query($query);
        $jumlah = mysql_num_rows($data);
        
        return $jumlah;
    }
    
    
    
    public function pagingGuru($posisi,$batas) {
        $query  = "SELECT * FROM guru WHERE kode_guru!='0' ORDER BY kode_guru";
        $data   = mysql_query($query);
        
        while($row =  mysql_fetch_array($data)) {
            $hasil[]    =   $row;
        }
        
        return $hasil;
    }
    
    
    
    
    public function tambahGuru($kode,$nama,$mapel,$filename) {
        $query  = "INSERT INTO guru values('$kode','$nama','$mapel','$filename')";
        mysql_query($query);
    }
    
    
    
    
    public function updateGuru($kode_baru,$nama,$mapel,$kode_lama) {
        $query  = "UPDATE guru SET kode_guru='$kode_baru', nama='$nama',
                   mapel='$mapel' WHERE kode_guru='$kode_lama'";
        mysql_query($query);
    }
    
    
    
    
     public function updateGuruFoto($kode_baru,$nama,$mapel,$foto,$kode_lama) {
        $query  = "UPDATE guru SET kode_guru='$kode_baru', nama='$nama',
                   mapel='$mapel', foto='$foto' WHERE kode_guru='$kode_lama'";
        mysql_query($query);
     }
    
    
    
    
    public function hapusGuru($kode_guru) {
        $query  = "DELETE FROM guru WHERE kode_guru='$kode_guru'";
        mysql_query($query);
    }
    
    
/*
 * Alarm System
 * Pengelolaan sistem alarm atau bell
 */
    
    
    public function alarm($posisi,$batas) {
        $query  = "SELECT * FROM alarm ORDER BY waktu";
        $data   = mysql_query($query);
        
        while ($row = mysql_fetch_array($data)) {
            $hasil[]    = $row;
        }
        
        return $hasil;
    }
    
    
    
    public function jumlahAlarm() {
        $query  = "SELECT * FROM alarm";
        $data   = mysql_query($query);
        $jumlah = mysql_num_rows($data);
        
        return $jumlah;
    }
    
    
    
    public function pagingAlarm($posisi,$batas) {
        $query  = "SELECT * FROM alarm ORDER BY waktu LIMIT $posisi,$batas";
        $data   = mysql_query($query);
        
        while ($row = mysql_fetch_array($data)) {
            $hasil[]    = $row;
        }
        
        return $hasil;
    }
    
    
    
    public function getAlarm($id_alarm) {
        $query  = "SELECT * FROM alarm WHERE id_alarm='$id_alarm'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
    }
    
    
    
    public function tambahAlarm($topik,$waktu,$nada,$keterangan) {
        $query  = "INSERT INTO alarm VALUES('','$topik','$waktu','$nada',"
                  ."'$keterangan')";
        mysql_query($query);
    }
    
    
    
    public function hapusAlarm($id) {
        $query  = "DELETE FROM alarm WHERE id_alarm='$id'";
        mysql_query($query);
    }
    
    
    
    public function updateAlarm($topik,$waktu,$nada,$keterangan,$id) {
        $query  = "UPDATE alarm SET topik='$topik', waktu='$waktu', id_nada='$nada',
                   keterangan='$keterangan' WHERE id_alarm='$id'";
        mysql_query($query);
    }
    
/*
 * File Music System
 * Pengelolaan File Nada Untuk Alarm
 */
    
    
    public function nada() {
        $query  = "SELECT * FROM nada";
        $data   = mysql_query($query);

        while ($row = mysql_fetch_array($data)) {
               $hasil[]    = $row;
        }

        return $hasil;
    }
    
    
    public function jumlahNada() {
        $query  = "SELECT * FROM nada";
        $data   = mysql_query($query);
        $jumlah = mysql_num_rows($data);
        
        return $jumlah;
    }
    
    
    
    public function pagingNada($posisi,$batas) {
        $query  = "SELECT * FROM nada ORDER BY id_nada LIMIT $posisi,$batas";
        $data   = mysql_query($query);
        
        while ($row = mysql_fetch_array($data)) {
            $hasil[]    = $row;
        }
        
        return $hasil;
    }
    
    
    
    
    public function tambahNada($judul,$nama_file,$type,$ukuran) {
        $query  = "INSERT INTO nada VALUES('','$judul','$nama_file','$type','$ukuran')";
        mysql_query($query);
    }
    
    
    
    public function getNada($id_nada) {
        $query  = "SELECT * FROM nada WHERE id_nada='$id_nada'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
    }
    
    
    
    
    public function hapusNada($id) {
        $query  = "DELETE FROM nada WHERE id_nada='$id'";
        mysql_query($query);
    }
    
    
    
    
    public function updateNada($judul,$id) {
        $query  = "UPDATE nada SET judul='$judul' WHERE id_nada='$id'";
        mysql_query($query);
    }
    
    
    
/*
 * Security Access
 * Sistem Keamanan Hak Akses Managemen Aplikasi
 * @ Sistem Login
 * @ Sistem logout
 */
    
    
    public function waktu() {
        $query  = "SELECT * FROM waktu ORDER BY waktu";
        $data   = mysql_query($query);
        
        while ($row = mysql_fetch_array($data)) {
            $hasil[]    = $row;
        }
        
        return $hasil;
    }
    
    
    
    
    public function jumlahWaktu() {
        $query  = "SELECT * FROM waktu ORDER BY waktu";
        $data   = mysql_query($query);
        $hasil  = mysql_num_rows($data);
        
        return $hasil;
    }
    
    
    
    
    public function pagingWaktu($posisi,$batas) {
        $query  = "SELECT * FROM waktu ORDER BY waktu LIMIT $posisi,$batas";
        $data   = mysql_query($query);
        
        while ($row = mysql_fetch_array($data)) {
            $hasil[]    = $row;
        }
        
        return $hasil;
    }
    
    
    
    public function updateWaktu($waktu,$keterangan,$id) {
        $query  = "UPDATE waktu SET waktu='$waktu', keterangan='$keterangan' "
                . "WHERE id_waktu='$id'";
        mysql_query($query);
    }
    
    
    
    public function tambahWaktu($waktu,$keterangan) {
        $query  = "INSERT INTO waktu VALUES('','$waktu','$keterangan')";
        mysql_query($query);
    }
    
    
    public function hapusWaktu($id) {
        $query  = "DELETE FROM waktu WHERE id_waktu='$id'";
        mysql_query($query);
    }  
    
    
/*
 * Security Access
 * Sistem Keamanan Hak Akses Managemen Aplikasi
 * @ Sistem Login
 * @ Sistem logout
 */
    
    public function loginSystem($username,$password) {
        $query  = "SELECT * FROM login WHERE user='$username'
                   AND pass='$password' AND blokir='0'";
        $data   = mysql_query($query);
        
        return $data;
    }
    
    
    
    public function logoutSystem() {
        session_start();
        session_destroy();
        echo "<script>window.location='index.php';</script>";
    }
    
    /* end of class Functions */
}

