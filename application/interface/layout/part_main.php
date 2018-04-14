<?php
/* 
 * *****************************************************************************
 * Filename  : part_main.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
?>
  <div class="main">
      <div class="content">
          <div class="content_top">
    	        	<div class="wrap">
                            <h2><i class="fa fa-ul"></i>Daftar Data Guru :</h2>
		          	</div>
		          	<div class="line"> </div>
		          	<div class="wrap">
                                    <div id="load-page">
                                    <div class="ocarousel_slider">  
	      				<div class="ocarousel example_photos" data-ocarousel-perscroll="3">
			                <div class="ocarousel_window">
			                <?php
			                $data 	= $fquery->guruNull();
			                foreach ($data as $row) {
			                ?>
                                            <a href="#" title="img1">
                                                <img class="slide-image" src="media/photos/guru/<?php echo $row['foto'];?>" alt="" />
                                                <p class="slide-text"><?php echo $row['nama'];?></p>
                                            </a>
			                <?php
				        }
				        ?>
			                </div>
			               <span>           
			                <a href="#" data-ocarousel-link="left" style="float: left;" class="prev"> </a>
			                <a href="#" data-ocarousel-link="right" style="float: right;" class="next"> </a>
			               </span>
					   </div>
				     </div>
                                    </div>
				   </div>    		
    	       </div>
         </div>
      </div>

