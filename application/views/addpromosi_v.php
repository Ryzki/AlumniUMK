<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Add Promosi
            </header>
        
            <div class="row">
                <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Input Data Promosi
                    </header>
                                
                <div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('promosi/insertusaha'); ?>" method="post" enctype="multipart/form-data">                            
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                            

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Usaha :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter Nama Usaha" value="<?php echo set_value('nama'); ?>" autocomplete="off" required="true">
                    </div>                
                </div>
                <?php echo form_error('nama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                <div class="form-group">
                    <label class="control-label col-sm-2">Alamat Usaha :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Enter Alamat Usaha" value="<?php echo set_value('alamat'); ?>" autocomplete="off" required="true">
                    </div>                
                </div>
                <?php echo form_error('alamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                <div class="form-group">
                    <label class="control-label col-sm-2">Web Usaha :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="web" class="form-control" id="web" placeholder="Enter Web Usaha" value="<?php echo set_value('web'); ?>" autocomplete="off" required>
                    </div>                
                </div>
                <?php echo form_error('web', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                <div class="form-group">
                    <label class="control-label col-sm-2">Bidang Usaha :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="bidang" class="form-control" id="bidang" placeholder="Enter Bidang Usaha" value="<?php echo set_value('bidang'); ?>" autocomplete="off" required>
                    </div>                
                </div>
                <?php echo form_error('bidang', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                <div class="form-group">
                    <label class="control-label col-sm-2">Jumlah Karyawan :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Enter Jumlah Karyawan" value="<?php echo set_value('bidang'); ?>" autocomplete="off" required>
                    </div>                
                </div>
                <?php echo form_error('jumlah', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                <div class="form-group">
                    <label class="control-label col-sm-2">Omzet / Bulan :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="omzet" class="form-control" id="omzet" placeholder="Enter Omzet / Bulan" value="<?php echo set_value('omzet'); ?>" autocomplete="off" required>
                    </div>                
                </div>
                <?php echo form_error('omzet', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                <div class="form-group">
                    <label class="control-label col-sm-2">Pengeluaran /Bln :</label>
                    <div class="col-sm-6 has-success">
                    <input type="text" name="pengeluaran" class="form-control" id="pengeluaran" placeholder="Enter Pengeluaran / Bulan" value="<?php echo set_value('pengeluaran'); ?>" autocomplete="off" required>
                    </div>                
                </div>
                <?php echo form_error('pengeluaran', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                            
                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Description :</label>
                    <div class="col-sm-10">
                    <textarea class="form-control ckeditor" name="desc" rows="6"><?php echo set_value('desc'); ?></textarea>
                    </div>
                </div>
                <?php echo form_error('desc', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                

                <div class="form-group">
                    <label class="control-label col-sm-2">Upload Logo</label>
                    <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="<?php echo base_url(); ?>img/no_image.gif" alt="" />
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                    <span class="btn btn-white btn-file">
                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                    <input type="file" class="default" name="userfile" />
                    </span>
                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                    </div>
                    </div>
                    <span class="label label-danger">NOTE!</span>
                    <span>
                    (Resolution Image : 300 x 250 pixel)                    
                    </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>                
                <a href="<?php echo site_url('promosi'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
                </form>
                </div>
                </section>
                </div>
            </div>      
            
            </section>
        </div>
    </div>
</section>