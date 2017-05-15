<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li class="active">Agenda</li>        
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
                    <section class="events" id="events">
                        <header><h1>Agenda</h1></header>
                        <div class="section-content">
                            <?php                                 
                                foreach($daftar_agenda as $s) { 
                                    $tglx     = $s->agenda_tgl_post; 
                                    $tanggalx = substr($tglx,8,2);
                                    $tahunx   = substr($tglx,0,4);
                            ?>
                            <article class="event">
                                <figure class="date">
                                    <div class="month"><?php $bulanx = getBulan(substr($tglx,5,2)); echo substr($bulanx, 0,3); ?></div>
                                    <div class="day"><?php echo $tanggalx; ?></div>
                                </figure>
                                <aside>
                                    <header>
                                        <a href="<?php echo site_url().'agendaalumni/id/'.$s->agenda_id.'/'.$tahunx.'/'.$s->agenda_seo; ?>"><?php echo $s->agenda_title; ?></a>
                                    </header>
                                    <div class="additional-info"><span class="fa fa-map-marker"></span> <?php echo ucwords($s->user_username); ?></div>
                                    <div class="description">
                                        <?php echo $s->agenda_short; ?>
                                    </div>
                                    <a href="<?php echo site_url().'agendaalumni/id/'.$s->agenda_id.'/'.$tahunx.'/'.$s->agenda_seo; ?>" class="btn btn-framed btn-color-grey btn-small">Detail</a>
                                </aside>
                            </article><!-- /article -->
                            <?php                                
                                } 
                            ?>
                        </div><!-- /.section-content -->
                    </section><!-- /.events -->
                    <div class="center">
                        <?php echo $pages; ?>
                    </div>
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