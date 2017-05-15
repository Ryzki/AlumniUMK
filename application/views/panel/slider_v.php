<section class="wrapper">
	<!-- page start-->
    <div class="row">
    	<div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-laptop"></i> Slider Home List
        </header>
        	<div class="panel-body">
	            <a href="<?php echo site_url('panel/slider/addslider'); ?>"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add</button></a>
            	<div class="adv-table">
                <table width="100%" align="center" class="display table table-bordered table-striped" id="example">
                <thead>
                <tr>
                    <th width="6%">No</th>
                	<th width="15%">Slider Name</th>
                    <th width="30%">Slider Link</th>
                    <th width="30%">Slider Photo</th>
                    <th width="10%" class="hidden-phone">Action</th>
                </tr>
                </thead>
                
                <tbody>
                <?php $no = 1; foreach($daftar_slider as $c) { ?>
                <tr class="gradeA">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $c->slider_name; ?></td>
                    <td><?php echo $c->slider_link; ?></td>
					<td><img src="<?php echo base_url(); ?>slider/<?php echo $c->slider_image; ?>" height="100" width="400" /></td>
                    <td class="center hidden-phone">
                    <a href="<?php echo site_url('panel/slider/editslider/'.$c->slider_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                    <a href="<?php echo site_url('panel/slider/deletedata/'.$c->slider_id); ?>" OnClick="return confirm('Are You Sure Delete this Data ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
                    </td>                    
                </tr>
                <? 
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
              <!-- page end-->
</section>