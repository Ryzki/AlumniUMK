<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit User Akses
            </header>
    
        <div class="row">
        	<div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Edit Data User Akses
                </header>
                			
			<div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/users/updatedataakses').'/'.$this->uri->segment(4).'/'.$this->uri->segment(5); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">			 
            <input type="hidden" name="akses_id" value="<?php echo $detail->akses_id; ?>" /> 

            <div class="form-group has-success">
                <label class="control-label col-sm-2">Program Study :</label>
                <div class="col-sm-4 has-success">
                <select class="form-control m-bot15" name="lstProgdi" id="lstProgdi" required>
                    <option value="">- Choose Program Study -</option>
                    <?php foreach($progdi as $p) { ?>
                        <?php if ($p->progdi_id == $detail->progdi_id) { ?>
                        <option value="<?php echo $p->progdi_id; ?>" selected><?php echo $p->progdi_name; ?></option>
                        <?php } else { ?>                        
                        <option value="<?php echo $p->progdi_id; ?>"><?php echo $p->progdi_name; ?></option>                            
                    <?php } 
                    } ?>
                </select>
                </div>                    
            </div>
               

			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
            <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
            <a href="<?php echo site_url('panel/users/listakses').'/'.$this->uri->segment(4); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                        
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