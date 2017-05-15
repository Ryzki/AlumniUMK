<section class="wrapper">
    <section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">
            
                <div class="col-lg-12">
                    <h4 align="center">
                    LAYANAN UNTUK ALUMNI/LULUSAN
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
            <form class="form-horizontal tasi-form" action="<?php echo site_url('layanan/insertdata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">        

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Fasilitas/Layanan yang perlu dikembangkan untuk meningkatkan daya saing lulusan :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="kembang" id="kembang" rows="6"></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Masukan apa yang perlu dilakukan Universitas untuk membantu mendapatkan pekerjaan :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="masukan" id="masukan" rows="6"></textarea>
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
            <form class="form-horizontal tasi-form" action="<?php echo site_url('layanan/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            
            <input type="hidden" name="layanan_id" value="<?php echo $detail->layanan_id; ?>" />

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Fasilitas/Layanan yang perlu dikembangkan untuk meningkatkan daya saing lulusan :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="kembang" id="kembang" rows="6"><?php echo $detail->layanan_kembang; ?></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label col-sm-4">Masukan apa yang perlu dilakukan Universitas untuk membantu mendapatkan pekerjaan :</label>
                <div class="col-sm-8">
                <textarea class="form-control ckeditor" name="masukan" id="masukan" rows="6"><?php echo $detail->layanan_masukan; ?></textarea>
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