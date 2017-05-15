<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-sitemap"></i> Social List
            </header>
            	
                <div class="panel-body">
    	            <a href="<?php echo site_url('panel/social/addsocial'); ?>"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></a>
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                    	<th>Social Name</th>
                        <th>Social URL</th>
                        <th width="10%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_social as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $no; ?></td>
                    	<td><? echo $r->social_name; ?></td>
                        <td><? echo $r->social_url; ?></td>
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('panel/social/editsocial/'.$r->social_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                        <a href="<?php echo site_url('panel/social/deletedata/'.$r->social_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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