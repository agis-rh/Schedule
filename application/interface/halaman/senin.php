<?php
/* 
 * *****************************************************************************
 * Filename  : senin.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */

date_default_timezone_set('Asia/jakarta');      // Zona waktu di asia/jakarta
$waktu      = date("H:i");                      // Jam
$halaman    = "application/interface/halaman/"; // Direktori
$file       = "tampil_jadwal.php";              // File
$tampil     = $halaman.$file;                   // Halaman untuk tampilkan jadwal
$hari       = "senin";                          // Berdsarkan hari

// Cek waktu

if($waktu >= '07:00' & $waktu <= '07:39') {
   $jam_ke = 1;
   require_once ("$tampil");
}

else if($waktu >= '07:40' & $waktu <= '08:19') {
   $jam_ke = 2;
   require_once ("$tampil");
}

else if ($waktu >= '08:20' & $waktu <= '08:59') {   
   $jam_ke = 3;
   require_once ("$tampil");
}

else if ($waktu >= '09:00' & $waktu <= '09:39') {
   $jam_ke = 4;
   require_once ("$tampil");
}

else if ($waktu >= '09:40' & $waktu <= '10:00') {
   $jam_ke = "-";
   require_once ("$tampil");
}

else if ($waktu >= '09:40' & $waktu <= '09:59') {
   $jam_ke = 5;
   require_once ("$tampil");
}

else if ($waktu >= '10:00' & $waktu <= '10:39') {
   $jam_ke = 6;
   require_once ("$tampil");
}

else if ($waktu >= '10:40' & $waktu <= '11:19') {
   $jam_ke = 7;
   require_once ("$tampil");
}

else if ($waktu >= '11:20' & $waktu <= '11:59') {
   $jam_ke = 8;
   require_once ("$tampil");
}

else if ($waktu >= '12:00' & $waktu <= '12:40') {
   $jam_ke = "-";
   require_once ("$tampil");
}

else {
   $jam_ke = "no";
   require_once ("$tampil");
}


