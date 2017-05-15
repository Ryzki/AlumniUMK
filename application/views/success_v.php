<section id="content">
	<div id="breadcrumb-container">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">HOME</a></li>
        <li><a href="<?php echo site_url('pengguna'); ?>">PENGGUNA ALUMNI</a></li>
				<li class="active">TERIMA KASIH</li>				
			</ul>
	    </div>
	</div>

	<div class="container">
        <div class="row">
        	<div class="col-md-12">
				<header class="content-title">
					<h1 class="title">Terima Kasih</h1>
					<p class="title-desc"></p>
				</header>
        		
        		<div class="xs-margin"></div><!-- space -->
        		
        		<div class="row">
        			<div class="col-md-9 col-sm-8 col-xs-12 articles-container">
        				<div align="justify">
                Terima Kasih atas Pengisian Kuesioner Kami.
        				</div>        				                      
        			</div><!-- End .col-md-9 -->
        			
        			<!-- Sidebar -->		
        			<aside class="col-md-3 col-sm-4 col-xs-12 sidebar">        						        			        					
	        			<div class="widget recent-posts">
	        				<h3>INFO PENTING</h3>
	        							
	        				<div class="recent-posts-slider flexslider sidebarslider">
	                            <ul class="recent-posts-list clearfix">
	                            	<?php foreach($daftar_seputar_semat as $x) { ?>
		                            <li>
		                               	<h4><a href="<?php echo site_url().'seputar_alumni/detid/'.$x->seputar_id.'/'.$x->seputar_seo.'.html'; ?>"><?php echo $x->seputar_title; ?></a></h4>
		                              	<div align="justify">
											<?php 
											$desc = nl2br($x->seputar_desc);
											$isix = substr($desc,0,100);
											echo $isix; 
											?>
										</div>

		                                <div class="recent-posts-meta-container clearfix">
		                                    <div class="pull-left">
		                                    	<a href="<?php echo site_url().'seputar_alumni/detid/'.$x->seputar_id.'/'.$x->seputar_seo.'.html'; ?>">Selengkapnya..</a>
		                                    </div><!-- End .pull-left -->
		                                    
		                                    <div class="pull-right">
		                                    <?php 
												$Tgl = $x->seputar_tgl_post; 
												$pisah = explode("-", $Tgl);
												$tgl = $pisah[2];
												$bln = $pisah[1];
												$thn = $pisah[0]; 
												echo $tgl.'.'.$bln.'.'.$thn; 
											?>
		                                    </div><!-- End .pull-right -->
		                                </div><!-- End .recent-posts-meta-container -->
		                            </li>                            
	                                <?php } ?>

	                            	<?php 
	                            		if (count($daftar_agenda_semat) > 0) { 
	                            			foreach($daftar_agenda_semat as $a) { 
	                            	?>
		                            <li>
		                               	<h4><a href="<?php echo site_url().'seputar_agenda/detid/'.$a->agenda_id.'/'.$a->agenda_seo.'.html'; ?>"><?php echo $a->agenda_title; ?></a></h4>
		                              	<div align="justify">
											<?php 
											$desc1 = nl2br($a->agenda_desc);
											$isia = substr($desc1,0,100);
											echo $isia; 
											?>
										</div>

		                                <div class="recent-posts-meta-container clearfix">
		                                    <div class="pull-left">
		                                    	<a href="<?php echo site_url().'seputar_agenda/detid/'.$a->agenda_id.'/'.$a->agenda_seo.'.html'; ?>">Selengkapnya..</a>
		                                    </div><!-- End .pull-left -->
		                                    
		                                    <div class="pull-right">
		                                    <?php 
												$Tgl1 = $a->agenda_tgl_post; 
												$pisah1 = explode("-", $Tgl1);
												$tgl = $pisah1[2];
												$bln = $pisah1[1];
												$thn = $pisah1[0]; 
												echo $tgl.'.'.$bln.'.'.$thn; 
											?>
		                                    </div><!-- End .pull-right -->
		                                </div><!-- End .recent-posts-meta-container -->
		                            </li>                            
	                                <?php 
			                                }
										}
	                                ?>                           
	                                            
	                            </ul>
	                        </div><!-- End .recent-posts-slider -->
	        			</div><!-- End .widget -->

	        			<div class="widget recent-posts">
	        				<h3>KALENDER</h3>	        				
							<div class="jquery-calendar"></div>
	        			</div>

	        			<div class="widget recent-posts">
	        				<h3>VISITOR</h3>
							<a href="http://info.flagcounter.com/s6TE"><img src="http://s01.flagcounter.com/count/s6TE/bg_14BFCC/txt_FFFFFF/border_CCCCCC/columns_3/maxflags_12/viewers_3/labels_0/pageviews_1/flags_0/" alt="Flag Counter" border="0"></a>
	        			</div>	        			        						        		
        			</aside><!-- End .col-md-3 -->
				</div><!-- End .row -->
        				
        	</div><!-- End .col-md-12 -->
        </div><!-- End .row -->
	</div><!-- End .container -->

</section>	