<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Edit User Alumni 
            </header>
    
        <div class="row">
        	<div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Edit Data User Alumni
                </header>
                			
			<div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/user_alumni/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            
            <div class="form-group">
            	<label class="control-label col-sm-2">Username :</label>
            	<div class="col-sm-6 has-success">
               <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" value="<?php echo $detail->user_username; ?>" autocomplete="off" readonly>
                </div>                
			</div>			 
            <input type="hidden" name="user_id" value="<?php echo $detail->user_id; ?>" />

			<div class="form-group">
            	<label class="control-label col-sm-2">Password :</label>
            	<div class="col-sm-6 has-success">
               <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" value="" autocomplete="off"><p class="help-block">Kosongkan textbox jika tidak ubah Password !</p>
                </div>               
			</div>  

            <div class="form-group">
            	<label class="control-label col-sm-2">Name :</label>
            	<div class="col-sm-6 has-success">
               <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="<?php echo $detail->user_name; ?>" autocomplete="off" readonly>
                </div>				
			</div>                    

            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Avatar</label>
                <div class="col-sm-10">
                <?php if (empty($detail->user_avatar)) { ?>
                <img src="<?php echo base_url(); ?>avatar/no_image.png" height="100" width="100"/>
                <?php } else { ?>
                <img src="<?php echo base_url().'avatar/'.$detail->user_avatar; ?>" alt="" height="50" width="50" />
                <?php } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Change Avatar</label>
                <div class="col-md-9">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;">
                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 10px;"></div>
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
                (Best Resolution Image : 100 x 100 pixel)                
                </span>
                </div>
            </div>

			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
            <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
            <a href="<?php echo site_url('panel/user_alumni'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                        
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