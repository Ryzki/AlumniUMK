<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="keyword" content="">
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/logoumk.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel Admin</title>

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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datepicker/css/daterangepicker-bs3.css" />

<!-- Custom styles for this template -->
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/js/moment.min.js"></script>
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/js/daterangepicker.js"></script>
    <!-- Advance Form (Date Picker) -->
    <script src="<?php echo base_url(); ?>js/advanced-form-components.js"></script>    

    <!-- CKEditor -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js" charset="utf-8"></script>    
  
    <!-- Data Tabel -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/data-table/js/jquery.dataTables.js">		
    </script>
    
    <!-- Data Table Grid Data -->
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#example').dataTable( {
          "aaSorting": [[ 0, "asc" ]]
        } );
      } );
    </script>    
    
    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>js/common-scripts.js"></script>    
  	<!-- Form -->
  	<script src="<?php echo base_url(); ?>js/form-component.js"></script>

    <?php 
    if (($this->uri->segment(2) == 'lap_statistik')) { ?> 
        <script src="<?php echo base_url(); ?>file_fo/highchart/standalone-framework.js"></script>
        <script src="<?php echo base_url(); ?>file_fo/highchart/highcharts.js"></script>
        <script src="<?php echo base_url(); ?>file_fo/highchart/exporting.js"></script>
        
        <script>
            /* Serapan Alumni */ 
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'canvasserapan',
                    type: 'column'
                },

                title: {
                    text: 'Grafik Tingkat Keserapan Alumni'
                },
                
                xAxis: {
                    categories: <?php echo $labelserapan; ?>
                },

                yAxis: {
                    title: {
                       text: 'Jumlah'
                    }
                },

                series: [{
                    name: 'Jenis Kegiatan',
                    data: <?php echo $jumlahserapan; ?>
                }]

            });

            /* Skala Alumni */
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'canvasskala',
                    type: 'column'
                },

                title: {
                    text: 'Grafik Kesesuaian Bidang Ilmu'
                },
                
                xAxis: {
                    categories: <?php echo $labelskala; ?>
                },

                yAxis: {
                    title: {
                       text: 'Jumlah'
                    }
                },

                series: [{
                    name: 'Skala Relevansi',
                    data: <?php echo $jumlahskala; ?>
                }]

            });

            /* Gaji Alumni */ 
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'canvasgaji',
                    type: 'column'
                },

                title: {
                    text: 'Grafik Gaji Alumni'
                },
                
                xAxis: {
                    categories: <?php echo $labelgaji; ?>
                },

                yAxis: {
                    title: {
                       text: 'Jumlah'
                    }
                },

                series: [{
                    name: 'Tingkat Gaji',
                    data: <?php echo $jumlahgaji; ?>
                }]

            });

            /* Jenis Perusahaan */ 
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'canvasjenis',
                    type: 'column'
                },

                title: {
                    text: 'Grafik Jenis Perusahaan '
                },
                
                xAxis: {
                    categories: <?php echo $labeljenis; ?>
                },

                yAxis: {
                    title: {
                       text: 'Jumlah'
                    }
                },

                series: [{
                    name: 'Jenis Perusahaan',
                    data: <?php echo $jumlahjenis; ?>
                }]

            });

            /* Lama Tunggu */ 
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'canvaslamatunggu',
                    type: 'column'
                },

                title: {
                    text: 'Grafik Daftar Lama Tunggu '
                },
                
                xAxis: {
                    categories: <?php echo $labeltunggu; ?>
                },

                yAxis: {
                    title: {
                       text: 'Jumlah Alumni'
                    }
                },

                series: [{
                    name: 'Lama Tunggu (Bulan)',
                    data: <?php echo $jumlahtunggu; ?>
                }]

            });

        </script>    
    <?php } ?>    
</body>
</html>