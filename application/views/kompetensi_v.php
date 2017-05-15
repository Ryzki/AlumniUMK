<section class="wrapper">
    <section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">
            
                <div class="col-lg-12">
                    <h4 align="center">
                    KOMPETENSI
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
            <form class="form-horizontal tasi-form" action="<?php echo site_url('kompetensi/insertdata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            

            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Kompetensi yang sesuai antara bidang ilmu dan pekerjaan :</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="sesuai" id="sesuai" rows="6"></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Kompetensi yang perlu ditambahkan :</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="tambahan" id="tambahan" rows="6"></textarea>
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
            <form class="form-horizontal tasi-form" action="<?php echo site_url('kompetensi/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            
            <input type="hidden" name="kompetensi_id" value="<?php echo $detail->kompetensi_id; ?>" />

            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Kompetensi yang sesuai antara bidang ilmu dan pekerjaan</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="sesuai" id="sesuai" rows="6"><?php echo $detail->kompetensi_sesuai; ?></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Kompetensi yang perlu ditambahkan :</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="tambahan" id="tambahan" rows="6"><?php echo $detail->kompetensi_tambahan; ?></textarea>
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