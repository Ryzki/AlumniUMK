<section id="content">
    <div id="breadcrumb-container">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">HOME</a></li>
                <li class="active">TENTANG KAMI</li>               
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="team-members-slider-container" class="carousel-wrapper">
                    <header class="content-title">
                        <div class="title-bg">
                        <h2 class="title">Tentang Kami</h2>
                        </div><!-- End .title-bg -->
                        <div class="xs-margin"></div><!-- space -->
                    </header>
                    

                    <div class="team-member-header clearfix">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <figure>
                                    <img src="<?php echo base_url(); ?>content/<?php echo $about->content_image; ?>" alt="" class="img-responsive">
                                </figure>
                                <div class="md-margin visible-xs visible-sm"></div><!-- space for small devices -->
                            </div><!-- End .col-md-4-->

                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <div class="team-member-header-meta">                                
                                <div align="justify"><?php echo $about->content_deskripsi; ?></div>
                                </div><!-- End .team-member-header -->                                
                            </div><!-- End #team-members-slider-contaiener -->                    
                        </div>
                    </div>
                </div>
            </div><!-- End .col-md-12 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

</section>