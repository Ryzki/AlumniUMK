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
				<li class="active">IKLAN</li>
			</ul>
       	</div>
    </div>

	<div class="container">
	    <div class="row">
	       	<div class="col-md-12">
				<header class="content-title">
					<h1 class="title">Pendaftaran Alumni > Usaha > Iklan</h1>
					<p class="title-desc"></p>
				</header>
	        		
	        	<div class="xs-margin"></div><!-- space -->
	        		
	        	<form action="<?php echo site_url().'register/updateusaha/'.$this->uri->segment(3).'/'.$this->uri->segment(4); ?>" id="register-form" method="post" enctype="multipart/form-data">
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">	        	
		        	<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<p align="justify">
							Anda berkesempatan mengiklankan usaha Anda di website ini dengan memberikan donasi sebesar <b>Rp. 50.000,-</b> per iklan per Tahun.
							Logo perusahaan Anda akan terpampang di halaman <b>Promosi Alumni</b>, Donasi Anda merupakan bentuk partisipasi alumni untuk mendukung
							pengembangan Non Akademik FT-UMK.
							<br><br>
							Mengiklankan usaha Anda tidaklah wajib, jika Anda berkenan maka Anda bisa lewati halaman ini dengan Klik tombol Lewati.
							</p>
							<p>Logo Perusahaan Anda :</p>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<fieldset>					                
					                <div class="input-group">
						                <div class="fileupload fileupload-new" data-provides="fileupload">
						                	<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
						                		<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
					                		</div>
					               			<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
							                <div>
								                <span class="btn btn-white btn-file">
									                <span class="fileupload-new"><i class="icon-paper-clip"></i> Browse</span>
									                <span class="fileupload-exists"><i class="icon-undo"></i> Ganti</span>
									                <input type="file" class="default" name="userfile" />
								                </span>							                	
							                </div>
						                </div>			                			              
					                </div>
					                
					                <?php echo form_error('chkKet', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
					                <div class="input-group custom-checkbox">
										<input type="checkbox" name="chkKet" id="chkKet" onclick="CekList()">
										<span class="checbox-container">
											<i class="fa fa-check"></i>
										</span>
										Saya setuju untuk mengiklankan Usaha saya
									</div>

									<input type="submit" value="Simpan & Lanjut >>" name="btnSave" id="btnSave" class="btn btn-custom-2 btn-lg md-margin" disabled="true">
				            		<a href="<?php echo site_url('register/selesai_usaha'); ?>">Lewati >></a>
					            </fieldset>					            
				            </div>				            				            
						</div> 		        			       			        			
					</div><!-- End .row -->
	        	</form>	

	        </div>
	    </div>
	</div>

</section>    