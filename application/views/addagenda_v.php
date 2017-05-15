<section class="wrapper">
    <div class="row">
    	<div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-plus-sign-alt"></i> Form Add Agenda
        </header>

        <div class="row">
        	<div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Input Data Agenda
                </header>
                			
			<div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('agenda/savedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            

            <div class="form-group">
            	<label class="control-label col-sm-2">Title :</label>
            	<div class="col-sm-6 has-success">
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="<?php echo set_value('title'); ?>" autocomplete="off" required="true">
                </div>
                <?php echo form_error('title', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>			
            </div>            
            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Short Description :</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="short" id="short" rows="6"></textarea>
                </div>                
            </div>
            <div class="form-group">
				<label class="col-sm-2 control-label col-sm-2">Description :</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="deskripsi" rows="6"></textarea>
                </div>
			</div>
                                                            
			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
            <a href="<?php echo site_url('agenda'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                        
			</form>
            </div>
			</section>
			</div>
        </div>		
	
        </section>
		</div>
    </div>
</section>        