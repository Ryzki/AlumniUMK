<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-bar-chart"></i> Laporan Data Alumni
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>                        
                    	<th width="10%">N I M</th>
                        <th>Nama Alumni</th>
                        <th width="15%">No. HP</th>
                        <th width="15%">Fakultas</th>
                        <th width="15%">Progdi</th>                                                                    
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach($preview as $r) { ?>
                    <tr class="gradeA">                    	
                        <td><? echo $r->alumni_nim; ?></td>
                        <td><? echo strtoupper($r->alumni_nama); ?></td>
                        <td><? echo $r->alumni_hp; ?></td>
                        <td><? echo $r->fakultas_name; ?></td>
                        <td><? echo $r->progdi_name; ?></td>                                        
                    </tr>
                    <? } ?>
                    </tbody>
                    
                    <tfoot>
                    </tfoot>
    				</table>
                    </div>                    
    			</div>                                            
    		</section>
            
            <a href="<?php echo site_url('user/laporan_alumni'); ?>/cetak_by_progdi/<?php echo $lastPost['lstProgdi']; ?>" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-print"></span> Preview</a>                            
            <a href="<?php echo site_url('user/laporan_alumni'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
		</div>

    </div>
</section>