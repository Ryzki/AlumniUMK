<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-book"></i> Wirausaha List
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
                        <th>Nama Usaha</th>                        
                        <th width="10%">Bidang</th>
                        <th width="10%">Iklan/Paid</th>
                        <th width="10%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_wirausaha as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $no; ?></td>
                    	<td><? echo $r->alumni_nim; ?></td>
                        <td><? echo $r->alumni_nama; ?></td>
                        <td><? echo $r->fakultas_name.' - '.$r->progdi_name; ?></td>
                        <td><? echo $r->usaha_name; ?></td>
                        <td><? echo $r->usaha_bidang; ?></td>
                        <?php if ($r->usaha_iklan == 1) { ?>
                        <td><span class="label label-success label-mini">Yes</span>&nbsp<?php if ($r->usaha_transfer == 1) { echo "<span class='label label-danger label-mini'>Paid</span>"; } else { echo "<span class='label label-danger label-mini'>Due</span>"; } ?></td>
                        <?php } else { ?>
                        <td><span class="label label-danger label-mini">No</span></td>
                        <?php } ?>
                        <td class="center hidden-phone">
                        <?php if ($r->usaha_iklan == 1) { ?>
                        <a href="<?php echo site_url('panel/wirausaha/listinvoice/'.$r->usaha_id); ?>"><button class="btn btn-success btn-xs" title="Bayar Iklan"><i class="icon-ok"></i></button></a>
                        <?php } ?>
                        <a href="<?php echo site_url('panel/wirausaha/editwirausaha/'.$r->usaha_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>                        
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