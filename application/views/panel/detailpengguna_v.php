<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Detail Pengguna Alumni
            </header>
    
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Data Pengguna Alumni
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Nama Pengguna :</label>
                	<div class="col-sm-5 has-success">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Nama Pengguna" value="<?php echo $pengguna->pengguna_nama; ?>" autocomplete="off" autofocus>
                    </div>                
    			</div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Jabatan :</label>
                    <div class="col-sm-4 has-success">
                    <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Enter Jabatan" value="<?php echo $pengguna->pengguna_jabatan; ?>" autocomplete="off">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Email :</label>
                    <div class="col-sm-4 has-success">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo $pengguna->pengguna_email; ?>" autocomplete="off">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">No. Handphone :</label>
                    <div class="col-sm-3 has-success">
                    <input type="text" name="hp" class="form-control" id="hp" placeholder="Enter No. Handphone" value="<?php echo $pengguna->pengguna_hp; ?>" autocomplete="off">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Perusahaan :</label>
                    <div class="col-sm-5 has-success">
                    <input type="text" name="company" class="form-control" id="company" placeholder="Enter Nama Perusahaan" value="<?php echo $pengguna->pengguna_perusahaan; ?>" autocomplete="off">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Alamat Perusahaan :</label>
                    <div class="col-sm-5">
                    <textarea class="form-control" name="deskripsi" rows="4"><?php echo $pengguna->pengguna_almt_perus; ?></textarea>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">No. Telp :</label>
                    <div class="col-sm-3 has-success">
                    <input type="text" name="telp" class="form-control" id="telp" placeholder="Enter No. Telp" value="<?php echo $pengguna->pengguna_telp_perus; ?>" autocomplete="off">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">No. Fax :</label>
                    <div class="col-sm-3 has-success">
                    <input type="text" name="fax" class="form-control" id="fax" placeholder="Enter No. Fax" value="<?php echo $pengguna->pengguna_fax_perus; ?>" autocomplete="off">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Website :</label>
                    <div class="col-sm-3 has-success">
                    <input type="text" name="web" class="form-control" id="web" placeholder="Enter Website" value="<?php echo $pengguna->pengguna_web_perus; ?>" autocomplete="off">
                    </div>                
                </div>

                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/pengguna'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>    		
			
            </section>
            
		</div>
	</div>
</section>