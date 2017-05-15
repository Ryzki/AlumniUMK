<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-tasks"></i> Komentar Agenda Alumni List
            </header>
            	
                <div class="panel-body">    	            
                	<div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                    	<th width="6%">No</th>
                        <th width="15%">Tgl. Komentar</th>                        
                        <th>Komentar</th> 
                        <th width="15%">User</th>                       
                        <th width="10%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($daftar_komentar as $r) { ?>
                    <tr class="gradeA">
                        <td><?php echo $no; ?></td>
                        <td><?php echo tgl_indo($r->komentar_tgl_post); ?></td>                    	
                        <td><?php echo $r->komentar_pesan; ?></td>
                        <td><?php echo $r->user_username; ?></td>
                        <td class="center hidden-phone">
                        <!-- <a href="<?php // echo site_url('panel/komentar_seputar/editkomentar/'.$r->komentar_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>-->
                        <a href="<?php echo site_url('panel/komentar_agenda/deletedata/'.$r->komentar_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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