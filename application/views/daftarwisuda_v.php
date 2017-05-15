<section class="wrapper">
    <?php if ($setting->setting_open=='Tidak') { ?>
    
    <section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">
            
                <div class="col-lg-12">
                    <h4 align="center">
                    PENDAFTARAN WISUDA TELAH DI TUTUP.
                    </h4>
                </div>

            </div>
        </div>
    </div>
    </section>
    <?php } else { ?>
    <section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">
            
                <div class="col-lg-12">
                    <h4 align="center">
                    BIODATA PESERTA WISUDA<br>                                    
                    <?php echo strtoupper(tgl_indo($setting->setting_periode)); ?>
                    </h4>
                    <h5 align="center"><?php echo strtoupper($setting->setting_info); ?></h5>
                </div>

            </div>
        </div>
    </div>
    </section>

    <section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">
            
                <div class="col-lg-6">                    
                    <div class="alert alert-warning fade in">
                        <?php echo $setting->setting_syarat; ?>
                    </div>                                            
                </div>

                <div class="col-lg-6">                    
                    <div class="alert alert-success fade in">
                        <p align="justify">                                                                          
                        <b>PERHATIAN :</b>
                        <ul>
                            <li>1. Masukkan NIM dengan Benar, Otomatis Fakultas dan Program Studi akan terisi ke Database.</li>
                            <li>2. Username Anda = NIM Anda.</li>
                            <li>3. Password Anda = Tanggal Lahir Anda (Format : TahunBulanTanggal). Jangan Salah memasukkan Tanggal Lahir Anda.</li>
                        </ul>
                        </p>
                    </div>                                             
                </div>

            </div>
        </div>
    </div>
    </section>

    <?php 
    if ($this->session->flashdata('notification')) { 
    ?>
    <section>
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row invoice-list">
                    <div class="col-lg-12">                    
                        <div class="alert alert-block alert-danger fade in">
                        <?php echo $this->session->flashdata('notification'); ?>
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    </section>   
    <? } ?>

    <div class="row">
        <div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-plus-sign-alt"></i> Form Pendaftaran Wisuda
        </header>        
        <div class="row">
            <div class="col-lg-6">

            <section class="panel">
                <header class="panel-heading">
                Biodata Pribadi                
                </header>                         
                    
                <div class="panel-body">                           
                <form role="form" action="<?php echo site_url('wisuda/savedata'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                        
                    <input type="hidden" name="setting_periode" value="<?php echo $setting->setting_periode; ?>" />
                    <input type="hidden" name="setting_info" value="<?php echo $setting->setting_info; ?>" />

                    <div class="form-group has-success">
                        <label for="nim">N I M :</label>
                        <input type="text" class="form-control" name="nim" id="nim" size="9" maxlength="9" style="width:40%" placeholder="Enter NIM (999999999)" value="<?php echo set_value('nim'); ?>" autocomplete="off" required />
                        <p>*) <em>Username Anda</em></p>
                    </div>
                    <?php echo form_error('nim', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                     
                    <div class="form-group has-success">
                        <label for="nama">Nama Mahasiswa :</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama Mahasiswa Anda" value="<?php echo set_value('nama'); ?>" autocomplete="off" required />
                    </div>
                    <?php echo form_error('nama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                    
                    <div class="form-group has-success">
                        <label for="tempat">Tempat Lahir :</label>
                        <input type="text" class="form-control" name="tempat" id="tempat" style="width:70%" placeholder="Enter Tempat Lahir Anda" value="<?php echo set_value('tempat'); ?>" autocomplete="off" required />
                    </div>
                    <?php echo form_error('tempat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                    <div class="form-group has-success">
                        <label for="tgl_lahir">Tanggal Lahir :</label>
                        <input type="text" class="form-control datepicker" style="width:40%" name="tgl_lahir" id="tgl_lahir" placeholder="Enter Tanggal Lahir Anda" value="<?php echo set_value('tgl_lahir'); ?>" autocomplete="off" required />
                        <div class="form-group has-error"><p class="help-block">Format : YYYY-mm-dd</p></div>
                    </div>
                    <?php echo form_error('tgl_lahir', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                
                    <div class="form-group has-success">
                        <label for="email">Email :</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Anda" value="<?php echo set_value('email'); ?>" autocomplete="off" required />
                    </div>
                    <?php echo form_error('email', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                    <div class="form-group has-success">
                        <label for="telp">No. Telp/HP :</label>
                        <input type="text" name="telp" class="form-control" id="telp" placeholder="Enter No. Telp/HP Anda" value="<?php echo set_value('telp'); ?>" autocomplete="off" required />
                    </div>
                    <?php echo form_error('telp', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                 </div>
            </section>
            <section class="panel">
                <header class="panel-heading">
                Skripsi / Proyek Akhir / Tesis
                </header> 
                <div class="panel-body">
                    <div class="form-group has-success">
                        <label for="judul">Judul :</label>
                        <textarea class="form-control" name="judul" id="judul" rows="6" required><?php echo set_value('judul'); ?></textarea>
                    </div>
                    <?php echo form_error('judul', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                    
                </div>                
            </section>
            </div>                                    
            <div class="col-lg-6">
                <section class="panel">
                <header class="panel-heading">
                Keterangan Lain
                </header>                
                <div class="panel-body">
                    <div class="form-group has-success">
                        <label for="lstAgama">Agama :</label>
                        <select class="form-control m-bot15" name="lstAgama" id="lstAgama" required>
                            <option value="">- Pilih Agama -</option>
                            <option value="Islam" <?php echo set_select('lstAgama', 'Islam'); ?> >Islam</option>
                            <option value="Kristen" <?php echo set_select('lstAgama', 'Kristen'); ?> >Kristen</option>
                            <option value="Katholik" <?php echo set_select('lstAgama', 'Katholik'); ?> >Katholik</option>
                            <option value="Hindu" <?php echo set_select('lstAgama', 'Hindu'); ?> >Hindu</option>
                            <option value="Budha" <?php echo set_select('lstAgama', 'Budha'); ?> >Budha</option>
                        </select>
                    </div>
                    <?php echo form_error('lstAgama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?> 
                    <div class="form-group has-success">
                        <label for="alamat">Alamat :</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Enter Alamat Anda" value="<?php echo set_value('alamat'); ?>" autocomplete="off" required />
                    </div>
                    <?php echo form_error('alamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                       
                    <div class="form-group has-success">
                        <label for="nama_ortu">Nama Pasangan/Orang Tua :</label>
                        <input type="text" name="nama_ortu" class="form-control" id="nama_ortu" placeholder="Enter Nama Pasangan/Orang Tua Anda" value="<?php echo set_value('nama_ortu'); ?>" autocomplete="off" required />
                    </div>
                    <?php echo form_error('nama_ortu', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                       
                    <div class="form-group has-success">
                        <label for="kerja_ortu">Pekerjaan Pasangan/Orang Tua :</label>
                        <input type="text" name="kerja_ortu" class="form-control" id="kerja_ortu" placeholder="Enter Pekerjaan Pasangan/Orang Tua Anda" value="<?php echo set_value('kerja_ortu'); ?>" autocomplete="off" required />
                    </div>
                    <?php echo form_error('kerja_ortu', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                       
                    <div class="form-group has-success">
                        <label for="alamat_ortu">Alamat Pasangan/Orang Tua :</label>
                        <input type="text" name="alamat_ortu" class="form-control" id="alamat_ortu" placeholder="Enter Alamat Pasangan/Orang Tua Anda" value="<?php echo set_value('alamat_ortu'); ?>" autocomplete="off" required />
                    </div>
                    <?php echo form_error('alamat_ortu', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                       
                    <div class="form-group has-success">
                        <label for="telp_ortu">No. Telp/HP Pasangan/Orang Tua :</label>
                        <input type="text" name="telp_ortu" class="form-control" id="telp_ortu" placeholder="Enter No. Telp/HP Pasangan/Orang Tua Anda" value="<?php echo set_value('telp_ortu'); ?>" autocomplete="off" required />
                    </div>
                    <?php echo form_error('telp_ortu', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                    <div class="form-group has-success">
                        <label for="file">Upload Foto : <em>(*)</em></label>
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?php echo base_url(); ?>img/no_image.gif" alt="" />
                            </div>                                    
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                <span class="fileupload-new"><i class="icon-paper-clip"></i> Browse</span>
                                <span class="fileupload-exists"><i class="icon-undo"></i> Ganti</span>
                                <input type="file" class="default" name="userfile" />
                                </span>                                             
                            </div>
                            (Best Resolution Image : 150 x 200 pixel)
                        </div>                                                    
                    </div>
                    <div class="form-group has-success">
                        <label for="verify">Captcha :</label><br>
                        <img id="imgCaptcha" src="<?php echo site_url('captcha/create_image'); ?>" />                        
                        <input type="text" style="width:30%" name="verify" class="form-control" id="verify" size="5" maxlength="5" placeholder="Enter Captcha" value="" autocomplete="off" required />                        
                    </div>
                    <?php echo form_error('verify', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                </div>
                </section>
                
                <section>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Daftar</button>
                    </div>
                </section>              
                
                </form>    
                </section>
            </div>            
            
        </div>        
    
        </section>
        </div>
    </div> 

    <?php } ?>
</section>        