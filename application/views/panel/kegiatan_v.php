<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-cogs"></i> Kegiatan List
            </header>
            	
                <div class="panel-body">
    	            <a href="<?php echo site_url('panel/kegiatan/addkegiatan'); ?>"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></a>
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                    	<th>Kegiatan Desc</th>
                        <th>Kegiatan Next Link</th>
                        <th width="10%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_kegiatan as $r) { ?>
                    <tr class="gradeA">
                        <td><?php echo $no; ?></td>
                    	<td><? echo $r->kegiatan_desc; ?></td>
                        <td><? echo $r->kegiatan_next_link; ?></td>
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('panel/kegiatan/editkegiatan/'.$r->kegiatan_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                        <a href="<?php echo site_url('panel/kegiatan/deletedata/'.$r->kegiatan_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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