<?php
/* 
 * *****************************************************************************
 * Filename  : laporan.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
// menyisipkan functions
require_once ("system/functions.php");
// membuat objek baru
$fquery = new Functions();
        // Get variabel
        $hari       = strtoupper($_GET['hari']);
        $jadwal     = $_GET['jadwal'];
        $kelas      = $_GET['nama'];
        $kd_kelas   = $_GET['kelas_id'];
        
        
        // membuat objek baru
        if($jadwal=='hari') {
            require_once ("application/admin/modul/laporan/jadwal-hari.php");
        }
        
        
        else if ($jadwal=='kelas') {
            require_once ("application/admin/modul/laporan/jadwal-hari.php");
        }