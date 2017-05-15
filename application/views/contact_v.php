<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li class="active">Hubungi Kami</li>
    </ol>
</div>
<!-- end Breadcrumb -->

<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-8">
                <div id="page-main">
                    <section id="contact">
                        <header><h1>Hubungi Kami</h1></header>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <h3><?php echo $contact->contact_name; ?></h3>
                                    <br>
                                    <span><?php echo $contact->contact_address; ?></span>                                                                    
                                    <br>
                                    <abbr title="Telephone">Telp. :</abbr> <?php echo $contact->contact_phone; ?>
                                    <br>
                                    <abbr title="Telephone">Fax. :</abbr> <?php echo $contact->contact_fax; ?>
                                    <br>
                                    <abbr title="Email">Email :</abbr> <a href="mailto:<?php echo $contact->contact_email; ?>"><?php echo $contact->contact_email; ?></a>
                                </address>                              
                                <hr>                                
                            </div>
                            <!--<div class="col-md-6">
                                <div class="map-wrapper">                                    
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.310009361911!2d110.6840538!3d-6.6083471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e711fa340a2302f%3A0x7ce378d9b5c84989!2sUniversitas+Muria+Kudus!5e0!3m2!1sid!2sid!4v1438267479802" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>                                
                            </div> -->
                        </div>
                    </section>
                    <section id="contact-form" class="clearfix">
                        <header><h2>Hubungi Kami</h2></header>
                        <?php 
                        if ($this->session->flashdata('notification')) { ?>
                            <div class="alert alert-success">                       
                            <?php echo $this->session->flashdata('notification'); ?>
                            </div>                
                        <? } ?>
                        <?php echo validation_errors('<div class="alert alert-error">','</div>'); ?>
                        <form class="contact-form" method="post" action="<?php echo site_url('hubungikami/kirim_pesan'); ?>">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="name">Nama :</label>
                                            <input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" required>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="email">Email :</label>
                                            <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" required>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="name">Subyek :</label>
                                            <input type="text" name="subject" id="subject" value="<?php echo set_value('subject'); ?>" required>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="message">Pesan Anda :</label>
                                            <textarea name="message" id="message" required><?php echo set_value('message'); ?></textarea>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->                           
                            <div class="pull-right">
                                <input type="submit" class="btn btn-color-primary" id="submit" value="Submit">
                            </div><!-- /.form-actions -->
                            <div id="form-status"></div>
                        </form><!-- /.footer-form -->
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

            <!--SIDEBAR Content-->
            <div class="col-md-4">
                <div id="page-sidebar" class="sidebar">
                    <aside class="news-small" id="news-small">
                        <header>
                            <h2>Artikel Lainnya</h2>
                        </header>
                        <div class="section-content">
                            <?php 
                                foreach($daftar_seputar_semat as $x) {                         
                                    $tglx     = $x->seputar_tgl_post; 
                                    $tanggalx = substr($tglx,8,2); 
                                    $blnx     = substr($tglx, 5,2);
                                    $tahunx   = substr($tglx,0,4);
                            ?>
                            <article>
                                <figure class="date"><i class="fa fa-file-o"></i><?php echo $tanggalx.'-'.$blnx.'-'.$tahunx; ?></figure>
                                <header><a href="<?php echo site_url().'seputar/id/'.$x->seputar_id.'/'.$tahunx.'/'.$x->seputar_seo; ?>"><?php echo $x->seputar_title; ?></a></header>
                            </article><!-- /article -->  
                            <?php 
                            }
                            ?>                          
                        </div><!-- /.section-content -->                        
                    </aside><!-- /.news-small -->                    
                    <aside id="archive">
                        <header>
                            <h2>Quick Link</h2>
                            <ul class="list-links">
                                <li><a href="<?php echo site_url('wisuda/daftar'); ?>">Pendaftaran Wisuda</a></li>
                                <li><a href="<?php echo site_url('daftar'); ?>">Pendaftaran Alumni</a></li>                                
                            </ul>
                        </header>
                    </aside><!-- /archive -->
                </div><!-- /#sidebar -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->