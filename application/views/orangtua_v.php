<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li class="active">Kuesioner Orang Tua</li>
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
                    <header><h1>Kuesioner Orang Tua</h1></header>
                </article>
                <div class="table-responsive">                                    
                    <form role="form" action="<?php echo site_url('orangtua/savedata'); ?>" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <?php 
                    if ($this->session->flashdata('notification')) { ?>
                        <div class="alert alert-error">                       
                        <?php echo $this->session->flashdata('notification'); ?>
                        </div>                
                    <? } ?>

                    <table width="100%" border="0" align="left" cellpadding="2" cellspacing="2" class="table table-hover course-list-table tablesorter">
                    <tr>
                        <td colspan="4"><strong>IDENTITAS ORANG TUA</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" width="40%">Nama Orang Tua</td>
                        <td width="2%">:</td>
                        <td><input class="input_text" name="txtNama" type="text" id="txtNama" size="50" maxlength="50" placeholder="Enter Nama Anda" value="<?php echo set_value('txtNama'); ?>" required /></td>
                        <?php echo form_error('txtNama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                               
                    </tr>
                    <tr>
                        <td colspan="2" width="40%">Pekerjaan Orang Tua</td>
                        <td width="2%">:</td>
                        <td><input class="input_text" name="txtKerja" type="text" id="txtKerja" size="50" maxlength="50" placeholder="Enter Pekerjaan Anda" value="<?php echo set_value('txtKerja'); ?>" required /></td>
                        <?php echo form_error('txtKerja', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                               
                    </tr>
                    <tr>
                        <td colspan="2" width="40%">Pendidikan Orang Tua</td>
                        <td width="2%">:</td>
                        <td><input class="input_text" name="txtDidik" type="text" id="txtDidik" size="50" maxlength="50" placeholder="Enter Pendidikan Anda" value="<?php echo set_value('txtDidik'); ?>" required /></td>
                        <?php echo form_error('txtDidik', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                               
                    </tr>
                    <tr>
                        <td colspan="2" width="40%">Nama Anak/Alumni</td>
                        <td width="2%">:</td>
                        <td><input class="input_text" name="txtNamaAnak" type="text" id="txtNamaAnak" size="50" maxlength="50" placeholder="Enter Nama Anak Anda" value="<?php echo set_value('txtNamaAnak'); ?>" required /></td>
                        <?php echo form_error('txtNamaAnak', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                               
                    </tr>
                    <tr>
                        <td colspan="2" width="40%">Program Studi</td>
                        <td width="2%">:</td> 
                        <td>
                        <div class="input-group">                        
                        <select name="lstProgdi" id="lstProgdi" required>                                                
                            <option value="">- Pilih Program Studi -</option>                                                    
                            <?php foreach ($daftar_progdi as $p) { ?>                                
                                <option value="<?php echo $p->progdi_id; ?>"><?php echo $p->progdi_name; ?></option>
                            <?php }?>
                        </select>
                        </div>                          
                        </td>
                        <?php echo form_error('lstProgdi', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                               
                    </tr> 
                    <tr>
                        <td colspan="4"><strong>KUALITAS PEMBELAJARAN</strong></td>
                    </tr>
                    <tr>
                        <td valign="top">1.</td>
                        <td valign="top">Kualitas Layanan</td>
                        <td valign="top">:</td>
                        <td valign="top"><textarea name="txtLayanan" id="txtLayanan" cols="45" rows="5" required placeholder="Kualitas Layanan" required="required"><?php echo set_value('txtLayanan'); ?></textarea></td>
                    </tr>
                    <tr>
                        <td valign="top">2.</td>
                        <td valign="top">Kualitas Pembelajaran</td>
                        <td valign="top">:</td>
                        <td valign="top"><textarea name="txtBelajar" id="txtBelajar" cols="45" rows="5" required placeholder="Kualitas Pembelajaran" required="required"><?php echo set_value('txtBelajar'); ?></textarea></td>
                    </tr>
                    <tr>
                        <td valign="top">3.</td>
                        <td valign="top">Kualitas Infrastruktur dan Fasilitas</td>
                        <td valign="top">:</td>
                        <td valign="top"><textarea name="txtInfra" id="txtInfra" cols="45" rows="5" required placeholder="Infrastruktur dan Fasilitas" required="required"><?php echo set_value('txtInfra'); ?></textarea></td>
                    </tr>
                    <tr>
                        <td valign="top">4.</td>
                        <td valign="top">Kemampuan Hardskill & Softskill yang dimiliki Anak</td>
                        <td valign="top">:</td>
                        <td valign="top"><textarea name="txtHardSoft" id="txtHardSoft" cols="45" rows="5" required placeholder="Kemampuan Hardskill dan Softskill" required="required"><?php echo set_value('txtHardSoft'); ?></textarea></td>
                    </tr>
                    <tr>
                        <td valign="top">5.</td>
                        <td valign="top">Saran kepada Universitas Muria Kudus</td>
                        <td valign="top">:</td>
                        <td valign="top"><textarea name="txtSaran" id="txtSaran" cols="45" rows="5" required placeholder="Saran untuk Universitas Muria Kudus" required="required"><?php echo set_value('txtSaran'); ?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Captcha Code</td>
                        <td>:</td>
                        <td>                              
                            <img id="imgCaptcha" src="<?php echo site_url('orangtua/create_image'); ?>" />
                            <input id="verify" class="input_text" type="text" value="" name ="verify" autocomplete="off" required \>
                        </td>                  
                    </tr>                                   
                    </table>

                    <button type="submit" class="btn pull-right">Simpan</button>
                    </form>                
                </div>
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