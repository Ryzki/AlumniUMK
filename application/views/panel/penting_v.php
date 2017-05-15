<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-tasks"></i> Info Penting List
            </header>
            	
                <div class="panel-body">
    	            <a href="<?php echo site_url('panel/penting/addpenting'); ?>"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></a>
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                    	<th width="6%">No</th>
                        <th width="15%">Post Date</th>
                        <th>Title</th>
                        <th width="20%">Image</th>
                        <th width="10%">Sematkan ?</th>                                                
                        <th width="10%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_penting as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $no; ?></td>
                        <td><? echo tgl_indo($r->penting_date_post); ?></td>
                    	<td><? echo $r->penting_title; ?></td>
                        <td><img src="<?php echo base_url(); ?>info/<?php echo $r->penting_image; ?>" width="50%"></td>
                        <td><?php if ($r->penting_sematkan == 1) { echo 'Ya'; } else { echo 'Tidak'; } ?></td>
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('panel/penting/editpenting/'.$r->penting_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                        <a href="<?php echo site_url('panel/penting/deletedata/'.$r->penting_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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