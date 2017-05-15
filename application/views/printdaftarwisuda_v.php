<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/logoumk.ico">
<title>Cetak Bukti Pendaftaran Wisuda</title>
<style type="text/css">
	Table {border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;font-family: "Times New Roman", Times, serif;font-size: 14px;}	
		.judul {border-width: 0px;border-style: none;font-family: "Times New Roman", Times, serif;font-size: 15px; padding:5px;}
	Th {border-width: 1px;padding: 3px;border-style: solid;border-color: black; font-family: "Times New Roman", Times, serif; font-size:14px}
	
	Td {border-width: 1px;padding: 3px;border-style: solid;border-color: black; font-family: "Times New Roman", Times, serif; font-size:14px}
	.odd  { background-color:#ffffff; }
	.even { background-color:#dddddd; }
</style>

<style type="text/css">
	body{font-family: "Times New Roman", Times, serif; font-size:14px}
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
		/*box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); */
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
<a href="#Print"><img src="<?php echo base_url(); ?>img/print_icon.gif" height="36" width="32" title="Print" id="print-link" onClick="window.print(); return false;" /></a>
<div class="page">
<table class="judul" width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
  <td colspan="2" class="judul" align="left">alumni.umk.ac.id</td>
  </tr>
  <tr>
    <td height="63" align="center" class="judul"><h1>BIODATA PESERTA WISUDA<br /><?php echo strtoupper(tgl_indo($detailwisuda->wisuda_periode)); ?></h1></td>
    <td width="18%" rowspan="2" class="judul" align="center"><?php if (!empty($detailwisuda->alumni_foto)) { ?><img src="<?php echo base_url(); ?>foto/<?php echo $detailwisuda->alumni_foto; ?>" height="120px" width="100px"  /><?php } else { ?><img src="<?php echo base_url(); ?>foto/no_photo.jpg" height="100px" width="80px" /><?php } ?></td>
  </tr>
  <tr>
    <td height="33" align="center" class="judul"><h2><?php echo strtoupper($detailwisuda->wisuda_info); ?></h2></td>
    </tr>
</table>
<hr size="5" style="color:black" noshade="noshade" />
<hr size="1" style="color:black" noshade="noshade" />
<table class="judul" width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2" class="judul">No. Pendaftaran Wisuda</td>
    <td class="judul">:</td>
    <td class="judul"><b>#<?php echo $detailwisuda->wisuda_id; ?></b>, <?php echo tgl_indo($detailwisuda->wisuda_tgl_daftar); ?></td>
  </tr>
  <tr>
    <td width="4%" class="judul">1.</td>
    <td width="29%" class="judul">Nama Mahasiswa</td>
    <td width="2%" class="judul">:</td>
    <td width="65%" class="judul"><?php echo strtoupper($detailwisuda->alumni_nama); ?></td>
  </tr>
  <tr>
    <td class="judul">2.</td>
    <td class="judul">N.I.M</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $detailwisuda->alumni_nim; ?></td>
  </tr>
  <tr>
    <td class="judul">3.</td>
    <td class="judul">Fakultas/Progdi</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $detailwisuda->fakultas_name; ?>, <?php echo $detailwisuda->progdi_name; ?></td>
  </tr>
  <tr>
    <td class="judul">4.</td>
    <td class="judul">Tempat, Tanggal Lahir</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $detailwisuda->alumni_tmpt_lhr; ?>, <?php echo tgl_indo($detailwisuda->alumni_tgl_lhr); ?></td>
  </tr>
  <tr>
    <td class="judul">5.</td>
    <td class="judul">Agama</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $detailwisuda->alumni_agama; ?></td>
  </tr>
  <tr>
    <td class="judul">6.</td>
    <td class="judul">Alamat</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $detailwisuda->alumni_alamat; ?></td>
  </tr>
  <tr>
    <td class="judul">7.</td>
    <td class="judul">No. Telp/HP</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $detailwisuda->alumni_hp; ?></td>
  </tr>
  <tr>
    <td class="judul">8.</td>
    <td class="judul">Email</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $detailwisuda->alumni_email; ?></td>
  </tr>
  <tr>
    <td class="judul" valign="top">9.</td>
    <td class="judul" valign="top">Judul Skripsi/Proyek Akhir/Tesis</td>
    <td class="judul" valign="top">:</td>
    <td class="judul" valign="top"><b><?php echo $detailwisuda->wisuda_judulproyek; ?></b></td>
  </tr>
  <tr>
    <td class="judul">10.</td>
    <td class="judul">Nama Pasangan/Orang Tua</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $detailwisuda->alumni_ortu; ?></td>
  </tr>
  <tr>
    <td class="judul">11.</td>
    <td class="judul">Pekerjaan Pasangan/Orang Tua</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $detailwisuda->alumni_kerja_ortu; ?></td>
  </tr>
  <tr>
    <td class="judul">12.</td>
    <td class="judul">Alamat Pasangan/Orang Tua</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $detailwisuda->alumni_alamat_ortu; ?></td>
  </tr>
</table>
<br />
<table class="judul" width="100%" border="0" cellspacing="2" cellpadding="2" align="center">
  <tr>
    <td width="69%" class="judul">&nbsp;</td>
    <td width="31%" class="judul"><div align="center">Kudus, <?php echo tgl_indo(date('Y-m-d')); ?><br /><br /><br /><br /><br />( <b><?php echo $detailwisuda->alumni_nama; ?></b> )</div></td>
  </tr>
</table>

	<div align="left" style="font-size:15px">
    	<b>Catatan :</b>
        <ol>
             <li>Pengisian data harus yang sebenarnya, agar tidak terjadi masalah dikemudian hari.</li>
             <li>Lampirkan foto copy ijazah terakhir dilegalisir 1 lembar.</li>
             <li>Lampirkan foto copy judul Skripsi/Proyek Akhir/Tesis 1 lembar.</li>
             <li>Lampirkan foto copy Sertifikat Keterampilan Wajib, khusus angkatan >=2001. (* hanya untuk Calon Wisuda Sarjana)</li>
             <li>Lampirkan pas foto hitam putih, memakai kemeja putih, berdasi dan berjas almamater ukuran 3 x 4 cm sebanyak 4 lembar.</li>
		</ol>          
	</div>
    <br />
    <br />
    <br />
    <em>printed : <?php echo date('Y-m-d H:i:s'); ?></em>
</div>

</body>
</html>

<?php
/* End of file welcome.php */
/* Location: ./application/views/adm/r_print_dko.php */
?>