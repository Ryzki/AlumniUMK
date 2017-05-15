<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-th"></i> Wisuda List by Progdi - <b><?php echo $progdi->progdi_name; ?></b> 
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                        <th width="10%">Tgl. Daftar</th>
                        <th width="13%">Tgl. Wisuda</th>
                    	<th width="10%">N I M</th>
                        <th>Nama Mahasiswa</th>
                        <th width="12%">Fakultas</th>
                        <th width="12%">Progdi</th> 
                        <th width="10%">Status</th>                        
                        <th width="8%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_wisuda as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $no; ?></td>
                    	<td><? echo $r->wisuda_tgl_daftar; ?></td>
                        <td><? echo tgl_indo($r->wisuda_periode); ?></td>
                        <td><? echo $r->alumni_nim; ?></td>
                        <td><? echo strtoupper($r->alumni_nama); ?></td>
                        <td><? echo $r->fakultas_name; ?></td>
                        <td><? echo $r->progdi_name; ?></td>
                        <td><b><? echo $r->wisuda_status; ?></b></td>                        
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('user/wisuda/editwisuda/'.$this->uri->segment(4).'/'.$r->wisuda_id); ?>"><button class="btn btn-primary btn-xs" title="Check"><i class="icon-pencil"></i></button></a>                        
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