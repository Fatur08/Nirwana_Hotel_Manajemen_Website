
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="img/user.png" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php echo $user['name'];?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Manager</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
    <?php 
        if (isset($_GET['home'])){ ?>
            <li class="active">
                <a href="index.php?home"><em class="fa fa-dashboard">&nbsp;</em>
                    Home
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?home"><em class="fa fa-dashboard">&nbsp;</em>
                    Home
                </a>
            </li>
        <?php }
        if (isset($_GET['reservasi'])){ ?>
            <li class="active">
            <a href="index.php?reservasi"><em class="fa fa-calendar">&nbsp;</em>
                    Reservasi
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="index.php?reservasi"><em class="fa fa-calendar">&nbsp;</em>
                    Reservasi
                </a>
            </li>
        <?php }
        if (isset($_GET['kamar'])){ ?>
            <li class="active">
                <a href="index.php?kamar"><em class="fa fa-bed">&nbsp;</em>
                    Kamar
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="index.php?kamar"><em class="fa fa-bed">&nbsp;</em>
                    Kamar
                </a>
            </li>
        <?php }
        if (isset($_GET['laporan'])){ ?>
            <li class="active">
                <a href="index.php?laporan"><em class="fa fa-pie-chart">&nbsp;</em>
                    Laporan
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="index.php?laporan"><em class="fa fa-pie-chart">&nbsp;</em>
                    Laporan
                </a>
            </li>
            
        <?php }
        if (isset($_GET['karyawan'])){ ?>
            <li class="active">
                <a href="index.php?karyawan"><em class="fa fa-users">&nbsp;</em>
                    Karyawan
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?karyawan"><em class="fa fa-users">&nbsp;</em>
                    Karyawan
                </a>
            </li>
        <?php }
        if (isset($_GET['keluhan'])){ ?>
            <li class="active">
                <a href="index.php?keluhan"><em class="fa fa-comments">&nbsp;</em>
                    Keluhan
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?keluhan"><em class="fa fa-comments">&nbsp;</em>
                    Keluhan
                </a>
            </li>
        <?php }
        ?>

        
    </ul>
</div><!--/.sidebar-->