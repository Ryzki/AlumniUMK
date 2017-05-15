<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Setting Wisuda
            </header>
        
        <div class="row">
        	<div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Data Setting Wisuda
                </header>
                			
			<div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/setting/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            
            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Periode Wisuda :</label>                         
                <div class="col-sm-2 has-success">
                <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="<?php echo $setting->setting_periode; ?>" name="tgl_periode" id="tgl_periode" />
                </div>
                <?php echo form_error('tgl_periode', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
            </div>

            <div class="form-group">
				<label class="col-sm-2 control-label col-sm-2">Informasi :</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="informasi" rows="6"><?php echo $setting->setting_info; ?></textarea>
                </div>
			</div>

            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Persyaratan Wisuda :</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="syarat" id='syarat' rows="6"><?php echo $setting->setting_syarat; ?></textarea>
                </div>
            </div>

            <div class="form-group has-success">
                    <label class="control-label col-sm-2">Status Pendaftaran :</label>
                    <div class="col-sm-4 has-success">
                    <select class="form-control m-bot15" name="lstStatus" id="lstStatus" required>
                    <option value="">- Choose Status -</option>                    
                    <option value="Ya" <?php if ($setting->setting_open == 'Ya') { echo 'selected'; }  ?> >Ya</option>
                    <option value="Tidak" <?php if ($setting->setting_open == 'Tidak') { echo 'selected'; } ?> >Tidak</option>
                    </select>
                    </div>                    
            </div>                  

			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
            <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>            
                                        
			</form>
            </div>
			</section>
			</div>
        </div>		
			
            </section>
		</div>
	</div>
</section>