<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Detail Usaha
            </header>
        
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Data Detail Usaha
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="#" method="post" enctype="multipart/form-data">
                <input type="hidden" name="usaha_id" value="<?php echo $wirausaha->usaha_id; ?>" />                

                <div class="form-group">
                    <label class="control-label col-sm-2">NIM :</label>
                    <div class="col-sm-3 has-success">
                   <input type="text" name="nim"  class="form-control" id="nim" placeholder="Enter NIM" value="<?php echo $wirausaha->alumni_nim; ?>" autocomplete="off" required="true" autofocus>
                    </div>                
                </div>                                    

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Alumni :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="name" class="form-control" id="name"  placeholder="Enter Nama Alumni" value="<?php echo $wirausaha->alumni_nama; ?>" autocomplete="off" required="true">
                    </div>                
                </div>
                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Fakultas :</label>
                    <div class="col-sm-3 has-success">
                    <select class="form-control m-bot15" name="lstProgdi" id="lstProgdi" >
                    <option value="">- Pilih Fakultas -</option>
                    <?php  foreach($fakultas as $f) { ?>
                        <?php if ($wirausaha->fakultas_id == $f->fakultas_id) { ?>
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
                        <?php if ($wirausaha->progdi_id == $p->progdi_id) { ?>
                        <option value="<? echo $p->progdi_id; ?>" selected><?php echo $p->progdi_name; ?></option>                             
                        <?php } else { ?>
                        <option value="<?php echo $p->progdi_id; ?>"><?php echo $p->progdi_name; ?></option>                            
                    <?php }
                        } ?>
                    </select>
                    </div>                    
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Usaha :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="nama" class="form-control" id="nama"  placeholder="Enter Nama Usaha" value="<?php echo $wirausaha->usaha_name; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Alamat :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="alamat" class="form-control" id="alamat"  placeholder="Enter Alamat" value="<?php echo $wirausaha->usaha_alamat; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Website :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="web" class="form-control" id="web"  placeholder="Enter Website" value="<?php echo $wirausaha->usaha_web; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Bidang Usaha :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="bidang" class="form-control" id="bidang"  placeholder="Enter Bidang Usaha" value="<?php echo $wirausaha->usaha_bidang; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Jumlah Karyawan :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="jumlah" class="form-control" id="jumlah"  placeholder="Enter Jumlah Karyawan" value="<?php echo $wirausaha->usaha_jml_karyawan; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Besar Omzet /bulan :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="omzet" class="form-control" id="omzet"  placeholder="Enter Omzet /bulan" value="<?php echo $wirausaha->usaha_omzet; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Pengeluaran /bulan :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="pengeluaran" class="form-control" id="pengeluaran"  placeholder="Enter Pengeluaran /bulan" value="<?php echo $wirausaha->usaha_pengeluaran; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Skala Relevansi :</label>
                    <div class="col-sm-8 has-success">
                    <?php foreach($skala as $s) { ?>
                    <label>
                        <input type="radio" name="OptSkala" id="OptSkala" value="<?php echo $s->skala_id; ?>" <?php if ($wirausaha->skala_id==$s->skala_id) { echo 'checked'; } ?>>&nbsp<?php echo $s->skala_desc; ?>
                    </label>
                    <?php } ?>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Logo Usaha :</label>
                    <div class="col-sm-10">
                    <?php if (empty($wirausaha->usaha_logo)) { ?>
                       <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                    <?php } else { ?>
                       <img src="<?php echo base_url().'logo/'.$wirausaha->usaha_logo; ?>" alt="" height="120" width="120" />
                    <?php } ?>
                    </div>
                </div>

                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/wirausaha'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
			
            </section>
		</div>
	</div>
</section>