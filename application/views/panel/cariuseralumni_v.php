<section class="wrapper">
	<div class="row">
    	<div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-user"></i> Cari Data Users
            </header>

            <div class="row">
                <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Pilih Fakultas - Program Studi Users
                    </header>
                                
                <div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/user_alumni/caridatauseralumni'); ?>" method="post" >
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                    <label class="control-label col-sm-2">Fakultas - Progdi Name :</label>
                    <div class="col-sm-4">
                    <select class="form-control m-bot15" name="lstProgdi" id="lstProgdi" required autofocus>
                        <option value="">- Choose Fakultas/Progdi -</option>
                        <option value="all">Semua Fakultas/Progdi</option>
                        <?php  foreach($progdi as $p) { ?>
                        <option value="<?php echo $p->progdi_id; ?>"><?php echo $p->fakultas_name.' - '.$p->progdi_name; ?></option>                    
                        <?php } ?>
                        </select>
                    </div>                    
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Tahun Masuk :</label>
                    <div class="col-sm-4">                                
                        <div class="input-group input-large">
                            <input type="text" class="form-control" id="tahun1" name="tahun1" placeholder="Enter Tahun" required>
                            <span class="input-group-addon">s/d</span>
                            <input type="text" class="form-control" id="tahun2" name="tahun2" placeholder="Enter Tahun" required>
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