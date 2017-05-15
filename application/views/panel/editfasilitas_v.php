<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Fasilitas
            </header>
    
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Edit Data Fasilitas
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/fasilitas/updatedata'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Fasilitas Title :</label>
                	<div class="col-sm-6 has-success">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Fasilitas Title" value="<?php echo $fasilitas->fasilitas_title; ?>" autocomplete="off" required autofocus>
                    </div>                
    			</div>			 
                <input type="hidden" name="fasilitas_id" value="<?php echo $fasilitas->fasilitas_id; ?>" />

                <div class="form-group">
                    <label class="control-label col-sm-2">Fasilitas URL :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="url" class="form-control" id="url" placeholder="Enter Fasilitas URL" value="<?php echo $fasilitas->fasilitas_url; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/fasilitas'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back</a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>    		
			
            </section>

		</div>
	</div>
</section>