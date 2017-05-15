<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ID">
<head>

<meta name="keyword" content="">
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/logoumk.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alumni Tracer | Universitas Muria Kudus</title>
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/bootstrap-reset.css" rel="stylesheet">
<!--Font Awesome-->
<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.css" type="text/css">
<!-- FileUpload -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<!-- Data Tabel -->
<link href="<?php echo base_url(); ?>assets/data-table/css/demo_page.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/data-table/css/demo_table.css" rel="stylesheet" />
<!-- Datepicker -->
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datepicker/css/daterangepicker-bs3.css" /> -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery-ui.theme.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery-ui.structure.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery-ui.min.css">

<!-- Custom styles for this template -->
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />
</head>

<body>

        <section id="container" >
            <!--header start-->
            <header class="header white-bg">
            <?php echo $_header; ?>
            </header>
            <!--header end-->
            
            <!--sidebar start-->
            <aside>
            <?php echo $_left_menu; ?>
            </aside>
            <!--sidebar end-->
            
            <!--main content start-->
        	<section id="main-content">
        	<?php echo $content; ?>
        	</section>
            <!--main content end-->
            
            <!--footer start-->
            <footer class="site-footer">
             <?php echo $_footer; ?>
        	</footer>
            <!--footer end-->
        </section>


	<!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/owl.carousel.js" ></script>
    <script src="<?php echo base_url(); ?>js/jquery.customSelect.min.js" ></script>
    <script src="<?php echo base_url(); ?>js/respond.min.js" ></script>
	
    <!-- File Upload -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

    <!-- Date Picker -->
    <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/js/moment.min.js"></script>
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/js/daterangepicker.js"></script> -->

    <!-- Advance Form (Date Picker) -->
    <!-- <script src="<?php echo base_url(); ?>js/advanced-form-components.js"></script> -->

    <script src="<?php echo base_url(); ?>public/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery.number.min.js"></script>

    <script>
    $(function() {
        $( ".datepicker" ).datepicker({            
            changeMonth: true,
            changeYear: true,
            yearRange: "-60:+0",
        });
        $( ".datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );      
    })
    </script>
    <!-- CKEditor -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js" charset="utf-8"></script>    
    <!-- Data Tabel -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/data-table/js/jquery.dataTables.js">		
    </script>
    <!-- Data Table Grid Data -->
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#example').dataTable( {
          "aaSorting": [[ 0, "asc" ]],
          "sPaginationType": "full_numbers"
        } );
      } );
    </script>
    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>js/common-scripts.js"></script>    
  	<!-- Form -->
  	<script src="<?php echo base_url(); ?>js/form-component.js"></script> 

    <script type="text/javascript">
        $("#fakultas_id").change(function(){            
        var fakultas_id = $("#fakultas_id").val();
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('wisuda/select_progdi'); ?>",
                data: {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>', fakultas_id:fakultas_id},
                success: function(msg){
                    $('#progdi').html(msg);
                }
            });
        });
        </script>

    <script type="text/javascript">
        (function($, document) {
            $(document).on("click", ".edit_button_transisi", function () {
            var myKursusID = $(this).data('id');
            var myKursusNama = $(this).data('nama');
            var myKursusAlamat = $(this).data('alamat');
            var myKursusDari = $(this).data('dari');
            var myKursusSampai = $(this).data('sampai');
            var myKursusMateri = $(this).data('materi');
            var myKursusDonatur = $(this).data('donatur');               

            $(".form-group #kursus_id").val(myKursusID);
            $(".form-group #nama").val(myKursusNama);
            $(".form-group #alamat").val(myKursusAlamat);
            $(".form-group #tahun1").val(myKursusDari); 
            $(".form-group #tahun2").val(myKursusSampai); 
            $(".form-group #materi").text(myKursusMateri); 
            $(".form-group #donatur").val(myKursusDonatur);     
        })
    })(jQuery, document)        
    </script>

    <script type="text/javascript">
        (function($, document) {
            $(document).on("click", ".edit_button_organisasi", function () {
            var myOrganisasiID = $(this).data('id');
            var myOrganisasiNama = $(this).data('nama');
            var myOrganisasiTahun = $(this).data('tahun');
            var myOrganisasiKota = $(this).data('kota');
            var myOrganisasiJabatan = $(this).data('jabatan');            

            $(".form-group #organisasi_id").val(myOrganisasiID);
            $(".form-group #nama").val(myOrganisasiNama);
            $(".form-group #tahun").val(myOrganisasiTahun);
            $(".form-group #kota").val(myOrganisasiKota); 
            $(".form-group #jabatan").val(myOrganisasiJabatan);             
        })
    })(jQuery, document)        
    </script> 
  
</body>
</html>