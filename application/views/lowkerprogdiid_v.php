<div class="titlebar-outer-wrapper" style="background:url('<?php echo base_url(); ?>img/title-bg.jpg') no-repeat top center;">
    <div class="shadow-box"></div>
</div>
<div class="main-outer-wrapper has-titlebar">
    <div class="main-wrapper container">
        <div class="row row-wrapper">
            <div class="page-outer-wrapper">
                <div class="page-wrapper twelve columns no-sidebar b0">                        
                    
                    <div class="row">
                        <div class="twelve columns b0">
                            <div class="page-title-wrapper">
                                <h2 class="page-title left">Lowongan Kerja</h2>
                                <div class="page-title-alt right"><a href="<?php echo base_url(); ?>">Beranda</a> &#187; <a href="<?php echo site_url('lowongankerja'); ?>">Lowongan Kerja</a> &#187; <?php echo $detail->fakultas_name; ?></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">  
                        <div class="loop-posts eight columns">                            
                            <?php foreach($daftar_lowker as $s) { ?>
                            <?php 
                                $tgl = $s->lowker_tgl_post; 
                                $tahun   = substr($tgl,0,4);
                            ?>
                            <div id="post-ID" class="post-CLASS blog-post-item b30">
                                <div class="post-heading">
                                <h2 class="blog-title"><a href="<?php echo site_url().'lowongankerja/id/'.$s->lowker_id.'/'.$tahun.'/'.$s->lowker_seo; ?>"><?php echo $s->lowker_title; ?></a></h2>
                                    <div class="blog-meta">
                                        <span class="blog-date"><i class="icon-time"></i> <?php $tanggal = substr($tgl,8,2); echo $tanggal; echo ' '; $bulan = getBulan(substr($tgl,5,2)); echo $bulan; $tahun = substr($tgl,0,4); echo ' '.$tahun; ?></span>
                                        <span class="blog-author"><i class="icon-user"></i><span> Oleh </span><a class="blog-author-tooltip"rel="tooltip" data-original-title="View all posts by <?php echo $s->user_username; ?>" href="#"><?php echo $s->user_username; ?></a></span>
                                        <span class="blog-comment"><i class="icon-comments-alt"></i><span> In </span> <a href="<?php echo site_url().'lowongankerja/fakultas/'.$s->fakultas_id.'/'.$s->lowker_seo; ?>"><?php echo $s->progdi_name; ?></a> </span>
                                    </div>
                                </div>
                                <?php
                                    if (!empty($s->lowker_image)) {
                                ?>
                                <div class="blog-thumb-wrapper">
                                    <a href="<?php echo site_url().'lowongankerja/id/'.$s->lowker_id.'/'.$tahun.'/'.$s->lowker_seo; ?>"><img src="<?php echo base_url(); ?>lowongan_pict/<?php echo $s->lowker_image; ?>" alt=""></a>
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="blog-excerpt">
                                    <p><?php 
                                        $deskripsi = nl2br($s->lowker_desc);
                                        $isi = substr($deskripsi,0,300);
                                        echo $isi; 
                                    ?></p>
                                </div>
                                <a class="blog-more" href="<?php echo site_url().'lowongankerja/id/'.$s->lowker_id.'/'.$tahun.'/'.$s->lowker_seo; ?>" class=""><i class="icon-plus"></i> Selengkapnya</a>
                            </div>
                            <?php } ?>
                        </div> 
                                 
                        <div class="sidebar right-sidebar-wrapper four columns">                                
                            <div class="widget-container widget_nav_menu" id="widget-ID-name">
                                <h3 class="widgettitle">Quick Link</h3>
                                <div class="widget-content">
                                    <ul>
                                        <li><a href="<?php echo site_url('wisuda/daftar'); ?>">Pendaftaran Wisuda</a></li>
                                        <li><a href="<?php echo site_url('daftar'); ?>">Pendaftaran Alumni</a></li>                                        
                                    </ul>
                                </div>
                            </div>                                    

                            <div class="widget-container st-recent-event" id="widget-ID-name">
                                <h3 class="widgettitle">Agenda</h3>                                
                                <div class="widget-content">
                                    <div class="builder-item-content">
                                        <ul class="upcoming-events">
                                            <?php foreach($daftar_agenda_semat as $a) { 
                                                $tglx     = $a->agenda_tgl_post; 
                                                $tanggalx = substr($tglx,8,2);
                                                $tahunx   = substr($tglx,0,4); 
                                            ?>
                                            <li>
                                                <p class="small-event-data">
                                                    <strong><?php echo $tanggalx; ?></strong><a href="#"></a><span><?php $bulanx = getBulan(substr($tglx,5,2)); echo substr($bulanx, 0,3); ?></span>
                                                </p>
                                                <a href="<?php echo site_url().'agendaalumni/id/'.$a->agenda_id.'/'.$tahunx.'/'.$a->agenda_seo; ?>" class="event-title"><?php echo $a->agenda_title; ?></a>
                                                <span><?php $bulanx = getBulan(substr($tglx,5,2)); echo $bulanx; ?> <?php echo $tanggalx; ?>, <?php echo $tahunx; ?></span>
                                            </li>
                                            <?php } ?>                                                
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-container st-recent-posts" id="widget-ID-name">
                                <h3 class="widgettitle">Seputar Alumni</h3>
                                <div class="widget-content">
                                <ul>
                                    <?php 
                                        $no = 1;
                                        foreach($daftar_seputar_semat as $x) {                         
                                            $tgl     = $x->seputar_tgl_post; 
                                            $tanggal = substr($tgl,8,2);
                                            $tahun   = substr($tgl,0,4); 

                                            if ($no % 2 == 0) {
                                                $kelas = "event";
                                            } else {
                                                $kelas = "";
                                            }                                                                                            
                                    ?> 
                                    <li class="<?php echo $kelas; ?>">                                        
                                        <a href="<?php echo site_url().'seputaralumni/id/'.$x->seputar_id.'/'.$tahun.'/'.$x->seputar_seo; ?>" class="event-title"><?php echo $x->seputar_title; ?></a>
                                        <span class="recent-date"><?php $bulan = getBulan(substr($tgl,5,2)); echo $bulan; ?> <?php echo $tanggal; ?>, <?php echo $tahun; ?></span>
                                        <div class="clear"></div>
                                    </li>
                                    <?php 
                                        $no++;
                                    } 
                                    ?>                                     
                                </ul>
                                </div>
                            </div>
                                    
                        </div>
                        <div class="clear"></div>
                    </div> <!-- END .row -->
                </div> <!-- END .page-wrapper -->
                <div class="clear"></div>
            </div> <!-- END .page-outer-wrapper -->
        </div>
    </div> <!-- END .main-wrapper -->                            

</div> <!-- END .main-outer-wrapper -->