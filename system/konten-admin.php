<?php
/* 
 * *****************************************************************************
 * Filename  : konten.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$page   =   $_GET["page"];
$hari   =   date("w");
function hari($hari){
        switch ($hari) {
            case 1:
                return "senin";
                break;
            case 2:
                return "selasa";
                break;
            case 3:
                return "rabu";
                break;
            case 4:
                return "kamis";
                break;
            case 5:
                return "jumat";
                break;
            case 6:
                return "sabtu";
                break;
            case 7:
                return "minggu";
                break;
            
        }
}
$hari   =    hari($hari);
$jadwal =   "$hari.php";

switch ($page){
    case "senin":
        include("application/admin/senin.php");
        break;
    
    case "selasa":
        include("application/admin/selasa.php");
        break;
    
    case "rabu":
        include("application/admin/rabu.php");
        break;
    
    case "kamis":
        include("application/admin/kamis.php");
        break;
    
    case "jumat":
        include("application/admin/jumat.php");
        break;
    
    case "sabtu":
        include("application/admin/sabtu.php");
        break;
    
    case "pengaturan":
        include("application/admin/pengaturan.php");
        break;
    
    case "details_jadwal":
        include("application/admin/jadwal-kelas.php");
        break;
    
    case "kelas":
        include("application/admin/kelas.php");
        break;
    
    case "guru":
        include("application/admin/guru.php");
        break;
    
    case "alarm":
        include("application/admin/alarm.php");
        break;
    
    case "waktu":
        include("application/admin/waktu.php");
        break;
    
    case "nada":
        include("application/admin/nada.php");
        break;
    
    case "kalender":
        include("application/admin/kalender.php");
        break;
    
    case "akun_login":
        include("application/admin/akun_login.php");
        break;
    
    case "tambah":
        include("application/admin/modul/jadwal/tambah.php");
        break;
    
    case "multiaksi":
        include("application/admin/modul/jadwal/multi-aksi.php");
        break;
    
    case "multiaksi_kelas":
        include("application/admin/modul/kelas/multi-aksi.php");
        break;
    
    case "multiaksi_guru":
        include("application/admin/modul/guru/multi-aksi.php");
        break;
    
    case "multiaksi_waktu":
        include("application/admin/modul/waktu/multi-aksi.php");
        break;
    
    case "multiaksi_alarm":
        include("application/admin/modul/alarm/multi-aksi.php");
        break;
    
    case "multiaksi_nada":
        include("application/admin/modul/nada/multi-aksi.php");
        break;
    
    case "jadwal_hari":
        include("application/admin/modul/laporan/jadwal-hari.php");
        break;
    
    case "jadwal_kelas":
        include("application/admin/modul/laporan/jadwal-kelas.php");
        break;
    
    case "error_upload":
        include("system/error/error_upload.php");
        break;
    
    case "logout":
        include("application/admin/logout.php");
        break;
    
    default :
        include("application/admin/$jadwal");
        break;
}
