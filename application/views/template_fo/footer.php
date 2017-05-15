<section id="footer-top">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-social">
                <figure>Join us :</figure>
                <div class="icons">
                <?php                                    
                    $social = $this->menu_model->select_social()->result();
                    foreach ($social as $s) {                                                                            
                ?>
                    <a href="<?php echo $s->social_url; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/fb.png"></a>
                <?php
                    }
                ?> 
                </div><!-- /.icons -->
            </div><!-- /.social -->           
        </div><!-- /.footer-inner -->
    </div><!-- /.container -->
</section><!-- /#footer-top -->

<section id="footer-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <aside class="logo">
                    <img src="<?php echo base_url(); ?>img/logo-footer.png" class="vertical-center">
                </aside>
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-4">
                <aside>
                    <header><h4>Kontak Kami</h4></header>
                    <?php 
                        $kontak = $this->menu_model->select_kontak()->row(); 
                    ?>
                    <address>
                        <strong><?php echo $kontak->contact_name; ?></strong>
                        <br>
                        <span><?php echo $kontak->contact_address; ?></span>
                        <br><br>                        
                        <abbr title="Telephone">Telp. :</abbr> <?php echo $kontak->contact_phone; ?>
                        <br>
                        <abbr title="Email">Email :</abbr> <a href="mailto:<?php echo $kontak->contact_email; ?>"><?php echo $kontak->contact_email; ?></a>
                    </address>                    
                </aside>
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-4">
                <aside>
                    <header><h4>Fakultas</h4></header>
                    <ul class="list-links">
                    <?php                                    
                        $fakultas = $this->menu_model->select_fakultas()->result();
                        foreach ($fakultas as $y) {                                                                            
                    ?>
                        <li><a href="http://<?php echo $y->fakultas_url; ?>" target="_blank"><?php echo $y->fakultas_title; ?></a></li>
                    <?php } ?>

                    </ul>
                </aside>
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-4">
                <aside>
                    <header><h4>Fasilitas</h4></header>
                    <ul class="list-links">
                    <?php                                    
                        $fasilitas = $this->menu_model->select_fasilitas()->result();
                        foreach ($fasilitas as $f) {                                                                            
                    ?>
                        <li><a href="http://<?php echo $f->fasilitas_url; ?>" target="_blank"><?php echo $f->fasilitas_title; ?></a></li>
                    <?php } ?>
                    </ul>
                </aside>
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <div class="background"><img src="<?php echo base_url(); ?>file_fo/assets/img/background-city.png" class="" alt=""></div>
</section><!-- /#footer-content -->

<section id="footer-bottom">
    <div class="container">
        <div class="footer-inner">
            <div class="copyright">© 2015 Universitas Muria Kudus. All Rights Reserved</div><!-- /.copyright -->
        </div><!-- /.footer-inner -->
    </div><!-- /.container -->
</section><!-- /#footer-bottom -->