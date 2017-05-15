<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Social
            </header>
    
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Edit Data Social
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/social/updatedata'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Social Name :</label>
                	<div class="col-sm-6 has-success">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Social Name" value="<?php echo $social->social_name; ?>" autocomplete="off" required autofocus>
                    </div>                
    			</div>			 
                <input type="hidden" name="social_id" value="<?php echo $social->social_id; ?>" />

                <div class="form-group">
                    <label class="control-label col-sm-2">Social URL :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="url" class="form-control" id="url" placeholder="Enter Social URL" value="<?php echo $social->social_url; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Social Icon :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="icon" class="form-control" id="icon" placeholder="Enter Social Icon" value="<?php echo $social->social_icon; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/social'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back</a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>    		
			
            </section>

		</div>
	</div>
</section>