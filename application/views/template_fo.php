<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/logoumk.ico">
    <meta name="keywords" content="Muria, Kudus, Universitas, UMK, Alumni, Wisuda, Pendaftaran, Online">    
    <meta name="description" content="Website Tracer Alumni dan Wisuda Universitas Muria Kudus">    
    <meta name="Developer" content="Jama' Rochmad M">
    <meta name="Author" content="alumni.umk.ac.id">
    <meta name="robots" content="all" />
    <meta name="robots" content="index, follow" />
    <meta name="Googlebot" content="index,follow" />

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>file_fo/assets/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>file_fo/assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>file_fo/assets/css/selectize.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>file_fo/assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>file_fo/assets/css/vanillabox/vanillabox.css" type="text/css">    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>file_fo/assets/css/prettyPhoto.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>file_fo/assets/css/style.css" type="text/css">    

    <title>Alumni Tracer | Universitas Muria Kudus</title>

</head>

<?php if ($this->uri->segment(1) == '') { ?>
<body class="page-homepage-carousel">
<?php } elseif ($this->uri->segment(1) <> '' && $this->uri->segment(1) <> 'login' && $this->uri->segment(2) <> 'id') { ?>
<body class="page-sub-page page-blog-listing">
<?php } elseif ($this->uri->segment(1) <> '' && $this->uri->segment(1) <> 'login' && $this->uri->segment(2) == 'id') { ?>
<body class="page-sub-page page-blog-detail">
<?php } elseif ($this->uri->segment(1) <> '' && $this->uri->segment(1) == 'login') { ?>
<body class="page-sub-page page-register-sign-in">
<?php } ?>
<!-- FB -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- FB -->

<!-- Wrapper -->
<div class="wrapper">
<!-- Header -->
<?php echo $_header; ?>
<!-- end Header -->

<!-- Page Content -->
<?php echo $content; ?>
<!-- end Page Content -->

<!-- Footer -->
<footer id="page-footer">
    <?php echo $_footer; ?>
</footer>
<!-- end Footer -->

</div>
<!-- end Wrapper -->

<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/selectize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/jQuery.equalHeights.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/jquery.vanillabox-0.1.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/custom.js"></script>

<!-- Photo -->
<script src="<?php echo base_url(); ?>file_fo/assets/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>file_fo/assets/js/jquery.mixitup.min.js"></script>
<script type="text/javascript">
(function($) {
"use strict";
$("a[rel^='prettyPhoto']").prettyPhoto({theme:'dark_rounded'});
  $('.portfolio').mixitup({
    targetSelector: '.item',
    transitionSpeed: 450,
  });
})(jQuery);
</script>
<!-- Photo -->

<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-59838993-3', 'auto');
      ga('send', 'pageview');

</script>

<?php if (($this->uri->segment(1) == 'statistik')) { ?> 
        <script src="http://code.highcharts.com/adapters/standalone-framework.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        
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