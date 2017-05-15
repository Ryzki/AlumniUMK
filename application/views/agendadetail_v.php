<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li><a href="<?php echo site_url('agendaalumni'); ?>">Agenda</a></li>
        <li class="active">Agenda Detail</li>
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
                        <header><h1>Agenda</h1></header>
                        <article class="blog-detail">
                            <header class="blog-detail-header">                                                                
                                <h2><?php echo $detail->agenda_title ?></h2>
                                <?php 
                                    $tgl     = $detail->agenda_tgl_post;
                                    $tanggal = substr($tgl,8,2); 
                                    $bln     = substr($tgl, 5,2);
                                    $tahun   = substr($tgl,0,4);
                                ?>
                                <div class="blog-detail-meta">
                                    <span class="date"><span class="fa fa-file-o"></span><?php echo $tanggal.'-'.$bln.'-'.$tahun; ?></span>
                                    <span class="author"><span class="fa fa-user"></span><?php echo ucwords($detail->user_username); ?></span>
                                    <span class="comments"><span class="fa fa-comment-o"></span><?php echo count($komentar);  ?> Komentar</span>
                                </div>
                            </header>
                            <hr>
                            <?php echo $detail->agenda_desc; ?>
                            <footer>
                                <section id="share-post">
                                    <div class="icons">
                                        <span>Share :</span>
                                        <div class="fb-share-button" data-href="<?php echo base_url().'agendaalumni/id/'.$detail->agenda_id.'/'.$tahun.'/'.$detail->agenda_seo; ?>" data-layout="icon"></div>
                                    </div><!-- /.icons -->
                                </section><!-- /share -->                                
                            </footer>
                        </article>
                    </section><!-- /.blog-detail -->
                    <hr>

                    <section id="discussion">
                        <header><h2><?php echo count($komentar);  ?> Komentar</h2></header>
                        <ul class="discussion-list">
                            <?php foreach($komentar as $k) { ?>
                            <li class="author-block">
                                <figure class="author-picture">
                                    <?php if (empty($k->user_avatar)) { ?>
                                    <img src="<?php echo base_url(); ?>avatar/no_image.png">
                                    <?php } else { ?>
                                    <img src="<?php echo base_url().'avatar/'.$k->user_avatar; ?>">
                                    <?php } ?>  
                                </figure>
                                <article class="paragraph-wrapper">
                                    <div class="inner">
                                        <header><h5><?php echo $k->user_name; ?></h5></header>
                                        <p>
                                            <?php echo $k->komentar_pesan; ?>
                                        </p>
                                    </div>
                                    <div class="comment-controls">
                                        <span><?php echo $k->komentar_tgl_post; ?></span>
                                    </div>
                                </article>
                            </li><!-- /parent item -->                            
                            <?php } ?>
                        </ul><!-- /.discussion-list -->
                    </section><!-- /.discussion -->
                    <section id="leave-reply">
                        <header><h2>Kirim Komentar Anda</h2></header>
                        <?php if ($this->session->userdata('logged_in_alumni_tracer')) { ?>
                        <form class="reply-form" action="<?php echo site_url().'agendaalumni/kirim_komentar/'.$this->uri->segment(3).'/'.$this->uri->segment(4); ?>" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="name">Nama Anda</label>
                                            <input type="text" id="name" name="name" value="<?php echo $this->session->userdata('nama_lengkap'); ?>" readonly>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="message">Komentar Anda</label>
                                            <textarea name="komentar" id="komentar" required="required"><?php echo set_value('komentar'); ?></textarea>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                            <div class="form-actions pull-right">
                                <input type="submit" class="btn btn-color-primary" value="Reply">
                            </div><!-- /.form-actions -->
                        </form><!-- /.reply-form -->
                        <?php } else { ?>
                            <p>Silahkan <a href="<?php echo site_url('login'); ?>">Login</a> atau <a href="<?php echo site_url('daftar'); ?>">Daftar</a> untuk mengirim komentar.</p>
                        <?php } ?>
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