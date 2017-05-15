<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li><a href="<?php echo site_url('lowongankerja'); ?>">Lowongan Kerja</a></li>        
        <li class="active">Lowongan Kerja Detail</li>
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
                    <section id="blog-detail">
                        <header><h1>Lowongan Kerja</h1></header>
                        <article class="blog-detail">
                            <header class="blog-detail-header">
                                <a href="<?php echo base_url(); ?>lowongan_pict/<?php echo $detail->lowker_image; ?>" rel="prettyPhoto[1]">
                                <img src="<?php echo base_url(); ?>lowongan_pict/<?php echo $detail->lowker_image; ?>" width="50%">
                                </a>                                
                                <br>
                                <h2><?php echo $detail->lowker_title ?></h2>
                                <?php 
                                    $tgl     = $detail->lowker_tgl_post;
                                    $tanggal = substr($tgl,8,2); 
                                    $bln     = substr($tgl, 5,2);
                                    $tahun   = substr($tgl,0,4);
                                ?>
                                <div class="blog-detail-meta">
                                    <span class="date"><span class="fa fa-file-o"></span><?php echo $tanggal.'-'.$bln.'-'.$tahun; ?></span>
                                    <span class="author"><span class="fa fa-user"></span><?php echo ucwords($detail->user_username); ?></span>                                    
                                </div>
                            </header>
                            <hr>
                            <?php echo $detail->lowker_desc; ?>
                            <p><b>Deadline : <?php echo tgl_indo($detail->lowker_tgl_deadline); ?></b></p>
                            <footer>
                                <section id="share-post">
                                    <div class="icons">
                                        <span>Share :</span>
                                        <div class="fb-share-button" data-href="<?php echo base_url().'lowongankerja/id/'.$detail->lowker_id.'/'.$tahun.'/'.$detail->lowker_seo; ?>" data-layout="icon"></div>
                                    </div><!-- /.icons -->
                                </section><!-- /share -->                                
                            </footer>
                        </article>
                    </section><!-- /.blog-detail -->
                    <hr>
                    
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