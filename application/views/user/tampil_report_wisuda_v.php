<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-bar-chart"></i> Laporan Data Wisudawan
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="10%">Tgl. Daftar</th>
                    	<th width="10%">N I M</th>
                        <th>Nama Wisudawan</th>
                        <th width="15%">No. HP</th>
                        <th width="15%">Fakultas</th>
                        <th width="15%">Progdi</th>
                        <th width="15%">Status</th>                                                
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach($preview as $r) { ?>
                    <tr class="gradeA">
                    	<td><? echo $r->wisuda_tgl_daftar; ?></td>
                        <td><? echo $r->alumni_nim; ?></td>
                        <td><? echo strtoupper($r->alumni_nama); ?></td>
                        <td><? echo $r->alumni_hp; ?></td>
                        <td><? echo $r->fakultas_name; ?></td>
                        <td><? echo $r->progdi_name; ?></td>
                        <td><? echo $r->wisuda_status; ?></td>                   
                    </tr>
                    <? } ?>
                    </tbody>
                    
                    <tfoot>
                    </tfoot>
    				</table>
                    </div>                    
    			</div>                                            
    		</section>
            <?php
                // Kondisi By  ID Progdi dan ID Kegiatan
                if (!empty($lastPost['lstProgdi']) && empty($lastPost['lstStatus'])) {                   
                ?>
                    <a href="<?php echo site_url('user/laporan_wisuda'); ?>/cetak_by_progdi/<?php echo $lastPost['lstProgdi']; ?>/<?php echo $lastPost['tgl1']; ?>/<?php echo $lastPost['tgl2']; ?>" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span> Preview</a>
                <?php
                } elseif (!empty($lastPost['lstProgdi']) && !empty($lastPost['lstStatus'])) {
                ?>
                    <a href="<?php echo site_url('user/laporan_wisuda'); ?>/cetak_by_id/<?php echo $lastPost['lstProgdi']; ?>/<?php echo $lastPost['tgl1']; ?>/<?php echo $lastPost['tgl2']; ?>/<?php echo $lastPost['lstStatus']; ?>" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span> Preview</a>
                <?php
                }
                ?>
                                                        
                <a href="<?php echo site_url('user/laporan_wisuda'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
		</div>

    </div>
</section>