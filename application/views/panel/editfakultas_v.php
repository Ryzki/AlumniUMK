<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Fakultas
            </header>
    
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Edit Data Fakultas
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/fakultas/updatedata'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Fakultas Title :</label>
                	<div class="col-sm-6 has-success">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Fakultas Title" value="<?php echo $fakultas->fakultas_title; ?>" autocomplete="off" required autofocus>
                    </div>                
    			</div>			 
                <input type="hidden" name="fakultas_id" value="<?php echo $fakultas->fakultas_id; ?>" />

                <div class="form-group">
                    <label class="control-label col-sm-2">Fakultas URL :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="url" class="form-control" id="url" placeholder="Enter Fakultas URL" value="<?php echo $fakultas->fakultas_url; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/fakultas'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back</a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>    		
			
            </section>

		</div>
	</div>
</section>