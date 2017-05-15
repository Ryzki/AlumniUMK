<section class="wrapper">
	
    <div class="row">
    	<div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-user"></i> User Alumni List
        </header>
        	<div class="panel-body">                
            	<div class="adv-table">
                <table class="display table table-bordered table-striped" id="example">
                <thead>
                <tr>
                    <th width="6%">No</th>
                	<th width="10%">Username</th>
                    <th width="10%">N I M</th>
                    <th>Name</th>
                    <th>Progdi</th>
                    <th width="10%">Avatar</th>                    
                    <th class="hidden-phone" width="10%">Action</th>
                </tr>
                </thead>
                
                <tbody>
                <?php $no = 1; foreach($daftar_user as $r) { ?>
                <tr class="gradeA">
                    <td><? echo $no; ?></td>
                	<td><? echo $r->user_username; ?></td>
                    <td><? echo $r->alumni_nim; ?></td>                    
                    <td><? echo strtoupper($r->user_name); ?></td>                    
                    <td><? echo $r->progdi_name; ?></td>
                    <?php 
                    if (!empty($r->user_avatar)) {
                        $avatar = $r->user_avatar;
                    } else {
                        $avatar = 'no_image.png';
                    }
                    ?>
                    <td class="center"><img src="<?php echo base_url(); ?>avatar/<?php echo $avatar; ?>" height="25" width="25"></td>                    
                    </td>
                    <td class="center hidden-phone">
                    <a href="<?php echo site_url('panel/user_alumni/edituser/'.$r->user_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                    <!-- <a href="<?php // echo site_url('panel/user_alumni/deletedata/'.$r->user_id.'/'.$r->alumni_nim); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a> -->
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