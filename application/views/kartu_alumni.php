<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/logo_umk.jpg">
<title>Cetak Kartu Alumni</title>
<style type="text/css">
	body{}
	.page {
		width: 21cm;
		min-height: 29.7cm;		
	}
	
	.img {
		position: relative;
		width: 360px;
		height: = 220px;		
	}
	
	.text {
		font-family: "Century Gothic", Arial; font-size: 15px;
		position: absolute;
		right: 10px;
		bottom: 20px;
		text-align: right;
		color: #FFFFFF;	
	}
</style>

<style>
@media print{
	#comments_controls,
	#print-link{
		display:none;
	}
}
</style>
</head>

<body>
<div class="page">
	<div class="img">
    	<img src="<?php echo base_url(); ?>img/kartu.jpg"  />
        <span class="text">
            <b><?php echo strtoupper($detail->alumni_nama); ?></b><br />
            <b><?php echo $detail->alumni_nim; ?></b>
        </span>
    </div>
    <a href="#Print">
<img src="<?php echo base_url(); ?>img/print_icon.gif" height="36" width="32" title="Print" id="print-link" onClick="window.print(); return false;" />
</a>
</div>

</body>
</html>