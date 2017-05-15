<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit Slider 
            </header>

        <!-- Mulai Form -->
        <div class="row">
        	<div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Edit Data Slider
                </header>
                			
			<div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/slider/updatedata'); ?>" enctype="multipart/form-data" method="post">            
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="form-group">
            	<label class="control-label col-sm-2">Slider Name :</label>
            	<div class="col-sm-6 has-success">
               <input type="text" name="name" class="form-control" id="name" placeholder="Enter Slider Name" value="<?php echo $slider->slider_name; ?>" autocomplete="off" required="true" autofocus>
                </div>                
			</div>			 
            <input type="hidden" name="slider_id" value="<?php echo $slider->slider_id; ?>" />                     

            <div class="form-group">
                <label class="control-label col-sm-2">Slider Link :</label>
                <div class="col-sm-6 has-success">
               <input type="text" name="link" class="form-control" id="link" placeholder="Enter Slider Link" value="<?php echo $slider->slider_link; ?>" autocomplete="off" required="true">
                </div>                
            </div>

            <div class="form-group">
            	<label class="col-sm-2 control-label col-sm-2">Picture</label>
            	<div class="col-sm-10">
                <?php if (empty($slider->slider_image)) { ?>
				   <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                <?php } else { ?>
                   <img src="<?php echo base_url().'slider/'.$slider->slider_image; ?>" alt="" height="200" width="400" />
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
                (Resolution Image : 555 x 320 pixel)<br />
                Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only
                </span>
                </div>
            </div>

           
			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
            <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
            <a href="<?php echo site_url('panel/slider'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                        
			</form>
            </div>
			</section>
			</div>
        </div>
		<!-- Akhir Form -->
			
            </section>
		</div>
	</div>
</section>