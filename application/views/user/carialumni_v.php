<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-tasks"></i> Cari Data Alumni - <b><?php echo $progdi->progdi_name; ?></b>
            </header>

            <div class="row">
                <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Pilih Periode Masuk
                    </header>
                                
                <div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('user/alumni/caridataalumni'.'/'.$this->uri->segment(4)); ?>" method="post" >
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                
                <div class="form-group">
                    <label class="control-label col-sm-2">Tahun Masuk :</label>
                    <div class="col-sm-4">                                
                        <div class="input-group input-large">
                            <input type="text" class="form-control" id="tahun1" name="tahun1" placeholder="Enter Tahun" autocomplete="off" >
                            <span class="input-group-addon">s/d</span>
                            <input type="text" class="form-control" id="tahun2" name="tahun2" placeholder="Enter Tahun" autocomplete="off" >
                        </div>
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