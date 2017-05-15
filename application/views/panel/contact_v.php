<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
            <header class="panel-heading">
            <i class="icon-edit"></i> Form Contact
            </header>

        <!-- Mulai Form -->
        <div class="row">
            <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                Detail Data Contact
                </header>
                            
            <div class="panel-body">
            <form class="form-horizontal tasi-form" action="<?php echo site_url('panel/contact/updatedata'); ?>" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            
            <div class="form-group">
                <label class="control-label col-sm-2">Contact Name :</label>
                <div class="col-sm-6 has-success">
               <input type="text" name="name" class="form-control" id="name" placeholder="Enter Contact Name" value="<?php echo $contact->contact_name; ?>" autocomplete="off" required="true" autofocus>
                </div>                
            </div>                     

            <div class="form-group">
                <label class="control-label col-sm-2">Contact Address :</label>
                <div class="col-sm-6 has-success">
               <input type="text" name="address" class="form-control" id="address" placeholder="Enter Contact Address" value="<?php echo $contact->contact_address; ?>" autocomplete="off" required="true">
                </div>                
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Contact Phone :</label>
                <div class="col-sm-6 has-success">
               <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Contact Phone" value="<?php echo $contact->contact_phone; ?>" autocomplete="off" required="true">
                </div>                
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Contact Fax :</label>
                <div class="col-sm-6 has-success">
               <input type="text" name="fax" class="form-control" id="fax" placeholder="Enter Contact Fax" value="<?php echo $contact->contact_fax; ?>" autocomplete="off" required="true">
                </div>                
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Contact Email :</label>
                <div class="col-sm-6 has-success">
               <input type="email" name="email" class="form-control" id="email" placeholder="Enter Contact Email" value="<?php echo $contact->contact_email; ?>" autocomplete="off">
                </div>                
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Contact Website :</label>
                <div class="col-sm-6 has-success">
               <input type="text" name="web" class="form-control" id="web" placeholder="Enter Contact Website" value="<?php echo $contact->contact_web; ?>" autocomplete="off">
                </div>                
            </div>
                       
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
            <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-share-alt"></span> Reset</button>
                                        
            </form>
            </div>
            </section>
            </div>
        </div>
        <!-- Akhir Form -->
            
            </section>
        </div>
    </div>
</section>