<?php
date_default_timezone_set('Asia/jakarta');
echo date("H:i:s");

// Load halaman dengan kondisi waktu :::::

$jam    = date("H:i:s");
// Cek waktu

include "functions.php";
$fquery = new Functions();

$waktu  = $fquery->waktu();
foreach ($waktu as $row) {
    if($jam==$row['waktu']) {
        echo "<script>window.location='index.php';</script>";
    }
    else {
        
    }
}

