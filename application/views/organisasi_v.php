<section class="wrapper">
    <section>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row invoice-list">
            
                <div class="col-lg-12">
                    <h4 align="center">
                    PENGALAMAN AKADEMIK DAN NON AKADEMIK
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
            <form class="form-horizontal tasi-form" action="<?php echo site_url('organisasi/insertdata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            

            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Kendala dalam menyelesaikan Studi :</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="kendala" id="kendala" rows="6"></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Metode Pembelajaran yang perlu ditingkatkan :</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="metode" id="metode" rows="6"></textarea>
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
            <form class="form-horizontal tasi-form" action="<?php echo site_url('organisasi/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">            
            <input type="hidden" name="akademik_id" value="<?php echo $detail->akademik_id; ?>" />

            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Kendala dalam menyelesaikan Studi :</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="kendala" id="kendala" rows="6"><?php echo $detail->akademik_kendala; ?></textarea>
                </div>                
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label col-sm-2">Metode Pembelajaran yang perlu ditingkatkan :</label>
                <div class="col-sm-10">
                <textarea class="form-control ckeditor" name="metode" id="metode" rows="6"><?php echo $detail->akademik_metode; ?></textarea>
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

    <!-- Data Organisasi -->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-tasks"></i> Organisasi List
            </header>
                
                <div class="panel-body">
                    <a href="#myAddData" data-toggle="modal" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add Data</a>
                    <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th width="6%">No</th>
                        <th>Nama Organisasi</th>
                        <th width="13%">Tahun</th>
                        <th width="13%">Kota</th>
                        <th width="20%">Jabatan</th>                        
                        <th class="hidden-phone" width="10%">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $no = 1; foreach($data_organisasi as $r) { ?>
                    <tr class="gradeA">
                        <td><?php echo $no; ?></td>
                        <td><? echo $r->organisasi_nama; ?></td>
                        <td><? echo $r->organisasi_tahun; ?></td>
                        <td><? echo $r->organisasi_kota; ?></td>
                        <td><? echo $r->organisasi_jabatan; ?></td>                        
                        <td class="center hidden-phone">
                        <a href="#myEditData" data-toggle="modal" type="button" class="btn btn-primary btn-xs edit_button_organisasi" data-id="<?php echo $r->organisasi_id; ?>" data-nama="<?php echo $r->organisasi_nama; ?>" 
                            data-tahun="<?php echo $r->organisasi_tahun; ?>" data-kota="<?php echo $r->organisasi_kota; ?>" data-jabatan="<?php echo $r->organisasi_jabatan; ?>" title="Edit">
                            <i class="icon-pencil"></i>
                            </a>
                        <a href="<?php echo site_url('organisasi/deletedata/'.$r->organisasi_id); ?>" OnClick="return confirm('Yakin Hapus Data Ini ?')" /><button class="btn btn-danger btn-xs" title="Delete"><i class="icon-trash "></i></button></a>
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

            </section>
        </div>
    </div>

    <!-- Form Add Data Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myAddData" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Form Add Data Organisasi</h4>
                </div>
                                
                <div class="modal-body">
                    <form role="form" method="post" action="<?php echo site_url('organisasi/savedata'); ?>">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    
                    <div class="form-group">
                        <label for="nama">Nama Organisasi :</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama Organisasi" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun :</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Enter Tahun" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota :</label>
                        <input type="text" class="form-control" id="kota" name="kota" placeholder="Enter Kota" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan :</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Enter Jabatan" autocomplete="off" required>
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
                    <h4 class="modal-title">Form Edit Data Organisasi</h4>
                </div>
                                
                <div class="modal-body">
                    <form role="form" method="post" action="<?php echo site_url('organisasi/updatedataorganisasi'); ?>">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                                    

                    <div class="form-group">
                        <input class="form-control" type="hidden" name="organisasi_id" id="organisasi_id">
                        <label for="nama">Nama Organisasi :</label>                                            
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama Organisasi" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun :</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Enter Tahun" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota :</label>
                        <input type="text" class="form-control" id="kota" name="kota" placeholder="Enter Kota" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan :</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Enter Jabatan" autocomplete="off" required>
                    </div>                    

                    <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Data Modal -->

</section>        