<?php
$uri 	= $this->uri->segment(2);
$uri2 	= $this->uri->segment(3);
$uri3 	= $this->uri->segment(4);

if ($uri == 'home'){
	$home = 'active';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';	
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';	
	$lap2 = '';
	$lap3 = '';	
} elseif ($uri == 'wisuda' && $uri2 == 'baru'){
	$home = '';
	$dftr  = 'active';
	$wisudabaru = 'active';
	$wsd = '';
	$wisudaprogdi = '';
	$dftralumni = '';
	$alumnibaru = '';	
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';		
} elseif ($uri == 'wisuda' && $uri2 == 'editwisudabaru'){
	$home = '';
	$dftr  = 'active';
	$wisudabaru = 'active';
	$wsd = '';
	$wisudaprogdi = '';
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';			
} elseif ($uri == 'wisuda' && $uri2 == 'progdi'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = 'active';
	$wisudaprogdi = 'active';
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';	
	$lap3 = '';	
} elseif ($uri == 'wisuda' && $uri2 == 'editwisuda'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = 'active';
	$wisudaprogdi = 'active';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';	
	$lap3 = '';	
} elseif ($uri == 'alumni' && $uri2 == 'baru'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = 'active';
	$alumnibaru = 'active';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';	
} elseif ($uri == 'alumni' && $uri2 == 'editalumnibaru'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = 'active';
	$alumnibaru = 'active';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';	
} elseif ($uri == 'alumni' && $uri2 == 'progdi'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = 'active';
	$alumni = 'active';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';		
} elseif ($uri == 'alumni' && $uri2 == 'editalumni'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = 'active';
	$alumni = 'active';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';	
} elseif ($uri == 'alumni' && $uri2 == 'caridataalumni'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = 'active';
	$alumni = 'active';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';		
} elseif ($uri == 'struktur'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = 'active';
	$struktur = 'active';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';
} elseif ($uri == 'lowker' && $uri2 == 'progdi'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = 'active';
	$lowker = 'active';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';
} elseif ($uri == 'lowker' && $uri2 == 'addlowker'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = 'active';
	$lowker = 'active';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';
} elseif ($uri == 'lowker' && $uri2 == 'editlowker'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = 'active';
	$lowker = 'active';
	$sep = '';
	$seputar = '';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';		
} elseif ($uri == 'seputar' && $uri2 == 'progdi'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = 'active';
	$seputar = 'active';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';
} elseif ($uri == 'seputar' && $uri2 == 'addseputar'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = 'active';
	$seputar = 'active';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';
} elseif ($uri == 'seputar' && $uri2 == 'editseputar'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = 'active';
	$seputar = 'active';
	$ag = '';
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';		
} elseif ($uri == 'agenda' && $uri2 == 'progdi'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = 'active';
	$agenda = 'active';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';
} elseif ($uri == 'agenda' && $uri2 == 'addagenda'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = 'active';
	$agenda = 'active';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';
} elseif ($uri == 'agenda' && $uri2 == 'editagenda'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = 'active';
	$agenda = 'active';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';									
} elseif ($uri == 'laporan_wisuda'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';	
	$agenda = '';
	$lap = 'active';
	$lap1 = 'active';
	$lap2 = '';
	$lap3 = '';
} elseif ($uri == 'laporan_alumni'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';	
	$agenda = '';
	$lap = 'active';
	$lap1 = '';
	$lap2 = 'active';
	$lap3 = '';	
} elseif ($uri == 'lap_statistik'){
	$home = '';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';	
	$agenda = '';
	$lap = 'active';
	$lap1 = '';
	$lap2 = '';
	$lap3 = 'active';							
} else {
	$home = 'active';
	$dftr  = '';
	$wisudabaru = '';
	$wsd = '';
	$wisudaprogdi = '';	
	$dftralumni = '';
	$alumnibaru = '';
	$allalumni = '';
	$alumni = '';
	$content = '';
	$struktur = '';
	$low = '';
	$lowker = '';
	$sep = '';
	$seputar = '';
	$ag = '';	
	$agenda = '';
	$lap = '';
	$lap1 = '';
	$lap2 = '';
	$lap3 = '';	
}
?>
<div id="sidebar"  class="nav-collapse ">	
  	<ul class="sidebar-menu" id="nav-accordion">
  		<li>
	    	<a class="<?php echo $home; ?>" href="<?php echo site_url().'user/home'; ?>">
	        	<i class="icon-dashboard"></i>
	          	<span>Dashboard</span>
	      	</a>
  		</li>
  		<li class="sub-menu">
	      	<a href="javascript:;" class="<?php echo $dftr; ?>">
	          	<i class="icon-th"></i>
	          	<span>Wisudawan Baru</span>
	      	</a>
	      	<ul class="sub">
		      	<?php 
		        $progdi = $this->menu_model->select_hak_akses()->result();
		        foreach($progdi as $p) {
		            $progdi_id = $p->progdi_id;
		            $cek_data = $this->menu_model->select_alumni($progdi_id)->result();
		            $jml_alumni = count($cek_data);
		        ?>
	      		<li class="<?php if ($progdi_id == $uri3) { echo $wisudabaru; } ?>"><a href="<?php echo site_url().'user/wisuda/baru'.'/'.$progdi_id; ?>"><?php echo $p->progdi_name; ?></a></li>
	      		<?php } ?> 
	      	</ul>
	  	</li>
	  	<li class="sub-menu">
	      	<a href="javascript:;" class="<?php echo $wsd; ?>">
	          	<i class="icon-tasks"></i>
	          	<span>Data Wisudawan</span>
	      	</a>
	      	<ul class="sub">
		      	<?php 
		        $progdi2 = $this->menu_model->select_hak_akses()->result();
		        foreach($progdi2 as $x) {
		            $progdi_id = $x->progdi_id;
		            $cek_data = $this->menu_model->select_alumni($progdi_id)->result();
		            $jml_alumni = count($cek_data);
		        ?>
	      		<li class="<?php if ($progdi_id == $uri3) { echo $wisudaprogdi; } ?>"><a href="<?php echo site_url().'user/wisuda/progdi'.'/'.$progdi_id; ?>"><?php echo $x->progdi_name; ?></a></li>
	      		<?php } ?>	      		
	      	</ul>
	  	</li>
	  	<li class="sub-menu">
	      	<a href="javascript:;" class="<?php echo $dftralumni; ?>">
	          	<i class="icon-th"></i>
	          	<span>Pendaftaran Alumni</span>
	      	</a>
	      	<ul class="sub">
		      	<?php 
		        $progdi = $this->menu_model->select_hak_akses()->result();
		        foreach($progdi as $a) {
		            $progdi_id = $a->progdi_id;
		            $cek_data = $this->menu_model->select_alumni($progdi_id)->result();
		            $jml_alumni = count($cek_data);
		        ?>
	      		<li class="<?php if ($progdi_id == $uri3) { echo $alumnibaru; } ?>"><a href="<?php echo site_url().'user/alumni/baru'.'/'.$progdi_id; ?>"><?php echo $a->progdi_name; ?></a></li>
	      		<?php } ?> 
	      	</ul>
	  	</li>
	  	<li class="sub-menu">
	      	<a href="javascript:;" class="<?php echo $allalumni; ?>">
	          	<i class="icon-tasks"></i>
	          	<span>Data Alumni</span>
	      	</a>
	      	<ul class="sub">
		      	<?php 
		        $progdi2 = $this->menu_model->select_hak_akses()->result();
		        foreach($progdi2 as $l) {
		            $progdi_id = $l->progdi_id;
		            $cek_data = $this->menu_model->select_alumni($progdi_id)->result();
		            $jml_alumni = count($cek_data);
		        ?>
	      		<li class="<?php if ($progdi_id == $uri3) { echo $alumni; } ?>"><a href="<?php echo site_url().'user/alumni/progdi'.'/'.$progdi_id; ?>"><?php echo $l->progdi_name; ?></a></li>
	      		<?php } ?>	      		
	      	</ul>
	  	</li>

	  	<!-- Content -->
	  	<li class="sub-menu">
	      	<a href="javascript:;" class="<?php echo $content; ?>">
	          	<i class="icon-folder-open"></i>
	          	<span>Content</span>
	      	</a>
	      	<ul class="sub">
	      		<li class="<?php echo $struktur; ?>"><a href="<?php echo site_url().'user/struktur'; ?>">Struktur Organisasi</a></li>	          	
	      	</ul>
	  	</li>
	  	<!-- Content End -->

	  	<li class="sub-menu">
	      	<a href="javascript:;" class="<?php echo $low; ?>">
	          	<i class="icon-folder-open"></i>
	          	<span>Lowongan Kerja</span>
	      	</a>
	      	<ul class="sub">
	      		<?php 
		        $progdi2 = $this->menu_model->select_hak_akses()->result();
		        foreach($progdi2 as $l) {
		            $progdi_id = $l->progdi_id;
		            $cek_data = $this->menu_model->select_alumni($progdi_id)->result();
		            $jml_alumni = count($cek_data);
		        ?>
	      		<li class="<?php if ($progdi_id == $uri3) { echo $lowker; } ?>"><a href="<?php echo site_url().'user/lowker/progdi'.'/'.$progdi_id; ?>"><?php echo $l->progdi_name; ?></a></li>
	      		<?php } ?>
	      	</ul>
	  	</li>

	  	<li class="sub-menu">
	      	<a href="javascript:;" class="<?php echo $ag; ?>">
	          	<i class="icon-folder-open"></i>
	          	<span>Agenda Alumni</span>
	      	</a>
	      	<ul class="sub">
	      		<?php 
		        $progdi2 = $this->menu_model->select_hak_akses()->result();
		        foreach($progdi2 as $l) {
		            $progdi_id = $l->progdi_id;
		            $cek_data = $this->menu_model->select_alumni($progdi_id)->result();
		            $jml_alumni = count($cek_data);
		        ?>
	      		<li class="<?php if ($progdi_id == $uri3) { echo $agenda; } ?>"><a href="<?php echo site_url().'user/agenda/progdi'.'/'.$progdi_id; ?>"><?php echo $l->progdi_name; ?></a></li>
	      		<?php } ?>
	      	</ul>
	  	</li>

	  	<li class="sub-menu">
	      	<a href="javascript:;" class="<?php echo $sep; ?>">
	          	<i class="icon-folder-open"></i>
	          	<span>Seputar Alumni</span>
	      	</a>
	      	<ul class="sub">
	      		<?php 
		        $progdi2 = $this->menu_model->select_hak_akses()->result();
		        foreach($progdi2 as $l) {
		            $progdi_id = $l->progdi_id;
		            $cek_data = $this->menu_model->select_alumni($progdi_id)->result();
		            $jml_alumni = count($cek_data);
		        ?>
	      		<li class="<?php if ($progdi_id == $uri3) { echo $seputar; } ?>"><a href="<?php echo site_url().'user/seputar/progdi'.'/'.$progdi_id; ?>"><?php echo $l->progdi_name; ?></a></li>
	      		<?php } ?>
	      	</ul>
	  	</li>	  	

	  	<li class="sub-menu">
	      	<a href="javascript:;" class="<?php echo $lap; ?>">
	          	<i class="icon-bar-chart"></i>
	          	<span>Laporan</span>
	      	</a>
	      	<ul class="sub">
				<li class="<?php echo $lap1;  ?>"><a href="<?php echo site_url().'user/laporan_wisuda'; ?>">Wisuda</a></li>
				<li class="<?php echo $lap2;  ?>"><a href="<?php echo site_url().'user/laporan_alumni'; ?>">Alumni</a></li>
				<li class="<?php echo $lap3;  ?>"><a href="<?php echo site_url().'user/lap_statistik'; ?>">Statistik</a></li>
	      	</ul>
	  	</li>

  	</ul>  	
</div>