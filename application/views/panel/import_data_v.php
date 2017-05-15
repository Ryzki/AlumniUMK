<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-file"></i> Import Data Alumni dari Excel ke MySQL
            </header>

            <div class="row">
                <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Pilih File Excel yang akan di Import
                    </header>
                                
                <div class="panel-body">
                <?php 
                if ($this->session->flashdata('notification')) { ?>
                    <div class="alert alert-success fade in">
                    <?php echo $this->session->flashdata('notification'); ?>
                    </div>
                    <br>                
                <? } ?>
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/import/do_upload2'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div>
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="file_upload" name="userfile" size="20">
                    <p class="help-block">File Harus Excel.</p>
                </div>                

                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-file"></span> Import Data</button>                
                                            
                </form>
                </div>
                </section>
                </div>
            </div>            	
               

    		</section>
		</div>
    </div>
</section>