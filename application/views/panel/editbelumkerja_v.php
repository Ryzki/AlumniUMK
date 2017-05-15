<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Detail Belum Bekerja
            </header>
        
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Data Detail Belum Bekerja
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="#" method="post" enctype="multipart/form-data">
                <input type="hidden" name="kerja_id" value="<?php echo $kerja->kerja_id; ?>" />                

                <div class="form-group">
                    <label class="control-label col-sm-2">NIM :</label>
                    <div class="col-sm-3 has-success">
                   <input type="text" name="nim"  class="form-control" id="nim" placeholder="Enter NIM" value="<?php echo $kerja->alumni_nim; ?>" autocomplete="off" required="true" autofocus>
                    </div>                
                </div>                                    

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Alumni :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="name" class="form-control" id="name"  placeholder="Enter Nama Alumni" value="<?php echo $kerja->alumni_nama; ?>" autocomplete="off" required="true">
                    </div>                
                </div>
                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Fakultas :</label>
                    <div class="col-sm-3 has-success">
                    <select class="form-control m-bot15" name="lstProgdi" id="lstProgdi" >
                    <option value="">- Pilih Fakultas -</option>
                    <?php  foreach($fakultas as $f) { ?>
                        <?php if ($kerja->fakultas_id == $f->fakultas_id) { ?>
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
                    <select class="form-control m-bot15" name="lstProgdi" id="lstProgdi" >
                    <option value="">- Pilih Program Studi -</option>
                    <?php  foreach($progdi as $p) { ?>
                        <?php if ($kerja->progdi_id == $p->progdi_id) { ?>
                        <option value="<? echo $p->progdi_id; ?>" selected><?php echo $p->progdi_name; ?></option>                             
                        <?php } else { ?>
                        <option value="<?php echo $p->progdi_id; ?>"><?php echo $p->progdi_name; ?></option>                            
                    <?php }
                        } ?>
                    </select>
                    </div>                    
                </div>

                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Aktifitas :</label>
                    <div class="col-sm-4 has-success">
                    <select class="form-control m-bot15" name="lstAktifitas" id="lstAktifitas" >
                    <option value="">- Pilih Aktifitas -</option>
                    <?php  foreach($aktifitas as $a) { ?>
                        <?php if ($kerja->aktifitas_id == $a->aktifitas_id) { ?>
                        <option value="<? echo $a->aktifitas_id; ?>" selected><?php echo $a->aktifitas_desc; ?></option>                             
                        <?php } else { ?>
                        <option value="<?php echo $a->aktifitas_id; ?>"><?php echo $a->aktifitas_desc; ?></option> 
                    <?php }
                        } ?>
                    </select>
                    </div>                    
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Saran 1 :</label>
                    <div class="col-sm-10">
                    <textarea class="form-control ckeditor" name="deskripsi" rows="6"><?php echo $kerja->kerja_saran1; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Saran Perbaikan :</label>
                    <div class="col-sm-10">
                    <textarea class="form-control ckeditor" name="deskripsi" rows="6"><?php echo $kerja->kerja_saran2; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Notif Email ? :</label>
                    <div class="col-sm-6 has-success">        
                    <input type="checkbox" name="chkEmail" id="chkEmail" value="1" <?php if ($kerja->kerja_notif_email==1) { echo "checked"; } ?>> Yes
                    </div>
                </div>                

                <div class="form-group">
                    <label class="control-label col-sm-2">Notif SMS ? :</label>
                    <div class="col-sm-6 has-success">        
                    <input type="checkbox" name="chkSMS" id="chkSMS" value="1" <?php if ($kerja->kerja_notif_sms==1) { echo "checked"; } ?>> Yes
                    </div>
                </div> 

                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/belumkerja'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
			
            </section>
		</div>
	</div>
</section>