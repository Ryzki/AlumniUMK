<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li class="active">Statistik Alumni</li>
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
                    <section>
                        <article>
                            <header><h1>Statistik Alumni</h1></header>
                        </article>
                        <article>
                            <p align="justify">
                            Statistik alumni adalah sebuah fitur yang bertujuan memberikan informasi seputar rekap data alumni Universitas Muria Kudus. Dibawah ini ditampilkan grafik apa saja yang berkaitan dengan alumni Universitas Muria Kudus yang dihimpun melalui kegiatan Tracer Study. Untuk lebih jelasnya silahkan klik menu dibawah ini. semoga memberikan informasi-informasi berkaitan dengan alumni Universitas Muria Kudus yang bermanfaat bagi anda.
                            </p>
                        </article>                        
                        <article>                
                            <form action="<?php echo site_url().'statistik/statistik_by_progdi'; ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">                            
                                         <label for="email">Pilih Program Studi</label>
                                        <select name="lstProgdi" id="lstProgdi" required>
                                            <option value="">- Pilih Program Studi -</option>
                                            <?php foreach ($progdi as $p) { ?>                                    
                                            <option value="<?php echo $p->progdi_id; ?>"><?php echo $p->fakultas_name.' - '.$p->progdi_name; ?></option>
                                            <?php } ?>                                                        
                                        </select>                            
                                    </div>                                            
                                    <div class="form-group">
                                        <label for="email">Periode Lulus</label>
                                        <input type="text" class="form-control" id="tahun1" name="tahun1" placeholder="Dari Tahun" value="<?php echo set_value('tahun1'); ?>" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">s/d</label>
                                        <input type="text" class="form-control" id="tahun2" name="tahun2" placeholder="Sampai Tahun" value="<?php echo set_value('tahun2'); ?>" autocomplete="off" required>
                                    </div>                        
                                    <button type="submit" class="btn pull-right">Tampilkan</button>                   
                                </div>
                            </div>
                            </form>
                        </article>
                    </section>

                    <section>                        
                        <div align="center"><h3>STATISTIK TINGKAT KETERSERAPAN ALUMNI</h3></div>
                        <fieldset>
                            <div id="canvasserapan"></div>
                        </fieldset>
                        <div align="center"><h3>STATISTIK KESESUAIAN BIDANG ILMU DENGAN PEKERJAAN</h3></div>
                        <fieldset>
                            <div id="canvasskala"></div>
                        </fieldset>
                        <div align="center"><h3>STATISTIK KESESUAIAN BIDANG ILMU DENGAN PEKERJAAN</h3></div>
                        <fieldset>
                            <div id="canvasskala"></div>
                        </fieldset>
                        <div align="center"><h3>STATISTIK TINGKAT GAJI ALUMNI</h3></div>
                        <fieldset>
                            <div id="canvasgaji"></div>
                        </fieldset>
                        <div align="center"><h3>STATISTIK JENIS PERUSAHAAN</h3></div>
                        <fieldset>
                            <div id="canvasjenis"></div>
                        </fieldset>
                        <div align="center"><h3>STATISTIK LAMA TUNGGU</h3></div>
                        <fieldset>
                            <div id="canvaslamatunggu"></div>
                        </fieldset>
                    </section>
                </div>
            </div>           

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