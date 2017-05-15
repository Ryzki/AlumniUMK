<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> About Us
            </header>
        
        <div class="row">
        	<div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Data About Us
                </header>
                			
			<div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/about/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            
            <div class="form-group">
				<label class="col-sm-2 control-label col-sm-2">Deskripsi :</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="deskripsi" rows="6"><?php echo $menu->content_deskripsi; ?></textarea>
                </div>
			</div>                  

            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Picture</label>
                <div class="col-sm-10">
                <?php if (empty($menu->content_image)) { ?>
                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                <?php } else { ?>
                <img src="<?php echo base_url().'content/'.$menu->content_image; ?>" alt="" height="200" width="170" />
                <?php } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Image Upload</label>
                <div class="col-md-9">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                <div>
                <span class="btn btn-white btn-file">
                <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                <input type="file" class="default" name="userfile" />
                </span>
                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                </div>
                </div>
                <span class="label label-danger">NOTE!</span>
                <span>
                (Resolution Image : 300 x 350 pixel)<br />
                Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only
                </span>
                </div>
            </div>

			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
            <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>            
                                        
			</form>
            </div>
			</section>
			</div>
        </div>		
			
            </section>
		</div>
	</div>
</section>