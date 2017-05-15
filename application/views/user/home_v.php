<section class="wrapper">
	<div class="row state-overview">
    
        <?php 
        foreach($kotak as $k) {
            $progdi_id = $k->progdi_id;
            $cek_data = $this->home_model->select_alumni($progdi_id)->result();
            $jml_alumni = count($cek_data);
        ?>
    	<div class="col-lg-3 col-sm-6">
        	<section class="panel">
            	<div class="symbol terques">
                	<i class="icon-user"></i>
                </div>
            	<div class="value">
                	<h1 class="count">
                    <?php 				                    
					echo number_format($jml_alumni);
					?>
                    </h1>
                    <p align="center">
                    Wisuda <br>                    
                    <?php echo $k->progdi_name; ?>
                    </p>
                </div>
			</section>
		</div>
        <?php } ?> 

    </div>
</section>