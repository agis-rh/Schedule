<?php require_once ("system/menu_aktif.php"); ?>
<!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
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
            <div class="topnav">
              <div class="btn-group">
                <a  class="btn btn-danger btn-sm" href="admin.php?page=logout">
                  <i class="fa fa-power-off"></i>
                </a> 
                <a data-toggle="modal" data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="#helpModal">
                  <i class="fa fa-question"></i>
                </a> 
                <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen">
                  <i class="glyphicon glyphicon-fullscreen"></i>
                </a> 
              </div>
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Show / Hide Left" data-toggle="tooltip" class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                  <i class="fa fa-bars"></i>
                </a> 
                  <a id="top-btn" data-placement="bottom" data-original-title="Show / Hide Right" data-toggle="tooltip" class="btn btn-default btn-sm toggle-right"> 
                    <span class="fa fa-arrow-circle-right"></span>  </a> 
              </div>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">

              <!-- .nav -->
              <ul class="nav navbar-nav">
                  <li <?php echo $dashboard;?>>
                      <a href="admin.php">
                          <i class="fa fa-home"></i>
                          <span class="text-menu">Dashborad</span>
                    </a>
                </li>
                  <li <?php echo $waktu;?>>
                      <a href="admin.php?page=waktu">
                          <i class="fa fa-clock-o"></i>
                            <span class="text-menu">Data waktu</span>
                    </a>
                </li>
                <li <?php echo $nada;?>>
                    <a href="admin.php?page=nada">
                        <i class="fa fa-music"></i> 
                        <span class="text-menu">Data musik</span>
                    </a>
                </li>
                <li <?php echo $kelas;?>>
                    <a href="admin.php?page=kelas">
                        <i class="fa fa-tasks"></i> 
                        <span class="text-menu">Data kelas</span>
                    </a>
                </li>
                <li <?php echo $guru;?>>
                    <a href="admin.php?page=guru">
                        <i class="fa fa-book"></i>
                        <span class="text-menu">Data guru</span>
                    </a>
                </li>
                <li <?php echo $alarm;?>>
                    <a href="admin.php?page=alarm">
                        <i class="fa fa-bell"></i> 
                        <span class="text-menu">Data alarm</span>
                    </a>
                </li>
                <li <?php echo $pengaturan;?>>
                    <a href="admin.php?page=pengaturan">
                        <i class="fa fa-wrench"></i> 
                        <span class="text-menu">Pengaturan</span>
                    </a>
                </li>
              </ul><!-- /.nav -->
            </div>
          </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->
        <header class="head">
          <div class="search-bar">
            <form class="main-search" action="">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Pencarian data jadwal ...">
                <span class="input-group-btn">
            <button class="btn btn-primary btn-sm text-muted" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span> 
              </div>
            </form><!-- /.main-search -->
          </div><!-- /.search-bar -->
          <div class="main-bar">
            <h3>
                <i class="fa fa-facebook-square"></i> <b>IBeESNay</b><span style="font-size: 20px">&trade;</span>
                <span id="waktu" class="text-info" style="float: right; font-size: 20px;
                    border-bottom: 2px solid #252525; padding-bottom: 5px">
                  <i class="fa fa-calendar"></i>  
                  <?php
                  echo tanggal(date("Y-m-d"));
                  ?>
                  <i class="fa fa-clock-o"></i>
                  <span id="jam">

                  </span>
                  <span class="text-info">
                      WIB
                  </span>
                  
              </span></h3>
          </div><!-- /.main-bar -->
        </header><!-- /.head -->