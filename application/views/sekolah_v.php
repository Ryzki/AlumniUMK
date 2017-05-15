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
				<li class="active">SEKOLAH</li>
			</ul>
       	</div>
    </div>

<div class="container">
        <div class="row">
        	<div class="col-md-12">
				<header class="content-title">
					<h1 class="title">Pendaftaran Alumni > Sekolah</h1>
					<p class="title-desc"></p>
				</header>
        		
        		<div class="xs-margin"></div><!-- space -->
        		
        		<form action="<?php echo site_url().'register/savedatasekolah/'.$this->uri->segment(3); ?>" id="register-form" method="post">
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        		<div class="row">
        			<div class="col-md-6 col-sm-6 col-xs-12">
						<fieldset>
							<h2 class="sub-title">Data Universitas</h2>
							
							<?php echo form_error('name', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Nama Universitas &#42;</span></span>
								<input type="text" name="name" id="name" size="50" maxlength="50" required class="form-control input-lg" placeholder="Nama Universitas Anda" value="<?php echo set_value('name'); ?>" autocomplete="off" autofocus>
							</div>
							<?php echo form_error('alamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Alamat &#42;</span></span>
								<input type="text" name="alamat" id="alamat" required class="form-control input-lg" placeholder="Alamat Universitas Anda" value="<?php echo set_value('alamat'); ?>" autocomplete="off">
							</div>
							<?php echo form_error('jenjang', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Jenjang &#42;</span></span>
								<input type="text" name="jenjang" id="jenjang" required class="form-control input-lg" placeholder="Jenjang Universitas Anda" value="<?php echo set_value('alamat'); ?>" autocomplete="off">
							</div>
							<?php echo form_error('tgl_masuk', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Tanggal Masuk &#42;</span></span>
								<input class="form-control form-control-inline input-lg default-date-picker" size="16" type="text" value="<?php echo set_value('tgl_masuk'); ?>" name="tgl_masuk" id="tgl_masuk" placeholder="Tanggal Masuk Anda" />								
							</div>
							<?php echo form_error('jurusan', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
							<div class="input-group">
								<span class="input-group-addon"><span class="input-text">Jurusan &#42;</span></span>
								<input type="text" name="jurusan" id="jurusan" required class="form-control input-lg" placeholder="Jurusan Anda" value="<?php echo set_value('alamat'); ?>" autocomplete="off">
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