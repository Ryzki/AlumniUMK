<section class="wrapper">
    <div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-plus-sign-alt"></i> Form Add Program Studi
            </header>

            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Input Data Program Studi
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/progdi/savedata'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Fakultas :</label>
                    <div class="col-sm-3 has-success">
                    <select class="form-control m-bot15" name="lstFakultas" id="lstFakultas" required>
                    <option value="">- Choose Fakultas -</option>
                    <?php foreach($fakultas as $p) { ?>                        
                        <option value="<?php echo $p->fakultas_id; ?>" <?php echo set_select('lstFakultas', $p->fakultas_id); ?>><?php echo $p->fakultas_name; ?></option>
                    <?php } ?>
                    </select>
                    </div>                    
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Progdi Code :</label>
                    <div class="col-sm-2 has-success">
                   <input type="text" name="code" class="form-control" id="code" size="2" maxlength="2" placeholder="Enter Progdi Code" value="<?php echo set_value('code'); ?>" autocomplete="off" required>
                    </div>
                    <?php echo form_error('code', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>              
                </div>
                <div class="form-group">
                	<label class="control-label col-sm-2">Progdi Name :</label>
                	<div class="col-sm-5 has-success">
                   <input type="text" name="name" class="form-control" id="name" placeholder="Enter Progdi Name" value="<?php echo set_value('name'); ?>" autocomplete="off" required>
                    </div>
                    <?php echo form_error('name', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>              
    			</div>
                                        
    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/progdi'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
    	
            </section>
		</div>
    </div>
</section>        