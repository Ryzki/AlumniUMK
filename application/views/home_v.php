<div id="page-content">
<!-- Slider -->
<div id="homepage-carousel">
    <div class="container">
        <div class="homepage-carousel-wrapper">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <div class="image-carousel">
                    <?php                         
                        foreach ($slider as $s) {                            
                    ?>
                        <div class="image-carousel-slide">
                        <a href="http://<?php echo $s->slider_link; ?>" target="_blank"><img src="<?php echo base_url(); ?>slider/<?php echo $s->slider_image; ?>" alt=""></a>
                        </div>
                    <?php 
                        }
                    ?>
                    </div><!-- /.slider-image -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-5">
                    <div class="slider-content">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Daftarkan Diri Anda Sekarang !!</h1>
                                <form id="slider-form" role="form" action="<?php echo site_url('home/daftar'); ?>" method="post">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <div class="input-group">                                                
                                                <select name="lstDaftar" id="lstDaftar" class="has-dark-background" required>
                                                    <option value="">- Pilih Pendaftaran -</option>
                                                    <option value="1">Wisuda</option>
                                                    <option value="2">Alumni</option>                                                       
                                                </select>                                                
                                            </div><!-- /.form-group -->
                                        </div><!-- /.col-md-6 -->
                                        <button type="submit" class="btn btn-framed">Daftar !</button>
                                    </div><!-- /.row -->                                    
                                </form>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </div><!-- /.slider-content -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
            <div class="background"></div>
        </div><!-- /.slider-wrapper -->
        <div class="slider-inner"></div>
    </div><!-- /.container -->
</div>
<!-- end Slider -->

