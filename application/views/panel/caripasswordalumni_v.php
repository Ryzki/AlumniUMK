<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-th"></i> Cari Data Alumni
            </header>

            <div class="row">
                <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Cari by NIM
                    </header>
                                
                <div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/resetpassword/caridataalumni'); ?>" method="post" >
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                    <label class="control-label col-sm-2">N I M :</label>
                    <div class="col-sm-3 has-success">
                    <input type="text" name="nim" class="form-control" id="nim" placeholder="Enter N I M" value="<?php echo set_value('nim'); ?>" autocomplete="off" required="true" autofocus>
                    </div>                    
                </div>                                                                         

                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Search</button>                
                                            
                </form>
                </div>
                </section>
                </div>
            </div>            	
               

    		</section>
		</div>
    </div>
</section>