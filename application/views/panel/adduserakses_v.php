<section class="wrapper">
    <div class="row">
    	<div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-plus-sign-alt"></i> Form Add User Akses - <b><?php echo $user->user_username; ?></b>
        </header>

        <div class="row">
        	<div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Input Data User Akses
                </header>
                			
			<div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/users/savedataakses').'/'.$this->uri->segment(4); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            

            <div class="form-group has-success">
                <label class="control-label col-sm-2">Program Study :</label>
                <div class="col-sm-4 has-success">
                <select class="form-control m-bot15" name="lstProgdi" id="lstProgdi" required>
                    <option value="">- Choose Program Study -</option>
                    <?php foreach($progdi as $p) { ?>                        
                        <option value="<?php echo $p->progdi_id; ?>" <?php echo set_select('lstProgdi', $p->progdi_id); ?>><?php echo $p->progdi_name; ?></option>                            
                    <?php } ?>
                </select>
                </div>                    
            </div>
               
			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
            <a href="<?php echo site_url('panel/users/listakses').'/'.$this->uri->segment(4); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                        
			</form>
            </div>
			</section>
			</div>
        </div>		
	
        </section>
		</div>
    </div>
</section>        