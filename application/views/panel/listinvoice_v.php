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
                    Website : <a href="http://<?php echo $wirausaha->usaha_web; ?>" target="_blank"><?php echo $wirausaha->usaha_web; ?></a><br />
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
            <i class="icon-th"></i> Invoice List
            </header>
                
                <div class="panel-body">
                    <a href="<?php echo site_url('panel/wirausaha/addinvoice/'.$this->uri->segment(4)); ?>"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add Invoice</button></a>                    
                    <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="10%">#Invoice</th>
                        <th width="15%">Tgl. Invoice</th>
                        <th width="15%">Tgl. Expired</th>
                        <th width="20%">Total</th>
                        <th width="10%">Status</th>                        
                        <th width="15%">Tgl. Konfirm</th>                        
                        <th width="10%" class="hidden-phone">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach($daftar_invoice as $r) { ?>
                    <tr class="gradeA">
                        <td><? echo $r->invoice_id; ?></td>
                        <td><? echo tgl_indo($r->invoice_tanggal); ?></td>
                        <td><? echo tgl_indo($r->invoice_expired); ?></td>
                        <td><? echo number_format($r->invoice_total); ?></td>
                        <td align="center"><span class="label label-danger label-mini"><b><? if ($r->invoice_status==1) { echo "Paid"; } else { echo "Unpaid"; } ?></b></span></td>
                        <td><? echo tgl_indo($r->invoice_tgl_bayar); ?></td>                        
                        <td class="center hidden-phone">
                            <a href="<?php echo site_url('panel/wirausaha/editinvoice/'.$this->uri->segment(4).'/'.$r->invoice_id); ?>"><button class="btn btn-primary btn-xs" title="Edit"><i class="icon-pencil"></i></button></a>
                            <a href="<?php echo site_url('panel/wirausaha/deletedatainvoice/'.$this->uri->segment(4).'/'.$r->invoice_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
                        </td>                    
                    </tr>
                    <? } ?>
                    </tbody>
                    
                    <tfoot>
                    </tfoot>
                    </table>
                    </div>                    
                </div>

            </section>
            <a href="<?php echo site_url('panel/wirausaha'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> Back </a>
        </div>
	</div>
</section>