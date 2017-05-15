<section class="wrapper">
    <section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">            
                <div class="col-lg-4 col-sm-4">
                    <h4>DATA USAHA</h4>
                    <p>
                    Nama Perusahaan : <?php echo $wirausaha->usaha_name; ?><br />                   
                    Alamat : <?php echo $wirausaha->usaha_alamat; ?><br />                    
                    Website : <?php $wirausaha->usaha_web; ?><br />                    
                    Bidang Usaha : <?php echo $wirausaha->usaha_bidang; ?><br><br>
                    N I M : <?php echo $wirausaha->alumni_nim; ?><br>
                    Nama Alumni : <?php echo $wirausaha->alumni_nama; ?>                                                         
                    </p>
                </div>

                <div class="col-lg-4 col-sm-4"> 
                    <h4 align="center">LOGO</h4>              
                    <p align="center">
                        <?php if (empty($wirausaha->usaha_logo)) { ?>
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                        <?php } else { ?>
                        <img src="<?php echo base_url().'logo/'.$wirausaha->usaha_logo; ?>" alt="" height="120" width="120" />
                        <?php } ?>
                    </p>
                </div>                          
            </div>
        </div>
    </div>
    </section>

    <div class="row">
        <div class="col-lg-12">
            
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Detail Invoice 
            </header>
    
            <div class="row">
                <div class="col-lg-12">
                <section class="panel">
                <header class="panel-heading">
                Edit Data Invoice
                </header>
                                
                <div class="panel-body">
                <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/wirausaha/updatedatainvoice/'.$this->uri->segment(4)); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group">
                    <label class="control-label col-sm-2">No. Invoice :</label>
                    <div class="col-sm-2 has-success">
                    <b>#<?php echo $invoice->invoice_id; ?></b>
                    </div>                
                </div>           
                <input type="hidden" name="invoice_id" value="<?php echo $invoice->invoice_id; ?>" />
                <input type="hidden" name="usaha_id" value="<?php echo $invoice->usaha_id; ?>" />
                <input type="hidden" name="tgl_expired" value="<?php echo $invoice->invoice_expired; ?>" />

                <div class="form-group">
                    <label class="control-label col-sm-2">Tanggal Invoice :</label>
                    <div class="col-sm-2 has-success">
                    <b><?php echo tgl_indo($invoice->invoice_tanggal); ?></b>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Tanggal Expired :</label>
                    <div class="col-sm-2 has-success">
                    <b><?php echo tgl_indo($invoice->invoice_expired); ?></b>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Total :</label>
                    <div class="col-sm-2 has-success">
                    <b>Rp. <?php echo number_format($invoice->invoice_total); ?>,-</b>
                    </div>                
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label col-sm-2">Tanggal Transfer :</label>                         
                    <div class="col-sm-3 has-success">
                    <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="<?php echo date('Y-m-d'); ?>" name="tgl_transfer" id="tgl_transfer" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Paid ? :</label>
                    <div class="col-sm-3 has-success">        
                    <input type="checkbox" required name="chkPaid" id="chkPaid" value="1" <?php if ($invoice->invoice_status==1) { echo "checked"; } ?>> Yes
                    </div>
                </div>

                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                <a href="<?php echo site_url('panel/wirausaha/listinvoice/'.$this->uri->segment(4)); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                            
                </form>
                </div>
                </section>
                </div>
            </div>          
            
            </section>
            
        </div>
    </div>
</section>