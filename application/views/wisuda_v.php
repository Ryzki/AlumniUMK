<section class="wrapper">
    <!--<section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">
            
                <div class="col-lg-12">                    
                    <div class="alert alert-warning fade in">
                        <p align="justify">                                                                          
                            <b>INFORMASI :</b> <br>
                            Untuk Mahasiswa dengan NIM : 
                            <ul>
                                <li><b>1. 201051044</b></li>
                                <li><b>2. 201133131</b></li>
                                <li><b>3. 201253093</b></li>
                                <li><b>4. 200920106</b></li>
                                <li><b>5. 201012008</b></li>
                                <li><b>6. 201032177</b></li>
                            </ul>
                            Dimohon untuk Input ulang Pendaftaran Wisuda, dikarenakan data kurang <b>LENGKAP</b>.<br>
                            Abaikan informasi ini jika sudah melakukan Pendaftaran Ulang.
                        </p>
                    </div>                                            
                </div>

            </div>
        </div>
    </div>
    </section> -->

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-th"></i> Data Wisuda - Periode <?php echo tgl_indo($periode->setting_periode); ?>
            </header>
                
                <div class="panel-body">                    
                    <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                        <th width="13%">Tgl. Daftar</th>
                        <th width="13%">N I M</th>
                        <th>Nama Mahasiswa</th>
                        <th width="15%">Fakultas</th>
                        <th width="15%">Progdi</th>
                        <th width="12%">Status</th>                        
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    // Periode Wisuda
                    $periode = $periode->setting_periode;                    
                    // Tampilkan Data sesuai Periode Aktif
                    $daftar_wisuda = $this->wisuda_model->select_all($periode)->result();
                    $no = 1; 
                    foreach($daftar_wisuda as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $no; ?></td>
                        <td><? echo $r->wisuda_tgl_daftar; ?></td>
                        <td><? echo $r->alumni_nim; ?></td>
                        <td><? echo strtoupper($r->alumni_nama); ?></td>
                        <td><? echo $r->fakultas_name; ?></td>
                        <td><? echo $r->progdi_name; ?></td>
                        <td><b><? echo $r->wisuda_status; ?></b></td>                                                                
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

            </section>
        </div>
    </div>
</section>