<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Gaji
            </header>
    
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Edit Data Gaji
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/gaji/updatedata'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Gaji Desc :</label>
                	<div class="col-sm-6 has-success">
                   <input type="text" name="desc" class="form-control" id="desc" placeholder="Enter Gaji Desc" value="<?php echo $gaji->gaji_desc; ?>" autocomplete="off" required autofocus>
                    </div>                
    			</div>			 
                <input type="hidden" name="gaji_id" value="<?php echo $gaji->gaji_id; ?>" />

    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/gaji'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>    		
			
            </section>

		</div>
	</div>
</section>