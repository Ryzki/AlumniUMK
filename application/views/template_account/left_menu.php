<?php
$uri  = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);

if ($uri == 'wisuda' && $uri2 == '') {
	$daftar = '';
	$wisuda = 'active';
	$akun = '';
	$keg = '';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = '';
	$alumni = '';
} elseif ($uri == 'wisuda' && $uri2 == 'daftar') {
	$daftar = 'active';
	$wisuda = '';
	$akun = '';
	$keg = '';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = '';
	$alumni = '';
} elseif ($uri == 'account') {
	$daftar = '';
	$wisuda = '';
	$akun = 'active';	
	$keg = '';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = '';
	$alumni = '';
} elseif ($uri == 'kegiatan') {
	$daftar = '';
	$wisuda = '';
	$akun = '';	
	$keg = 'active';
	$kegiatan = 'active';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = '';	
	$alumni = '';
} elseif ($uri == 'transisi') {
	$daftar = '';
	$wisuda = '';
	$akun = '';	
	$keg = 'active';
	$kegiatan = '';
	$transisi = 'active';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = '';	
	$alumni = '';
} elseif ($uri == 'organisasi') {
	$daftar = '';
	$wisuda = '';
	$akun = '';	
	$keg = 'active';
	$kegiatan = '';
	$transisi = '';
	$organisasi = 'active';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = '';	
	$alumni = '';
} elseif ($uri == 'kompetensi') {
	$daftar = '';
	$wisuda = '';
	$akun = '';	
	$keg = 'active';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='active';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = '';	
	$alumni = '';
} elseif ($uri == 'kualitas') {
	$daftar = '';
	$wisuda = '';
	$akun = '';	
	$keg = 'active';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = 'active';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = '';	
	$alumni = '';
} elseif ($uri == 'layanan') {
	$daftar = '';
	$wisuda = '';
	$akun = '';	
	$keg = 'active';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = 'active';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = '';	
	$alumni = '';
} elseif ($uri == 'dikti') {
	$daftar = '';
	$wisuda = '';
	$akun = '';	
	$keg = '';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = 'active';
	$prom = '';
	$low = '';
	$agen = '';	
	$alumni = '';
} elseif ($uri == 'promosi') {
	$daftar = '';
	$wisuda = '';
	$akun = '';	
	$keg = '';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = 'active';
	$low = '';
	$agen = '';	
	$alumni = '';	
} elseif ($uri == 'lowongan') {
	$daftar = '';
	$wisuda = '';
	$akun = '';	
	$keg = '';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = 'active';
	$agen = '';
	$alumni = '';
} elseif ($uri == 'agenda') {
	$daftar = '';
	$wisuda = '';
	$akun = '';	
	$keg = '';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = 'active';
	$alumni = '';
} elseif ($uri == 'database') {
	$daftar = '';
	$wisuda = '';
	$akun = '';	
	$keg = '';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = '';
	$alumni = 'active';			
} else {
	$daftar = 'active';
	$wisuda = '';
	$akun = '';
	$keg = '';
	$kegiatan = '';
	$transisi = '';
	$organisasi = '';
	$kompetensi ='';
	$kualitas = '';
	$layanan = '';
	$dikti = '';
	$prom = '';
	$low = '';
	$agen = '';
	$alumni = '';
}
?>
<div id="sidebar"  class="nav-collapse ">	
  	<ul class="sidebar-menu" id="nav-accordion">
  		<li>
	    	<a href="<?php echo base_url(); ?>">
	        	<i class="icon-home"></i>
	          	<span>Back to Main Website</span>
	      	</a>
	  	</li> 
  		<?php if ($uri == 'wisuda') { ?>
	  	<li>
	    	<a class="<?php echo $daftar; ?>" href="<?php echo site_url().'wisuda/daftar'; ?>">
	        	<i class="icon-user"></i>
	          	<span>Pendaftaran Wisuda</span>
	      	</a>
	  	</li>
	  	<li>
	    	<a class="<?php echo $wisuda; ?>" href="<?php echo site_url().'wisuda'; ?>">
	        	<i class="icon-th"></i>
	          	<span>Data Wisuda</span>
	      	</a>
	  	</li>
	  	<?php } elseif ($uri == 'daftar') { ?>
	  	<li>
	    	<a class="<?php echo $daftar; ?>" href="<?php echo site_url().'daftar'; ?>">
	        	<i class="icon-user"></i>
	          	<span>Pendaftaran Alumni</span>
	      	</a>
	  	</li>	  		  
	  	<?php } ?>
	  	
	  	<?php if ($this->session->userdata('logged_in_alumni_tracer') && $uri <> 'wisuda' && $uri <> 'daftar') { ?>
	  	<li>
	    	<a class="<?php echo $akun; ?>" href="<?php echo site_url('account'); ?>">
	        	<i class="icon-user"></i>
	          	<span>My Account</span>
	      	</a>
	  	</li>
	  	<!-- Kegiatan -->
	  	<li class="sub-menu">
	      	<a href="javascript:;" class="<?php echo $keg; ?>">
	          	<i class="icon-book"></i>
	          	<span>Kegiatan</span>
	      	</a>
	      	<ul class="sub">
	      		<li class="<?php echo $kegiatan; ?>"><a href="<?php echo site_url('kegiatan'); ?>">Kegiatan Alumni</a></li>
	      		<!--<li class="<?php echo $transisi; ?>"><a href="<?php echo site_url('transisi'); ?>">Transisi Dunia Kerja</a></li>
	      		<li class="<?php echo $organisasi; ?>"><a href="<?php echo site_url('organisasi'); ?>">Pengalaman Organisasi</a></li>
	      		<li class="<?php echo $kompetensi; ?>"><a href="<?php echo site_url('kompetensi'); ?>">Kompetensi</a></li>
	      		<li class="<?php echo $kualitas; ?>"><a href="<?php echo site_url('kualitas'); ?>">Kualitas Pembelajaran</a></li>
	      		<li class="<?php echo $layanan; ?>"><a href="<?php echo site_url('layanan'); ?>">Layanan Alumni</a></li> -->
	      	</ul>
	  	</li>
	  	<li>
	    	<a class="<?php echo $dikti; ?>" href="<?php echo site_url('dikti'); ?>">
	        	<i class="icon-edit-sign"></i>
	          	<span>Kuesioner Dikti</span>
	      	</a>
	  	</li>
	  	<!-- Kegiatan End -->
	  	<li>
	    	<a class="<?php echo $prom; ?>" href="<?php echo site_url('promosi'); ?>">
	        	<i class="icon-thumbs-up"></i>
	          	<span>Promosi</span>
	      	</a>
	  	</li>
	  	<li>
	    	<a class="<?php echo $alumni; ?>" href="<?php echo site_url().'database'; ?>">
	        	<i class="icon-th"></i>
	          	<span>Data Alumni</span>
	      	</a>
	  	</li>
	  	<li>
	    	<a class="<?php echo $low; ?>" href="<?php echo site_url('lowongan'); ?>">
	        	<i class="icon-book"></i>
	          	<span>Lowongan Kerja</span>
	      	</a>
	  	</li>
	  	<li>
	    	<a class="<?php echo $agen; ?>" href="<?php echo site_url('agenda'); ?>">
	        	<i class="icon-book"></i>
	          	<span>Agenda Alumni</span>
	      	</a>
	  	</li>
	  	<li>
	    	<a href="<?php echo site_url('login/logout'); ?>">
	        	<i class="icon-share-alt"></i>
	          	<span>Logout</span>
	      	</a>
	  	</li>
		<?php } ?>	  	    
  	</ul>  	
</div>