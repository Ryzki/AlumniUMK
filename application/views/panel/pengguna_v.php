<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-glass"></i> Pengguna Alumni List
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                    	<th>Nama Pengguna</th>
                        <th>Jabatan</th>
                        <th>Nama Perusahaan</th>
                        <th>Email</th>
                        <th width="10%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_pengguna as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $no; ?></td>
                    	<td><? echo $r->pengguna_nama; ?></td>
                        <td><? echo $r->pengguna_jabatan; ?></td>
                        <td><? echo $r->pengguna_perusahaan; ?></td>
                        <td><? echo $r->pengguna_email; ?></td>
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('panel/pengguna/detailpengguna/'.$r->pengguna_id); ?>"><button class="btn btn-primary btn-xs" title="Detail"><i class="icon-pencil"></i></button></a>
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