<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li class="active">Pengguna Alumni</li>
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
                         <header><h1>Pengguna Alumni</h1></header>
                            <p align="justify">
                            Yang terhormat Pengguna Alumni, Sebagai dasar menjadi Universitas yang baik dalam pendidikan di jawa tengah, Universitas Muria Kudus (UMK) senantiasa berupaya 
                            meningkatkan mutu lulusan agar memiliki kompetensi yang handal sebagai professional di semua bidang. <br>
                            Untuk itu kami mengharapkan umpan balik/feedback dari pengguna terkait kinerja lulusan kami selama di perusahaan Bapak/Ibu dan kompetensi 
                            yang diharapkan dari tiap lulusan. 
                            Survey ini digunakan sebagai bahan evaluasi kinerja lulusan serta wujud nyata untuk meningkatkan mutu lulusan. 
                            Segala hal dalam kuesioner ini bersifat terbatas dan hanya digunakan sebagai bahan evaluasi internal Univesitas Muria Kudus. 
                            Mohon diisi dengan identitas yang lengkap dan sesuai. 
                            </p>
                        </article>
                        <article>
                        <div class="table-responsive">
                            <form class="contact-form" method="post" action="<?php echo site_url('pengguna/savedata'); ?>">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <?php 
                                if ($this->session->flashdata('notification')) { ?>
                                <div class="alert alert-error">                       
                                    <?php echo $this->session->flashdata('notification'); ?>
                                </div>                
                            <? } ?>
                                                    
                            <table width="100%" border="0" align="left" cellpadding="2" cellspacing="2" class="table table-hover course-list-table tablesorter">
                            <tr>
                                <td colspan="4"><strong>IDENTITAS PENGISI</strong></td>
                            </tr>
                            <tr>
                                <td colspan="2">Nama</td>
                                <td width="2%">:</td>
                                <td width="53%"><input class="input_text" name="txtNama" type="text" id="txtNama" size="50" maxlength="50" placeholder="Nama Anda" value="<?php echo set_value('txtNama'); ?>" required /></td>
                                <?php echo form_error('txtNama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                               
                            </tr>
                            <tr>
                                <td colspan="2">Jabatan</td>
                                <td>:</td>
                                <td><input name="txtJabatan" type="text" id="txtJabatan" size="50" maxlength="50" placeholder="Jabatan Anda" value="<?php echo set_value('txtJabatan'); ?>" required /></td>
                                <?php echo form_error('txtJabatan', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            </tr>
                            <tr>
                                <td colspan="2">E-mail</td>
                                <td>:</td>
                                <td><input name="txtEmail" type="email" id="txtEmail" size="30" maxlength="30" placeholder="E-mail Anda" value="<?php echo set_value('txtEmail'); ?>" required /></td>
                                <?php echo form_error('txtEmail', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            </tr>
                            <tr>
                                <td colspan="2">No. Handphone</td>
                                <td width="2%">:</td>
                                <td width="53%"><input name="txtHP" type="text" id="txtHP" size="30" maxlength="30" placeholder="No. Handphone Anda" value="<?php echo set_value('txtHP'); ?>" required /></td>
                                <?php echo form_error('txtHP', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            </tr> 
                            <tr>
                                <td colspan="4"><strong>IDENTITAS PERUSAHAAN PENGGUNA ALUMNI</strong></td>
                            </tr>
                            <tr>
                                <td colspan="2">Nama</td>
                                <td>:</td>
                                <td><input name="txtNamaPerus" type="text" id="txtNamaPerus" size="50" maxlength="50" placeholder="Nama Perusahaan Anda" value="<?php echo set_value('txtNamaPerus'); ?>" required /></td>
                                <?php echo form_error('txtNamaPerus', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            </tr>
                             <tr>
                                <td colspan="2">Bidang Usaha</td>
                                <td>:</td>
                                <td><input name="txtBidang" type="text" id="txtBidang" placeholder="Bidang Usaha Perusahaan" value="<?php echo set_value('txtBidang'); ?>" required /></td>
                                <?php echo form_error('txtBidang', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            </tr>
                            <tr>
                                <td colspan="2">Alamat</td>
                                <td>:</td>
                                <td><textarea name="txtAlamat" id="txtAlamat" cols="45" rows="3" placeholder="Alamat Perusahaan Anda" required><?php echo set_value('txtAlamat'); ?></textarea></td>
                                <?php echo form_error('txtAlamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            </tr>
                            <tr>
                                <td colspan="2">No. Telp</td>
                                <td>:</td>
                                <td><input name="txtTelp" type="text" id="txtTelp" size="30" maxlength="30" placeholder="No. Telp Perusahaan Anda" value="<?php echo set_value('txtTelp'); ?>" required /></td>
                                <?php echo form_error('txtTelp', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            </tr>
                            <tr>
                                <td colspan="2">No. Fax</td>
                                <td>:</td>
                                <td><input name="txtFax" type="text" id="txtFax" size="30" maxlength="30" placeholder="No. Fax Perusahaan Anda" value="<?php echo set_value('txtFax'); ?>" required /></td>
                                <?php echo form_error('txtFax', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            </tr>
                            <tr>
                                <td colspan="2">Website</td>
                                <td width="2%">:</td>
                                <td width="53%"><input name="txtWebsite" type="text" id="txtWebsite" size="30" maxlength="30" value="<?php echo set_value('txtWebsite'); ?>" placeholder="Website Perusahaan Anda" /></td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>INFORMASI UMUM</strong></td>
                            </tr>
                                        <tr>
                                          <td width="3%" valign="top">1. </td>
                                          <td width="42%" valign="top">Berapakah jumlah lulusan Universitas Muria Kudus yang bekerja di perusahaan anda ?</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><select name="lstJmlLulus" id="lstJmlLulus" required>
                                            <option value="">- Pilih -</option>
                                            <option value="1-3" <?php echo set_select('lstJmlLulus', '1-3'); ?> >1-3</option>
                                            <option value="4-6" <?php echo set_select('lstJmlLulus', '4-6'); ?> >4-6</option>
                                            <option value="7-9" <?php echo set_select('lstJmlLulus', '7-9'); ?> >7-9</option>
                                            <option value="> 9" <?php echo set_select('lstJmlLulus', '> 9'); ?> >> 9</option>
                                          </select></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">2. </td>
                                          <td valign="top">Berapakah rata-rata masa kerja lulusan Universitas Muria Kudus yang bekerja di perusahaan anda (dalam tahun) ?</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><select name="lstMsKerja" id="lstMsKerja" required>
                                            <option value="">- Pilih -</option>
                                            <option value="< 1" <?php echo set_select('lstMsKerja', '< 1'); ?> >< 1</option>
                                            <option value="1-3" <?php echo set_select('lstMsKerja', '1-3'); ?> >1-3</option>
                                            <option value="4-6" <?php echo set_select('lstMsKerja', '4-6'); ?> >4-6</option>
                                            <option value="> 6" <?php echo set_select('lstMsKerja', '> 6'); ?> >> 6</option>
                                          </select></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">3. </td>
                                          <td valign="top">Berapakah gaji/pendapatan awal yang diterima lulusan Universitas Muria Kudus di perusahaan anda (dalam jutaan rupiah) ?</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><select name="lstGajiAwal" id="lstGajiAwal" required>
                                            <option value="">- Pilih -</option>
                                            <option value="0,5-1" <?php echo set_select('lstGajiAwal', '0,5-1'); ?> >0,5-1</option>
                                            <option value="> 1-3" <?php echo set_select('lstGajiAwal', '> 1-3'); ?> >> 1-3</option>
                                            <option value="> 3-5" <?php echo set_select('lstGajiAwal', '> 3-5'); ?> >> 3-5</option>
                                            <option value="> 5" <?php echo set_select('lstGajiAwal', '> 5'); ?> >> 5</option>
                                          </select></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">4. </td>
                                          <td valign="top">Berapakah nilai IPK (skala 4) minimal untuk bekerja di perusahaan anda ?</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><select name="lstIPK" id="lstIPK" required>
                                            <option value="">- Pilih -</option>
                                            <option value="2,5-2,75" <?php echo set_select('lstIPK', '2,5-2,75'); ?> >2,5-2,75</option>
                                            <option value="> 2,75-3" <?php echo set_select('lstIPK', '> 2,75-3'); ?> >> 2,75-3</option>
                                            <option value="> 3-3,5" <?php echo set_select('lstIPK', '> 3-3,5'); ?> >> 3-3,5</option>
                                            <option value="> 3,5" <?php echo set_select('lstIPK', '> 3,5'); ?> >> 3,5</option>
                                          </select></td>
                                        </tr>
                                        <tr>
                                          <td colspan="4"><strong>INFORMASI KHUSUS</strong></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2"><font color="#FF0000">Integritas (etika dan moral)</font></td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td valign="top">1. </td>
                                          <td valign="top">Kedisiplinan</td>
                                          <td valign="top">:</td>
                                          <td valign="top">
                                          <input type="radio" name="rdDisiplin" id="rdDisiplin" value="1" <?php echo set_radio( 'rdDisiplin', '1'); ?> />
                                            Sangat Baik
                                          <input type="radio" name="rdDisiplin" id="rdDisiplin" value="2" <?php echo set_radio( 'rdDisiplin', '2'); ?> />
                                            Baik
                                          <input type="radio" name="rdDisiplin" id="rdDisiplin" value="3" <?php echo set_radio( 'rdDisiplin', '3'); ?> />
                                            Cukup
                                          <input type="radio" name="rdDisiplin" id="rdDisiplin" value="4" <?php echo set_radio( 'rdDisiplin', '4'); ?> />
                                            Kurang
                                          </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">2. </td>
                                          <td valign="top">Kejujuran</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdJujur" id="rdJujur" value="1" <?php echo set_radio( 'rdJujur', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdJujur" id="rdJujur" value="2" <?php echo set_radio( 'rdJujur', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdJujur" id="rdJujur" value="3" <?php echo set_radio( 'rdJujur', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdJujur" id="rdJujur" value="4" <?php echo set_radio( 'rdJujur', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">3. </td>
                                          <td valign="top">Motivasi Kerja</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdMotivasi" id="rdMotivasi" value="1" <?php echo set_radio( 'rdMotivasi', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdMotivasi" id="rdMotivasi" value="2" <?php echo set_radio( 'rdMotivasi', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdMotivasi" id="rdMotivasi" value="3" <?php echo set_radio( 'rdMotivasi', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdMotivasi" id="rdMotivasi" value="4" <?php echo set_radio( 'rdMotivasi', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">4. </td>
                                          <td valign="top">Etos Kerja</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdEtos" id="rdEtos" value="1" <?php echo set_radio( 'rdEtos', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdEtos" id="rdEtos" value="2" <?php echo set_radio( 'rdEtos', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdEtos" id="rdEtos" value="3" <?php echo set_radio( 'rdEtos', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdEtos" id="rdEtos" value="4" <?php echo set_radio( 'rdEtos', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td colspan="4"><font color="#FF0000">Keahlian berdasarkan bidang ilmu</font></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">5.</td>
                                          <td valign="top">Kemampuan menerapkan keahlian/keilmuan dalam pekerjaan</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdKeahlian" id="rdKeahlian" value="1" <?php echo set_radio( 'rdKeahlian', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdKeahlian" id="rdKeahlian" value="2" <?php echo set_radio( 'rdKeahlian', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdKeahlian" id="rdKeahlian" value="3" <?php echo set_radio( 'rdKeahlian', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdKeahlian" id="rdKeahlian" value="4" <?php echo set_radio( 'rdKeahlian', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">6.</td>
                                          <td valign="top">Produktivitas Kerja</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdProduktivitas" id="rdProduktivitas" value="1" <?php echo set_radio( 'rdProduktivitas', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdProduktivitas" id="rdProduktivitas" value="2" <?php echo set_radio( 'rdProduktivitas', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdProduktivitas" id="rdProduktivitas" value="3" <?php echo set_radio( 'rdProduktivitas', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdProduktivitas" id="rdProduktivitas" value="4" <?php echo set_radio( 'rdProduktivitas', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">7.</td>
                                          <td valign="top">Inovasi</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdInovasi" id="rdInovasi" value="1" <?php echo set_radio( 'rdInovasi', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdInovasi" id="rdInovasi" value="2" <?php echo set_radio( 'rdInovasi', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdInovasi" id="rdInovasi" value="3" <?php echo set_radio( 'rdInovasi', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdInovasi" id="rdInovasi" value="4" <?php echo set_radio( 'rdInovasi', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">8.</td>
                                          <td valign="top">Kemampuan menyelesaikan permasalahan dalam pekerjaan</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdSolusi" id="rdSolusi" value="1" <?php echo set_radio( 'rdSolusi', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdSolusi" id="rdSolusi" value="2" <?php echo set_radio( 'rdSolusi', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdSolusi" id="rdSolusi" value="3" <?php echo set_radio( 'rdSolusi', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdSolusi" id="rdSolusi" value="4" <?php echo set_radio( 'rdSolusi', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">9.</td>
                                          <td valign="top">Kemampuan beradaptasi dengan lingkungan kerja</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdAdaptasi" id="rdAdaptasi" value="1" <?php echo set_radio( 'rdAdaptasi', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdAdaptasi" id="rdAdaptasi" value="2" <?php echo set_radio( 'rdAdaptasi', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdAdaptasi" id="rdAdaptasi" value="3" <?php echo set_radio( 'rdAdaptasi', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdAdaptasi" id="rdAdaptasi" value="4" <?php echo set_radio( 'rdAdaptasi', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">10.</td>
                                          <td valign="top">Tanggap terhadap kebutuhan pasar</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdTanggap" id="rdTanggap" value="1" <?php echo set_radio( 'rdTanggap', '1'); ?>  />
                                          Sangat Baik
                                            <input type="radio" name="rdTanggap" id="rdTanggap" value="2" <?php echo set_radio( 'rdTanggap', '2'); ?>  />
                                          Baik
                                          <input type="radio" name="rdTanggap" id="rdTanggap" value="3" <?php echo set_radio( 'rdTanggap', '3'); ?>  />
                                          Cukup
                                          <input type="radio" name="rdTanggap" id="rdTanggap" value="4" <?php echo set_radio( 'rdTanggap', '4'); ?>  />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td colspan="4"><font color="#FF0000">Kemampuan Bahasa Inggris</font></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">11.</td>
                                          <td valign="top">Kematangan emosi/pengendalian diri</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdEmosi" id="rdEmosi" value="1" <?php echo set_radio( 'rdEmosi', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdEmosi" id="rdEmosi" value="2" <?php echo set_radio( 'rdEmosi', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdEmosi" id="rdEmosi" value="3" <?php echo set_radio( 'rdEmosi', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdEmosi" id="rdEmosi" value="4" <?php echo set_radio( 'rdEmosi', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">12.</td>
                                          <td valign="top">Kepercayaan diri</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdPercayaDiri" id="rdPercayaDiri" value="1" <?php echo set_radio( 'rdPercayaDiri', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdPercayaDiri" id="rdPercayaDiri" value="2" <?php echo set_radio( 'rdPercayaDiri', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdPercayaDiri" id="rdPercayaDiri" value="3" <?php echo set_radio( 'rdPercayaDiri', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdPercayaDiri" id="rdPercayaDiri" value="4" <?php echo set_radio( 'rdPercayaDiri', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td colspan="4"><font color="#FF0000">Kemampuan Berkomunikasi</font></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">13.</td>
                                          <td valign="top">Kemampuan menggunakan bahasa asing dalam pekerjaan</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdKomunikasi" id="rdKomunikasi" value="1" <?php echo set_radio( 'rdKomunikasi', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdKomunikasi" id="rdKomunikasi" value="2" <?php echo set_radio( 'rdKomunikasi', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdKomunikasi" id="rdKomunikasi" value="3" <?php echo set_radio( 'rdKomunikasi', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdKomunikasi" id="rdKomunikasi" value="4" <?php echo set_radio( 'rdKomunikasi', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">14.</td>
                                          <td valign="top">Kemampuan mengemukakan ide dan pendapat</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdIde" id="rdIde" value="1" <?php echo set_radio( 'rdIde', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdIde" id="rdIde" value="2" <?php echo set_radio( 'rdIde', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdIde" id="rdIde" value="3" <?php echo set_radio( 'rdIde', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdIde" id="rdIde" value="4" <?php echo set_radio( 'rdIde', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td colspan="4"><font color="#FF0000">Leadership/Kepemimpinan</font></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">15.</td>
                                          <td valign="top">Kemampuan manajerial</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdManajerial" id="rdManajerial" value="1" <?php echo set_radio( 'rdManajerial', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdManajerial" id="rdManajerial" value="2" <?php echo set_radio( 'rdManajerial', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdManajerial" id="rdManajerial" value="3" <?php echo set_radio( 'rdManajerial', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdManajerial" id="rdManajerial" value="4" <?php echo set_radio( 'rdManajerial', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">16.</td>
                                          <td valign="top">Kemampuan sebagai motivator dalam lingkungan kerja</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdMotivator" id="rdMotivator" value="1" <?php echo set_radio( 'rdMotivator', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdMotivator" id="rdMotivator" value="2" <?php echo set_radio( 'rdMotivator', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdMotivator" id="rdMotivator" value="3" <?php echo set_radio( 'rdMotivator', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdMotivator" id="rdMotivator" value="4" <?php echo set_radio( 'rdMotivator', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td colspan="4"><font color="#FF0000">Penguasaan Teknologi Informasi</font></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">17.</td>
                                          <td valign="top">Kemampuan memanfaatkan teknologi informasi dalam pekerjaan</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdTI" id="rdTI" value="1" <?php echo set_radio( 'rdTI', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdTI" id="rdTI" value="2" <?php echo set_radio( 'rdTI', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdTI" id="rdTI" value="3" <?php echo set_radio( 'rdTI', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdTI" id="rdTI" value="4" <?php echo set_radio( 'rdTI', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td colspan="4"><font color="#FF0000">Kerjasama Tim</font></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">18.</td>
                                          <td valign="top">Kemampuan dalam bersosialisasi di lingkungan kerja</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdSosialisasi" id="rdSosialisasi" value="1" <?php echo set_radio( 'rdSosialisasi', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdSosialisasi" id="rdSosialisasi" value="2" <?php echo set_radio( 'rdSosialisasi', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdSosialisasi" id="rdSosialisasi" value="3" <?php echo set_radio( 'rdSosialisasi', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdSosialisasi" id="rdSosialisasi" value="4" <?php echo set_radio( 'rdSosialisasi', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">19.</td>
                                          <td valign="top">Keterbukaan terhadap kritik dan saran</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdKritikSaran" id="rdKritikSaran" value="1" <?php echo set_radio( 'rdKritikSaran', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdKritikSaran" id="rdKritikSaran" value="2" <?php echo set_radio( 'rdKritikSaran', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdKritikSaran" id="rdKritikSaran" value="3" <?php echo set_radio( 'rdKritikSaran', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdKritikSaran" id="rdKritikSaran" value="4" <?php echo set_radio( 'rdKritikSaran', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">20.</td>
                                          <td valign="top">Kemampuan bekerjasama dalam tim</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdTim" id="rdTim" value="1" <?php echo set_radio( 'rdTim', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdTim" id="rdTim" value="2" <?php echo set_radio( 'rdTim', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdTim" id="rdTim" value="3" <?php echo set_radio( 'rdTim', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdTim" id="rdTim" value="4" <?php echo set_radio( 'rdTim', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td colspan="4"><font color="#FF0000">Pengembangan diri</font></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">21.</td>
                                          <td valign="top">Motivasi dalam mempelajari hal baru untuk kemajuan institusi/perusahaan</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdBelajar" id="rdBelajar" value="1" <?php echo set_radio( 'rdBelajar', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdBelajar" id="rdBelajar" value="2" <?php echo set_radio( 'rdBelajar', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdBelajar" id="rdBelajar" value="3" <?php echo set_radio( 'rdBelajar', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdBelajar" id="rdBelajar" value="4" <?php echo set_radio( 'rdBelajar', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td colspan="4"><font color="#FF0000">Penilaian kualitas secara keseluruhan</font></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">22.</td>
                                          <td valign="top">Secara keseluruhan, penilaian saudara terhadap kualitas lulusan</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><input type="radio" name="rdPenilaian" id="rdPenilaian" value="1" <?php echo set_radio( 'rdPenilaian', '1'); ?> />
                                          Sangat Baik
                                            <input type="radio" name="rdPenilaian" id="rdPenilaian" value="2" <?php echo set_radio( 'rdPenilaian', '2'); ?> />
                                          Baik
                                          <input type="radio" name="rdPenilaian" id="rdPenilaian" value="3" <?php echo set_radio( 'rdPenilaian', '3'); ?> />
                                          Cukup
                                          <input type="radio" name="rdPenilaian" id="rdPenilaian" value="4" <?php echo set_radio( 'rdPenilaian', '4'); ?> />
                                          Kurang </td>
                                        </tr>
                                        <tr>
                                          <td colspan="4"><strong>HARAPAN USER</strong></td>
                                        </tr>
                                        <tr>
                                          <td align="justify" colspan="4">(Mohon memberikan ranking 1-7 pada jawaban dibawah ini. Ranking 1   menyatakan jawaban yang paling anda tuntut, ranking 7 menyatakan jawaban   yang paling sedikit anda tuntut.) </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">1.</td>
                                          <td valign="top">Apakah nilai soft skill yang anda inginkan dari lulusan Universitas Muria Kudus ?<br />
                                            Keterangan :<br />
            Soft skill adalah nilai kepribadian serta kemampuan seseorang dalam berinteraksi dengan sesama dan dengan lingkungan</td>
                                          <td valign="top">:</td>
                                          <td valign="top">
                                            <select name="lstPDUser" id="lstPDUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstPDUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstPDUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstPDUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstPDUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstPDUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstPDUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstPDUser', '7'); ?> >7</option>
                                            </select> Kepercayaan Diri<br />
                                            <select name="lstPimpinUser" id="lstPimpinUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstPimpinUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstPimpinUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstPimpinUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstPimpinUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstPimpinUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstPimpinUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstPimpinUser', '7'); ?> >7</option>
                                            </select> Kepemimpinan<br />
                                            <select name="lstJujurUser" id="lstJujurUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstJujurUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstJujurUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstJujurUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstJujurUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstJujurUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstJujurUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstJujurUser', '7'); ?> >7</option>
                                            </select> Kejujuran<br />
                                            <select name="lstDisiplinUser" id="lstDisiplinUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstDisiplinUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstDisiplinUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstDisiplinUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstDisiplinUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstDisiplinUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstDisiplinUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstDisiplinUser', '7'); ?> >7</option>
                                            </select> Kedisiplinan<br />
                                            <select name="lstKomunikasiUser" id="lstKomunikasiUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstKomunikasiUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstKomunikasiUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstKomunikasiUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstKomunikasiUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstKomunikasiUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstKomunikasiUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstKomunikasiUser', '7'); ?> >7</option>
                                            </select> Komunikasi<br />
                                            <select name="lstMotivasiUser" id="lstMotivasiUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstMotivasiUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstMotivasiUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstMotivasiUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstMotivasiUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstMotivasiUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstMotivasiUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstMotivasiUser', '7'); ?> >7</option>
                                            </select> Motivasi Tinggi<br />
                                            <select name="lstAdaptasiUser" id="lstAdaptasiUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstAdaptasiUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstAdaptasiUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstAdaptasiUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstAdaptasiUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstAdaptasiUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstAdaptasiUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstAdaptasiUser', '7'); ?> >7</option>
                                            </select> Mudah Adaptasi & Kerjasama<br />
                                            <select name="lstTekananUser" id="lstTekananUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstTekananUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstTekananUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstTekananUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstTekananUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstTekananUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstTekananUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstTekananUser', '7'); ?> >7</option>
                                            </select> Mampu bekerja dalam tekanan
                                          </td>
                                        </tr>                            
                                        <tr>
                                          <td valign="top">2.</td>
                                          <td valign="top">Selain nilai soft skill, kriteria apakah yang anda inginkan dari lulusan Universitas Muria Kudus ?</td>
                                          <td valign="top">:</td>
                                          <td valign="top">
                                            <select name="lstIPKUser" id="lstIPKUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstIPKUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstIPKUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstIPKUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstIPKUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstIPKUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstIPKUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstIPKUser', '7'); ?> >7</option>
                                            </select> IPK<br />
                                            <select name="lstAsingUser" id="lstAsingUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstAsingUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstAsingUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstAsingUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstAsingUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstAsingUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstAsingUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstAsingUser', '7'); ?> >7</option>
                                            </select> Kemampuan Bahasa Asing<br />
                                            <select name="lstKomputerUser" id="lstKomputerUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstKomputerUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstKomputerUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstKomputerUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstKomputerUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstKomputerUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstKomputerUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstKomputerUser', '7'); ?> >7</option>
                                            </select> Kemampuan Mengoperasikan Komputer<br />
                                            <select name="lstPenghargaanUser" id="lstPenghargaanUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstPenghargaanUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstPenghargaanUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstPenghargaanUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstPenghargaanUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstPenghargaanUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstPenghargaanUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstPenghargaanUser', '7'); ?> >7</option>
                                            </select> Jumlah penghargaan yang diterima<br />
                                            <select name="lstPengalamanUser" id="lstPengalamanUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstPengalamanUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstPengalamanUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstPengalamanUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstPengalamanUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstPengalamanUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstPengalamanUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstPengalamanUser', '7'); ?> >7</option>
                                            </select> Lama pengalaman kerja<br />
                                            <select name="lstPelatihanUser" id="lstPelatihanUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstPelatihanUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstPelatihanUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstPelatihanUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstPelatihanUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstPelatihanUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstPelatihanUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstPelatihanUser', '7'); ?> >7</option>
                                            </select> Jumlah pelatihan yang pernah diikuti<br />
                                            <select name="lstDriverUser" id="lstDriverUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstDriverUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstDriverUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstDriverUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstDriverUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstDriverUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstDriverUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstDriverUser', '7'); ?> >7</option>
                                            </select> Kemampuan mengendarai
                                          </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">3.</td>
                                          <td valign="top">Materi keilmuan apakah yang anda harap perlu ditingkatkan dari lulusan Universitas Muria Kudus ?</td>
                                          <td valign="top">:</td>
                                          <td valign="top">
                                            <select name="lstBasisUser" id="lstBasisUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstBasisUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstBasisUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstBasisUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstBasisUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstBasisUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstBasisUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstBasisUser', '7'); ?> >7</option>
                                            </select> Sistem Basis Data<br />
                                            <select name="lstManajemenUser" id="lstManajemenUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstManajemenUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstManajemenUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstManajemenUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstManajemenUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstManajemenUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstManajemenUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstManajemenUser', '7'); ?> >7</option>
                                            </select> Manajemen Proyek<br />
                                            <select name="lstPerancanganUser" id="lstPerancanganUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstPerancanganUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstPerancanganUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstPerancanganUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstPerancanganUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstPerancanganUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstPerancanganUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstPerancanganUser', '7'); ?> >7</option>
                                            </select> Perancangan Basis Data<br />
                                            <select name="lstPemrogramanUser" id="lstPemrogramanUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstPemrogramanUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstPemrogramanUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstPemrogramanUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstPemrogramanUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstPemrogramanUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstPemrogramanUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstPemrogramanUser', '7'); ?> >7</option>
                                            </select> Pemrograman Database<br />
                                            <select name="lstAnalisaUser" id="lstAnalisaUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstAnalisaUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstAnalisaUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstAnalisaUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstAnalisaUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstAnalisaUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstAnalisaUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstAnalisaUser', '7'); ?> >7</option>
                                            </select> Analisa Perangkat Lunak<br />
                                            <select name="lstObyekUser" id="lstObyekUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstObyekUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstObyekUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstObyekUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstObyekUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstObyekUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstObyekUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstObyekUser', '7'); ?> >7</option>
                                            </select> Pemrograman Berorientasi Obyek<br />
                                            <select name="lstWebUser" id="lstWebUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstWebUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstWebUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstWebUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstWebUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstWebUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstWebUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstWebUser', '7'); ?> >7</option>
                                            </select> Pemrograman Berbasis Web<br />
                                            <select name="lstTestingUser" id="lstTestingUser" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1" <?php echo set_select('lstTestingUser', '1'); ?> >1</option>
                                                <option value="2" <?php echo set_select('lstTestingUser', '2'); ?> >2</option>
                                                <option value="3" <?php echo set_select('lstTestingUser', '3'); ?> >3</option>
                                                <option value="4" <?php echo set_select('lstTestingUser', '4'); ?> >4</option>
                                                <option value="5" <?php echo set_select('lstTestingUser', '5'); ?> >5</option>
                                                <option value="6" <?php echo set_select('lstTestingUser', '6'); ?> >6</option>
                                                <option value="7" <?php echo set_select('lstTestingUser', '7'); ?> >7</option>
                                            </select> Testing dan Implementasi Sistem
                                          </td>
                                        </tr>
                                        <tr>
                                          <td valign="top">4.</td>
                                          <td valign="top">Nama Lulusan yang bekerja di Perusahaan</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><textarea name="txtNamaLulusan" id="txtNamaLulusan" cols="45" rows="5" required placeholder="Nama Lulusan di Perusahaan" required="required"><?php echo set_value('txtNamaLulusan'); ?></textarea></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">5.</td>
                                          <td valign="top">Kinerja Lulusan dan Kemampuan Hardskill atau Softskill yang dimiliki Lulusan ?</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><textarea name="txtKinerja" id="txtKinerja" cols="45" rows="5" required placeholder="Hardskill dan Softskill Lulusan" required="required"><?php echo set_value('txtKinerja'); ?></textarea></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">6.</td>
                                          <td valign="top">Kemampuan Hardskill dan Softskill yang belum dimiliki Lulusan dan perlu dikembangkan ?</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><textarea name="txtHSBelum" id="txtHSBelum" cols="45" rows="5" required placeholder="Hardskill dan Softskill yang perlu dikembangkan" required="required"><?php echo set_value('txtHSBelum'); ?></textarea></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">7.</td>
                                          <td valign="top">Kompetensi apa yang dibutuhkan di Perusahaan yang belum dimiliki Lulusan ?</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><textarea name="txtKompetensiBelum" id="txtKompetensiBelum" cols="45" rows="5" required placeholder="Kompetensi yang belum ada" required="required"><?php echo set_value('txtKompetensiBelum'); ?></textarea></td>
                                        </tr>
                                        <tr>
                                          <td valign="top">8.</td>
                                          <td valign="top">Masukan apakah yang ingin anda sampaikan kepada Universitas Muria Kudus untuk peningkatan mutu lulusan ?</td>
                                          <td valign="top">:</td>
                                          <td valign="top"><textarea name="txtMasukan" id="txtMasukan" cols="45" rows="5" required placeholder="Masukan Anda" required="required"><?php echo set_value('txtMasukan'); ?></textarea></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td>Captcha Code</td>
                                          <td>:</td>
                                          <td>                              
                                            <img id="imgCaptcha" src="<?php echo site_url('pengguna/create_image'); ?>" />
                                            <input id="verify" class="input_text" type="text" value="" name ="verify" autocomplete="off" required \>
                                          </td>                  
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td><font color="#FF0000"><strong>(*) Mohon diisi. Terima kasih.</strong></font></td>
                                          <td>&nbsp;</td>
                                          <td><input type="submit" value="Simpan" class="btn"></td>
                                        </tr>                            
                                    </table> 
                            </form>
                            </div>
                        </article>
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