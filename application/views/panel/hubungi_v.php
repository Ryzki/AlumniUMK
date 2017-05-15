<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-glass"></i> Hubungi Kami List
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                    	<th>Nama</th>
                        <th>Email</th>
                        <th>Subyek</th>
                        <th>Tgl. Kirim</th>
                        <th width="10%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_hubungi as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $no; ?></td>
                    	<td><? echo $r->hubungi_nama; ?></td>
                        <td><? echo $r->hubungi_email; ?></td>
                        <td><? echo $r->hubungi_subyek; ?></td>
                        <td><? echo $r->hubungi_tgl_kirim; ?></td>
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('panel/hubungi/detailhubungi/'.$r->hubungi_id); ?>"><button class="btn btn-primary btn-xs" title="Detail"><i class="icon-pencil"></i></button></a>
                        <a href="<?php echo site_url('panel/hubungi/deletedata/'.$r->hubungi_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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