<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-bar-chart"></i> Data Kuesioner Alumni
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="10%">Tgl. Post</th>
                    	<th width="10%">N I M</th>
                        <th>Nama Alumni</th>
                        <th width="20%">Fakultas</th>
                        <th width="20%">Program Studi</th>                        
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach($preview as $r) { ?>
                    <tr class="gradeA">
                    	<td><? echo $r->dikti_date_update; ?></td>
                        <td><? echo $r->alumni_nim; ?></td>
                        <td><? echo strtoupper($r->alumni_nama); ?></td>                        
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
                
                <?php
                // Kondisi All
                if (empty($lastPost['lstProgdi'])) {                    
                ?>
                    <a href="<?php echo site_url('panel/lap_kuesioner'); ?>/exportall/<?php echo $lastPost['Tahun1']; ?>/<?php echo $lastPost['Tahun2']; ?>" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-export"></span> Export to Excel</a>
                <?php
                } else {                   
                ?>
                    <a href="<?php echo site_url('panel/lap_kuesioner'); ?>/exportbyprogdi/<?php echo $lastPost['lstProgdi']; ?>/<?php echo $lastPost['Tahun1']; ?>/<?php echo $lastPost['Tahun2']; ?>" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-export"></span> Export to Excel</a>
                <?php
                }
                ?>
                                                        
                <a href="<?php echo site_url('panel/lap_kuesioner'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
    		</section>
		</div>
    </div>
</section>