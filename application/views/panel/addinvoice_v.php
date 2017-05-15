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
                    Nama Alumni : <?php echo $wirausaha->alumni_nama; ?><br>
                    Email : <?php echo $wirausaha->alumni_email; ?>                                                         
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
            <i class="icon-plus-sign-alt"></i> Add New Invoice
            </header>
                
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/wirausaha/savedatainvoice/'.$this->uri->segment(4)); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            
                    <input type="hidden" name="email" value="<?php echo $wirausaha->alumni_email; ?>" />
                    <input type="hidden" name="nama" value="<?php echo $wirausaha->alumni_nama; ?>" />

                    <div class="form-group">
                        <label class="control-label col-sm-2">No. Invoice :</label>
                        <div class="col-sm-1">
                        <input type="text" name="urut" class="form-control" id="urut" placeholder="Enter No. Invoice" value="#<?php echo $urut; ?>" readonly>
                        </div>                       
                    </div>              

                    <div class="form-group">
                        <label class="col-sm-2 control-label col-sm-2">Tgl. Invoice :</label>                         
                        <div class="col-sm-2 has-success">
                        <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="<?php echo date('Y-m-d'); ?>" name="tgl_invoice" id="tgl_invoice" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label col-sm-2">Tgl. Expired :</label>                         
                        <div class="col-sm-2 has-success">
                        <?php
                            $StartingDate = date('Y-m-d');
                            $newEndingDate = date('Y-m-d', strtotime(date('Y-m-d', strtotime($StartingDate)).'+ 365 days'));
                        ?>
                        <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="<?php echo $newEndingDate; ?>" name="tgl_expired" id="tgl_expired" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Total :</label>
                        <div class="col-sm-2">
                        <input type="text" name="total" class="form-control" id="urut" placeholder="Enter Total" value="50000" autocomplete="off">
                        </div>                       
                        <?php echo form_error('total', '<div class="form-group has-error"><p class="help-block">','</p></div>'); ?>
                    </div> 

                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                    <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                    <a href="<?php echo site_url('panel/wirausaha/listinvoice/'.$this->uri->segment(4)); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
                                                
                    </form>                       
                </div>

            </section>           
        </div>
	</div>
</section>