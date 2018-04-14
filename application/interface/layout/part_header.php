<?php
/* 
 * *****************************************************************************
 * Filename  : part_header.php
 * Creator   : IBeESNay                                   
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
?>

<span class="cek_waktu">
    
</span>
<div class="top">
    <nav class="navbar navbar-inverse navbar-fixed-top" style="border-top: 3px solid #000">
          <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
            </header>
            <div class="navbar-top-links navbar-right" style=" margin-top: 10px;">
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                 <ul class="nav navbar-nav">
                     <li style="margin-right: 30px">
                      <a href="index.php">
                          
                          <span style="font-size: 23px">
                              &reg; Sistem Informasi Akademik - SIJP <?php echo date("Y");?>                          </span>
                          
                      </a>
                  </li>
                  <li>
                    <a>
                        <span style="text-transform: uppercase; color: white">
                            <?php echo $program['nama_sekolah'];?>
                        </span>
                    </a>
                </li>
              </ul><!-- /.nav -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" 
                       data-toggle="dropdown">
                        Jadwal Berdasarkan Hari &nbsp;
                        <span class="caret"></span>
                    </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="load" href="jadwal.php?hari=senin"><span class="putih">Senin</span></a></li>
                            <li><a class="load" href="jadwal.php?hari=selasa">Selasa</a></li>
                            <li><a class="load" href="jadwal.php?hari=rabu">Rabu</a></li>
                            <li><a class="load" href="jadwal.php?hari=kamis">Kamis</a></li>
                            <li><a class="load" href="jadwal.php?hari=jumat">Jumat</a></li>
                            <li><a class="load" href="jadwal.php?hari=sabtu">Sabtu</a></li>
                            
                        </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i></a></li>
                </ul>

              
            </div>
          </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->
</div>
<div class="header" style="margin-top: 50px">
  	  		<div class="wrap">
				<div class="header_top">
					<div class="logo">
                                            <a href="index.php">
                                            <?php require_once ("application/interface/halaman/logo_flash.php");?>
                                            <!--<img src="images/logo.png"> !--></a>
					</div>
						<div class="header_top_right">
							  <div class="search_box">
                                                              <span><i class="fa fa-search"></i> Pencarian</span>
					     		<form>
                                                            <input class="form-control-static" type="text" value=""><input type="submit" value="">
					     		</form>
					     		<div class="clear"></div>
					     	</div>
					</div>
			     <div class="clear"></div>
  		    </div>     
  		     
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="well">
                                            <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <i class="fa fa-clock-o"></i> Waktu menunjukan pukul : 
                                        </div>
                                                <div class="panel-body"> 
                                                    <div class="row">
                                                        <div class="col-sm-7">
                                                       <?php require_once ("application/interface/halaman/jam_flash.php");?>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="alert alert-warning">
                                                            <p style="font-size: 20px; ">
                                                                <i class="fa fa-bell"></i> WIB<br> 
                                                                <span id="jam">
                                                                    
                                                                </span>
                                                                <br>
                                                                
                                                            </p>
                                                            </div>
                                                            <div class="alert alert-danger">
                                                            <p style="font-size: 20px; ">
                                                                <a href="login.php" class="btn btn-md btn-danger">
                                                                    <i class="fa fa-sign-in"></i> Login
                                                                </a>
                                                                <br>
                                                                
                                                            </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    require_once ("application/interface/halaman/alarm.php");
                                                    ?>
                                                    <hr>
                                                    <div class="alert alert-success">
                                                    <p style="font-size: 20px; ">
                                                    <?php echo tanggal(date("Y-m-d")); ?>
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="well">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-desktop"></i> Sistem Informasi Jadwal Pelajaran Tahun <?php echo date("Y");?>
                        </div>
                        <div class="panel-body">
                          
                            <h2><i class="fa fa-desktop"></i> Daftar Jadwal Kegiatan KBM :</h2>
                                            
                    </div>

                                     </div>
                                            <div class="alert alert-info">
                                                <p style="font-size: 18px; ">
                                                    <?php
                                                    require_once 'system/konten-interface.php';
                                                    ?>
                                                </p>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
   		</div>
   </div>


<script>
    function jam(){
        $.ajax({
            url: "system/jam_interface.php",
            cache: false,
            success: function(msg){
                $("#jam").html(msg);
            }
        });
            var waktu = setTimeout("jam()",500);
        }
        $(document).ready(function(){
            jam();
        });
    </script>
