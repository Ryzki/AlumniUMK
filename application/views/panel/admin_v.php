<section class="wrapper">
	
    <div class="row">
    	<div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-user"></i> Admin List
        </header>
        	<div class="panel-body">
                <a href="<?php echo site_url('panel/user_admin/addadmin'); ?>"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></a>	            
            	<div class="adv-table">
                <table class="display table table-bordered table-striped" id="example">
                <thead>
                <tr>
                    <th width="6%">No</th>
                	<th width="5%">Username</th>                    
                    <th>Name</th>                                                    
                    <th width="10%">Avatar</th>                    
                    <th class="hidden-phone" width="10%">Action</th>
                </tr>
                </thead>
                
                <tbody>
                <?php $no = 1; foreach($daftar_admin as $r) { ?>
                <tr class="gradeA">
                    <td><? echo $no; ?></td>
                	<td><? echo $r->user_username; ?></td>                    
                    <td><? echo strtoupper($r->user_name); ?></td>                    
                    <?php 
                    if (!empty($r->user_avatar)) {
                        $avatar = $r->user_avatar;
                    } else {
                        $avatar = 'no_image.png';
                    }
                    ?>
                    <td class="center"><img src="<?php echo base_url(); ?>avatar/<?php echo $avatar; ?>" height="25" width="25"></td>                                        
                    <td class="center hidden-phone">
                    <a href="<?php echo site_url('panel/user_admin/editadmin/'.$r->user_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                    <a href="<?php echo site_url('panel/user_admin/deletedata/'.$r->user_id.'/'.$r->alumni_nim); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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