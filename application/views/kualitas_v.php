<section class="wrapper">
    <section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">
            
                <div class="col-lg-12">
                    <h4 align="center">
                    KUALITAS PEMBELAJARAN
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

    <div class="row">
        <div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
        <i class="icon-plus-sign-alt"></i> Keterangan
        </header>

        <?php if (count($detail) == 0) { ?>
        <div class="row">
            <div class="col-lg-12">
            <section class="panel">
                            
            <div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('kualitas/insertdata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Kualitas Pembelajaran di UMK :</label>
                <div class="col-sm-4 has-success">
                <select class="form-control m-bot15" name="lstKualitas" id="lstKualitas" required>
                    <option value="">- Pilih Kualitas Pembelajaran -</option>                    
                    <option value="Sangat Baik" <?php echo set_select('lstKualitas', 'Sangat Baik'); ?>>Sangat Baik</option>
                    <option value="Baik" <?php echo set_select('lstKualitas', 'Baik'); ?>>Baik</option>
                    <option value="Kurang Baik" <?php echo set_select('lstKualitas', 'Kurang Baik'); ?>>Kurang Baik</option>
                    <option value="Buruk" <?php echo set_select('lstKualitas', 'Buruk'); ?>>Buruk</option>
                </select>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Mata Kuliah penunjang Kompetensi :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="makul" id="makul" rows="6"></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Kemampuan <em>Hardskill</em> dan <em>Softskill</em> yang harus diajarkan :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="kemampuan" id="kemampuan" rows="6"></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Keahlian yang harus dimiliki berdasarkan Ilmu :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="ilmu" id="ilmu" rows="6"></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Keahlian yang harus dimiliki berdasarkan Program Studi :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="program" id="program" rows="6"></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Keahlian yang harus dimiliki berdasarkan Profesionalisme :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="profesional" id="profesional" rows="6"></textarea>
                </div>                
            </div>

            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>                    
                                        
            </form>
            </div>
            </section>
            </div>
        </div>
        <?php } else { ?>      
        <div class="row">
            <div class="col-lg-12">
            <section class="panel">
                            
            <div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('kualitas/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            
            <input type="hidden" name="kualitas_id" value="<?php echo $detail->kualitas_id; ?>" />

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Kualitas Pembelajaran di UMK :</label>
                <div class="col-sm-4 has-success">
                <select class="form-control m-bot15" name="lstKualitas" id="lstKualitas" required>
                    <option value="">- Pilih Kualitas Pembelajaran -</option>                    
                    <option value="Sangat Baik" <?php if ($detail->kualitas_nilai == 'Sangat Baik') { echo 'selected'; } ?>>Sangat Baik</option>
                    <option value="Baik" <?php if ($detail->kualitas_nilai == 'Baik') { echo 'selected'; } ?>>Baik</option>
                    <option value="Kurang Baik" <?php if ($detail->kualitas_nilai == 'Kurang Baik') { echo 'selected'; } ?>>Kurang Baik</option>
                    <option value="Buruk" <?php if ($detail->kualitas_nilai == 'Buruk') { echo 'selected'; } ?>>Buruk</option>
                </select>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Mata Kuliah penunjang Kompetensi :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="makul" id="makul" rows="6"><?php echo $detail->kualitas_makul; ?></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Kemampuan <em>Hardskill</em> dan <em>Softskill</em> yang harus diajarkan :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="kemampuan" id="kemampuan" rows="6"><?php echo $detail->kualitas_hardsoft; ?></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Keahlian yang harus dimiliki berdasarkan Ilmu :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="ilmu" id="ilmu" rows="6"><?php echo $detail->kualitas_ahli_ilmu; ?></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Keahlian yang harus dimiliki berdasarkan Program Studi :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="program" id="program" rows="6"><?php echo $detail->kualitas_ahli_progdi; ?></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Keahlian yang harus dimiliki berdasarkan Profesionalisme :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="profesional" id="profesional" rows="6"><?php echo $detail->kualitas_ahli_profesional; ?></textarea>
                </div>                
            </div>

            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>                    
                                        
            </form>
            </div>
            </section>
            </div>
        </div>

        <?php } ?>
        </section>
        </div>
    </div>

</section>        