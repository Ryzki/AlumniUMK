<section class="wrapper">
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
            
                <div class="col-lg-12">                    
                    <div class="alert alert-success fade in">
                        <p align="justify">                                                                          
                            <b>INFORMASI :</b> <br>
                            1. Pendaftaran Alumni Berhasil, Silahkan Hubungi Admin Website untuk Mengaktifkan Akun Anda.<br>
                            2. Username Anda = NIM Anda<br>
                            3. Password Anda = Tanggal Lahir Anda (Format : TahunBulanTanggal)
                            </p>
                    </div>                                            
                </div>

            </div>
        </div>
    </div>
    </section>
    <div class="row">
        <div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        DATA MAHASISWA
        </header>

        <div class="row">
            <div class="col-lg-12">
            <section class="panel">
                            
            <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">            

            <div class="form-group">
                <label class="control-label col-sm-4">No. Pendaftaran</label>
                <label class="control-label col-sm-6">
                <b>#<?php echo $detailwisuda->wisuda_id; ?></b>
                </label>
            </div> 
            <div class="form-group">
                <label class="control-label col-sm-4">Tanggal Daftar</label>
                <label class="control-label col-sm-6">
                <?php echo tgl_indo($detailwisuda->wisuda_tgl_daftar); ?>
                </label>
            </div> 
            <div class="form-group">
                <label class="control-label col-sm-4">N I M</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->alumni_nim; ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Nama Mahasiswa</label>
                <label class="control-label col-sm-6">
                <?php echo strtoupper($detailwisuda->alumni_nama); ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Fakultas, Program Studi</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->fakultas_name; ?>, <?php echo $detailwisuda->progdi_name; ?>
                </label>
            </div>              
            <div class="form-group">
                <label class="control-label col-sm-4">Tempat, Tanggal Lahir</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->alumni_tmpt_lhr; ?>, <?php echo tgl_indo($detailwisuda->alumni_tgl_lhr); ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Agama</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->alumni_agama; ?>
                </label>
            </div> 
            <div class="form-group">
                <label class="control-label col-sm-4">Alamat</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->alumni_alamat; ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">No. Telp/HP</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->alumni_hp; ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Email</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->alumni_email; ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Judul Skripsi/Proyek Akhir/Tesis</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->wisuda_judulproyek; ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Nama Orang Tua</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->alumni_ortu; ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Pekerjaan Orang Tua</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->alumni_kerja_ortu; ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Alamat Orang Tua</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->alumni_alamat_ortu; ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Telp Orang Tua</label>
                <label class="control-label col-sm-6">
                <?php echo $detailwisuda->alumni_hp_ortu; ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Foto</label>
                <label class="control-label col-sm-6">
                <img src="<?php echo base_url(); ?>foto/<?php echo $detailwisuda->alumni_foto; ?>" height="150px" width="100px">
                </label>
            </div>
            <div class="text-center invoice-btn">
                 <div class="alert alert-danger fade in">
                 <p><b>INI BUKAN BUKTI PENDAFTARAN WISUDA, CETAK BUKTI MELALUI MY ACCOUNT</b></p>
                 </div>
            </div>
            <!--
            <div class="text-center invoice-btn">
                <a href="<?php echo site_url('wisuda/printpreview'.'/'.$detailwisuda->wisuda_id); ?>" target="_blank" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Cetak Bukti </a>
                <a href="<?php echo site_url('wisuda/download'.'/'.$detailwisuda->wisuda_id); ?>" target="_blank" class="btn btn-danger"><span class="glyphicon glyphicon-download"></span> Download PDF </a>
            </div>
            -->
            
            </form>
            </div>
            </section>
            </div>
        </div>      
    
        </section>
        </div>
    </div>
</section>        