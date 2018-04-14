<?php
/* 
 * *****************************************************************************
 * Filename  : konten-interface.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
$page       =   $_GET["page"];
$hari       =   date("w");
$halaman    =   "application/interface/halaman";
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
        include("$halaman/senin.php");
        break;
    
    case "selasa":
        include("$halaman/selasa.php");
        break;
    
    case "rabu":
        include("$halaman/rabu.php");
        break;
    
    case "kamis":
        include("$halaman/kamis.php");
        break;
    
    case "jumat":
        include("$halaman/jumat.php");
        break;
    
    case "sabtu":
        include("$halaman/sabtu.php");
        break;
        
    default :
        include("$halaman/$jadwal");
        break;
}
