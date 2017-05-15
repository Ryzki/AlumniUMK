<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-bar-chart"></i> Laporan Alumni
            </header>

            <div class="row">
                <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Pilih Program Studi dan Kegiatan Alumni
                    </header>
                                
                <div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/lap_progdi/preview'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                    <label class="control-label col-sm-2">Fakultas - Progdi Name :</label>
                    <div class="col-sm-4">
                    <select class="form-control m-bot15" name="lstProgdi" required="true" autofocus>
                        <option value="">- Choose Fakultas/Progdi -</option>
                        <option value="all">Semua Fakultas/Progdi</option>
                        <?php  foreach($progdi as $p) { ?>
                        <option value="<?php echo $p->progdi_id; ?>"><?php echo $p->fakultas_name.' - '.$p->progdi_name; ?></option>                    
                        <?php } ?>
                        </select>
                    </div>                    
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2">Kegiatan Alumni :</label>
                    <div class="col-sm-4">
                    <select class="form-control m-bot15" name="lstKegiatan" required="true">
                        <option value="">- Choose Kegiatan -</option>
                        <option value="all">Semua Kegiatan</option>
                        <?php  foreach($kegiatan as $k) { ?>
                        <option value="<?php echo $k->kegiatan_id; ?>"><?php echo $k->kegiatan_desc; ?></option>                    
                        <?php } ?>
                        </select>
                    </div>                    
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Periode Lulus :</label>
                    <div class="col-sm-4">                                
                        <div class="input-group input-large" data-date="<? echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
                            <input type="text" class="form-control default-date-picker" id="tgl1" name="tgl1" placeholder="Enter Tanggal" required>
                            <span class="input-group-addon">s/d</span>
                            <input type="text" class="form-control default-date-picker" id="tgl2" name="tgl2" placeholder="Enter Tanggal" required>
                        </div>
                    </div>                   
                </div> 

                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Search</button>                
                                            
                </form>
                </div>
                </section>
                </div>
            </div>            	
               

    		</section>
		</div>
    </div>
</section>