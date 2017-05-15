<div class="sidebar-toggle-box">
    <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
</div>

<!--logo start-->
<a href="<?php echo site_url().'panel/home'; ?>" class="logo">Panel<span> Admin</span></a>
<!--logo end-->

<div class="top-nav ">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <?php 
                if ($this->session->userdata('a_avatar')) {
                    $avatar = $this->session->userdata('a_avatar');                
                } else {
                    $avatar = 'no_image.png';
                }
                ?>
                <img src="<?php echo base_url(); ?>avatar/<?php echo $avatar; ?>" heigth="25" width="25">
                <span class="username"><?php echo $this->session->userdata('a_nama_lengkap'); ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li><a href="<?php echo site_url().'panel/setting'; ?>"><i class="icon-cog"></i>Setting Wisuda</a></li>
                <li><a href="<?php echo site_url().'panel/profile'; ?>"><i class="icon-suitcase"></i>Profile</a></li>
                <li><a href="<?php echo site_url().'panel/import'; ?>"><i class="icon-file"></i>Import Data</a></li>
                <li><a href="<?php echo site_url().'panel/home/logout'; ?>"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>