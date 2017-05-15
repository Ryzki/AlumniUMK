<section class="wrapper">
    <section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">
            
                <div class="col-lg-12">
                    <h4 align="center">
                    TRANSISI DUNIA KERJA
                    </h4> 
                    <?php 
                    if ($this->session->flashdata('notification')) { ?>
                        <div class="alert alert-success fade in">
                        <?php echo $this->session->flashdata('notification'); ?>
                        </div>
                        <br>                
                    <? } ?>                   
                </div>

            </div>
        </div>
    </div>
    </section>
   
   <!--tab nav start-->
    <section class="panel">
        <header class="panel-heading tab-bg-dark-navy-blue ">
        <ul class="nav nav-tabs">
            <?php 
            if ($this->uri->segment(3) == 'transisi#kursus') {
                $trans = '';
                $kurs = 'active';
            } else {
                $trans = 'active';
                $kurs = '';
            }
            ?>
            <li class="<?php echo $trans; ?>">
                <a data-toggle="tab" href="#transisi"><i class="icon-bar-chart"></i> Data Transisi</a>
            </li>
            <li class="<?php echo $kurs; ?>">
                <a data-toggle="tab" href="#kursus"><i class="icon-archive"></i> Data Kursus</a>
            </li>            
        </ul>
        </header>
        
        <div class="panel-body">
            <div class="tab-content">
                <div id="transisi" class="tab-pane active">
                
                <?php if (count($transisi) == 0) { ?>
                <div class="row">
                    <div class="col-lg-12">
                    <section class="panel">
                            
                    <header class="panel-heading">
                    <i class="icon-plus-sign-alt"></i> Data Transisi Alumni
                    </header>        
                        
                    <!-- Mulai Form -->
                    <div class="row">
                        <div class="col-lg-6">

                        <section class="panel">                    
                            <div class="panel-body">                           
                            <form role="form" action="<?php echo site_url('transisi/insertdata'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    
                            <div class="form-group has-success">
                                <label for="jmllamar">Jumlah Intansi yang dilamar :</label>
                                <input type="text" class="form-control" name="jmllamar" id="jmllamar" placeholder="Enter Jumlah Instansi Di Lamar" value="<?php echo set_value('jmllamar'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('jmllamar', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="jmlrespon">Jumlah Instansi yang Respon :</label>
                                <input type="text" class="form-control" name="jmlrespon" id="jmlrespon" placeholder="Enter Jumlah Respon Instansi" value="<?php echo set_value('jmlrespon'); ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('jmlrespon', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="jenisinstansi">Jenis Instansi yang dilamar :</label>
                                <textarea class="form-control" name="jenisinstansi" rows="3" required><?php echo set_value('jenisinstansi'); ?></textarea>
                            </div>
                            <?php echo form_error('jenisinstansi', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="aspekkerja">Aspek Pertimbangan Menerima Kerja Pertama :</label>
                                <textarea class="form-control" name="aspekkerja" rows="5" required><?php echo set_value('aspekkerja'); ?></textarea>
                            </div>
                            <?php echo form_error('jenisinstansi', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="nim">Kesesuaian Pekerjaan saat Kuliah dengan Sekarang :</label>
                                <select class="form-control m-bot15" name="lstSesuai" id="lstSesuai" required>
                                    <option value="">- Pilih Salah Satu -</option>
                                    <option value="Sesuai" <?php echo set_select('lstSesuai', 'Sesuai'); ?>>Sesuai</option>
                                    <option value="Tidak Sesuai" <?php echo set_select('lstSesuai', 'Tidak Sesuai'); ?>>Tidak Sesuai</option>
                                    <option value="Tidak Tahu" <?php echo set_select('lstSesuai', 'Tidak Tahu'); ?>>Tidak Tahu</option>
                                </select>
                            </div>
                            <?php echo form_error('lstSesuai', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                                       

                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                            </section>
                            </div>                                    

                            <!-- Form Kanan -->
                            <div class="col-lg-6">
                                <section class="panel">                                                               
                                    <div class="panel-body"> 

                                    <div class="form-group has-success">
                                        <label for="hardskill">Kemampuan <em>Hardskill</em> :</label>
                                        <textarea class="form-control" name="hardskill" rows="5" required><?php echo set_value('hardskill'); ?></textarea>
                                    </div>
                                    <?php echo form_error('hardskill', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                                    <div class="form-group has-success">
                                        <label for="softskill">Kemampuan <em>Softskill</em> :</label>
                                        <textarea class="form-control" name="softskill" rows="5" required><?php echo set_value('softskill'); ?></textarea>
                                    </div>
                                    <?php echo form_error('softskill', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                                    <div class="form-group has-success">
                                        <label for="masalah">Permasalahan yang dihadapi dalam melamar :</label>
                                        <textarea class="form-control" name="masalah" rows="5" required><?php echo set_value('masalah'); ?></textarea>
                                    </div>
                                    <?php echo form_error('masalah', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
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
                    <i class="icon-plus-sign-alt"></i> Data Transisi Alumni
                    </header>        
                        
                    <!-- Mulai Form -->
                    <div class="row">
                        <div class="col-lg-6">

                        <section class="panel">                    
                            <div class="panel-body">                           
                            <form role="form" action="<?php echo site_url('transisi/updatedata'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="transisi_id" value="<?php echo $transisi->transisi_id; ?>" />

                            <div class="form-group has-success">
                                <label for="jmllamar">Jumlah Intansi yang dilamar :</label>
                                <input type="text" class="form-control" name="jmllamar" id="jmllamar" placeholder="Enter Jumlah Instansi Di Lamar" value="<?php echo $transisi->transisi_instansi_lamar; ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('jmllamar', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="jmlrespon">Jumlah Instansi yang Respon :</label>
                                <input type="text" class="form-control" name="jmlrespon" id="jmlrespon" placeholder="Enter Jumlah Respon Instansi" value="<?php echo $transisi->transisi_instansi_respon; ?>" autocomplete="off" required />
                            </div>
                            <?php echo form_error('jmlrespon', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="jenisinstansi">Jenis Instansi yang dilamar :</label>
                                <textarea class="form-control" name="jenisinstansi" rows="3" required><?php echo $transisi->transisi_jenis_instansi; ?></textarea>
                            </div>
                            <?php echo form_error('jenisinstansi', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="aspekkerja">Aspek Pertimbangan Menerima Kerja Pertama :</label>
                                <textarea class="form-control" name="aspekkerja" rows="5" required><?php echo $transisi->transisi_aspek_pekerjaan; ?></textarea>
                            </div>
                            <?php echo form_error('jenisinstansi', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                            <div class="form-group has-success">
                                <label for="nim">Kesesuaian Pekerjaan saat Kuliah dengan Sekarang :</label>
                                <select class="form-control m-bot15" name="lstSesuai" id="lstSesuai" required>
                                    <option value="">- Pilih Salah Satu -</option>
                                    <option value="Sesuai" <?php if ($transisi->transisi_sesuai == 'Sesuai') { echo 'selected'; } ?>>Sesuai</option>
                                    <option value="Tidak Sesuai" <?php if ($transisi->transisi_sesuai == 'Tidak Sesuai') { echo 'selected'; } ?>>Tidak Sesuai</option>
                                    <option value="Tidak Tahu" <?php if ($transisi->transisi_sesuai == 'Tidak Tahu') { echo 'selected'; } ?>>Tidak Tahu</option>
                                </select>
                            </div>
                            <?php echo form_error('lstSesuai', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>                                       

                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                            </section>
                            </div>                                    

                            <!-- Form Kanan -->
                            <div class="col-lg-6">
                                <section class="panel">                                                               
                                    <div class="panel-body"> 

                                    <div class="form-group has-success">
                                        <label for="hardskill">Kemampuan <em>Hardskill</em> :</label>
                                        <textarea class="form-control" name="hardskill" rows="5" required><?php echo $transisi->transisi_hardskill; ?></textarea>
                                    </div>
                                    <?php echo form_error('hardskill', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                                    <div class="form-group has-success">
                                        <label for="softskill">Kemampuan <em>Softskill</em> :</label>
                                        <textarea class="form-control" name="softskill" rows="5" required><?php echo $transisi->transisi_softskill; ?></textarea>
                                    </div>
                                    <?php echo form_error('softskill', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                                    <div class="form-group has-success">
                                        <label for="masalah">Permasalahan yang dihadapi dalam melamar :</label>
                                        <textarea class="form-control" name="masalah" rows="5" required><?php echo $transisi->transisi_masalah; ?></textarea>
                                    </div>
                                    <?php echo form_error('masalah', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
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

                </div>

                <div id="kursus" class="tab-pane">
                    
                    <div class="panel-body">
                        <a href="#myAddData" data-toggle="modal" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add Data</a>
                        <div class="adv-table">
                        <table class="display table table-bordered table-striped" id="example">
                        <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Kursus</th>
                            <th>Alamat</th>                        
                            <th>Tahun</th>
                            <th>Materi</th>
                            <th width="10%">Penyelenggara</th>
                            <th width="6%" class="hidden-phone">Action</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        <?php 
                            $no = 1; 
                            foreach($data_kursus as $r) { 
                        ?>
                        <tr class="gradeA">
                            <td><? echo $no; ?></td>
                            <td><? echo $r->kursus_nama; ?></td>
                            <td><? echo $r->kursus_alamat; ?></td>                        
                            <td><? echo $r->kursus_dari_tahun.' s/d '.$r->kursus_sampai_tahun; ?></td>
                            <td><? echo $r->kursus_materi; ?></td>
                            <td><? echo $r->kursus_donatur; ?></td>
                            <td class="center hidden-phone">
                            <a href="#myEditData" data-toggle="modal" type="button" class="btn btn-primary btn-xs edit_button_transisi" data-id="<?php echo $r->kursus_id; ?>" data-nama="<?php echo $r->kursus_nama; ?>" 
                            data-alamat="<?php echo $r->kursus_alamat; ?>" data-dari="<?php echo $r->kursus_dari_tahun; ?>" data-sampai="<?php echo $r->kursus_sampai_tahun; ?>"
                            data-materi="<?php echo $r->kursus_materi; ?>" data-donatur="<?php echo $r->kursus_donatur; ?>" title="Edit">
                            <i class="icon-pencil"></i>
                            </a>
                            <a href="<?php echo site_url('transisi/deletedata/'.$r->kursus_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
                            </td>                    
                        </tr>
                        <?php 
                            $no++; 
                        } 
                        ?>
                        </tbody>
                        
                        <tfoot>
                        </tfoot>
                        </table>
                        </div>
                    </div>

                    <!-- Form Add Data Modal -->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myAddData" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <h4 class="modal-title">Form Add Data Kursus</h4>
                                </div>
                                
                                <div class="modal-body">
                                    <form role="form" method="post" action="<?php echo site_url('transisi/savedata'); ?>">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <div class="form-group">
                                            <label for="nama">Nama Kursus :</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama Kursus" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat :</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter Alamat" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun1">Dari Tahun :</label>
                                            <input type="text" class="form-control" id="tahun1" name="tahun1" placeholder="Ex. 2010" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun2">Sampai Tahun :</label>
                                            <input type="text" class="form-control" id="tahun2" name="tahun2" placeholder="Ex. 2015" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="materi">Materi Kursus :</label>
                                            <textarea class="form-control" name="materi" rows="5" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="donatur">Penyelenggara :</label>
                                            <input type="text" class="form-control" id="donatur" name="donatur" placeholder="Enter Penyelengara" autocomplete="off" required>
                                        </div>

                                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Data Modal -->

                    <!-- Form Edit Data Modal -->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myEditData" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <h4 class="modal-title">Form Edit Data Kursus</h4>
                                </div>
                                
                                <div class="modal-body">
                                    <form role="form" method="post" action="<?php echo site_url('transisi/updatedatakursus'); ?>">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                                    

                                        <div class="form-group">
                                            <input class="form-control" type="hidden" name="kursus_id" id="kursus_id">
                                            <label for="nama">Nama Kursus :</label>                                            
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama Kursus" value="" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat :</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter Alamat" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun1">Dari Tahun :</label>
                                            <input type="text" class="form-control" id="tahun1" name="tahun1" placeholder="Ex. 2010" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun2">Sampai Tahun :</label>
                                            <input type="text" class="form-control" id="tahun2" name="tahun2" placeholder="Ex. 2015" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="materi">Materi Kursus :</label>
                                            <textarea class="form-control" name="materi" id="materi" rows="5" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="donatur">Penyelenggara :</label>
                                            <input type="text" class="form-control" id="donatur" name="donatur" placeholder="Enter Penyelengara" autocomplete="off" required>
                                        </div>

                                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Data Modal -->

                </div>

            </div>
        </div>
    </section>
        
</section>        