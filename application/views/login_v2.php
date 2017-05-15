<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li class="active">Login</li>
    </ol>
</div>
<!-- end Breadcrumb -->

<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div id="page-main">
                <div class="col-md-10 col-sm-10 col-sm-offset-1 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-6">
                            <section id="account-register" class="account-block">
                                <header><h2>Buat Akun Baru</h2></header>
                                <form role="form" action="<?php echo site_url('login/daftar'); ?>" method="post">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="input-group">                                        
                                            <label for="email">Pilih Salah Satu</label>
                                            <select name="lstDaftar" id="lstDaftar" required>                                                
                                                <option value="">- Pilih Pendaftaran -</option>
                                                <option value="1">Wisuda</option>
                                                <option value="2">Alumni</option> 
                                            </select>                                        
                                    </div><!-- /.form-group -->                                    
                                    <button type="submit" class="btn pull-right">Daftar</button>
                                </form>
                            </section><!-- /#account-block -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <section id="account-sign-in" class="account-block">
                                <header><h2>Sudah punya Akun ?</h2></header>
                                <form role="form" class="clearfix" method="post" action="<?php echo site_url('login/validasi'); ?>">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="form-group">
                                        <label for="email">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?php echo set_value('username'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="<?php echo set_value('password'); ?>" required>
                                    </div>
                                    <button type="submit" class="btn pull-right">Login</button>
                                </form>
                                <hr>
                                
                                <?php 
                                    if ($this->session->flashdata('notification')) { ?>
                                        <p>                       
                                        <?php echo $this->session->flashdata('notification'); ?>
                                        </p>                
                                    <? } ?>
                                <?php echo validation_errors('<p>','</p>'); ?>
                            </section><!-- /#account-block -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                </div><!-- /.col-md-10 -->
            </div><!-- /#page-main -->

            <!-- end SIDEBAR Content-->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->