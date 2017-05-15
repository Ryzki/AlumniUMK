<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Info Penting
            </header>
        
            <div class="row">
            	<div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Edit Data Info Penting
                    </header>
                    			
    			<div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/penting/updatedata'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="penting_id" value="<?php echo $penting->penting_id; ?>" />               
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                            

                <div class="form-group">
                	<label class="control-label col-sm-2">Title :</label>
                	<div class="col-sm-6 has-success">
                   <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="<?php echo $penting->penting_title; ?>" autocomplete="off" required="true">
                    </div>                
                </div>                    

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Short Description :</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="short" id="short" rows="6"><?php echo $penting->penting_short; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
    				<label class="col-sm-2 control-label col-sm-2">Description :</label>
                    <div class="col-sm-10">
                    <textarea class="form-control ckeditor" name="deskripsi" id="deskripsi" rows="6"><?php echo $penting->penting_desc; ?></textarea>
                    </div>
    			</div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Picture</label>
                    <div class="col-sm-10">
                    <?php if (empty($penting->penting_image)) { ?>
                       <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                    <?php } else { ?>
                       <img src="<?php echo base_url().'info/'.$penting->penting_image; ?>" alt="" height="150" width="150" />
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
                    (Resolution Image : 500 pixel)                    
                    </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Sematkan ? :</label>
                    <div class="col-sm-5">                
                        <label>
                            <input type="checkbox" name="semat" id="semat" value="1" <?php if ($penting->penting_sematkan == 1) { echo 'checked'; }  ?>> Ya
                        </label>                
                    </div>
                </div>

    			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/penting'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
    			</form>
                </div>
    			</section>
    			</div>
            </div>		
			
            </section>
		</div>
	</div>
</section>