<section class="wrapper">
    <div class="row">
    	<div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-edit"></i> Form Profil
        </header>

		<div class="row">
        	<div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                Detail Profil
                </header>                         

                <div class="panel-body">                           
                <form role="form" action="<?php echo site_url('user/profile/updatedata'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-group has-success">
                        <label for="exampleInputEmail1">Username :</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" value="<?php echo $profile->user_username; ?>" readonly>
                          
                        <input type="hidden" name="user_id" value="<?php echo $profile->user_id;?>" />
                    </div>                    
                    
                    <div class="form-group has-success">
                        <label for="exampleInputPassword1">Password :</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" autocomplete="off" autofocus>
                    </div>
                    <div class="form-group has-success">
                     	<p class="help-block">Kosongkan textbox jika tidak ubah Password !</p>
                    </div>

                    <div class="form-group has-success">
                         <label for="exampleInputEmail1">Long Name :</label>                        
                         <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="<?php echo $profile->user_name; ?>" autocomplete="off" required>
                    </div>

                    <div class="form-group has-success">
                        <label for="exampleInputEmail1">Level :</label>                        
                        <select class="form-control m-bot15" name="lstLevel" readonly>
                          <option value="Admin" <?php if ($profile->user_level=='Admin') echo 'selected'; ?>>Admin</option>
                          <option value="Alumni" <?php if ($profile->user_level=='Alumni') echo 'selected'; ?>>Alumni</option>
                          <option value="User" <?php if ($profile->user_level=='User') echo 'selected'; ?>>User</option>
                        </select>                                      
                    </div>                       

                    <div class="form-group has-success">
                       <label for="exampleInputEmail1">Avatar</label><br>
                        <?php if (empty($profile->user_avatar)) { ?>
                        <img src="<?php echo base_url(); ?>avatar/no_image.png" height="50" width="50"/>
                        <?php } else { ?>
                        <img src="<?php echo base_url().'avatar/'.$profile->user_avatar; ?>" alt="" height="50" width="50" />
                        <?php } ?>                        
                    </div>

                    <div class="form-group has-success">
                         <label for="exampleInputEmail1">Change Avatar</label>                
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;">
                        <img src="<?php echo base_url(); ?>img/no_image.gif" alt="" />
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
                        (Best Resolution Image : 50 x 50 pixel)                        
                        </span>                
                    </div>					                                       
                                                                        
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>                    
                </form>
                </div>
			</section>
			</div>
        </div>
	
        </section>
		</div>
    </div>
</section>    