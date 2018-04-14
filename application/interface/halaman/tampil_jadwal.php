<?php
/* 
 * *****************************************************************************
 * Filename  : tampil_jadwal.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */

if($jam_ke!='no') {
    if($jam_ke!='-') {
        $data   = $fquery->tampilJadwal($hari,$jam_ke);
        echo "<ul id='sekilas'>"; // Style ticker
        foreach($data as $row) {
            echo "<li><span class='teks'>";
            echo "<img class='gambar' src='media/photos/guru/$row[foto]'>";
            echo "Pukul $row[waktu_awal] - ".$row['waktu_akhir']." WIB<br>";
            echo "Nama guru <b>$row[nama_guru]</b><br>";
            echo "<br><i class='fa fa-book'></i> ".$row['mapel']."";
            echo "<br> Mengajar dikelas <i><b>$row[nama_kelas]</b></i></span></li>";
        }
        echo "</ul>";
    }
    else {
        echo "<h2 class='text-success'>Jam istirahat.....</h2>";
        echo "Selamat menikmati waktu istirahat anda disekolah.";
    }
}
else {
        echo "<h2 class='text-danger'> "
            ."Jadwal kosong.....</h2>";
        echo "Saat ini tidak ada data jadwal pelajaran untuk ditampilkan,"
            ." data waktu tidak sesuai dengan data waktu jam pelajaran.";
}
