<?php
/* 
 * *****************************************************************************
 * Filename  : admin.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
// menyisipkan functions
require_once ("system/functions.php");
// membuat objek baru
$fquery     = new Functions();
$program    = $fquery->program();
/*
 * Template aplikasi
 * cek status login
 */
session_start();
if(empty($_SESSION['login_status'])) {
    // redirect halaman login
    header('location: login.php');
}
else {
    // Tampilkan halaman administrator
    require_once ("application/template/template.php");
}
/*
 * Program Aplikasi Jadwal Pelajaran
 * SMKN 1 Lemahsugih
 */