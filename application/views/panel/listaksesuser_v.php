<section class="wrapper">
	
    <div class="row">
    	<div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-user"></i> Hak Akses Users List
        </header>
        	<div class="panel-body">
	            <a href="<?php echo site_url('panel/users/adduserakses').'/'.$this->uri->segment(4); ?>"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></a>
            	<div class="adv-table">
                <table class="display table table-bordered table-striped" id="example">
                <thead>
                <tr>
                    <th width="6%">No</th>
                	<th width="15%">Username</th>
                    <th>Name</th>                                    
                    <th width="30%">Program Studi</th>                    
                    <th class="hidden-phone" width="10%">Action</th>
                </tr>
                </thead>
                
                <tbody>
                <?php $no = 1; foreach($daftar_akses as $r) { ?>
                <tr class="gradeA">
                    <td><? echo $no; ?></td>
                	<td><? echo $r->user_username; ?></td>
                    <td><? echo $r->user_name; ?></td>                    					
                    <td><? echo $r->progdi_name; ?></td>
                    <td class="center hidden-phone">
                    <a href="<?php echo site_url('panel/users/edituserakses/'.$r->user_id.'/'.$r->akses_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                    <a href="<?php echo site_url('panel/users/deletedataakses/'.$r->user_id.'/'.$r->akses_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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
        <a href="<?php echo site_url('panel/users'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
		</div>
    </div>

</section>