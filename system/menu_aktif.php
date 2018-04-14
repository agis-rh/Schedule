<?php
/* 
 * *****************************************************************************
 * Filename  : menu_aktif.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */

$page   =   $_GET['page'];
if($page==''){
    $dashboard  = "class='active'";
}
else {
    $dashboard  = "";
}

if($page=='waktu'){
    $waktu      = "class='active'";
}
else {
    $waktu      = "";
}

if($page=='nada'){
    $nada       = "class='active'";
}
else {
    $nada       = "";
}

if($page=='kelas'){
    $kelas      = "class='active'";
}
else {
    $kelas      = "";
}

if($page=='guru'){
    $guru       = "class='active'";
}
else {
    $guru       = "";
}

if($page=='alarm'){
    $alarm      = "class='active'";
}
else {
    $alarm      = "";
}

if($page=='pengaturan'){
    $pengaturan  = "class='active'";
}
else {
    $pengaturan  = "";
}



