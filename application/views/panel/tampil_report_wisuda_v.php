<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-bar-chart"></i> Laporan Wisuda
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th>Foto</th>
                    	<th width="10%">N I M</th>
                        <th>Nama</th>
                        <th>Tmpt. Lhr</th>
                        <th>Tgl. Lhr</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Email</th>
                        <th>Judul</th>                                                
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach($preview as $r) { ?>
                    <tr class="gradeA">
                    	<td><img src="<?php echo base_url(); ?>foto/<? echo $r->alumni_foto; ?>" height="100" width="75"></td>
                        <td><? echo $r->alumni_nim; ?></td>
                        <td><? echo strtoupper($r->alumni_nama); ?></td>
                        <td><? echo $r->alumni_tmpt_lhr; ?></td>
                        <td><? echo $r->alumni_tgl_lhr; ?></td>
                        <td><? echo $r->alumni_agama; ?></td>
                        <td><? echo $r->alumni_alamat; ?></td>
                        <td><? echo $r->alumni_hp; ?></td>
                        <td><? echo $r->alumni_email; ?></td>
                        <td><? echo $r->wisuda_judulproyek; ?></td>                   
                    </tr>
                    <? } ?>
                    </tbody>
                    
                    <tfoot>
                    </tfoot>
    				</table>
                    </div>                    
    			</div>                
                
                <?php                
                if (empty($lastPost['lstProgdi'])) {                    
                ?>
                <!--    <a href="<?php echo site_url('panel/lap_wisuda'); ?>/cetak_all/<?php echo $lastPost['tgl1']; ?>/<?php echo $lastPost['tgl2']; ?>" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span> Preview</a> -->
                <?php                
                } else {
                ?>
                <!--    <a href="<?php echo site_url('panel/lap_wisuda'); ?>/cetak_by_progdi/<?php echo $lastPost['lstProgdi']; ?>/<?php echo $lastPost['tgl1']; ?>/<?php echo $lastPost['tgl2']; ?>" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span> Preview</a> -->
                <?php
                }
                ?>
                                                        
                <a href="<?php echo site_url('panel/lap_wisuda'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
    		</section>
		</div>
    </div>
</section>