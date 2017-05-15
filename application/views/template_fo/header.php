<?php 
    $kontak = $this->menu_model->select_kontak()->row(); 
?>

<?php 
$uri = $this->uri->segment(1);

if ($uri == '') {
    $home = 'active';
    $register = '';
    $lowker = '';
    $info = '';
    $login = '';
    $akun   = '';
    $hubungi = '';
} elseif($uri == 'wisuda' || $uri == 'daftar' || $uri == 'pengguna' || $uri == 'orangtua') {
    $home = '';
    $register = 'active';
    $lowker = '';
    $info = '';
    $login = '';
    $akun   = '';
    $hubungi = '';
} elseif ($uri == 'lowongankerja') {
    $home = '';
    $register = '';
    $lowker = 'active';
    $info = '';
    $login = '';
    $akun   = '';
    $hubungi = '';
} elseif ($uri == 'infopenting') {
    $home = '';
    $register = '';
    $lowker = '';
    $info = 'active';
    $login = '';
    $akun   = '';
    $hubungi = '';
} elseif ($uri == 'login') {
    $home = '';
    $register = '';
    $lowker = '';
    $info = '';
    $login = 'active';
    $akun   = '';
    $hubungi = '';
} elseif ($uri == 'account') {
    $home = '';
    $register = '';
    $lowker = '';
    $info = '';
    $login = '';
    $akun   = 'active';
    $hubungi = '';
} elseif ($uri == 'hubungikami') {
    $home = '';
    $register = '';
    $lowker = '';
    $info = '';
    $login = '';
    $akun   = '';
    $hubungi = 'active';
} else {
    $home = 'active';
    $register = '';
    $lowker = '';
    $info = '';
    $login = '';
    $akun   = '';
    $hubungi = '';
}  

?>
<div class="navigation-wrapper">
    <div class="secondary-navigation-wrapper">
        <div class="container">
            <div class="navigation-contact pull-left">Selamat Datang,  <span class="opacity-70"><?php if ($this->session->userdata('user_id')) { echo $this->session->userdata('nama_lengkap'); } else { echo 'Pengunjung'; } ?></span></div>
            <ul class="secondary-navigation list-unstyled pull-right">                
                <li><a href="<?php echo site_url('seputar'); ?>">Seputar</a></li>
                <li><a href="<?php echo site_url('agendaalumni'); ?>">Agenda</a></li>                
                <li><a href="<?php echo site_url('statistik'); ?>">Statistik</a></li>               
            </ul>
        </div>
    </div><!-- /.secondary-navigation -->
    <div class="primary-navigation-wrapper">
        <header class="navbar" id="top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo-header.png" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="<?php echo $home; ?>">
                            <a href="<?php echo base_url(); ?>">Beranda</a>                           
                        </li>
                        <li class="<?php echo $info; ?>">
                            <a href="<?php echo site_url('infopenting'); ?>">Info Penting</a>
                        </li>
                        <li class="<?php echo $register; ?>">
                            <a href="#" class="has-child no-link">Register & Pengguna</a>
                            <ul class="list-unstyled child-navigation">
                                <li><a href="<?php echo site_url('wisuda/daftar'); ?>">Pendaftaran Wisuda</a></li>
                                <li><a href="<?php echo site_url('daftar'); ?>">Pendaftaran Alumni</a></li>
                                <li><a href="<?php echo site_url('pengguna'); ?>">Pengguna Alumni</a></li>
                                <li><a href="<?php echo site_url('orangtua'); ?>">Kuesioner Orang Tua</a></li>
                            </ul>
                        </li>
                        <li class="<?php echo $lowker; ?>">
                            <a href="<?php echo site_url('lowongankerja'); ?>">Lowongan Kerja</a>                           
                        </li>
                        <?php if (!$this->session->userdata('user_id')) { ?>
                        <li class="<?php echo $login; ?>">
                            <a href="<?php echo site_url('login'); ?>">Login</a>                           
                        </li>
                        <?php } else { ?>
                         <li class="<?php echo $akun; ?>">
                            <a href="#" class="has-child no-link">Account</a>
                            <ul class="list-unstyled child-navigation">
                                <li><a href="<?php echo site_url('account'); ?>">My Account</a></li>
                                <li><a href="<?php echo site_url('login/logout'); ?>">Log Out</a></li>
                            </ul>
                        </li>                                        
                        <?php } ?>
                        <li class="<?php echo $hubungi; ?>">
                            <a href="<?php echo site_url('hubungikami'); ?>">Hubungi Kami</a>
                        </li>
                    </ul>
                </nav><!-- /.navbar collapse-->
            </div><!-- /.container -->
        </header><!-- /.navbar -->
    </div><!-- /.primary-navigation -->
    <div class="background">
        <img src="<?php echo base_url(); ?>file_fo/assets/img/background-city.png"  alt="background">
    </div>
</div>