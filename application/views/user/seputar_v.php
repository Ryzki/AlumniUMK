<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-folder-open"></i> Seputar Alumni List - <b><?php echo $progdi->progdi_name; ?></b>
            </header>
            	
                <div class="panel-body">
    	            <a href="<?php echo site_url('user/seputar/addseputar/'.$this->uri->segment(4)); ?>"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></a>
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                    	<th width="6%">No</th>
                        <th width="15%">Post Date</th>
                        <th>Title</th>                                            
                        <th width="10%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_seputar as $r) { ?>
                    <tr class="gradeA">
                        <td><?php echo $no; ?></td>
                        <td><?php echo tgl_indo($r->seputar_tgl_post); ?></td>
                    	<td><?php echo $r->seputar_title; ?></td>                        
                        <td class="center hidden-phone">
                        <a href="<?php echo site_url('user/seputar/editseputar/'.$this->uri->segment(4).'/'.$r->seputar_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                        <a href="<?php echo site_url('user/seputar/deletedata/'.$this->uri->segment(4).'/'.$r->seputar_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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