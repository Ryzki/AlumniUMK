<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/logoumk.ico">
<title>Cetak Wisuda</title>
<style type="text/css">
	Table {border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;font-family: "Calibri";font-size: 14px;}	
		.judul {border-width: 0px;border-style: none;font-family: Calibri;font-size: 14px;}
	Th {border-width: 1px;padding: 3px;border-style: solid;border-color: black; font-family: Calibri; font-size:14px}
	
	Td {border-width: 1px;padding: 3px;border-style: solid;border-color: black; font-family: Calibri; font-size:14px}
	.odd  { background-color:#ffffff; }
	.even { background-color:#dddddd; }
</style>

<style type="text/css">
	body{font-family: "Calibri"; font-size:14px}
	
	h1{font-size:20px}
  h2{font-size:15px}

	.page {
		width: 21cm;
		min-height: 29.7cm;
		padding: 0.5cm;
		margin: 0.1cm auto;
		border: 0.3px #D3D3D3 none;
		border-radius: 2px;
    background: white;		
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
<a href="#Print">
<img src="<?php echo base_url(); ?>img/print_icon.gif" height="36" width="32" title="Print" id="print-link" onClick="window.print(); return false;" />
</a>
<?php 
  $progdi_id = $this->uri->segment(4);
  $nama_progdi = $this->laporan_model->select_progdi2($progdi_id)->row();
?>
<div class="page">
  <div align="center"><h1>LAPORAN DATA WISUDA<br>
  UNIVERSITAS MURIA KUDUS</h1></div>
  <div align="center">PROGRAM STUDI : <b><?php echo strtoupper($nama_progdi->progdi_name); ?></b></div>
  <div align="center">PERIODE WISUDA : <b><?php echo tgl_indo($this->uri->segment(5)); ?> s/d <?php echo tgl_indo($this->uri->segment(6)); ?></b></div>
  <br>
  <br>
  <table class="judul" width="100%" cellspacing="0" cellpadding="0">
    <tr>
      <th width="5%">No</th>
      <th width="10%">Tgl. Daftar</th>
      <th width="10%">N I M</th>
      <th>Nama Alumni</th>
      <th width="15%">No. HP</th>
      <th width="15%">Fakultas</th>
      <th width="15%">Progdi</th>
      <th width="10%">Status</th>
    </tr>
    
    <?php $no = 1; foreach($preview as $p) { ?>
    <tr>
      <td align="center"><?php echo $no; ?></td>
      <td align="center"><?php echo $p->wisuda_tgl_daftar; ?></td>
      <td align="center"><?php echo $p->alumni_nim; ?></td>
      <td><?php echo strtoupper($p->alumni_nama); ?></td>
      <td align="center"><?php echo $p->alumni_hp; ?></td>
      <td align="center"><?php echo $p->fakultas_name; ?></td>
      <td align="center"><?php echo $p->progdi_name; ?></td>
      <td align="center"><b><?php echo $p->wisuda_status; ?></b></td>
    </tr>
    <?php $no++; } ?>
  </table>
</div>

</body>
</html>