<!-- News, Events, About -->
<div class="block">
    <div class="container">
        <div class="row">
            
            <div class="col-md-4 col-sm-6">
                <section class="events small" id="events-small">
                    <header>
                        <h2>Info Penting</h2>                        
                    </header>
                    <div class="section-content">
                        <?php
                            $no = 1; 
                            foreach($daftar_info as $i) {  
                                $tglp     = $i->penting_date_post; 
                                $tanggalp = substr($tglp,8,2);
                                $tahunp   = substr($tglp,0,4);

                                if ($no % 2 == 0) {
                                    $class = ' nearest-second';
                                } elseif ($no % 2 == 1) {
                                    $class = ' nearest';
                                }
                        ?>
                        <article class="event<?php echo $class; ?>">
                            <figure class="date">
                                <div class="month"><?php $bulanp = getBulan(substr($tglp,5,2)); echo substr($bulanp, 0,3); ?></div>
                                <div class="day"><?php echo $tanggalp; ?></div>
                            </figure>
                            <aside>
                                <header>
                                    <a href="<?php echo site_url().'infopenting/id/'.$i->penting_id.'/'.$tahunp.'/'.$i->penting_seo; ?>"><?php echo $i->penting_title; ?></a>
                                </header>                                
                                <p><?php echo $i->penting_short; ?></p>
                                <a href="<?php echo site_url().'infopenting/id/'.$i->penting_id.'/'.$tahunp.'/'.$i->penting_seo; ?>" class="btn btn-framed btn-color-grey btn-small">Selengkapnya</a>
                            </aside>                            
                        </article><!-- /article -->
                        <?php $no++; } ?>
                    </div><!-- /.section-content -->
                    <a href="<?php echo site_url('infopenting'); ?>" class="read-more stick-to-bottom">Semua Info</a>
                </section><!-- /.events-small -->
            </div><!-- /.col-md-4 -->


            <div class="col-md-4 col-sm-6">
                <section class="events small" id="events-small">
                    <header>
                        <h2>Agenda Alumni</h2>                        
                    </header>
                    <div class="section-content">
                        <?php
                            $no = 1; 
                            foreach($daftar_agenda_semat as $a) { 
                                $tglx     = $a->agenda_tgl_post; 
                                $tanggalx = substr($tglx,8,2);
                                $tahunx   = substr($tglx,0,4);

                                if ($no % 2 == 0) {
                                    $class = ' nearest-second';
                                } elseif ($no % 2 == 1) {
                                    $class = ' nearest';
                                }
                        ?>
                        <article class="event<?php echo $class; ?>">
                            <figure class="date">
                                <div class="month"><?php $bulanx = getBulan(substr($tglx,5,2)); echo substr($bulanx, 0,3); ?></div>
                                <div class="day"><?php echo $tanggalx; ?></div>
                            </figure>
                            <aside>
                                <header>
                                    <a href="<?php echo site_url().'agendaalumni/id/'.$a->agenda_id.'/'.$tahunx.'/'.$a->agenda_seo; ?>"><?php echo $a->agenda_title; ?></a>
                                </header>                                
                                <p><?php echo $a->agenda_short; ?></p>
                                <a href="<?php echo site_url().'agendaalumni/id/'.$a->agenda_id.'/'.$tahunx.'/'.$a->agenda_seo; ?>" class="btn btn-framed btn-color-grey btn-small">Selengkapnya</a>
                            </aside>
                        </article><!-- /article -->
                        <?php $no++; } ?>
                    </div><!-- /.section-content -->
                    <a href="<?php echo site_url('agendaalumni'); ?>" class="read-more stick-to-bottom">Semua Agenda</a>
                </section><!-- /.events-small -->
            </div><!-- /.col-md-4 -->

            <div class="col-md-4 col-sm-6">
                <section class="events small" id="events-small">
                    <header>
                        <h2>Lowongan Kerja</h2>                        
                    </header>
                    <div class="section-content">
                        <?php
                            $no = 1; 
                            foreach($daftar_lowongan as $x) {                         
                                $tgl     = $x->lowker_tgl_post; 
                                $tanggal = substr($tgl,8,2);
                                $tahun   = substr($tgl,0,4); 

                                if ($no % 2 == 0) {
                                    $class = ' nearest-second';
                                } elseif ($no % 2 == 1) {
                                    $class = ' nearest';
                                }
                        ?>
                        <article class="event<?php echo $class; ?>">
                            <figure class="date">
                                <div class="month"><?php $bulan = getBulan(substr($tgl,5,2)); echo substr($bulan, 0,3); ?></div>
                                <div class="day"><?php echo $tanggal; ?></div>
                            </figure>
                            <aside>
                                <header>
                                    <a href="<?php echo site_url().'lowongankerja/id/'.$x->lowker_id.'/'.$tahun.'/'.$x->lowker_seo; ?>"><?php echo $x->lowker_title; ?></a>
                                </header>                                
                                <p><?php echo $x->lowker_short; ?></p>
                                <a href="<?php echo site_url().'lowongankerja/id/'.$x->lowker_id.'/'.$tahun.'/'.$x->lowker_seo; ?>" class="btn btn-framed btn-color-grey btn-small">Selengkapnya</a>
                            </aside>
                        </article><!-- /article -->
                        <?php $no++; } ?>
                    </div><!-- /.section-content -->
                    <a href="<?php echo site_url('lowongankerja'); ?>" class="read-more stick-to-bottom">Semua Lowongan</a>
                </section><!-- /.events-small -->
            </div><!-- /.col-md-4 -->
            
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end News, Events, About -->

<!-- Testimonial -->
<!-- <section id="testimonials">
    <div class="block">
        <div class="container">
            <div class="author-carousel">
                
                <div class="author">
                    <blockquote>
                        <figure class="author-picture"><img src="<?php echo base_url(); ?>info/<?php echo $info_penting->penting_image; ?>" alt="" width="90%"></figure>
                        <article class="paragraph-wrapper">
                            <div class="inner">
                                <header>INFO PENTING !!!</header>
                               <?php echo $info_penting->penting_desc; ?>
                            </div>
                        </article>
                    </blockquote>
                </div>

            </div>
        </div>
    </div>
</section>
-->


</div>