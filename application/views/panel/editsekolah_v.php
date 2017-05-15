<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Detail Sekolah
            </header>
        
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Data Detail Sekolah
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="#" method="post" enctype="multipart/form-data">
                <input type="hidden" name="sekolah_id" value="<?php echo $sekolah->sekolah_id; ?>" />                

                <div class="form-group">
                    <label class="control-label col-sm-2">NIM :</label>
                    <div class="col-sm-3 has-success">
                   <input type="text" name="nim"  class="form-control" id="nim" placeholder="Enter NIM" value="<?php echo $sekolah->alumni_nim; ?>" autocomplete="off" required="true" autofocus>
                    </div>                
                </div>                                    

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Alumni :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="name" class="form-control" id="name"  placeholder="Enter Nama Alumni" value="<?php echo $sekolah->alumni_nama; ?>" autocomplete="off" required="true">
                    </div>                
                </div>
                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Fakultas :</label>
                    <div class="col-sm-3 has-success">
                    <select class="form-control m-bot15" name="lstProgdi" id="lstProgdi" >
                    <option value="">- Pilih Fakultas -</option>
                    <?php  foreach($fakultas as $f) { ?>
                        <?php if ($sekolah->fakultas_id == $f->fakultas_id) { ?>
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
                        <?php if ($sekolah->progdi_id == $p->progdi_id) { ?>
                        <option value="<? echo $p->progdi_id; ?>" selected><?php echo $p->progdi_name; ?></option>                             
                        <?php } else { ?>
                        <option value="<?php echo $p->progdi_id; ?>"><?php echo $p->progdi_name; ?></option>                            
                    <?php }
                        } ?>
                    </select>
                    </div>                    
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Sekolah :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="nama" class="form-control" id="nama"  placeholder="Enter Nama Sekolah" value="<?php echo $sekolah->sekolah_name; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Alamat :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="alamat" class="form-control" id="alamat"  placeholder="Enter Alamat" value="<?php echo $sekolah->sekolah_alamat; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Jenjang :</label>
                    <div class="col-sm-3 has-success">
                   <input type="text" name="web" class="form-control" id="web"  placeholder="Enter Website" value="<?php echo $sekolah->sekolah_jenjang; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Tgl. Masuk :</label>                         
                    <div class="col-sm-3 has-success">
                    <input class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="<?php echo $sekolah->sekolah_tgl_msk; ?>" name="tgl_masuk" id="tgl_masuk" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Jurusan :</label>
                    <div class="col-sm-4 has-success">
                   <input type="text" name="posisi" class="form-control" id="posisi"  placeholder="Enter Posisi Bekerja" value="<?php echo $sekolah->sekolah_jurusan; ?>" autocomplete="off" required="true">
                    </div>                
                </div>               

                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/sekolah'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
			
            </section>
		</div>
	</div>
</section>