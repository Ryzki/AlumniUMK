<section id="content">
   	<div id="breadcrumb-container">
        <div class="container">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">HOME</a></li>
				<li><a href="<?php echo site_url('register'); ?>">PENDAFTARAN</a></li>
				<li class="active">DATA PROFIL ALUMNI</li>
			</ul>
       	</div>
    </div>

<div class="container">
        <div class="row">
        	<div class="col-md-12">
				<header class="content-title">
					<h1 class="title">Data Profil Alumni</h1>
					<p class="title-desc"></p>
				</header>
        		
        		<div class="xs-margin"></div><!-- space -->
        		
        		<form action="<?php echo site_url().'register/updatedataprofil/'.$this->uri->segment(3); ?>" id="register-form" method="post">
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        		
        		<div class="row">
        			<div class="col-md-6 col-sm-6 col-xs-12">
						<fieldset>
							<h2 class="sub-title">DATA PRIBADI ANDA</h2>						
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">N I M</span></span>
								<input type="text" name="nim" id="nim" class="form-control input-lg" placeholder="NIM Anda" value="<?php echo $this->uri->segment(3); ?>" readonly>
							</div>
							<?php echo form_error('tgl_lahir', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Tanggal Lahir &#42;</span></span>
								<input class="form-control form-control-inline input-lg default-date-picker" size="16" type="text" value="<?php echo set_value('tgl_lahir'); ?>" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir Anda" />								
							</div>													
							<?php echo form_error('lstJK', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Jenis Kelamin &#42;</span></span>
								<select name="lstJK" class="form-control input-lg" id="lstJK" required>
                                    <option value="">- Pilih Jenis Kelamin -</option>
									<option value="Laki-Laki" <?php echo set_select('lstJK', 'Laki-Laki'); ?> >Laki-Laki</option>
									<option value="Perempuan" <?php echo set_select('lstJK', 'Perempuan'); ?> >Perempuan</option>
								</select>
							</div>
							<?php echo form_error('alamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>										
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Alamat Sekarang &#42;</span></span>
								<input type="text" name="alamat" id="alamat" size="50" maxlength="50" required class="form-control input-lg" placeholder="Alamat Anda" value="<?php echo set_value('alamat'); ?>" title="Max. 50 Character" autocomplete="off">
							</div>
							<?php echo form_error('hp', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>										
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">No. Handphone &#42;</span></span>
								<input type="text" name="hp" id="hp" size="12" maxlength="12" required class="form-control input-lg" placeholder="No. Handphone Anda" value="<?php echo set_value('hp'); ?>" title="Angka 0-9, Max. 12 Digit" autocomplete="off">
							</div>
						</fieldset>

						<fieldset>
							<h2  class="sub-title">DATA KULIAH</h2>	
							<?php echo form_error('rdProgdi', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<p>Program Studi &#42;:</p>
							<div class="input-group">
								<?php foreach($progdi as $p) { ?>
								<input name="rdProgdi" required type="radio" value="<?php echo $p->progdi_id; ?>" <?php echo set_radio( 'rdProgdi', $p->progdi_id); ?> /> <b><?php echo $p->progdi_name; ?></b>
								<?php } ?>
							</div>
							<?php echo form_error('tgl_masuk', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Tanggal Masuk &#42;</span></span>
								<input class="form-control form-control-inline input-lg default-date-picker" size="16" type="text" value="<?php echo set_value('tgl_masuk'); ?>" name="tgl_masuk" id="tgl_masuk" placeholder="Tanggal Masuk Kuliah" />								
							</div>
							<?php echo form_error('tgl_lulus', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Tanggal Lulus &#42;</span></span>
								<input class="form-control form-control-inline input-lg default-date-picker" size="16" type="text" value="<?php echo set_value('tgl_lulus'); ?>" name="tgl_lulus" id="tgl_lulus" placeholder="Tanggal Lulus Kuliah" />								
							</div>							
							<?php echo form_error('rdKegiatan', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<p>Kegiatan setelah Lulus &#42;:</p>
								<?php foreach($kegiatan as $k) { ?>
								<input name="rdKegiatan" required type="radio" value="<?php echo $k->kegiatan_id; ?>" <?php echo set_radio( 'rdKegiatan', $k->kegiatan_id); ?> /> <b><?php echo $k->kegiatan_desc; ?></b><br>
								<?php } ?>
							</div>									
						</fieldset>

						<input type="submit" value="Simpan & Lanjut >>" class="btn btn-custom-2 btn-lg md-margin">								
					</div>

        			<div class="col-md-6 col-sm-6 col-xs-12">
						<fieldset>
							<h2  class="sub-title">SOCIAL NETWORK (OPSIONAL)</h2>
								<?php echo form_error('facebook', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
								<div class="input-group">
									<span class="input-group-addon"><span class="input-text">Facebook</span></span>
									<input type="text" name="facebook" id="facebook" class="form-control input-lg" placeholder="Akun Facebook Anda" value="<?php echo set_value('facebook'); ?>" autocomplete="off">
								</div>
								<?php echo form_error('pinbb', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
								<div class="input-group">
									<span class="input-group-addon"><span class="input-text">PIN BB</span></span>
									<input type="text" name="pinbb" id="pinbb" class="form-control input-lg" placeholder="PIN BBM Anda" value="<?php echo set_value('pin'); ?>" autocomplete="off">
								</div>																						
						</fieldset>
					</div>
				</div><!-- End .row -->
        		</form>

        	</div><!-- End .col-md-12 -->
        </div><!-- End .row -->
	</div><!-- End .container -->

</section>    