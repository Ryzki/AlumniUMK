<div class="titlebar-outer-wrapper" style="background:url('<?php echo base_url(); ?>assets/images/titlebar-bg.jpg') no-repeat top center;">
<div class="shadow-box"></div>
</div>

<div class="main-outer-wrapper has-titlebar">
            <div class="main-wrapper container">
                <div class="row row-wrapper">
                    <div class="page-outer-wrapper">
                        <div class="page-wrapper twelve columns no-sidebar b0">
                            
                            <div class="row">
                                <div class="twelve columns b0">
                                    <div class="page-title-wrapper">
                                        <h1 class="page-title left">Wirausaha ALumni</h1>
                                        <div class="page-title-alt right">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="twelve columns b0">
                                    <div class="builder-item-wrapper builder-gallery">                                                                            
                                        <div class="builder-item-content row">
                                            <div class="twelve columns b0">
                                                <div class="cpt-items row clearfix isotope">
                                                    
                                                    <?php foreach ($wirausaha as $w) { ?> 
                                                    <div class="cpt-item four columns isotope-item hotel">
                                                        <div class="thumb-wrapper">
                                                            <img src="<?php echo base_url(); ?>logo/<?php echo $w->usaha_logo; ?>" alt="">
                                                            <div class="thumb-control-wrapper">
                                                                <ul class="thumb-control clearfix">
                                                                    <li><a rel="prettyPhoto[gallery1]" title="Logo Usaha" href="<?php echo base_url(); ?>logo/<?php echo $w->usaha_logo; ?>" class="go-gallery">Open Gallery</a></li>                                                                    
                                                                </ul>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="cpt-detail">
                                                            <h2 class="cpt-title"><a href="#"><?php echo $w->usaha_name; ?></a></h2>
                                                            <div class="cpt-desc"><?php echo $w->usaha_bidang; ?></div>
                                                        </div>
                                                    </div>
                                                    <?php } ?> 

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="clear"></div>
                            </div> <!-- END .row -->

                        </div> <!-- END .page-wrapper -->
                        <div class="clear"></div>

                    </div> <!-- END .page-outer-wrapper -->
                </div>
            </div> <!-- END .main-wrapper -->
</div> <!-- END .main-outer-wrapper -->