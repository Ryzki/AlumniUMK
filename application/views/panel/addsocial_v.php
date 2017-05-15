<section class="wrapper">
    <div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-plus-sign-alt"></i> Form Add Social
            </header>

            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Input Data Social
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/social/savedata'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                	<label class="control-label col-sm-2">Social Name :</label>
                	<div class="col-sm-6 has-success">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Social Name" value="<?php echo set_value('name'); ?>" autocomplete="off" required="true" autofocus>
                    </div>
                    <?php echo form_error('name', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>              
    			</div>
                                        
                <div class="form-group">
                    <label class="control-label col-sm-2">Social URL :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="url" class="form-control" id="url" placeholder="Enter Social URL" value="<?php echo set_value('url'); ?>" autocomplete="off" required="true">
                    </div>
                    <?php echo form_error('url', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>              
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Social Icon :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="icon" class="form-control" id="icon" placeholder="Enter Social Icon" value="<?php echo set_value('icon'); ?>" autocomplete="off" required="true">
                    </div>
                    <?php echo form_error('icon', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>              
                </div>

    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/social'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
    	
            </section>
		</div>
    </div>
</section>        