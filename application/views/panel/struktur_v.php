<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-tasks"></i> Struktur Organisasi List
            </header>
            	
                <div class="panel-body">
    	            <a href="<?php echo site_url('panel/struktur/addstruktur'); ?>"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></a>
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                    	<th>Judul</th>
                        <th width="10%">Program Studi</th>
                        <th width="25%">Image</th>
                        <th class="hidden-phone" width="10%">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_struktur as $r) { ?>
                    <tr class="gradeA">
                        <td><?php echo $no; ?></td>
                    	<td><? echo $r->struktur_title; ?></td>
                        <td><? echo $r->progdi_name; ?></td>
                        <td><img src="<?php echo base_url().'struktur/'.$r->struktur_image;; ?>"></td>
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('panel/struktur/editstruktur/'.$r->struktur_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                        <a href="<?php echo site_url('panel/struktur/deletedata/'.$r->struktur_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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