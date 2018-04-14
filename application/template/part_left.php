<div class="media user-media">
          <div class="user-media-toggleHover">
            <span class="fa fa-user"></span> 
          </div>
          <div class="user-wrapper">
            <a class="user-link" href="">
                <img width="100" height="100" class="media-object img-thumbnail user-img" alt="User Picture" src="media/photos/kepala_sekolah/<?php echo $program['foto'];?>">
              <span class="label label-danger user-label">16</span> 
            </a> 
            <div class="media-body">
              <h5 class="media-heading">Kepala Sekolah :</h5>
              <ul class="list-unstyled user-info">
                <li><a><?php echo $program['kepala_sekolah'];?></a></li>
                <li>
                    <a href="index.php" target="_blank">
                        Goto Application
                    </a>
                </li>
                <li>
                    <a href="admin.php?page=pengaturan">
                        <i class="fa fa-pencil"></i> Sunting profil
                    </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- #menu -->
        <ul id="menu" class="">
          <li class="nav-header">Menu</li>
          <li class="nav-divider"></li>
          <li class="active">
            <a href="admin.php">
              <i class="fa fa-dashboard"></i><span class="link-title"> Dashboard page</span> 
            </a> 
          </li>
          <li class="nav-divider"></li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-globe"></i><span class="link-title"> Managemen Jadwal 
                    <span class="fa arrow"></span></span>
                </a>
                <ul>
                    <li><a href="admin.php?page=senin"><i class="fa fa-globe"></i> Senin</a></li>
                    <li><a href="admin.php?page=selasa"><i class="fa fa-globe"></i> Selasa</a></li>
                    <li><a href="admin.php?page=rabu"><i class="fa fa-globe"></i> Rabu</a></li>
                    <li><a href="admin.php?page=kamis"><i class="fa fa-globe"></i> Kamis</a></li>
                    <li><a href="admin.php?page=jumat"><i class="fa fa-globe"></i> Jumat</a></li>
                    <li><a href="admin.php?page=sabtu"><i class="fa fa-globe"></i> Sabtu</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="admin.php?page=waktu">
                    <i class="fa fa-clock-o"></i><span class="link-title"> Managemen Waktu </span>
                </a>
            </li>
            <li>
                <a href="admin.php?page=kelas">
                    <i class="fa fa-tasks"></i><span class="link-title"> Managemen Kelas </span>
                </a>
            </li>
            <li>
                <a href="admin.php?page=guru">
                    <i class="fa fa-book"></i><span class="link-title"> Managemen Guru </span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-picture-o"></i><span class="link-title"> Managemen Alarm </span>
                    <span class="fa arrow"></span>
                </a>
                <ul>
                    <li><a href="admin.php?page=nada"><i class="fa fa-music"></i> Musik Alarm</a></li>
                    <li><a href="admin.php?page=alarm"><i class="fa fa-bell"></i><span class="link-title"> Waktu Alarm </span></a></li>
                
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-wrench"></i><span class="link-title"> Pengaturan Aplikasi</span>
                <span class="fa arrow"></span>
                </a>
                
                <ul>
                    <li><a href="admin.php?page=pengaturan"><i class="fa fa-info"></i> Informasi Sekolah</a></li>
                    <li><a href="admin.php?page=akun_login"><i class="fa fa-sign-in"></i> Akun Administrator </span></a></li>
                
                </ul>
            </li>
            <li>
                <a href="admin.php?page=kalender">
                    <i class="fa fa-calendar"></i><span class="link-title"> 
                        Kalender Tahun <?php echo date("Y");?>
                    </span>
                </a>
            </li>
            <li class="nav-divider"></li>
          <li class="active">
            <a href="admin.php?page=logout">
              <i class="fa fa-power-off"></i><span class="link-title"> Logout Sistem</span> 
            </a> 
          </li>
          </ul>
        