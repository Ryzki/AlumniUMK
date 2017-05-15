<script language="JavaScript" type="text/JavaScript">
function CekList() {	
	var checker = document.getElementById('chkKet');
	var sendbtn = document.getElementById('btnSave');
	
	checker.onchange = function(){
		if (this.checked) {
			sendbtn.disabled = false;
		} else {
			sendbtn.disabled = true;
		}	
	}
}
</script>
<section id="content">
   	<div id="breadcrumb-container">
        <div class="container">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">HOME</a></li>
				<li><a href="<?php echo site_url('register'); ?>">PENDAFTARAN</a></li>
				<li class="active">BEKERJA</li>
			</ul>
       	</div>
    </div>

<div class="container">
        <div class="row">
        	<div class="col-md-12">
				<header class="content-title">
					<h1 class="title">Pendaftaran Alumni > Bekerja</h1>
					<p class="title-desc"></p>
				</header>
        		
        		<div class="xs-margin"></div><!-- space -->
        		
        		<form action="<?php echo site_url().'register/savedataperusahaan/'.$this->uri->segment(3); ?>" id="register-form" method="post">
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        		<div class="row">
        			<div class="col-md-6 col-sm-6 col-xs-12">
						<fieldset>
							<h2 class="sub-title">DATA PERUSAHAAN</h2>								
							<?php echo form_error('name', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Nama Perusahaan &#42;</span></span>
								<input type="text" name="name" id="name" size="50" maxlength="50" required class="form-control input-lg" placeholder="Nama Perusahaan Anda" value="<?php echo set_value('name'); ?>" autocomplete="off">
							</div>
							<?php echo form_error('alamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Alamat &#42;</span></span>
								<input type="text" name="alamat" id="alamat" required class="form-control input-lg" placeholder="Alamat Perusahaan Anda" value="<?php echo set_value('alamat'); ?>" autocomplete="off">
							</div>
							<?php echo form_error('web', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>										
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Web Perusahaan</span></span>
								<input type="text" name="web" id="web" class="form-control input-lg" placeholder="Web Perusahaan Anda" value="<?php echo set_value('web'); ?>" autocomplete="off">
							</div>
							<?php echo form_error('rdJenisPerusahaan', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">									
								<?php foreach($jenis as $j) { ?>
								<input name="rdJenisPerusahaan" required type="radio" value="<?php echo $j->jenis_id; ?>" <?php echo set_radio( 'rdJenisPerusahaan', $j->jenis_id); ?> /> <b><?php echo $j->jenis_desc; ?></b>
								<?php } ?>
							</div>
							<?php echo form_error('lain', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Lainnya &#42;</span></span>
								<input type="text" name="lain" id="lain" class="form-control input-lg" placeholder="Isi Jika Pilih Lainnya" value="<?php echo set_value('lain'); ?>" autocomplete="off">
							</div>
							<?php echo form_error('tgl_masuk', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Tgl. Masuk &#42;</span></span>
								<input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="<?php echo set_value('tgl_masuk'); ?>" name="tgl_masuk" id="tgl_masuk" placeholder="Tanggal Masuk Bekerja" />
							</div>																
							<?php echo form_error('posisi', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>										
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Posisi Bekerja &#42;</span></span>
								<input type="text" name="posisi" id="posisi" required class="form-control input-lg" placeholder="Posisi Pertama Bekerja" value="<?php echo set_value('posisi'); ?>" autocomplete="off">
							</div>
							<?php echo form_error('rdGaji', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<p>Gaji Pertama :</p>									
								<?php foreach($gaji as $g) { ?>
								<input name="rdGaji" required type="radio" value="<?php echo $g->gaji_id; ?>" <?php echo set_radio( 'rdGaji', $g->gaji_id); ?> /> <b><?php echo $g->gaji_desc; ?></b>
								<?php } ?>
							</div>																							
							</fieldset>														
						</div><!-- End .col-md-6 -->
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<fieldset>
							<h2  class="sub-title"></h2>
							<?php echo form_error('rdInfo', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<p align="justify">Darimana Anda mendapatkan informasi lowongan pekerjaan (pilih yang sesuai) ? :</p>									
								<?php foreach($info as $i) { ?>
								<input name="rdInfo" required type="radio" value="<?php echo $i->info_id; ?>" <?php echo set_radio( 'rdInfo', $i->info_id); ?> /> <b><?php echo $i->info_desc; ?></b><br>
								<?php } ?>
							</div>
							<?php echo form_error('rdSkala', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>	
							<div class="input-group">
								<p align="justify">Menurut Anda dalam skala 1-5 (1 = Sangat Tidak Relevan dan 5 = Sangat Relevan), bagaimana relevansi pekerjaan Anda dengan Bidang Ilmu yang saudara 
								tempuh pada saat di <b>FT-UMK</b> ? :</p>
								<?php foreach($skala as $s) { ?>
								<input name="rdSkala" required type="radio" value="<?php echo $s->skala_id; ?>" <?php echo set_radio( 'rdSkala', $s->skala_id); ?> /> <b><?php echo $s->skala_desc; ?></b><br>
								<?php } ?>
							</div>
							<?php echo form_error('catatan', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>	
							<div class="input-group">
								<p align="justify">Menurut Anda, <b>Mata Kuliah</b> apa yang Anda dapatkan dari bangku kuliah yang <b>paling relevan</b> dengan pekerjaan Anda saat ini ?<br>
								(<em>Catatan : jika menyebutkan lebih dari 1, pisahkan dengan KOMA</em>) :</p>									
								<textarea class="form-control input-lg" name="catatan" rows="6"><?php echo set_value('catatan'); ?></textarea>
							</div>
							
							<div class="input-group custom-checkbox">
								<input type="checkbox" name="chkKet" id="chkKet" onclick="CekList()" required><span class="checbox-container">
								<i class="fa fa-check"></i>
								</span>
								Keterangan yang saya berikan ini benar dan sesuai dengan kenyataan
							</div>

								<input type="submit" value="Lanjut >>" class="btn btn-custom-2 btn-lg md-margin" name="btnSave" id="btnSave" disabled>
						</fieldset>
					</div>        			        			
				</div><!-- End .row -->
        		</form>		
        	</div><!-- End .col-md-12 -->
        </div><!-- End .row -->
	</div><!-- End .container -->

</section>    