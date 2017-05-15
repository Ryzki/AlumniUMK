<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Alumni
            </header>
        
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Edit Data Alumni
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/alumni/updatedata'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="alumni_nim" value="<?php echo $alumni->alumni_nim; ?>" />               
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                            

                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Fakultas :</label>
                    <div class="col-sm-3 has-success">
                    <select class="form-control m-bot15" name="lstFakultas" id="lstFakultas" readonly \>
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
                    <select class="form-control m-bot15" name="lstProgdi" id="lstProgdi" readonly \>
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

                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Kegiatan :</label>
                    <div class="col-sm-3 has-success">
                    <select class="form-control m-bot15" name="lstKegiatan" id="lstKegiatan" readonly \>
                    <option value="">- Pilih Kegiatan -</option>
                    <?php  foreach($kegiatan as $k) { ?>
                        <?php if ($alumni->kegiatan_id == $k->kegiatan_id) { ?>
                        <option value="<? echo $k->kegiatan_id; ?>" selected><?php echo $k->kegiatan_desc; ?></option>                             
                        <?php } else { ?>
                        <option value="<?php echo $k->kegiatan_id; ?>"><?php echo $k->kegiatan_desc; ?></option>                            
                    <?php }
                        } ?>
                    </select>
                    </div>                    
                </div>

                <div class="form-group">
                	<label class="control-label col-sm-2">NIM :</label>
                	<div class="col-sm-3 has-success">
                   <input type="text" name="nim"  class="form-control" id="nim" placeholder="Enter NIM" value="<?php echo $alumni->alumni_nim; ?>" readonly \>
                    </div>                
                </div>                                    

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Alumni :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="name" class="form-control" id="name"  placeholder="Enter Nama Alumni" value="<?php echo $alumni->alumni_nama; ?>" readonly \>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Tgl. Lahir :</label>
                    <div class="col-sm-3 has-success">
                    <input class="form-control form-control-inline input-medium default-date-picker"   size="16" type="text" value="<?php echo $alumni->alumni_tgl_lhr; ?>" name="tgl_lahir" id="tgl_lahir" readonly />
                    </div>                
                </div>

                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Jenis Kelamin :</label>
                    <div class="col-sm-3 has-success">
                    <select class="form-control m-bot15" name="lstJK" id="lstJK" readonly \>
                    <option value="">- Pilih Jenis Kegiatan -</option>
                        <option value="Laki-Laki" <?php if ($alumni->alumni_jk == 'Laki-Laki') { echo "selected"; } ?>>Laki-Laki</option>
                        <option value="Perempuan" <?php if ($alumni->alumni_jk == 'Perempuan') { echo "selected"; } ?>>Perempuan</option>                        
                    </select>
                    </div>                    
                </div>                

                <div class="form-group">
                    <label class="control-label col-sm-2">Alamat :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="alamat" class="form-control" id="alamat"  placeholder="Enter Alamat" value="<?php echo $alumni->alumni_alamat; ?>" readonly \>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">No. Handphone :</label>
                    <div class="col-sm-3 has-success">
                   <input type="text" name="hp" class="form-control" id="hp"  placeholder="Enter No. Handphone" value="<?php echo $alumni->alumni_hp; ?>" readonly \>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Tgl. Masuk Kuliah :</label>                         
                    <div class="col-sm-3 has-success">
                    <input class="form-control form-control-inline input-medium default-date-picker"   size="16" type="text" value="<?php echo $alumni->alumni_tgl_masuk; ?>" name="tgl_masuk" id="tgl_masuk" readonly />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Tgl. Lulus Kuliah :</label>                         
                    <div class="col-sm-3 has-success">
                    <input class="form-control form-control-inline input-medium default-date-picker"   size="16" type="text" value="<?php echo $alumni->alumni_tgl_lulus; ?>" name="tgl_lulus" id="tgl_lulus" readonly />
                    </div>
                </div>                

                <div class="form-group">
                    <label class="control-label col-sm-2">Facebook :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="fb" class="form-control" id="fb"  placeholder="Enter Facebook" value="<?php echo $alumni->alumni_fb; ?>" readonly \>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">PIN BB :</label>
                    <div class="col-sm-3 has-success">
                   <input type="text" name="pin" class="form-control" id="pin"  placeholder="Enter PIN BB" value="<?php echo $alumni->alumni_pin_bb; ?>" readonly \>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Email :</label>
                    <div class="col-sm-3 has-success">
                   <input type="email" name="email" class="form-control" id="email"  placeholder="Enter Email" value="<?php echo $alumni->alumni_email; ?>" readonly \>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Tgl. Daftar :</label>                         
                    <div class="col-sm-3 has-success">
                    <input class="form-control form-control-inline input-medium default-date-picker"   size="16" type="text" value="<?php echo $alumni->alumni_tgl_daftar; ?>" name="tgl_daftar" id="tgl_daftar" readonly />
                    </div>
                </div>
    			
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('user/alumni/progdi/').'/'.$this->uri->segment(4); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
			
            </section>
		</div>
	</div>
</section>