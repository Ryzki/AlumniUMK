<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Wisudawan
            </header>
        
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Edit Data Wisudawan
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('user/wisuda/updatedata').'/'.$this->uri->segment(4); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="wisuda_id" value="<?php echo $detail->wisuda_id; ?>" />                                
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                            

                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Fakultas :</label>
                    <div class="col-sm-3 has-success">
                    <select class="form-control m-bot15" name="lstFakultas" id="lstFakultas" readonly>
                    <option value="">- Pilih Fakultas -</option>
                    <?php  foreach($fakultas as $f) { ?>
                        <?php if ($detail->fakultas_id == $f->fakultas_id) { ?>
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
                        <?php if ($detail->progdi_id == $p->progdi_id) { ?>
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
                   <input type="text" name="nim" readonly class="form-control" id="nim" placeholder="Enter NIM" value="<?php echo $detail->alumni_nim; ?>" autocomplete="off" required="true" autofocus>
                    </div>                
                </div>                                    

                <div class="form-group">
                    <label class="control-label col-sm-2">Nama Member :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="name" class="form-control" id="name" readonly placeholder="Enter Nama Alumni" value="<?php echo $detail->alumni_nama; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">No. Pendataran Wisuda :</label>
                    <div class="col-sm-6 has-success">
                   <input type="text" name="name" class="form-control" id="name" readonly placeholder="Enter Nama Alumni" value="<?php echo $detail->wisuda_id; ?>" autocomplete="off" required="true">
                    </div>                
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Tgl. Daftar Wisuda :</label>                         
                    <div class="col-sm-3 has-success">
                    <input class="form-control form-control-inline input-medium default-date-picker" readonly  size="16" type="text" value="<?php echo $detail->wisuda_tgl_daftar; ?>" name="tgl_daftar" id="tgl_daftar" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Foto copy Ijazah :</label>
                    <div class="col-sm-6 has-success">        
                    <input type="checkbox" name="chkIjazah" id="chkIjazah" value="1" <?php if ($detail->wisuda_ftcp_ijazah == 1) { echo "checked"; } ?>> Sudah
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Foto copy Judul Skripsi :</label>
                    <div class="col-sm-6 has-success">        
                    <input type="checkbox" name="chkJudul" id="chkJudul" value="1" <?php if ($detail->wisuda_ftcp_judul == 1) { echo "checked"; } ?> > Sudah
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Foto copy SKW :</label>
                    <div class="col-sm-6 has-success">        
                    <input type="checkbox" name="chkKW" id="chkKW" value="1" <?php if ($detail->wisuda_ftcp_kw == 1) { echo "checked"; } ?> > Sudah
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Foto 3x4 Hitam Putih :</label>
                    <div class="col-sm-6 has-success">        
                    <input type="checkbox" name="chkFoto" id="chkFoto" value="1" <?php if ($detail->wisuda_foto == 1) { echo "checked"; } ?> > Sudah
                    </div>
                </div>
        
                <div class="form-group has-success">
                    <label class="control-label col-sm-2">Status Syarat :</label>
                    <div class="col-sm-4 has-success">
                    <select class="form-control m-bot15" name="lstStatus" id="lstStatus">
                        <option value="Proses" <?php if ($detail->wisuda_status == 'Proses') { echo "selected"; } ?> >Proses</option>
                        <option value="Lengkap" <?php if ($detail->wisuda_status == 'Lengkap') { echo "selected"; } ?> >Lengkap</option>                    
                    </select>
                    </div>                    
                </div>

    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('user/wisuda/progdi').'/'.$this->uri->segment(4); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
			
            </section>
		</div>
	</div>
</section>