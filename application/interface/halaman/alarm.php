<?php
/* 
 * *****************************************************************************
 * Filename  : alarm.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
date_default_timezone_set('Asia/jakarta');

$jam    = date("H:i");
$waktu  = $fquery->alarm();

foreach ($waktu as $row) {
    if($jam==$row['waktu']) {
        $nada   = $fquery->getNada($row['id_nada']); 
        ?>


              <audio controls autoplay >
                <source src="media/alarm/<?php echo $nada['nama_nada'];?>"
                        type="<?php echo $nada['type'];?>"/>
              </audio>
    <?php
    }
    else {
        echo "";
    }
}


