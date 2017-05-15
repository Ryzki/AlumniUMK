<section id="content">
    <div id="breadcrumb-container">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">HOME</a></li>
                <li><a href="<?php echo site_url('wirausaha'); ?>">WIRAUSAHA ALUMNI</a></li>
                <li class="active"><?php echo strtoupper($detail->usaha_name); ?></li>               
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div id="team-members-slider-container" class="carousel-wrapper">
                    <header class="content-title">
                        <div class="title-bg">
                        <h2 class="title">Detail Wirausaha Alumni</h2>
                        </div><!-- End .title-bg -->
                        <div class="xs-margin"></div><!-- space -->
                    </header>
                    

                    <div class="team-member-header clearfix">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <figure>
                                    <img src="<?php echo base_url(); ?>logo/<?php echo $detail->usaha_logo; ?>" alt="" class="img-responsive">
                                </figure>
                                <div class="md-margin visible-xs visible-sm"></div><!-- space for small devices -->
                            </div><!-- End .col-md-4-->

                            <div class="col-md-8 col-sm-12 col-xs-12">
                                
                                <div class="team-member-header-meta">
                                <table width="100%" border="0" align="left" cellpadding="2" cellspacing="2">
                                    <tr>
                                        <td width="18%">Nama Perusahaan</td>
                                        <td width="2%">:</td>
                                        <td width="80%"><b><?php echo $detail->usaha_name; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Perusahaan</td>
                                        <td>:</td>
                                        <td><b><?php echo $detail->usaha_alamat; ?></b></td>
                                    </tr>                                    
                                    <tr>
                                      <td>Web Perusahaan</td>
                                      <td>:</td>
                                      <td><b><?php if (!empty($detail->usaha_web)) ?><a href="http://<?php echo $detail->usaha_web; ?>" target="_blank"><?php echo $detail->usaha_web; ?></a></b></td>
                                    </tr>
                                    <tr>
                                      <td>Bidang Usaha</td>
                                      <td>:</td>
                                      <td><?php echo $detail->usaha_bidang; ?></td>
                                    </tr>
                                </table>                               
                                <div align="justify"><?php echo $detail->usaha_desc; ?></div>
                                </div><!-- End .team-member-header -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md-margin2x"></div><!-- space -->

                <div id="brand-slider-container" class="carousel-wrapper">
                    <header class="content-title">
                        <div class="title-bg">
                            <h2 class="title">Usaha Alumni</h2>
                        </div><!-- End .title-bg -->
                    </header>
                    
                    <div class="carousel-controls">
                        <div id="brand-slider-prev" class="carousel-btn carousel-btn-prev">
                        </div><!-- End .carousel-prev -->
                        <div id="brand-slider-next" class="carousel-btn carousel-btn-next carousel-space">
                        </div><!-- End .carousel-next -->
                    </div><!-- End .carousel-controllers -->
                    
                    <div class="sm-margin"></div><!-- space -->
                    
                    <div class="brand-slider owl-carousel">
                        <?php foreach($usaha as $u) { ?>
                        <a href="<?php echo site_url().'wirausaha/detid/'.$u->usaha_id.'/'.$u->usaha_seo.'.html'; ?>"><img src="<?php echo base_url(); ?>logo/<?php echo $u->usaha_logo; ?>" title="<?php echo $u->usaha_name; ?>" width="170" ></a>
                        <?php } ?>                        
                    </div>
                </div>
                
            </div><!-- End .col-md-12 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

</section>