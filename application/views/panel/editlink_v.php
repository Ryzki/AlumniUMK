<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Link
            </header>
    
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Edit Data Link
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/link/updatedata'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Link Title :</label>
                	<div class="col-sm-6 has-success">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Link Title" value="<?php echo $link->link_title; ?>" autocomplete="off" required autofocus>
                    </div>                
    			</div>			 
                <input type="hidden" name="link_id" value="<?php echo $link->link_id; ?>" />

                <div class="form-group">
                    <label class="control-label col-sm-2">Link URL :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="url" class="form-control" id="url" placeholder="Enter Link URL" value="<?php echo $link->link_url; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/link'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back</a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>    		
			
            </section>

		</div>
	</div>
</section>