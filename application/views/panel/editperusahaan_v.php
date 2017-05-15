<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Detail Perusahaan
            </header>
        
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Data Detail Perusahaan
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="#" method="post" enctype="multipart/form-data">
                <input type="hidden" name="perusahaan_id" value="<?php echo $perusahaan->perusahaan_id; ?>" />                

                <div class="form-group">
                    <label class="control-label col-sm-2">NIM :</label>
                    <div class="col-sm-3 has-success">
                   <input type="text" name="nim"  class="form-control" id="nim" placeholder="Enter NIM" value="<?php echo $perusahaan->alumni_nim; ?>" autocomplete="off" required="true" autofocus>
                    </div>                
                </div>                                    

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Alumni :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="name" class="form-control" id="name"  placeholder="Enter Nama Alumni" value="<?php echo $perusahaan->alumni_nama; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Fakultas :</label>
                    <div class="col-sm-3 has-success">
                    <select class="form-control m-bot15" name="lstProgdi" id="lstProgdi" >
                    <option value="">- Pilih Fakultas -</option>
                    <?php  foreach($fakultas as $f) { ?>
                        <?php if ($perusahaan->fakultas_id == $f->fakultas_id) { ?>
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
                        <?php if ($perusahaan->progdi_id == $p->progdi_id) { ?>
                        <option value="<? echo $p->progdi_id; ?>" selected><?php echo $p->progdi_name; ?></option>                             
                        <?php } else { ?>
                        <option value="<?php echo $p->progdi_id; ?>"><?php echo $p->progdi_name; ?></option>                            
                    <?php }
                        } ?>
                    </select>
                    </div>                    
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Perusahaan :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="nama" class="form-control" id="nama"  placeholder="Enter Nama Perusahaan" value="<?php echo $perusahaan->perusahaan_name; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Alamat :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="alamat" class="form-control" id="alamat"  placeholder="Enter Alamat" value="<?php echo $perusahaan->perusahaan_alamat; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Website :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="web" class="form-control" id="web"  placeholder="Enter Website" value="<?php echo $perusahaan->perusahaan_web; ?>" autocomplete="off" required="true">
                    </div>                
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2">Jenis Perusahaan :</label>
                    <div class="col-sm-6 has-success">
                    <?php foreach($jenis as $j) { ?>
                    <label>
                        <input type="radio" name="OptJenis" id="OptJenis" value="<?php echo $j->jenis_id; ?>" <?php if ($perusahaan->jenis_id==$j->jenis_id) { echo 'checked'; } ?>>&nbsp<?php echo $j->jenis_desc; ?>
                    </label>
                    <?php } ?>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Lainnya :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="lain" class="form-control" id="lain"  placeholder="Enter Lainnya" value="<?php echo $perusahaan->perusahaan_lain; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Tgl. Masuk Kerja :</label>                         
                    <div class="col-sm-3 has-success">
                    <input class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="<?php echo $perusahaan->perusahaan_tgl_masuk; ?>" name="tgl_masuk" id="tgl_masuk" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Posisi Pertama Bekerja :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="posisi" class="form-control" id="posisi"  placeholder="Enter Posisi Bekerja" value="<?php echo $perusahaan->perusahaan_posisi; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Gaji :</label>
                    <div class="col-sm-6 has-success">
                    <?php foreach($gaji as $g) { ?>
                    <label>
                        <input type="radio" name="OptGaji" id="OptGaji" value="<?php echo $g->gaji_id; ?>" <?php if ($perusahaan->gaji_id==$g->gaji_id) { echo 'checked'; } ?>>&nbsp<?php echo $g->gaji_desc; ?>
                    </label>
                    <?php } ?>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Sumber Informasi :</label>
                    <div class="col-sm-8 has-success">
                    <?php foreach($info as $i) { ?>
                    <label>
                        <input type="radio" name="OptInfo" id="OptInfo" value="<?php echo $i->info_id; ?>" <?php if ($perusahaan->info_id==$i->info_id) { echo 'checked'; } ?>>&nbsp<?php echo $i->info_desc; ?>
                    </label>
                    <?php } ?>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Skala Relevansi :</label>
                    <div class="col-sm-8 has-success">
                    <?php foreach($skala as $s) { ?>
                    <label>
                        <input type="radio" name="OptSkala" id="OptSkala" value="<?php echo $s->skala_id; ?>" <?php if ($perusahaan->skala_id==$s->skala_id) { echo 'checked'; } ?>>&nbsp<?php echo $s->skala_desc; ?>
                    </label>
                    <?php } ?>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Catatan Mata Kuliah :</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="deskripsi" rows="6"><?php echo $perusahaan->perusahaan_catatan; ?></textarea>
                    </div>
                </div>

                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/perusahaan'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
			
            </section>
		</div>
	</div>
</section>