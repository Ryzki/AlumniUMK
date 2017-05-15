<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-th"></i> Alumni List
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>                        
                    	<th width="10%">N I M</th>
                        <th>Nama Alumni</th>
                        <th width="13%">Fakultas</th>
                        <th width="13%">Progdi</th>
                        <th width="30%">Alamat</th> 
                        <th width="5%" class="hidden-phone">Detail</th>                       
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_alumni as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $no; ?></td>                    	
                        <td><? echo $r->alumni_nim; ?></td>
                        <td><? echo ucwords(strtolower($r->alumni_nama)); ?></td>
                        <td><? echo $r->fakultas_name; ?></td>
                        <td><? echo $r->progdi_name; ?></td>
                        <td><? echo $r->alumni_alamat; ?></td>
                        <td class="center hidden-phone">
	                        <a href="<?php echo site_url('database/detail/'.$r->alumni_nim); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>                       
                        </td>                                          
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