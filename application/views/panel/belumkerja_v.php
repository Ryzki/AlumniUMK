<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-book"></i> Belum Bekerja List
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                        <th width="15%">Tgl. Daftar</th>                        
                    	<th width="10%">N I M</th>
                        <th>Nama Alumni</th>
                        <th width="20%">Fakultas/Progdi</th>
                        <th width="20%">Aktifitas</th>
                        <th width="10%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_belum as $r) { ?>
                    <tr class="gradeA"> 
                        <td><? echo $no; ?></td>
                        <td><? echo tgl_indo($r->alumni_tgl_daftar); ?></td>                   	
                        <td><? echo $r->alumni_nim; ?></td>
                        <td><? echo $r->alumni_nama; ?></td>
                        <td><? echo $r->fakultas_name.' - '.$r->progdi_name; ?></td>
                        <td><? echo $r->aktifitas_desc; ?></td>
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('panel/belumkerja/editbelumkerja/'.$r->kerja_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>                        
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