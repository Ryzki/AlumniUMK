<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li><a href="<?php echo site_url('lowongankerja'); ?>">Lowongan Kerja</a></li>
        <li class="active"><?php echo $detail->fakultas_name; ?></li>
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
                    <section class="blog-listing" id="blog-listing">
                        <header><h1>Lowongan Kerja</h1></header>
                        <div class="row">
                            <?php
                                $no = 1; 
                                foreach($daftar_lowker as $s) {                           
                                    $tgl     = $s->lowker_tgl_post;
                                    $tanggal = substr($tgl,8,2); 
                                    $bln     = substr($tgl, 5,2);
                                    $tahun   = substr($tgl,0,4);
                            ?>
                            <div class="col-md-6 col-sm-6">
                                <article class="blog-listing-post">
                                    <figure class="blog-thumbnail">
                                        <figure class="blog-meta"><span class="fa fa-file-text-o"></span><?php echo $tanggal.'-'.$bln.'-'.$tahun; ?></figure>
                                        <div class="image-wrapper"><a href="<?php echo site_url().'lowongankerja/id/'.$s->lowker_id.'/'.$tahun.'/'.$s->lowker_seo; ?>"><img src="<?php echo base_url(); ?>lowongan_pict/<?php echo $s->lowker_image; ?>"></a></div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="<?php echo site_url().'lowongankerja/id/'.$s->lowker_id.'/'.$tahun.'/'.$s->lowker_seo; ?>"><h3><?php echo $s->lowker_title; ?></h3></a>
                                        </header>
                                        <div class="description">
                                            <?php echo $s->lowker_short; ?>
                                        </div>
                                        <a href="<?php echo site_url().'lowongankerja/id/'.$s->lowker_id.'/'.$tahun.'/'.$s->lowker_seo; ?>" class="read-more stick-to-bottom">Selengkapnya</a>
                                    </aside>
                                </article><!-- /article -->
                            </div><!-- /.col-md-6 -->
                            <?php 
                                if ($no % 2 == 0) {
                                    echo '</div><div class="row">';
                                }
                                $no++;
                            } 
                            ?>
                        </div><!-- /.row -->                        

                    </section><!-- /.blog-listing -->
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