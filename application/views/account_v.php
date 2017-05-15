<?php
$uri = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);

if ($uri == 'account' && empty($uri2)) {
	$profil = 'active';
	$editprofil = '';
	$editwisuda = '';
	$gantipassword = '';
	$printdata 		= '';
} elseif ($uri == 'account' && $uri2 == 'editdata') {
	$profil = '';
	$editprofil = 'active';
	$editwisuda = '';
	$gantipassword = '';
	$printdata 		= '';
} elseif ($uri == 'account' && $uri2 == 'gantipassword') {
	$profil = '';
	$editprofil = '';
	$editwisuda = '';
	$gantipassword = 'active';
	$printdata 		= '';
} elseif ($uri == 'account' && $uri2 == 'print') {
	$profil = '';
	$editprofil = '';
	$editwisuda = '';
	$gantipassword = '';
	$printdata 		= 'active';	
} elseif ($uri == 'account' && $uri2 == 'editwisuda') {
	$profil = '';
	$editprofil = '';
	$editwisuda = 'active';
	$gantipassword = '';
	$printdata 		= '';
} else {
	$profil = 'active';
	$editprofil = '';
	$editwisuda = '';
	$gantipassword = '';
	$printdata 		= '';
}
?>
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
					<h1><?php echo $this->session->userdata('nama_lengkap'); ?></h1>
                    <p><?php echo $this->session->userdata('email'); ?></p>
                    <p><em>Last Update : <br><?php echo $akun->alumni_tgl_update.' '.$akun->alumni_jam_update; ?></em></p>
				</div>

				<ul class="nav nav-pills nav-stacked">
					<li class="<?php echo $profil; ?>"><a href="<?php echo site_url('account'); ?>"> <i class="icon-user"></i> Profil</a></li>                    
                    <li class="<?php echo $editprofil; ?>"><a href="<?php echo site_url('account/editdata'); ?>"> <i class="icon-edit"></i> Edit Profil</a></li>
                    <!-- <li class="<?php echo $gantipassword; ?>"><a href="<?php echo site_url('account/gantipassword'); ?>"> <i class="icon-edit"></i> Ganti Password</a></li> -->
                    <!-- <li class="<?php echo $printdata; ?>"><a href="<?php echo site_url('account/printdata'); ?>" target="_blank"> <i class="icon-print"></i> Cetak Data Alumni</a></li> -->
                    <?php 
                    // Cek jika ada data Wisuda
                    $cek_wisuda = $this->account_model->cek_data_wisuda()->row();
                    $jml_data = count($cek_wisuda);
                    if ($jml_data > 0) {
                    ?>
                	<li class="<?php echo $editwisuda; ?>"><a href="<?php echo site_url('account/editwisuda'); ?>"> <i class="icon-edit"></i> Cetak Data Wisuda</a></li>
                    <?php 
                	}
                    ?>
				</ul>
			</section>
        </aside>
        

        <aside class="profile-info col-lg-9">        	
        	<?php if ($uri == 'account' && empty($uri2)) { ?>
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
					<div class="bio-row">
						<p><span>Status </span>: <?php echo $akun->alumni_status_hidup; ?></p>
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
							<p><span>Website </span>: <a href="http://<?php echo $perusahaan->perusahaan_web; ?>" target="_blank"><?php echo $perusahaan->perusahaan_web; ?></a></p>
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
				
            <?php } ?>
			<?php if ($uri2 == 'editdata') { ?>
			<section class="panel">				
				<div class="panel-body bio-graph-info">
					<h1> Info Profil</h1>
					<?php 
		            if ($this->session->flashdata('notification')) { ?>
		               	<div class="alert alert-success fade in">
		                <?php echo $this->session->flashdata('notification'); ?>
		                </div>
		                <br>                
		            <? } ?>	
					<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('account/updatedata'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

					<div class="form-group">
						<label  class="col-lg-3 control-label">Tentang Saya</label>
						<div class="col-lg-8">
							<textarea name="tentang" id="tentang" class="form-control" rows="5"><?php echo $akun->alumni_tentang; ?></textarea>
						</div>
						<?php echo form_error('tentang', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">N I M</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="nim" id="nim" style="width:50%" value="<?php echo $akun->alumni_nim; ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Nama Lengkap</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $akun->alumni_nama; ?>" required >
						</div>
						<?php echo form_error('nama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>					
					<div class="form-group">
						<label  class="col-lg-3 control-label">Tempat Lahir</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $akun->alumni_tmpt_lhr; ?>" required >
						</div>
						<?php echo form_error('tempat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Tanggal Lahir</label>
						<div class="col-lg-3">
							<input type="text" class="form-control form-control form-control-inline input-medium default-date-picker" id="tgl_lahir" name="tgl_lahir" value="<?php echo $akun->alumni_tgl_lhr; ?>" required >
						</div>
						<?php echo form_error('tgl_lahir', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Jenis Kelamin</label>
						<div class="col-lg-6">
							<select class="form-control m-bot15" name="lstJK" id="lstJK" required>
	                            <option value="">- Pilih Jenis Kelamin -</option>
	                            <option value="Laki-Laki" <?php if ($akun->alumni_jk == 'Laki-Laki') { echo "selected"; } ?> >Laki-Laki</option>
	                            <option value="Perempuan" <?php if ($akun->alumni_jk == 'Perempuan') { echo "selected"; } ?> >Perempuan</option>	                            
                        	</select>
						</div>
						<?php echo form_error('lstJK', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Status</label>
						<div class="col-lg-6">
							<select class="form-control m-bot15" name="lstStatus" id="lstStatus" required>
	                            <option value="">- Pilih Status -</option>
	                            <option value="Lajang" <?php if ($akun->alumni_status_hidup == 'Lajang') { echo "selected"; } ?> >Lajang</option>
	                            <option value="Menikah" <?php if ($akun->alumni_status_hidup == 'Menikah') { echo "selected"; } ?> >Menikah</option>
	                            <option value="Duda" <?php if ($akun->alumni_status_hidup == 'Duda') { echo "selected"; } ?> >Duda</option>
	                            <option value="Janda" <?php if ($akun->alumni_status_hidup == 'Janda') { echo "selected"; } ?> >Janda</option>	                            
                        	</select>
						</div>
						<?php echo form_error('lstStatus', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Agama</label>
						<div class="col-lg-6">
							<select class="form-control m-bot15" name="lstAgama" id="lstAgama" required>
	                            <option value="">- Pilih Agama -</option>
	                            <option value="Islam" <?php if ($akun->alumni_agama == 'Islam') { echo "selected"; } ?> >Islam</option>
	                            <option value="Kristen" <?php if ($akun->alumni_agama == 'Kristen') { echo "selected"; } ?> >Kristen</option>
	                            <option value="Katholik" <?php if ($akun->alumni_agama == 'Katholik') { echo "selected"; } ?> >Katholik</option>
	                            <option value="Hindu" <?php if ($akun->alumni_agama == 'Hindu') { echo "selected"; } ?> >Hindu</option>
	                            <option value="Budha" <?php if ($akun->alumni_agama == 'Budha') { echo "selected"; } ?> >Budha</option>
                        	</select>
						</div>
						<?php echo form_error('lstAgama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Alamat</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $akun->alumni_alamat; ?>" required>
						</div>
						<?php echo form_error('alamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div> 
					<div class="form-group">
						<label  class="col-lg-3 control-label">No. Handphone/Telp</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="hp" name="hp" value="<?php echo $akun->alumni_hp; ?>" required>
						</div>
						<?php echo form_error('hp', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">PIN BB</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="pin" name="pin" value="<?php echo $akun->alumni_pin_bb; ?>" >
						</div>
						<?php echo form_error('pin', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div> 
					<div class="form-group">
						<label  class="col-lg-3 control-label">Facebook</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="fb" name="fb" value="<?php echo $akun->alumni_fb; ?>" >
						</div>
						<?php echo form_error('fb', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>					                                                                     								
					<div class="form-group">
						<label  class="col-lg-3 control-label">Nama Orang Tua</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="ortu" name="ortu" value="<?php echo $akun->alumni_ortu; ?>" required >
						</div>
						<?php echo form_error('ortu', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Pekerjaan Orang Tua</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="kerja_ortu" name="kerja_ortu" value="<?php echo $akun->alumni_kerja_ortu; ?>" >
						</div>
						<?php echo form_error('kerja_ortu', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Alamat Orang Tua</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" value="<?php echo $akun->alumni_alamat_ortu; ?>" >
						</div>
						<?php echo form_error('alamat_ortu', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Telp Orang Tua</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" id="telp_ortu" name="telp_ortu" value="<?php echo $akun->alumni_hp_ortu; ?>" >
						</div>
						<?php echo form_error('telp_ortu', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>					
					<div class="form-group">
						<label  class="col-lg-3 control-label">Fakultas</label>
						<div class="col-lg-6">
							<select class="form-control m-bot15" name="lstFakultas" id="lstFakultas" readonly>
	                            <option value="">- Pilih Fakultas -</option>
	                            <?php 
	                            foreach($fakultas as $f) { 
	                            	if ($akun->fakultas_id == $f->fakultas_id) {
	                            ?>
	                            	<option value="<?php echo $f->fakultas_id; ?>" selected><?php echo $f->fakultas_name; ?></option>
	                            <?php } else { ?>
	                            	<option value="<?php echo $f->fakultas_id; ?>"><?php echo $f->fakultas_name; ?></option>	                            
	                            <?php } 
	                            }
	                            ?>
                        	</select>
						</div>
						<?php echo form_error('lstFakultas', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div> 
					<div class="form-group">
						<label  class="col-lg-3 control-label">Program Studi</label>
						<div class="col-lg-6">
							<select class="form-control m-bot15" name="lstProgdi" id="lstProgdi" readonly>
	                            <option value="">- Pilih Program Studi -</option>
	                            <?php 
	                            foreach($progdi as $p) { 
	                            	if ($akun->progdi_id == $p->progdi_id) {
	                            ?>
	                            	<option value="<?php echo $p->progdi_id; ?>" selected><?php echo $p->progdi_name; ?></option>
	                            <?php } else { ?>
	                            	<option value="<?php echo $p->progdi_id; ?>"><?php echo $p->progdi_name; ?></option>	                            
	                            <?php } 
	                            }
	                            ?>
                        	</select>
						</div>
						<?php echo form_error('lstProgdi', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Tanggal Masuk Kuliah</label>
						<div class="col-lg-3">
							<input type="text" value="<?php echo $akun->alumni_tgl_masuk; ?>" class="form-control datepicker" id="tgl_masuk" name="tgl_masuk" required>
						</div>
						<?php echo form_error('tgl_masuk', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Tanggal Lulus Kuliah</label>
						<div class="col-lg-3">
							<input type="text" class="form-control datepicker" id="tgl_lulus" name="tgl_lulus" value="<?php echo $akun->alumni_tgl_lulus; ?>" required>
						</div>
						<?php echo form_error('tgl_lulus', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					</div>
					<div class="form-group">
						<label  class="col-lg-3 control-label">Upload Foto</label>
						<div class="col-lg-6">							
								<div class="fileupload fileupload-new" data-provides="fileupload">
	                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
	                                <img src="<?php echo base_url(); ?>img/no_image.gif" alt="" />
	                            </div>
	                                        
	                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
	                            <div>
	                                <span class="btn btn-white btn-file">
	                                <span class="fileupload-new"><i class="icon-paper-clip"></i> Browse</span>
	                                <span class="fileupload-exists"><i class="icon-undo"></i> Ganti</span>
	                                <input type="file" class="default" name="userfile" />
	                                </span>                                             
                            	</div>
	                            (Best Resolution Image : 150 x 200 pixel)
	                        	</div> 							
						</div>
					</div>  
					<div class="form-group">
						<div class="col-lg-offset-3 col-lg-10">
							<button type="submit" class="btn btn-success">Update Data</button>							
						</div>
					</div>
					</form>
				</div>
			</section>
            
            <section>
				<div class="panel panel-primary">
					<div class="panel-heading"> Setting Avatar Icon</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('account/updateavatar'); ?>" enctype="multipart/form-data">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="form-group">
								<label class="col-lg-3 control-label">Avatar</label>
								<div class="col-lg-6">
									<?php 
					                if (!empty($akun->user_avatar)) {
					                    $avatar = $akun->user_avatar;                
					                } else {
					                    $avatar = 'no_image.png';
					                }
					            	?>
		                        	<img src="<?php echo base_url(); ?>avatar/<?php echo $avatar; ?>">
	                        	</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Ganti Avatar</label>
								<div class="col-lg-6">
									<div class="fileupload fileupload-new" data-provides="fileupload">
			                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
			                                <img src="<?php echo base_url(); ?>img/no_image.gif" alt="" />
			                            </div>
		                                        
		                            	<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;">
		                            	</div>
			                            <div>
			                                <span class="btn btn-white btn-file">
				                                <span class="fileupload-new"><i class="icon-paper-clip"></i> Browse</span>
				                                <span class="fileupload-exists"><i class="icon-undo"></i> Ganti</span>
				                                <input type="file" class="default" name="userfile" />
			                                </span>                                             
		                            	</div>
		                            	(Best Resolution Image : 100 x 100 pixel)
		                        	</div> 
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-offset-3 col-lg-10">
									<button type="submit" class="btn btn-info">Ganti Avatar</button>                                              
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<?php } ?>

			<?php if ($uri2 == 'gantipassword') { // Ganti Password ?>
			<section>
				<div class="panel panel-primary">
					<div class="panel-heading"> Ganti Password</div>					
						<div class="panel-body">
							<?php 
				            if ($this->session->flashdata('notification')) { ?>
				               	<div class="alert alert-success fade in">
				                <?php echo $this->session->flashdata('notification'); ?>
				                </div>
				                <br>                
				            <? } ?>				            
							<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('account/updatepassword'); ?>">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						
							<div class="form-group">
								<label  class="col-lg-3 control-label">Password Sekarang</label>
								<div class="col-lg-6">
	                                <input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
	                            </div>
	                            <?php echo form_error('oldpassword', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							</div>
							<div class="form-group">
								<label  class="col-lg-3 control-label">Password Baru</label>
								<div class="col-lg-6">
									<input type="password" class="form-control" id="newpassword" name="newpassword" required>
								</div>
								<?php echo form_error('newpassword', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							</div>
							<div class="form-group">
								<label  class="col-lg-3 control-label">Konfirmasi Password Baru</label>
								<div class="col-lg-6">
									<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
								</div>
								<?php echo form_error('confirmpassword', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							</div>						

							<div class="form-group">
								<div class="col-lg-offset-3 col-lg-10">
									<button type="submit" class="btn btn-info">Ganti Password</button>                                              
								</div>
							</div>
							</form>
						</div>
				</div>
			</section>
			<?php } ?>

			<?php if ($uri2 == 'editwisuda') { ?>
			<section class="panel">				
				<div class="panel-body bio-graph-info">
					<h1> Info Pendaftaran Wisuda</h1>
					<?php 
		            if ($this->session->flashdata('notification')) { ?>
		               	<div class="alert alert-success fade in">
		                <?php echo $this->session->flashdata('notification'); ?>
		                </div>
		                <br>                
		            <? } ?>	
					<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('account/updatedatawisuda'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<input type="hidden" name="wisuda_id" value="<?php echo $akun->wisuda_id; ?>" />

					<div class="form-group">
						<label  class="col-lg-2 control-label">Judul Skripsi</label>
						<div class="col-lg-10">
							<textarea name="judul" id="judul" class="form-control" cols="30" rows="10" required><?php echo $akun->wisuda_judulproyek; ?></textarea>
						</div>						
					</div>
					<div class="form-group">
						<label  class="col-lg-2 control-label">No. Daftar</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="" name="" value="#<?php echo $akun->wisuda_id; ?>" style="width:50%" readonly >
						</div>						
					</div>
					<div class="form-group">
						<label  class="col-lg-2 control-label">Periode</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="" name="" value="<?php echo tgl_indo($akun->wisuda_periode); ?>" style="width:50%" readonly >
						</div>						
					</div>
					<div class="form-group">
						<label  class="col-lg-2 control-label">Tgl. Daftar</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="" name="" value="<?php echo tgl_indo($akun->wisuda_tgl_daftar); ?>" style="width:50%" readonly >
						</div>						
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update Data</button>							
							<a href="<?php echo site_url('wisuda/printpreview'.'/'.$akun->wisuda_id); ?>" target="_blank" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Preview Bukti </a>
               	 			<a href="<?php echo site_url('wisuda/download'.'/'.$akun->wisuda_id); ?>" target="_blank" class="btn btn-danger"><span class="glyphicon glyphicon-download"></span> Download PDF </a>
						</div>
					</div>
					</form>
				</div>
			</section>
                       
			<?php } ?>
		</aside>
	</div>
</section>