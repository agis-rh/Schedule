<?php
/* 
 * *****************************************************************************
 * Filename  : tanggal.php                                                      
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
// Format tanggal yyyy/mm/dd
    function tanggal($tanggal){
        $tgl_hari   = substr($tanggal,8,2);
        $tgl_bulan  = getBulan(substr($tanggal,5,2));
        $tgl_thn    = substr($tanggal,0,4);
        $hari_ini   = getHari(date("w"));

        return $hari_ini.', '.$tgl_hari.' '.$tgl_bulan.' '.$tgl_thn;
    }
    
    function getBulan($bln){
        switch ($bln){
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                
                
        }
    }
    
    function getHari($hari){
        switch ($hari) {
            case 1:
                return "Senin";
                break;
            case 2:
                return "Selasa";
                break;
            case 3:
                return "Rabu";
                break;
            case 4:
                return "Kamis";
                break;
            case 5:
                return "Jum'at";
                break;
            case 6:
                return "Sabtu";
                break;
            default:
                return "Minggu";
                break;
            
        }
    }
