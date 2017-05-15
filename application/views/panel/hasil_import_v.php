<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-book"></i> Import Data List
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                        <th width="10%">N I M</th>
                    	<th>Nama Alumni</th>
                        <th width="20%">Fakultas/Progdi</th>                        
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($data_import as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $no; ?></td>
                    	<td><? echo $r->alumni_nim; ?></td>
                        <td><? echo $r->alumni_nama; ?></td>
                        <td><? echo $r->fakultas_name.' - '.$r->progdi_name; ?></td>                        
                    </tr>
                    <?php 
                        $no++; 
                    } 
                    ?>
                    </tbody>
                    
                    <tfoot>
                    </tfoot>
    				</table>
                    </div>
    			</div>

    		</section>
		</div>
    </div>
</section>