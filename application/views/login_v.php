<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keyword" content="">
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/logoumk.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Panel Admin</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

<!-- Custom styles for this template -->
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />    
</head>

<body class="login-body">
	<div class="container">
    		<?php if ($this->session->flashdata('notification')) { ?>
			<div class="alert alert-block alert-danger fade in">
             	<button data-dismiss="alert" class="close close-sm" type="button">
                	<i class="icon-remove"></i>
                </button>
				<?php echo $this->session->flashdata('notification'); ?>
			</div>
            <? } ?> 
            
		<form class="form-signin" action="<?php echo site_url('session/validasi'); ?>" name="login" method="post">
        	<h2 class="form-signin-heading">Insert Your Account !!</h2>                                   
        	<div class="login-wrap">
                <!-- Tambahan Token CSRF -->
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <!-- Akhir CSRF -->
                <input type="text" class="form-control" placeholder="Your Username" name="username" value="<?php echo set_value('username'); ?>" autocomplete="off" required autofocus>
                <?php echo form_error('username', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                <input type="password" class="form-control" placeholder="Your Password" name="password" autocomplete="off" required>
                <?php echo form_error('password', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                <button class="btn btn-lg btn-login btn-block" type="submit">Login</button>                        
        	</div>
            <div align="center"><img src="<?php echo base_url(); ?>img/logo_admin.jpg" height="70" width="70" />
            <br />Alumni Universitas Muria Kudus<br>
              &copy; 2015<br /><br /></div>
      </form>      
    </div>	
        
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</body>
</html>