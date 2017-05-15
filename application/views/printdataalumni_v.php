<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/logoumk.ico">
<title>Cetak Data Alumni</title>
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
    <td height="63" align="center" class="judul"><h1>BIODATA ALUMNI</h1></td>    
  </tr>
</table>
<hr size="5" style="color:black" noshade="noshade" />
<hr size="1" style="color:black" noshade="noshade" />
<table class="judul" width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="4%" class="judul"></td>
    <td width="29%" class="judul">Nama Mahasiswa</td>
    <td width="2%" class="judul">:</td>
    <td width="65%" class="judul"><?php echo strtoupper($akun->alumni_nama); ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">N.I.M</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->alumni_nim; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Fakultas/Progdi</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->fakultas_name; ?>, <?php echo $akun->progdi_name; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Tempat, Tanggal Lahir</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->alumni_tmpt_lhr; ?>, <?php echo tgl_indo($akun->alumni_tgl_lhr); ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Jenis Kelamin</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->alumni_jk; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Status</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->alumni_status_hidup; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Agama</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->alumni_agama; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Alamat</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->alumni_alamat; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">No. Telp/HP</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->alumni_hp; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Email</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->alumni_email; ?></td>
  </tr>  
  <tr>
    <td class="judul"></td>
    <td class="judul">Nama Orang Tua</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->alumni_ortu; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Pekerjaan Orang Tua</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->alumni_kerja_ortu; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Alamat Orang Tua</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $akun->alumni_alamat_ortu; ?></td>
  </tr>
  <tr>
    <th class="judul" colspan="4">KEGIATAN : <?php echo strtoupper($akun->kegiatan_desc); ?></th>    
  </tr>
  <?php if ($akun->kegiatan_id == 1) { 
      if (!empty($perusahaan->perusahaan_id)) {
  ?>
  <tr>
    <td class="judul"></td>
    <td class="judul">Nama Perusahaan</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $perusahaan->perusahaan_name; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Alamat Perusahaan</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $perusahaan->perusahaan_alamat; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Posisi</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $perusahaan->perusahaan_posisi; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Website</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $perusahaan->perusahaan_web; ?></td>
  </tr>
  <?php } 
  } 
  ?>
  <?php if ($akun->kegiatan_id == 2) { 
      if (!empty($sekolah->sekolah_id)) {
  ?>
  <tr>
    <td class="judul"></td>
    <td class="judul">Nama Universitas</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $sekolah->sekolah_name; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Alamat Universitas</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $sekolah->sekolah_alamat; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Jenjang</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $sekolah->sekolah_jenjang; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Jurusan</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $sekolah->sekolah_jurusan; ?></td>
  </tr>
  <?php }
  } ?>
  <?php if ($akun->kegiatan_id == 3) { 
      if (!empty($usaha->usaha_id)) {
  ?>
  <tr>
    <td class="judul"></td>
    <td class="judul">Nama Usaha</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $usaha->usaha_name; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Alamat</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $usaha->usaha_alamat; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Website</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $usaha->usaha_web; ?></td>
  </tr>
  <tr>
    <td class="judul"></td>
    <td class="judul">Bidang Usaha</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $usaha->usaha_bidang; ?></td>
  </tr>
  <?php }
  } ?>  
</table>
	<br /><br />
    <em>Last Update : <?php echo $akun->alumni_tgl_update.' '.$akun->alumni_jam_update; ?></em><br />
    <em>printed : <?php echo date('Y-m-d H:i:s'); ?></em>
</div>

</body>
</html>