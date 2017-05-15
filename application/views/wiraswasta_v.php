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
				<li class="active">USAHA</li>
			</ul>
       	</div>
    </div>

<div class="container">
        <div class="row">
        	<div class="col-md-12">
				<header class="content-title">
					<h1 class="title">Pendaftaran Alumni > Usaha</h1>
					<p class="title-desc"></p>
				</header>
        		
        		<div class="xs-margin"></div><!-- space -->
        		
        		<form action="<?php echo site_url().'register/savedatausaha/'.$this->uri->segment(3); ?>" id="register-form" method="post">
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        		<div class="row">
        			<div class="col-md-6 col-sm-6 col-xs-12">
						<fieldset>
							<h2 class="sub-title">DATA USAHA</h2>								
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
								<span class="input-group-addon"><span class="input-text">Website (Opsional)</span></span>
								<input type="text" name="web" id="web" class="form-control input-lg" placeholder="Web Perusahaan Anda" value="<?php echo set_value('web'); ?>" autocomplete="off">
							</div>
							<?php echo form_error('bidang', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Bidang Usaha &#42;</span></span>
								<input type="text" name="bidang" id="bidang" class="form-control input-lg" placeholder="Bidang Usaha Anda" value="<?php echo set_value('bidang'); ?>" autocomplete="off">
							</div>																
							<?php echo form_error('jumlah', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>										
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Jumlah Karyawan &#42;</span></span>
								<input type="text" name="jumlah" id="jumlah" title="Hanya Angka 0-9" required class="form-control input-lg" placeholder="Jumlah Karyawan (termasuk Owner)" value="<?php echo set_value('jumlah'); ?>" autocomplete="off">
							</div>							
							<?php echo form_error('omzet', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>										
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Omzet /Bulan &#42;</span></span>
								<input type="text" name="omzet" id="omzet" title="Hanya Angka 0-9" required class="form-control input-lg" placeholder="Besar Omzet per Bulan" value="<?php echo set_value('omzet'); ?>" autocomplete="off">
							</div>																														
							</fieldset>														
						</div><!-- End .col-md-6 -->
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<fieldset>
							<h2  class="sub-title">PENGELUARAN</h2>
							<?php echo form_error('pengeluaran', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>										
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Pengeluaran /Bulan &#42;</span></span>
								<input type="text" name="pengeluaran" id="pengeluaran" title="Hanya Angka 0-9" required class="form-control input-lg" placeholder="Pengeluaran Rata-Rata per Bulan" value="<?php echo set_value('pengeluaran'); ?>" autocomplete="off">
							</div>
							<?php echo form_error('rdSkala', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>	
							<div class="input-group">
								<p align="justify">Menurut Anda dalam skala 1-5 (1 = Sangat Tidak Relevan dan 5 = Sangat Relevan), bagaimana relevansi pekerjaan Anda dengan Bidang Ilmu yang saudara 
								tempuh pada saat di <b>FT-UMK</b> ? :</p>
								<?php foreach($skala as $s) { ?>
								<input name="rdSkala" required type="radio" value="<?php echo $s->skala_id; ?>" <?php echo set_radio( 'rdSkala', $s->skala_id); ?> /> <b><?php echo $s->skala_desc; ?></b><br>
								<?php } ?>
							</div>
							<br><br><br><br><br>
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