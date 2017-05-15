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
                                <h2 class="page-title left">Struktur Organisasi</h2>
                                <div class="page-title-alt right"><a href="<?php echo base_url(); ?>">Beranda</a> &#187; Struktur Organisasi &#187; <?php echo $struktur->fakultas_name; ?> &#187; <?php echo $struktur->progdi_name; ?></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">  
                        <div class="loop-posts eight columns">                                                                                
                            <div id="post-ID" class="post-CLASS blog-post-item b30">
                                <div class="post-heading">
                                <h2 class="blog-title"><?php echo $struktur->struktur_title; ?></h2>
                                    <div class="blog-meta">                                                                                                                        
                                    </div>
                                </div>
                                <?php
                                    if (!empty($struktur->struktur_image)) {
                                ?>
                                <div class="blog-thumb-wrapper">
                                    <img src="<?php echo base_url(); ?>struktur/<?php echo $struktur->struktur_image; ?>" alt="">
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="blog-excerpt">
                                    <p><?php                                         
                                        echo $struktur->struktur_desc; 
                                    ?></p>
                                </div>                                
                            </div>                            
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

                            <div class="widget-container st-recent-posts" id="widget-ID-name">
                                <h3 class="widgettitle">Lowongan Kerja</h3>
                                <div class="widget-content">
                                <ul>
                                    <?php 
                                        $n = 1;
                                        foreach($daftar_lowongan as $l) {                         
                                        $tgll     = $l->lowker_tgl_post; 
                                        $tanggall = substr($tgll,8,2);
                                        $tahunl   = substr($tgll,0,4);

                                            if ($n % 2 == 0) {
                                                $kelasx = "event";
                                            } else {
                                                $kelasx = "";
                                            }                                                                                            
                                    ?> 
                                    <li class="<?php echo $kelasx; ?>">
                                        <img alt="" class="thumbnail" src="<?php echo base_url(); ?>lowongan_pict/<?php echo $l->lowker_image; ?>" height="50" width="50">
                                        <a href="<?php echo site_url().'lowongankerja/id/'.$l->lowker_id.'/'.$tahunl.'/'.$l->lowker_seo; ?>" class="event-title"><?php echo $l->lowker_title; ?></a>                                        
                                        <div class="clear"></div>
                                    </li>
                                    <?php 
                                        $n++;
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