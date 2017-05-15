<section class="wrapper">
	<div class="row state-overview">
    	
        <div class="col-lg-3 col-sm-6">
        	<section class="panel">
            	<div class="symbol terques">
                	<i class="icon-user"></i>
                </div>
            	<div class="value">
                	<h1 class="count">
                    <?php 
					$jml_alumni = count($alumni);
					echo number_format($jml_alumni);
					?>
                    </h1>
                    <p>Total Alumni</p>
                </div>
			</section>
		</div>
        
        <div class="col-lg-3 col-sm-6">
        	<section class="panel">
            	<div class="symbol red">
                	<i class="icon-user"></i>
				</div>
                <div class="value">
                	<h1 class=" count2">
                    <?php
					$jml_new = count($new);
					echo number_format($jml_new);
					?>
                    </h1>
					<p>Alumni Baru</p>
				</div>
			</section>
		</div> 

        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol blue">
                    <i class="icon-bar-chart"></i>
                </div>
                    
                <div class="value">
                    <h1 class=" count4">
                    <?php
                    $jml_pengguna = count($pengguna);
                    echo number_format($jml_pengguna);
                    ?>
                    </h1>
                    <p>Pengguna Alumni</p>
                </div>
            </section>
        </div>
        
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol red">
                    <i class="icon-tags"></i>
                </div>
                
                <div class="value">
                    <h1 class=" count2">
                    <?php
                    $jml_hubungi = count($hubungi);
                    echo number_format($jml_hubungi);
                    ?>
                    </h1>
                    <p>Hubungi Kami</p>
                </div>
            </section>
        </div>
        
    </div>
</section>