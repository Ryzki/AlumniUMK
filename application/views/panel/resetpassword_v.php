<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-user"></i> Hasil Pencarian Data
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                        <th width="10%">Tgl. Daftar</th>
                        <th width="10%">Tgl. Lahir</th>
                    	<th width="13%">N I M</th>
                        <th>Nama Alumni</th>
                        <th width="15%">Fakultas</th>
                        <th width="15%">Progdi</th>
                        <th width="10%" class="hidden-phone">Reset</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_alumni as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $no; ?></td>
                    	<td><? echo $r->alumni_tgl_daftar; ?></td>
                        <td><? echo $r->alumni_tgl_lhr; ?></td>
                        <td><? echo $r->alumni_nim; ?></td>
                        <td><? echo strtoupper($r->alumni_nama); ?></td>
                        <td><? echo $r->fakultas_name; ?></td>
                        <td><? echo $r->progdi_name; ?></td>                        
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('panel/resetpassword/editpassword/'.$r->alumni_nim); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                        <a href="<?php echo site_url('panel/resetpassword/deletedata/'.$r->alumni_nim); ?>" OnClick="return confirm('Yakin Hapus Alumni Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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