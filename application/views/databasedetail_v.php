<section class="wrapper">
    <div class="row">
        <aside class="profile-nav col-lg-3">
            <section class="panel">
            	<div class="user-heading round">            	
                    <a href="#">
	                    <?php 
			                if (!empty($akun->alumni_foto)) {
			                    $foto = $akun->alumni_foto;                
			                } else {
			                    $foto = 'no_photo.jpg';
			                }
			            ?>                	
                        <img src="<?php echo base_url(); ?>foto/<?php echo $foto; ?>" alt="">
                    </a>
					<h1><?php echo $akun->alumni_nama; ?></h1>
                    <p><?php echo $akun->alumni_email; ?></p>
				</div>

				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"> <i class="icon-user"></i> Profil</a></li>                   
				</ul>
			</section>
        </aside>
        

        <aside class="profile-info col-lg-9">        	
        	<section class="panel">
				<div class="bio-graph-heading">					
					<?php echo $akun->alumni_tentang; ?>
				</div>
               	<div class="panel-body bio-graph-info">
				<h1>Bio Graph</h1>
				<div class="row">
					<div class="bio-row">
						<p><span>N I M </span>: <?php echo $akun->alumni_nim; ?></p>
					</div>
					<div class="bio-row">
						<p><span>Nama Lengkap </span>: <?php echo strtoupper($akun->alumni_nama); ?></p>
					</div>
					<div class="bio-row">
						<p><span>Tempat Lahir </span>: <?php echo $akun->alumni_tmpt_lhr; ?></p>
					</div>
					<div class="bio-row">
						<p><span>Tgl. Lahir</span>: <?php echo tgl_indo($akun->alumni_tgl_lhr); ?></p>
					</div>
					<div class="bio-row">
						<p><span>Fakultas </span>: <?php echo $akun->fakultas_name; ?></p>
					</div>
					<div class="bio-row">
						<p><span>Program Studi </span>: <?php echo $akun->progdi_name; ?></p>
					</div>
					<div class="bio-row">
						<p><span>No. Handphone </span>: <?php echo $akun->alumni_hp; ?></p>
					</div>
					<div class="bio-row">
						<p><span>Email </span>: <?php echo $akun->alumni_email; ?></p>
					</div>
					<div class="bio-row">
						<p><span>Facebook </span>: <?php echo $akun->alumni_fb; ?></p>
					</div>
					<div class="bio-row">
						<p><span>PIN BB </span>: <?php echo $akun->alumni_pin_bb; ?></p>
					</div>					
				</div>
				</div>
			</section>

				<?php if ($akun->kegiatan_id == 1) { 
						if (!empty($perusahaan->perusahaan_id)) {
					?>
				<section class="panel">
	               	<div class="panel-body bio-graph-info">
					<h1>Kegiatan</h1>
					<div class="row">
						<div class="bio-row">
							<p><span>Perusahaan </span>: <?php echo $perusahaan->perusahaan_name; ?></p>
						</div>
						<div class="bio-row">
							<p><span>Alamat </span>: <?php echo $perusahaan->perusahaan_alamat; ?></p>
						</div>
						<div class="bio-row">
							<p><span>Website </span>: <?php echo $perusahaan->perusahaan_web; ?></p>
						</div>
						<div class="bio-row">
							<p><span>Tgl. Masuk</span>: <?php echo tgl_indo($perusahaan->perusahaan_tgl_masuk); ?></p>
						</div>
						<div class="bio-row">
							<p><span>Posisi </span>: <?php echo $perusahaan->perusahaan_posisi; ?></p>
						</div>										
					</div>
					</div>
				</section>
				<?php } 
				} ?>
				<?php if ($akun->kegiatan_id == 2) { 
						if (!empty($sekolah->sekolah_id)) {
					?>
				<section class="panel">
	               	<div class="panel-body bio-graph-info">
					<h1>Kegiatan</h1>
					<div class="row">
						<div class="bio-row">
							<p><span>Universitas </span>: <?php echo $sekolah->sekolah_name; ?></p>
						</div>
						<div class="bio-row">
							<p><span>Alamat </span>: <?php echo $sekolah->sekolah_alamat; ?></p>
						</div>
						<div class="bio-row">
							<p><span>Jenjang </span>: <?php echo $sekolah->sekolah_jenjang; ?></p>
						</div>
						<div class="bio-row">
							<p><span>Tgl. Masuk</span>: <?php echo tgl_indo($sekolah->sekolah_tgl_msk); ?></p>
						</div>
						<div class="bio-row">
							<p><span>Jurusan </span>: <?php echo $sekolah->sekolah_jurusan; ?></p>
						</div>										
					</div>
					</div>
				</section>
				<?php } 
				} ?>
				<?php if ($akun->kegiatan_id == 3) { 
						if (!empty($usaha->usaha_id)) {
					?>
				<section class="panel">
	               	<div class="panel-body bio-graph-info">
					<h1>Kegiatan</h1>
					<div class="row">
						<div class="bio-row">
							<p><span>Usaha </span>: <?php echo $usaha->usaha_name; ?></p>
						</div>
						<div class="bio-row">
							<p><span>Alamat </span>: <?php echo $usaha->usaha_alamat; ?></p>
						</div>
						<div class="bio-row">
							<p><span>Website </span>: <?php echo $usaha->usaha_web; ?></p>
						</div>
						<div class="bio-row">
							<p><span>Bidang</span>: <?php echo $usaha->usaha_bidang; ?></p>
						</div>									
					</div>
					</div>
				</section>
				<?php } 
				} ?>
						
		</aside>
	</div>
</section>