<?php
/* 
 * *****************************************************************************
 * Filename  : tambah.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$tabel      =   $_GET['hari'];
$mulai      =   $_POST['mulai'];
$selesai    =   $_POST['selesai'];
$kd_guru    =   $_POST['kd_guru'];
$jam_ke     =   $_POST['jam_ke'];
$kelasi_id  =   $_POST['kelas_id'];

$fquery->tambahJadwal($tabel,$kd_guru,$mulai,$selesai,$jam_ke,$kelasi_id);
echo "<script>window.location='admin.php?page=$tabel';</script>";

