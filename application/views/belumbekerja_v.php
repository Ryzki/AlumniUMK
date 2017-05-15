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
				<li class="active">MENCARI PEKERJAAN</li>
			</ul>
       	</div>
    </div>

<div class="container">
        <div class="row">
        	<div class="col-md-12">
				<header class="content-title">
					<h1 class="title">Pendaftaran Alumni > Mencari Pekerjaan</h1>
					<p class="title-desc"></p>
				</header>
        		
        		<div class="xs-margin"></div><!-- space -->
        		
        		<form action="<?php echo site_url().'register/savedatabelumkerja/'.$this->uri->segment(3); ?>" id="register-form" method="post">
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        		<div class="row">
        			<div class="col-md-6 col-sm-6 col-xs-12">
						<fieldset>
							<h2 class="sub-title"></h2>
							<p>Kegiatan yang Anda lakukan :</p>								
							<?php echo form_error('rdAktifitas', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">									
								<?php foreach($aktifitas as $a) { ?>
								<input name="rdAktifitas" required type="radio" value="<?php echo $a->aktifitas_id; ?>" <?php echo set_radio( 'rdAktifitas', $a->aktifitas_id); ?> /> <b><?php echo $a->aktifitas_desc; ?></b><br>
								<?php } ?>
							</div>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Lainnya &#42;</span></span>
								<input type="text" name="lain" id="lain" required class="form-control input-lg" placeholder="Isi Jika Pilih Lainnya" value="<?php echo set_value('lain'); ?>" autocomplete="off">
							</div>
							<?php echo form_error('saran', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>	
							<div class="input-group">
								<p align="justify">Jika Anda sedang <u>mencari pekerjaan</u>, menurut Anda apa yang harus dilakukan oleh <b>Fakultas Teknik Universitas Muria Kudus</b>
								supaya Anda bisa mendapatkan pekerjaan dengan lebih cepat ?</p>									
								<textarea class="form-control input-lg ckeditor" name="saran" id="saran" rows="6"><?php echo set_value('saran'); ?></textarea>
							</div>

						</fieldset>														
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12">
						<fieldset>
							<h2 class="sub-title"></h2>
							<?php echo form_error('saranperbaikan', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>	
							<div class="input-group">
								<p align="justify">Adakah saran perbaikan lain untuk Fakultas Teknik Universitas Muria Kudus ?</p>									
								<textarea class="form-control input-lg ckeditor" name="saranperbaikan" id="saranperbaikan" rows="6"><?php echo set_value('saranperbaikan'); ?></textarea>
							</div>

							<div class="input-group custom-checkbox">
								<input type="checkbox" name="chkKet" id="chkKet" onclick="CekList()" required><span class="checbox-container">
								<i class="fa fa-check"></i>
								</span>
								Keterangan yang saya berikan ini benar dan sesuai dengan kenyataan
							</div>

							<div class="input-group custom-checkbox">
								<input type="checkbox" name="chkEmail" id="chkEmail" value="1"><span class="checbox-container">
								<i class="fa fa-check"></i>
								</span>
								Saya bersedia menerima Email pemberitahuan ketika ada Lowongan di Loker FT-UMK
							</div>

							<div class="input-group custom-checkbox">
								<input type="checkbox" name="chkSMS" id="chkSMS" value="1"><span class="checbox-container">
								<i class="fa fa-check"></i>
								</span>
								Saya bersedia menerima pemberitahuan lewat SMS dari FT-UMK.
							</div>
							<br><br><br><br><br>
							<input type="submit" value="Lanjut >>" class="btn btn-custom-2 btn-lg md-margin" name="btnSave" id="btnSave" disabled>
						</fieldset>
					</div>																      			        		
				</div><!-- End .row -->
        		</form>		
        	</div><!-- End .col-md-12 -->
        </div><!-- End .row -->
	</div><!-- End .container -->

</section>    