<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Password User
            </header>
    
        <div class="row">
        	<div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Edit Password User
                </header>
                			
			<div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/resetpassword/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            
            <div class="form-group">
            	<label class="control-label col-sm-2">Username :</label>
            	<div class="col-sm-4 has-success">
               <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" value="<?php echo $detail->user_username; ?>" autocomplete="off" readonly="true">
                </div>                
			</div>			 
            <input type="hidden" name="alumni_nim" value="<?php echo $detail->alumni_nim; ?>" />

            <div class="form-group">
                <label class="control-label col-sm-2">Tanggal Lahir :</label>
                <div class="col-sm-4 has-success">
               <input type="text" name="tgl" class="form-control" id="tgl" placeholder="Enter Tgl. Lahir" value="<?php echo $detail->alumni_tgl_lhr; ?>" autocomplete="off" readonly="true">
                </div>                
            </div>

			<div class="form-group">
            	<label class="control-label col-sm-2">Ganti Password :</label>
            	<div class="col-sm-4 has-success">
               <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" autocomplete="off" required>
                </div>               
			</div>

			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update Password</button>            
            <a href="<?php echo site_url('panel/resetpassword'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                        
			</form>
            </div>
			</section>
			</div>
        </div>
		<!-- Akhir Form -->
			
            </section>
		</div>
	</div>
</section>