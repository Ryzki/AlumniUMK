<section class="wrapper">
    <section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">
            
                <div class="col-lg-12">
                    <h4 align="center">
                    KEGIATAN ALUMNI SETELAH LULUS
                    </h4>                    
                </div>

            </div>
        </div>
    </div>
    </section>

    <div class="row">
        <div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-plus-sign-alt"></i> Form Kegiatan Alumni
        </header>        
        
        <!-- Mulai Form -->
        <div class="row">
            <div class="col-lg-6">
                <?php 
                if ($this->session->flashdata('notification')) { ?>
                    <div class="alert alert-success fade in">
                    <?php echo $this->session->flashdata('notification'); ?>
                    </div>                
                <? } ?>
            <section class="panel">                    
                <div class="panel-body">                           
                <form role="form" action="<?php echo site_url('kegiatan/updatekegiatan'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                    <div class="form-group has-success">
                        <label for="nim">Kegiatan Anda :</label>
                        <select class="form-control m-bot15" name="lstKegiatan" id="lstKegiatan" required>
                            <option value="">- Pilih Kegiatan Anda -</option>
                            <?php 
                            foreach($daftar_kegiatan as $k) {
                                if ($akun->kegiatan_id == $k->kegiatan_id) {
                            ?>
                                <option value="<?php echo $k->kegiatan_id; ?>" selected ><?php echo $k->kegiatan_desc; ?></option>
                            <?php 
                                } else {
                            ?>                            
                                <option value="<?php echo $k->kegiatan_id; ?>" <?php echo set_select('lstKegiatan', $k->kegiatan_id); ?> ><?php echo $k->kegiatan_desc; ?></option>                            
                            <?php 
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <?php echo form_error('nim', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                    
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                </form>
                </div>
            </section>             
            </div>                                                   
        </div>
        <!-- Akhir Form -->                
        </section>
        </div>
    </div>

    <?php
    if ($akun->kegiatan_id == 1) {        
        if (count($pertama) == 0) { // Cek Perusahaan Pertama
    ?>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    
                <header class="panel-heading">
                <i class="icon-plus-sign-alt"></i> Data Pekerjaan Pertama
                </header>        
                
                <!-- Mulai Form -->
                <div class="row">
                    <div class="col-lg-6">

                    <section class="panel">                    
                        <div class="panel-body">                           
                        <form role="form" action="<?php echo site_url('kegiatan/insertperusahaanpertama'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group has-success">
                                <label for="nama">Nama Perusahaan :</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama Perusahaan" value="<?php echo set_value('nama'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('nama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="alamat">Alamat Perusahaan :</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Enter Alamat Perusahaan" value="<?php echo set_value('alamat'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('alamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="web">Web Perusahaan :</label>
                                <input type="text" class="form-control" name="web" id="web" placeholder="Enter Web Perusahaan" value="<?php echo set_value('web'); ?>" autocomplete="off" />
                            </div>
                            <?php echo form_error('web', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="nim">Jenis Perusahaan :</label>
                                <select class="form-control m-bot15" name="lstJenis" id="lstJenis" required>
                                    <option value="">- Pilih Jenis Perusahaan -</option>
                                    <?php 
                                    foreach($jenis as $j) {                                
                                    ?>                                                        
                                        <option value="<?php echo $j->jenis_id; ?>" <?php echo set_select('lstJenis', $j->jenis_id); ?> ><?php echo $j->jenis_desc; ?></option>                            
                                    <?php                              
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php echo form_error('lstJenis', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                    
                            <div class="form-group has-success">
                                <label for="lain">Lainnya :</label>
                                <input type="text" class="form-control" name="lain" id="lain" placeholder="Enter Lainnya" value="<?php echo set_value('lain'); ?>" autocomplete="off"/>
                            </div>                            
                            <div class="form-group has-success">
                                <label for="tgl_masuk">Tanggal Masuk :</label>
                                <input type="text" class="form-control form-control-inline input-medium default-date-picker" style="width:50%" name="tgl_masuk" id="tgl_masuk" placeholder="Enter Tanggal Masuk" value="<?php echo set_value('tgl_masuk'); ?>" autocomplete="off" required />
                                <div class="form-group has-error"><p class="help-block">Format : YYYY-mm-dd</p></div>
                            </div>
                            <?php echo form_error('tgl_masuk', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="posisi">Posisi :</label>
                                <input type="text" class="form-control" name="posisi" id="posisi" placeholder="Enter Posisi Kerja" value="<?php echo set_value('posisi'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('posisi', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="gaji">Gaji Pertama :</label><br>                        
                                <?php 
                                foreach($gaji as $g) {                                
                                ?>                                                        
                                    <input name="rdGaji" type="radio" value="<?php echo $g->gaji_id; ?>" required /> <b><?php echo $g->gaji_desc; ?></b>
                                <?php                              
                                }
                                ?>                    
                            </div>
                            <?php echo form_error('rdGaji', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>

                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>                    
                        </div>
                    </section>
                    </div>                                    

                    <!-- Form Kanan -->
                    <div class="col-lg-6">
                        <section class="panel">                                                               
                            <div class="panel-body"> 

                            <div class="form-group has-success">
                                <p>Darimana Anda mendapatkan informasi lowongan pekerjaan (pilih yang sesuai) ? :</p>
                                <?php foreach($info as $i) { ?>
                                    <input name="rdInfo" type="radio" value="<?php echo $i->info_id; ?>" required /> <b><?php echo $i->info_desc; ?></b><br>
                                <?php } ?>
                            </div>
                            <?php echo form_error('rdInfo', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <p>Menurut Anda dalam skala 1-5 (1 = Sangat Tidak Relevan dan 5 = Sangat Relevan), bagaimana relevansi pekerjaan Anda dengan Bidang Ilmu yang saudara tempuh pada saat di UMK ? :</p>
                                <?php foreach($skala as $s) { ?>
                                    <input name="rdSkala" type="radio" value="<?php echo $s->skala_id; ?>" required /> <b><?php echo $s->skala_desc; ?></b><br>
                                <?php } ?>
                            </div>
                            <?php echo form_error('rdSkala', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <p align="justify">Menurut Anda, <b>Mata Kuliah</b> apa yang Anda dapatkan dari bangku kuliah yang <b>paling relevan</b> dengan pekerjaan Anda saat ini ?<br>
                                (<em>Catatan : jika menyebutkan lebih dari 1, pisahkan dengan KOMA</em>) :</p>                                  
                                <textarea class="form-control" name="catatan" rows="3" required><?php echo set_value('catatan'); ?></textarea>
                            </div>
                            <?php echo form_error('catatan', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            </div>
                        </section>
                    </div>

                    </form>
                    <!-- Akhir Form Kanan -->                                                                 
                </div>
                <!-- Akhir Form -->                
            </section>
            </div>
        </div>
        <?php } else { ?>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                
                <header class="panel-heading">
                <i class="icon-plus-sign-alt"></i> Data Pekerjaan Pertama
                </header>        
            
                <!-- Mulai Form -->
                <div class="row">
                    <div class="col-lg-6">

                    <section class="panel">                    
                        <div class="panel-body">                           
                        <form role="form" action="<?php echo site_url('kegiatan/updateperusahaan'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="perusahaan_id" id="perusahaan_id" value="<?php echo $perusahaanpertama->perusahaan_id; ?>" />
                            
                        <div class="form-group has-success">
                            <label for="nama">Nama Perusahaan :</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama Perusahaan" value="<?php echo $perusahaanpertama->perusahaan_name; ?>" autocomplete="off" required />
                        </div>                            
                        <div class="form-group has-success">
                            <label for="alamat">Alamat Perusahaan :</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Enter Alamat Perusahaan" value="<?php echo $perusahaanpertama->perusahaan_alamat; ?>" autocomplete="off" required />
                        </div>                        
                        <div class="form-group has-success">
                            <label for="web">Web Perusahaan :</label>
                            <input type="text" class="form-control" name="web" id="web" placeholder="Enter Web Perusahaan" value="<?php echo $perusahaanpertama->perusahaan_web; ?>" autocomplete="off" />
                        </div>                            
                        <div class="form-group has-success">
                            <label for="nim">Jenis Perusahaan :</label>
                            <select class="form-control m-bot15" name="lstJenis" id="lstJenis" required>
                                <option value="">- Pilih Jenis Perusahaan -</option>
                                <?php 
                                foreach($jenis as $j) {
                                    if ($perusahaanpertama->jenis_id == $j->jenis_id) {                                
                                ?>
                                    <option value="<?php echo $j->jenis_id; ?>" selected ><?php echo $j->jenis_desc; ?></option>
                                <?php } else { ?>                                                        
                                    <option value="<?php echo $j->jenis_id; ?>" <?php echo set_select('lstJenis', $j->jenis_id); ?> ><?php echo $j->jenis_desc; ?></option>
                                <?php
                                    }                              
                                }
                                ?>
                            </select>
                        </div>                            
                        <div class="form-group has-success">
                            <label for="lain">Lainnya :</label>
                            <input type="text" class="form-control" name="lain" id="lain" placeholder="Enter Lainnya" value="<?php echo $perusahaanpertama->perusahaan_lain; ?>" autocomplete="off"/>
                        </div>                            
                        <div class="form-group has-success">
                            <label for="tgl_masuk">Tanggal Masuk :</label>
                            <input type="text" class="form-control form-control-inline input-medium default-date-picker" style="width:50%" name="tgl_masuk" id="tgl_masuk" placeholder="Enter Tanggal Masuk" value="<?php echo $perusahaanpertama->perusahaan_tgl_masuk; ?>" autocomplete="off" required />
                            <div class="form-group has-error"><p class="help-block">Format : YYYY-mm-dd</p></div>
                        </div>                            
                        <div class="form-group has-success">
                            <label for="posisi">Posisi :</label>
                            <input type="text" class="form-control" name="posisi" id="posisi" placeholder="Enter Posisi Kerja" value="<?php echo $perusahaanpertama->perusahaan_posisi; ?>" autocomplete="off" required />
                        </div>                            
                        <div class="form-group has-success">
                            <label for="gaji">Gaji Pertama :</label><br>                        
                            <?php 
                            foreach($gaji as $g) {                                
                            ?>                                                        
                                <input name="rdGaji" type="radio" value="<?php echo $g->gaji_id; ?>" <?php if ($perusahaanpertama->gaji_id==$g->gaji_id) { echo "checked"; } ?> /> <b><?php echo $g->gaji_desc; ?></b>
                            <?php                              
                            }
                            ?>                    
                        </div>                            

                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>                    
                        </div>
                    </section>
                    </div>                                    

                    <!-- Form Kanan -->
                    <div class="col-lg-6">
                        <section class="panel">                                                               
                            <div class="panel-body"> 

                            <div class="form-group has-success">
                                <p>Darimana Anda mendapatkan informasi lowongan pekerjaan (pilih yang sesuai) ? :</p>
                                <?php foreach($info as $i) { ?>
                                    <input name="rdInfo" type="radio" value="<?php echo $i->info_id; ?>" <?php if ($perusahaanpertama->info_id==$i->info_id) { echo "checked"; } ?> /> <b><?php echo $i->info_desc; ?></b><br>
                                <?php } ?>
                            </div>                            
                            <div class="form-group has-success">
                                <p>Menurut Anda dalam skala 1-5 (1 = Sangat Tidak Relevan dan 5 = Sangat Relevan), bagaimana relevansi pekerjaan Anda dengan Bidang Ilmu yang saudara tempuh pada saat di UMK ? :</p>
                                <?php foreach($skala as $s) { ?>
                                <input name="rdSkala" type="radio" value="<?php echo $s->skala_id; ?>" <?php if ($perusahaanpertama->skala_id==$s->skala_id) { echo "checked"; } ?> /> <b><?php echo $s->skala_desc; ?></b><br>
                                <?php } ?>
                            </div>                            
                            <div class="form-group has-success">
                                <p align="justify">Menurut Anda, <b>Mata Kuliah</b> apa yang Anda dapatkan dari bangku kuliah yang <b>paling relevan</b> dengan pekerjaan Anda saat ini ?<br>
                                (<em>Catatan : jika menyebutkan lebih dari 1, pisahkan dengan KOMA</em>) :</p>                                  
                                <textarea class="form-control" name="catatan" rows="3" required><?php echo $perusahaanpertama->perusahaan_catatan; ?></textarea>
                            </div>

                            </div>
                        </section>
                    </div>

                    </form>
                    <!-- Akhir Form Kanan -->                                                                 
                </div>
                <!-- Akhir Form -->                
            </section>
            </div>
        </div>
        <?php } ?>
        <?php if (count($sekarang) == 0) { // Cek Perusahaan Sekarang ?>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    
                <header class="panel-heading">
                <i class="icon-plus-sign-alt"></i> Data Pekerjaan Sekarang
                </header>        
                
                <!-- Mulai Form -->
                <div class="row">
                    <div class="col-lg-6">
                        
                        <section class="panel">                    
                            <div class="panel-body">                           
                            <form role="form" action="<?php echo site_url('kegiatan/insertperusahaansekarang'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            
                            <div class="form-group has-success">
                                <label for="nama">Nama Perusahaan :</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama Perusahaan" value="<?php echo set_value('nama'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('nama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="alamat">Alamat Perusahaan :</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Enter Alamat Perusahaan" value="<?php echo set_value('alamat'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('alamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="web">Web Perusahaan :</label>
                                <input type="text" class="form-control" name="web" id="web" placeholder="Enter Web Perusahaan" value="<?php echo set_value('web'); ?>" autocomplete="off" />
                            </div>
                            <?php echo form_error('web', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="nim">Jenis Perusahaan :</label>
                                <select class="form-control m-bot15" name="lstJenis" id="lstJenis" required>
                                    <option value="">- Pilih Jenis Perusahaan -</option>
                                    <?php 
                                    foreach($jenis as $j) {                                
                                    ?>                                                        
                                        <option value="<?php echo $j->jenis_id; ?>" <?php echo set_select('lstJenis', $j->jenis_id); ?> ><?php echo $j->jenis_desc; ?></option>                            
                                    <?php                              
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php echo form_error('lstJenis', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                    
                            <div class="form-group has-success">
                                <label for="lain">Lainnya :</label>
                                <input type="text" class="form-control" name="lain" id="lain" placeholder="Enter Lainnya" value="<?php echo set_value('lain'); ?>" autocomplete="off"/>
                            </div>                            
                            <div class="form-group has-success">
                                <label for="tgl_masuk">Tanggal Masuk :</label>
                                <input type="text" class="form-control form-control-inline input-medium default-date-picker" style="width:50%" name="tgl_masuk" id="tgl_masuk" placeholder="Enter Tanggal Masuk" value="<?php echo set_value('tgl_masuk'); ?>" autocomplete="off" required />
                                <div class="form-group has-error"><p class="help-block">Format : YYYY-mm-dd</p></div>
                            </div>
                            <?php echo form_error('tgl_masuk', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="posisi">Posisi :</label>
                                <input type="text" class="form-control" name="posisi" id="posisi" placeholder="Enter Posisi Kerja" value="<?php echo set_value('posisi'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('posisi', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="gaji">Gaji Pertama :</label><br>                        
                                <?php 
                                foreach($gaji as $g) {                                
                                ?>                                                        
                                    <input name="rdGaji" type="radio" value="<?php echo $g->gaji_id; ?>" required /> <b><?php echo $g->gaji_desc; ?></b>
                                <?php                              
                                }
                                ?>                    
                            </div>
                            <?php echo form_error('rdGaji', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>

                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>                    
                            </div>
                        </section>
                        </div>                        

                        <!-- Form Kanan -->
                        <div class="col-lg-6">
                            <section class="panel">                                                               
                                <div class="panel-body"> 

                                    <div class="form-group has-success">
                                        <p>Darimana Anda mendapatkan informasi lowongan pekerjaan (pilih yang sesuai) ? :</p>
                                        <?php foreach($info as $i) { ?>
                                        <input name="rdInfo" type="radio" value="<?php echo $i->info_id; ?>" required /> <b><?php echo $i->info_desc; ?></b><br>
                                        <?php } ?>
                                    </div>
                                    <?php echo form_error('rdInfo', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                                    <div class="form-group has-success">
                                        <p>Menurut Anda dalam skala 1-5 (1 = Sangat Tidak Relevan dan 5 = Sangat Relevan), bagaimana relevansi pekerjaan Anda dengan Bidang Ilmu yang saudara tempuh pada saat di UMK ? :</p>
                                        <?php foreach($skala as $s) { ?>
                                        <input name="rdSkala" type="radio" value="<?php echo $s->skala_id; ?>" required /> <b><?php echo $s->skala_desc; ?></b><br>
                                        <?php } ?>
                                    </div>
                                    <?php echo form_error('rdSkala', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                                    <div class="form-group has-success">
                                        <p align="justify">Menurut Anda, <b>Mata Kuliah</b> apa yang Anda dapatkan dari bangku kuliah yang <b>paling relevan</b> dengan pekerjaan Anda saat ini ?<br>
                                        (<em>Catatan : jika menyebutkan lebih dari 1, pisahkan dengan KOMA</em>) :</p>                                  
                                        <textarea class="form-control" name="catatan" rows="3" required><?php echo set_value('catatan'); ?></textarea>
                                    </div>
                                    <?php echo form_error('catatan', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                                </div>
                            </section>
                        </div>

                        </form>
                        <!-- Akhir Form Kanan -->                                                   
                    </div>
                    <!-- Akhir Form -->                
                </section>
                </div>
            </div>
        <?php            
        } else {   
        ?>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                
                <header class="panel-heading">
                <i class="icon-plus-sign-alt"></i> Data Pekerjaan Sekarang
                </header>        
            
                <!-- Mulai Form -->
                <div class="row">
                    <div class="col-lg-6">

                        <section class="panel">                    
                            <div class="panel-body">                           
                            <form role="form" action="<?php echo site_url('kegiatan/updateperusahaan'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="perusahaan_id" id="perusahaan_id" value="<?php echo $perusahaansekarang->perusahaan_id; ?>" />
                            
                                <div class="form-group has-success">
                                    <label for="nama">Nama Perusahaan :</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama Perusahaan" value="<?php echo $perusahaansekarang->perusahaan_name; ?>" autocomplete="off" required />
                                </div>                            
                                <div class="form-group has-success">
                                    <label for="alamat">Alamat Perusahaan :</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Enter Alamat Perusahaan" value="<?php echo $perusahaansekarang->perusahaan_alamat; ?>" autocomplete="off" required />
                                </div>                        
                                <div class="form-group has-success">
                                    <label for="web">Web Perusahaan :</label>
                                    <input type="text" class="form-control" name="web" id="web" placeholder="Enter Web Perusahaan" value="<?php echo $perusahaansekarang->perusahaan_web; ?>" autocomplete="off" />
                                </div>                            
                                <div class="form-group has-success">
                                    <label for="nim">Jenis Perusahaan :</label>
                                    <select class="form-control m-bot15" name="lstJenis" id="lstJenis" required>
                                        <option value="">- Pilih Jenis Perusahaan -</option>
                                        <?php 
                                        foreach($jenis as $j) {
                                            if ($perusahaansekarang->jenis_id == $j->jenis_id) {                                
                                        ?>
                                            <option value="<?php echo $j->jenis_id; ?>" selected ><?php echo $j->jenis_desc; ?></option>
                                        <?php } else { ?>                                                        
                                            <option value="<?php echo $j->jenis_id; ?>" <?php echo set_select('lstJenis', $j->jenis_id); ?> ><?php echo $j->jenis_desc; ?></option>
                                        <?php
                                            }                              
                                        }
                                        ?>
                                    </select>
                                </div>                            
                                <div class="form-group has-success">
                                    <label for="lain">Lainnya :</label>
                                    <input type="text" class="form-control" name="lain" id="lain" placeholder="Enter Lainnya" value="<?php echo $perusahaansekarang->perusahaan_lain; ?>" autocomplete="off"/>
                                </div>                            
                                <div class="form-group has-success">
                                    <label for="tgl_masuk">Tanggal Masuk :</label>
                                    <input type="text" class="form-control form-control-inline input-medium default-date-picker" style="width:50%" name="tgl_masuk" id="tgl_masuk" placeholder="Enter Tanggal Masuk" value="<?php echo $perusahaansekarang->perusahaan_tgl_masuk; ?>" autocomplete="off" required />
                                    <div class="form-group has-error"><p class="help-block">Format : YYYY-mm-dd</p></div>
                                </div>                            
                                <div class="form-group has-success">
                                    <label for="posisi">Posisi :</label>
                                    <input type="text" class="form-control" name="posisi" id="posisi" placeholder="Enter Posisi Kerja" value="<?php echo $perusahaansekarang->perusahaan_posisi; ?>" autocomplete="off" required />
                                </div>                            
                                <div class="form-group has-success">
                                    <label for="gaji">Gaji Pertama :</label><br>                        
                                    <?php 
                                    foreach($gaji as $g) {                                
                                    ?>                                                        
                                    <input name="rdGaji" type="radio" value="<?php echo $g->gaji_id; ?>" <?php if ($perusahaansekarang->gaji_id==$g->gaji_id) { echo "checked"; } ?> /> <b><?php echo $g->gaji_desc; ?></b>
                                    <?php                              
                                    }
                                    ?>                    
                                </div>                            

                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>                    
                            </div>
                        </section>                                    
                    </div>

                    <!-- Form Kanan -->
                    <div class="col-lg-6">
                        <section class="panel">                                                               
                            <div class="panel-body"> 

                                <div class="form-group has-success">
                                    <p>Darimana Anda mendapatkan informasi lowongan pekerjaan (pilih yang sesuai) ? :</p>
                                    <?php foreach($info as $i) { ?>
                                    <input name="rdInfo" type="radio" value="<?php echo $i->info_id; ?>" <?php if ($perusahaansekarang->info_id==$i->info_id) { echo "checked"; } ?> /> <b><?php echo $i->info_desc; ?></b><br>
                                    <?php } ?>
                                </div>                            
                                <div class="form-group has-success">
                                    <p>Menurut Anda dalam skala 1-5 (1 = Sangat Tidak Relevan dan 5 = Sangat Relevan), bagaimana relevansi pekerjaan Anda dengan Bidang Ilmu yang saudara tempuh pada saat di UMK ? :</p>
                                    <?php foreach($skala as $s) { ?>
                                    <input name="rdSkala" type="radio" value="<?php echo $s->skala_id; ?>" <?php if ($perusahaansekarang->skala_id==$s->skala_id) { echo "checked"; } ?> /> <b><?php echo $s->skala_desc; ?></b><br>
                                    <?php } ?>
                                </div>                            
                                <div class="form-group has-success">
                                    <p align="justify">Menurut Anda, <b>Mata Kuliah</b> apa yang Anda dapatkan dari bangku kuliah yang <b>paling relevan</b> dengan pekerjaan Anda saat ini ?<br>
                                    (<em>Catatan : jika menyebutkan lebih dari 1, pisahkan dengan KOMA</em>) :</p>                                  
                                    <textarea class="form-control" name="catatan" rows="3" required><?php echo $perusahaansekarang->perusahaan_catatan; ?></textarea>
                                </div>

                            </div>
                        </section>
                    </div>

                    </form>
                    <!-- Akhir Form Kanan -->                                                   
                </div>
                <!-- Akhir Form -->                
            </section>
            </div>
        </div>
    <?php 
        }
    }
    ?>

    <?php
    if ($akun->kegiatan_id == 2) {
        // Jika Data Perusahaan Ada
        if (empty($sekolah->sekolah_id)) {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            
            <header class="panel-heading">
            <i class="icon-plus-sign-alt"></i> Data Sekolah
            </header>        
        
            <!-- Mulai Form -->
            <div class="row">
                <div class="col-lg-6">

                    <section class="panel">                    
                        <div class="panel-body">                           
                        <form role="form" action="<?php echo site_url('kegiatan/insertsekolah'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group has-success">
                                <label for="nama">Nama Universitas :</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama Universitas" value="<?php echo set_value('nama'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('nama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="alamat">Alamat Universitas :</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Enter Alamat Universitas" value="<?php echo set_value('alamat'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('alamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="jenjang">Jenjang :</label>
                                <input type="text" class="form-control" name="jenjang" id="jenjang" placeholder="Enter Jenjang" value="<?php echo set_value('jenjang'); ?>" autocomplete="off" />
                            </div>
                            <?php echo form_error('jenjang', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                                                                            
                            <div class="form-group has-success">
                                <label for="tgl_masuk">Tanggal Masuk :</label>
                                <input type="text" class="form-control form-control-inline input-medium default-date-picker" style="width:50%" name="tgl_masuk" id="tgl_masuk" placeholder="Enter Tanggal Masuk" value="<?php echo set_value('tgl_masuk'); ?>" autocomplete="off" required />
                                <div class="form-group has-error"><p class="help-block">Format : YYYY-mm-dd</p></div>
                            </div>
                            <?php echo form_error('tgl_masuk', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="jurusan">Jurusan :</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Enter Jurusan" value="<?php echo set_value('jurusan'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('jurusan', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                           

                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>                    
                        </form>                            
                        </div>
                    </section>                                    
                </div>                                                                            
            </div>
            <!-- Akhir Form -->                
        </section>
        </div>
    </div>
    <?php 
    } else {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            
            <header class="panel-heading">
            <i class="icon-plus-sign-alt"></i> Data Sekolah
            </header>        
        
            <!-- Mulai Form -->
            <div class="row">
                <div class="col-lg-6">

                    <section class="panel">                    
                        <div class="panel-body">                           
                        <form role="form" action="<?php echo site_url('kegiatan/updatesekolah'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="sekolah_id" id="sekolah_id" value="<?php echo $sekolah->sekolah_id; ?>" />
                        
                            <div class="form-group has-success">
                                <label for="nama">Nama Universitas :</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama Universitas" value="<?php echo $sekolah->sekolah_name; ?>" autocomplete="off" required />
                            </div>                            
                            <div class="form-group has-success">
                                <label for="alamat">Alamat Universitas :</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Enter Alamat Universitas" value="<?php echo $sekolah->sekolah_alamat; ?>" autocomplete="off" required />
                            </div>                        
                            <div class="form-group has-success">
                                <label for="jenjang">Jenjang :</label>
                                <input type="text" class="form-control" name="jenjang" id="jenjang" placeholder="Enter Jenjang" value="<?php echo $sekolah->sekolah_jenjang; ?>" autocomplete="off" />
                            </div>                            
                            <div class="form-group has-success">
                                <label for="tgl_masuk">Tanggal Masuk :</label>
                                <input type="text" class="form-control form-control-inline input-medium default-date-picker" style="width:50%" name="tgl_masuk" id="tgl_masuk" placeholder="Enter Tanggal Masuk" value="<?php echo $sekolah->sekolah_tgl_msk; ?>" autocomplete="off" required />
                                <div class="form-group has-error"><p class="help-block">Format : YYYY-mm-dd</p></div>
                            </div>                            
                            <div class="form-group has-success">
                                <label for="jurusan">Jurusan :</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Enter Jurusan" value="<?php echo $sekolah->sekolah_jurusan; ?>" autocomplete="off" required />
                            </div>                            

                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>                    
                        </form>
                        </div>
                    </section>                                    
                </div>
            </div>
            <!-- Akhir Form -->                
        </section>
        </div>
    </div>
    <?php 
        }
    }
    ?>

<?php
    if ($akun->kegiatan_id == 3) {
        // Jika Data Perusahaan Ada
        if (empty($usaha->usaha_id)) {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            
            <header class="panel-heading">
            <i class="icon-plus-sign-alt"></i> Data Usaha
            </header>        
        
            <!-- Mulai Form -->
            <div class="row">
                <div class="col-lg-6">

                    <section class="panel">                    
                        <div class="panel-body">                           
                        <form role="form" action="<?php echo site_url('kegiatan/insertusaha'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group has-success">
                                <label for="nama">Nama Usaha :</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama Usaha" value="<?php echo set_value('nama'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('nama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="alamat">Alamat Usaha :</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Enter Alamat Usaha" value="<?php echo set_value('alamat'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('alamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="web">Web Usaha :</label>
                                <input type="text" class="form-control" name="web" id="web" placeholder="Enter Web Usaha" value="<?php echo set_value('web'); ?>" autocomplete="off" />
                            </div>
                            <?php echo form_error('web', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                            
                            <div class="form-group has-success">
                                <label for="bidang">Bidang Usaha :</label>
                                <input type="text" class="form-control" name="bidang" id="bidang" placeholder="Enter Bidang Usaha" value="<?php echo set_value('bidang'); ?>" autocomplete="off"/>
                            </div>
                            <?php echo form_error('bidang', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                                                                                    
                            <div class="form-group has-success">
                                <label for="jumlah">Jumlah Karyawan :</label>
                                <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Enter Jumlah Kary." value="<?php echo set_value('jumlah'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('jumlah', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="omzet">Omzet /Bulan :</label>
                                <input type="text" class="form-control" name="omzet" id="omzet" placeholder="Enter Omzet /Bulan" value="<?php echo set_value('omzet'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('omzet', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                            

                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>                    
                        </div>
                    </section>                                    
                </div>

                <!-- Form Kanan -->
                <div class="col-lg-6">
                    <section class="panel">                                                               
                        <div class="panel-body"> 
                            
                            <div class="form-group has-success">
                                <label for="pengeluaran">Pengeluaran /Bulan :</label>
                                <input type="text" class="form-control" name="pengeluaran" id="pengeluaran" placeholder="Enter Pengeluaran /Bulan" value="<?php echo set_value('pengeluaran'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('pengeluaran', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="tgl_berdiri">Tanggal Berdiri :</label>
                                <input type="text" class="form-control form-control-inline input-medium default-date-picker" style="width:50%" name="tgl_berdiri" id="tgl_berdiri" placeholder="Enter Tanggal Berdiri" value="<?php echo set_value('tgl_berdiri'); ?>" autocomplete="off" required />
                                <div class="form-group has-error"><p class="help-block">Format : YYYY-mm-dd</p></div>
                            </div>
                            <?php echo form_error('tgl_berdiri', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                            
                            <div class="form-group has-success">
                                <p>Menurut Anda dalam skala 1-5 (1 = Sangat Tidak Relevan dan 5 = Sangat Relevan), bagaimana relevansi pekerjaan Anda dengan Bidang Ilmu yang saudara tempuh pada saat di UMK ? :</p>
                                <?php foreach($skala as $s) { ?>
                                <input name="rdSkala" type="radio" value="<?php echo $s->skala_id; ?>" required /> <b><?php echo $s->skala_desc; ?></b><br>
                                <?php } ?>
                            </div>
                            <?php echo form_error('rdSkala', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                            

                        </div>
                    </section>
                </div>

                </form>
                <!-- Akhir Form Kanan -->                                                   
            </div>
            <!-- Akhir Form -->                
        </section>
        </div>
    </div>
    <?php 
    } else {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            
            <header class="panel-heading">
            <i class="icon-plus-sign-alt"></i> Data Usaha
            </header>        
        
            <!-- Mulai Form -->
            <div class="row">
                <div class="col-lg-6">

                   <section class="panel">                    
                        <div class="panel-body">                           
                        <form role="form" action="<?php echo site_url('kegiatan/updateusaha'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="usaha_id" id="usaha_id" value="<?php echo  $usaha->usaha_id; ?>" />

                            <div class="form-group has-success">
                                <label for="nama">Nama Usaha :</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama Usaha" value="<?php echo $usaha->usaha_name; ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('nama', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="alamat">Alamat Usaha :</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Enter Alamat Usaha" value="<?php echo $usaha->usaha_alamat; ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('alamat', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="web">Web Usaha :</label>
                                <input type="text" class="form-control" name="web" id="web" placeholder="Enter Web Usaha" value="<?php echo $usaha->usaha_web; ?>" autocomplete="off" />
                            </div>
                            <?php echo form_error('web', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                            
                            <div class="form-group has-success">
                                <label for="bidang">Bidang Usaha :</label>
                                <input type="text" class="form-control" name="bidang" id="bidang" placeholder="Enter Bidang Usaha" value="<?php echo $usaha->usaha_bidang; ?>" autocomplete="off"/>
                            </div>
                            <?php echo form_error('bidang', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                                                                                    
                            <div class="form-group has-success">
                                <label for="jumlah">Jumlah Karyawan :</label>
                                <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Enter Jumlah Kary." value="<?php echo $usaha->usaha_jml_karyawan; ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('jumlah', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="omzet">Omzet /Bulan :</label>
                                <input type="text" class="form-control" name="omzet" id="omzet" placeholder="Enter Omzet /Bulan" value="<?php echo $usaha->usaha_omzet; ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('omzet', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                            

                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>                    
                        </div>
                    </section>                                    
                </div>

                <!-- Form Kanan -->
                <div class="col-lg-6">
                    <section class="panel">                                                               
                        <div class="panel-body"> 

                            <div class="form-group has-success">
                                <label for="pengeluaran">Pengeluaran /Bulan :</label>
                                <input type="text" class="form-control" name="pengeluaran" id="pengeluaran" placeholder="Enter Pengeluaran /Bulan" value="<?php echo $usaha->usaha_pengeluaran; ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('pengeluaran', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="tgl_berdiri">Tanggal Berdiri :</label>
                                <input type="text" class="form-control form-control-inline input-medium default-date-picker" style="width:50%" name="tgl_berdiri" id="tgl_berdiri" placeholder="Enter Tanggal Berdiri" value="<?php echo $usaha->usaha_tgl_berdiri; ?>" autocomplete="off" required />
                                <div class="form-group has-error"><p class="help-block">Format : YYYY-mm-dd</p></div>
                            </div>
                            <?php echo form_error('tgl_berdiri', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                            
                            <div class="form-group has-success">
                                <p>Menurut Anda dalam skala 1-5 (1 = Sangat Tidak Relevan dan 5 = Sangat Relevan), bagaimana relevansi pekerjaan Anda dengan Bidang Ilmu yang saudara tempuh pada saat di UMK ? :</p>
                                <?php foreach($skala as $s) { ?>
                                <input name="rdSkala" type="radio" value="<?php echo $s->skala_id; ?>" <?php if ($usaha->skala_id==$s->skala_id) { echo "checked"; } ?> /> <b><?php echo $s->skala_desc; ?></b><br>
                                <?php } ?>
                            </div>
                            <?php echo form_error('rdSkala', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                            

                        </div>
                    </section>
                </div>

                </form>
                <!-- Akhir Form Kanan -->                                                   
            </div>
            <!-- Akhir Form -->                
        </section>
        </div>
    </div>

    <!-- Logo dan Deskripsi -->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            
            <header class="panel-heading">
            <i class="icon-plus-sign-alt"></i> Logo dan Deskripsi Usaha
            </header>        
        
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                                    
                        <div class="panel-body">
                        <form class="form-horizontal tasi-form" action="<?php echo site_url('kegiatan/updatelogousaha'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                        <input type="hidden" name="usaha_id" id="usaha_id" value="<?php echo  $usaha->usaha_id; ?>" />
                        
                        <div class="form-group has-success">
                            <label class="control-label col-sm-3">Logo Usaha :</label>
                            <?php if (empty($usaha->usaha_logo)) { ?>
                            <img src="<?php echo base_url(); ?>img/no_image.gif" alt="" height="80" width="80" />
                            <?php } else { ?>
                            <img src="<?php echo base_url(); ?>logo/<?php echo $usaha->usaha_logo; ?>" height="100" width="100">
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Ganti Logo Usaha :</label>
                            <div class="col-sm-6 has-success">
                            <div class="form-group has-success">                                
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?php echo base_url(); ?>img/no_image.gif" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                <span class="btn btn-white btn-file">
                                <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                <input type="file" class="default" name="userfile" />
                                </span>
                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                </div>
                                </div>
                                <span class="label label-danger">NOTE!</span>
                                <span>
                                (Resolution Image : 300 x 250 pixel)                
                                </span> 
                            </div>
                            </div>                           
                        </div>              

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Deskripsi Usaha Anda :</label>                            
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control ckeditor" name="desc" rows="6"><?php echo $usaha->usaha_desc; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-12"><input type="checkbox" name="chkKet" id="chkKet" value="1" <?php if ($usaha->usaha_iklan == 1) { echo "checked"; } ?> \> Saya setuju untuk mengiklankan Usaha Saya.</label>
                        </div>
                                                                        
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>                                                 
                        </form>
                        </div>
                    </section>
                </div>
            </div>
                           
        </section>
        </div>
    </div>

    <!-- Invoice -->    
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            
            <header class="panel-heading">
            <i class="icon-plus-sign-alt"></i> Invoice
            </header>        
        
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">                                
                        <div class="panel-body">
                        <table class="table table-striped table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>No. Invoice</th>
                                  <th class="">Tanggal Invoice</th>
                                  <th class="">Tanggal Expired</th>
                                  <th class="">Status</th>                                  
                                  <th>Total</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php
                                $usaha_id = $usaha->usaha_id;
                                $invoice = $this->account_model->select_invoice($usaha_id)->result();
                                $total = 0;
                                $no = 1;
                                foreach($invoice as $i) { 
                                    $total = ($total+$i->invoice_total);
                                ?>
                              <tr>
                                  <td><?php echo $no; ?></td>
                                  <td># <?php echo $i->invoice_id; ?></td>
                                  <td class=""><?php echo tgl_indo($i->invoice_tanggal); ?></td>
                                  <td class=""><?php echo tgl_indo($i->invoice_expired); ?></td>                                  
                                  <td class=""><span class="label label-danger label-mini"><?php if ($i->invoice_status==1) { echo "Paid"; } else { echo "Unpaid"; } ; ?></span></td>
                                  <td><?php echo number_format($i->invoice_total); ?></td>
                              </tr>
                              <?php $no++; } ?>                              
                              </tbody>
                          </table>
                        </div>
                    </section>
                </div>
            </div>
                           
        </section>
        </div>
    </div>
    <?php 
        }
    }
    ?>


    <?php
    if ($akun->kegiatan_id == 4) {
        // Jika Data Belum Kerja Tidak Ada
        if (empty($belumkerja->kerja_id)) {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            
            <header class="panel-heading">
            <i class="icon-plus-sign-alt"></i> Data Kegiatan
            </header>        
        
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                                    
                        <div class="panel-body">
                        <form class="form-horizontal tasi-form" action="<?php echo site_url('kegiatan/insertbelumkerja'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Kegiatan yang Anda lakukan :</label>                            
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <?php foreach($aktifitas as $a) { ?>
                                <input name="rdAktifitas" required type="radio" value="<?php echo $a->aktifitas_id; ?>" required /> <b><?php echo $a->aktifitas_desc; ?></b><br>
                                <?php } ?>
                            </div>
                        </div>
                        <?php echo form_error('rdAktifitas', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>         

                        <div class="form-group">
                            <label class="control-label col-sm-3">Lainnya :</label>
                            <div class="col-sm-6 has-success">
                            <input type="text" name="lain" class="form-control" id="lain" placeholder="Enter Lainnya" value="<?php echo set_value('lain'); ?>" autocomplete="off">
                            </div>
                            <?php echo form_error('lain', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>         
                        </div>              

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Jika Anda sedang mencari pekerjaan, menurut Anda apa yang harus dilakukan oleh Universitas Muria Kudus supaya Anda bisa mendapatkan pekerjaan dengan lebih cepat ?</label>                            
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control ckeditor" name="saran1" rows="6"><?php echo set_value('saran1'); ?></textarea>
                            </div>
                        </div>
                        <?php echo form_error('saran1', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>         

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Adakah saran perbaikan lain untuk Universitas Muria Kudus ?</label>                            
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control ckeditor" name="saran2" rows="6"><?php echo set_value('saran2'); ?></textarea>
                            </div>
                        </div>
                        <?php echo form_error('saran2', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>

                        <div class="form-group">
                           <label class="control-label col-sm-12"><input type="checkbox" name="chkEmail" id="chkEmail" value="1"> Saya bersedia menerima Email pemberitahuan ketika ada Lowongan di Loker UMK.</label>                           
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-12"><input type="checkbox" name="chkSMS" id="chkSMS" value="1"> Saya bersedia menerima pemberitahuan lewat SMS dari UMK.</label>
                        </div>
                                                                        
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>                                           
                                                    
                        </form>
                        </div>
                    </section>
                </div>
            </div>
                           
        </section>
        </div>
    </div>
    <?php 
    } else {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            
            <header class="panel-heading">
            <i class="icon-plus-sign-alt"></i> Data Kegiatan
            </header>        
        
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                                    
                        <div class="panel-body">
                        <form class="form-horizontal tasi-form" action="<?php echo site_url('kegiatan/updatebelumkerja'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                        <input type="hidden" name="kerja_id" id="kerja_id" value="<?php echo $belumkerja->kerja_id; ?>" />           

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Kegiatan yang Anda lakukan :</label>                            
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <?php foreach($aktifitas as $a) { ?>
                                <input name="rdAktifitas" required type="radio" value="<?php echo $a->aktifitas_id; ?>" <?php if ($belumkerja->aktifitas_id == $a->aktifitas_id) { echo "checked"; } ?> /> <b><?php echo $a->aktifitas_desc; ?></b><br>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Lainnya :</label>
                            <div class="col-sm-6 has-success">
                            <input type="text" name="lain" class="form-control" id="lain" placeholder="Enter Lainnya" value="<?php echo $belumkerja->kerja_lain; ?>" autocomplete="off">
                            </div>                           
                        </div>              

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Jika Anda sedang mencari pekerjaan, menurut Anda apa yang harus dilakukan oleh Universitas Muria Kudus supaya Anda bisa mendapatkan pekerjaan dengan lebih cepat ?</label>                            
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control ckeditor" name="saran1" rows="6"><?php echo $belumkerja->kerja_saran1; ?></textarea>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Adakah saran perbaikan lain untuk Universitas Muria Kudus ?</label>                            
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control ckeditor" name="saran2" rows="6"><?php echo $belumkerja->kerja_saran2; ?></textarea>
                            </div>
                        </div>                        

                        <div class="form-group">
                           <label class="control-label col-sm-12"><input type="checkbox" name="chkEmail" id="chkEmail" value="1" <?php if ($belumkerja->kerja_notif_email==1) { echo "checked"; } ?> \> Saya bersedia menerima Email pemberitahuan ketika ada Lowongan di Loker UMK.</label>                           
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-12"><input type="checkbox" name="chkSMS" id="chkSMS" value="1" <?php if ($belumkerja->kerja_notif_sms==1) { echo "checked"; } ?> \> Saya bersedia menerima pemberitahuan lewat SMS dari UMK.</label>
                        </div>
                                                                        
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>                                           
                                                    
                        </form>
                        </div>
                    </section>
                </div>
            </div>
                           
        </section>
        </div>
    </div>
    <?php 
        }
    }
    ?>
</section>        