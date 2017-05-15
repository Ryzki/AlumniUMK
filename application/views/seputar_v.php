<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li class="active">Seputar Alumni</li>
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
                        <header><h1>Seputar Alumni</h1></header>
                        <div class="row">
                            <?php
                                $no = 1; 
                                foreach($daftar_seputar as $s) {                            
                                    $tgl     = $s->seputar_tgl_post;
                                    $tanggal = substr($tgl,8,2); 
                                    $bln     = substr($tgl, 5,2);
                                    $tahun   = substr($tgl,0,4);
                            ?>
                            <div class="col-md-6 col-sm-6">
                                <article class="blog-listing-post">
                                    <figure class="blog-thumbnail">
                                        <figure class="blog-meta"><span class="fa fa-file-text-o"></span><?php echo $tanggal.'-'.$bln.'-'.$tahun; ?></figure>
                                        <div class="image-wrapper"><a href="<?php echo site_url().'seputar/id/'.$s->seputar_id.'/'.$tahun.'/'.$s->seputar_seo; ?>"><img src="<?php echo base_url(); ?>seputar_pict/<?php echo $s->seputar_image; ?>"></a></div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="<?php echo site_url().'seputar/id/'.$s->seputar_id.'/'.$tahun.'/'.$s->seputar_seo; ?>"><h3><?php echo $s->seputar_title; ?></h3></a>
                                        </header>
                                        <div class="description">
                                            <?php echo $s->seputar_short; ?>
                                        </div>
                                        <a href="<?php echo site_url().'seputar/id/'.$s->seputar_id.'/'.$tahun.'/'.$s->seputar_seo; ?>" class="read-more stick-to-bottom">Selengkapnya</a>
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
                    <aside>
                                        <!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="" ><script  type="text/javascript" >
try {Histats.start(1,3143724,4,9,110,60,"00011111");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?3143724&101" alt="" border="0"></a></noscript>
<!-- Histats.com  END  -->
                    </aside>
                </div><!-- /#sidebar -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->