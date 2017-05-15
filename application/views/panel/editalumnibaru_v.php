<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Member Baru
            </header>
        
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Edit Data Member Baru
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/baru/updatedatabaru'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="alumni_nim" value="<?php echo $alumni->alumni_nim; ?>" />
                <input type="hidden" name="email" value="<?php echo $alumni->alumni_email; ?>" />
                
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                            

                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Fakultas :</label>
                    <div class="col-sm-3 has-success">
                    <select class="form-control m-bot15" name="lstFakultas" id="lstFakultas" readonly>
                    <option value="">- Pilih Fakultas -</option>
                    <?php  foreach($fakultas as $f) { ?>
                        <?php if ($alumni->fakultas_id == $f->fakultas_id) { ?>
                        <option value="<? echo $f->fakultas_id; ?>" selected><?php echo $f->fakultas_name; ?></option>                             
                        <?php } else { ?>
                        <option value="<?php echo $f->fakultas_id; ?>"><?php echo $f->fakultas_name; ?></option>                            
                    <?php }
                        } ?>
                    </select>
                    </div>                    
                </div>

                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Program Studi :</label>
                    <div class="col-sm-3 has-success">
                    <select class="form-control m-bot15" name="lstProgdi" id="lstProgdi" readonly>
                    <option value="">- Pilih Program Studi -</option>
                    <?php  foreach($progdi as $p) { ?>
                        <?php if ($alumni->progdi_id == $p->progdi_id) { ?>
                        <option value="<? echo $p->progdi_id; ?>" selected><?php echo $p->progdi_name; ?></option>                             
                        <?php } else { ?>
                        <option value="<?php echo $p->progdi_id; ?>"><?php echo $p->progdi_name; ?></option>                            
                    <?php }
                        } ?>
                    </select>
                    </div>                    
                </div>

                <div class="form-group">
                	<label class="control-label col-sm-2">NIM :</label>
                	<div class="col-sm-2 has-success">
                   <input type="text" name="nim" readonly class="form-control" id="nim" placeholder="Enter NIM" value="<?php echo $alumni->alumni_nim; ?>" autocomplete="off" required="true" autofocus>
                    </div>                
                </div>                                    

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Member :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="name" class="form-control" id="name" readonly placeholder="Enter Nama Alumni" value="<?php echo $alumni->alumni_nama; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Tgl. Daftar :</label>                         
                    <div class="col-sm-3 has-success">
                    <input class="form-control form-control-inline input-medium default-date-picker" readonly  size="16" type="text" value="<?php echo $alumni->alumni_tgl_daftar; ?>" name="tgl_daftar" id="tgl_daftar" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Aktifkan ? :</label>
                    <div class="col-sm-6 has-success">        
                    <input type="checkbox" name="chkAktif" id="chkAktif" value="1" <?php if ($alumni->alumni_active == 1) { echo "checked"; } ?> required> Yes
                    </div>
                </div>

    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/baru'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
			
            </section>
		</div>
	</div>
</section>