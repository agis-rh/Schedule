<?php
/* 
 * *****************************************************************************
 * Filename  : index.php                                                      
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
 */
require_once ("application/interface/index.php");
/*
 * Program Aplikasi Jadwal Pelajaran
 * SMKN 1 Lemahsugih
 */