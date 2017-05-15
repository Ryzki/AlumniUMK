<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Detail Hubungi Kami
            </header>
    
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Data Hubungi Kami
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Nama :</label>
                	<div class="col-sm-5 has-success">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Nama Pengguna" value="<?php echo $hubungi->hubungi_nama; ?>" autocomplete="off" autofocus>
                    </div>                
    			</div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Email :</label>
                    <div class="col-sm-4 has-success">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo $hubungi->hubungi_email; ?>" autocomplete="off">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Subyek :</label>
                    <div class="col-sm-5 has-success">
                    <input type="text" name="company" class="form-control" id="company" placeholder="Enter Nama Perusahaan" value="<?php echo $hubungi->hubungi_subyek; ?>" autocomplete="off">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Pesan :</label>
                    <div class="col-sm-8">
                    <textarea class="form-control" name="deskripsi" rows="6"><?php echo $hubungi->hubungi_pesan; ?></textarea>
                    </div>                
                </div>
                

                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/hubungi'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>    		
			
            </section>
            
		</div>
	</div>
</section>