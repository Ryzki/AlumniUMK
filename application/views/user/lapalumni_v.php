<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-bar-chart"></i> Laporan Alumni
            </header>

            <div class="row">
                <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Pilih Program Studi
                    </header>
                                
                <div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('user/laporan_alumni/preview'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                
                <div class="form-group">
                    <label class="control-label col-sm-2">Program Studi :</label>
                    <div class="col-sm-4">
                    <select class="form-control m-bot15" name="lstProgdi" required="true">
                        <option value="">- Choose Program Studi -</option>                        
                        <?php  foreach($progdi as $p) { ?>
                        <option value="<?php echo $p->progdi_id; ?>"><?php echo $p->progdi_name; ?></option>                    
                        <?php } ?>
                        </select>
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