<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-tasks"></i> Lowongan Kerja List
            </header>
            	
                <div class="panel-body">
    	            <a href="<?php echo site_url('panel/lowker/addlowker'); ?>"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></a>
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                    	<th width="10%">Post Date</th>
                        <th width="10%">Deadline</th>
                        <th width="10%">Post By</th>
                        <th>Title</th>                                            
                        <th class="hidden-phone" width="10%">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_lowker as $r) { ?>
                    <tr class="gradeA">
                        <td><?php echo $no; ?></td>
                        <td><? echo $r->lowker_tgl_post; ?></td>
                        <td><? echo $r->lowker_tgl_deadline; ?></td>
                        <td><? echo $r->user_username; ?></td>
                    	<td><? echo $r->lowker_title; ?></td>                                            
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('panel/lowker/editlowker/'.$r->lowker_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                        <a href="<?php echo site_url('panel/lowker/deletedata/'.$r->lowker_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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