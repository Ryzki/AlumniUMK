<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
	Table {border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;font-family: "Times New Roman", Times, serif;font-size: 14px;}	
		.judul {border-width: 0px;border-style: none;font-family: "Times New Roman", Times, serif;font-size: 13px; padding:5px;}
	Th {border-width: 1px;padding: 3px;border-style: solid;border-color: black; font-family: "Times New Roman", Times, serif; font-size:14px}
	
	Td {border-width: 1px;padding: 3px;border-style: solid;border-color: black; font-family: "Times New Roman", Times, serif; font-size:14px}
	.odd  { background-color:#ffffff; }
	.even { background-color:#dddddd; }
</style>

<style type="text/css">
	body{font-family: "Times New Roman", Times, serif; font-size:12px}
	h1{font-size:18px}
	h2{font-size:12px}
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
</head>

<body>
<div class="page">
<table class="judul" width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
  <td class="judul" align="left">alumni.umk.ac.id</td>
  </tr>
  <tr>
    <td height="63" align="center" class="judul"><h1>BUKTI PENGISIAN KUESIONER<br />
    </h1></td>
    </tr>
  </table>
<hr size="1" style="color:black" noshade="noshade" />
<table class="judul" width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="4%" class="judul">1.</td>
    <td width="29%" class="judul">Nama Mahasiswa</td>
    <td width="2%" class="judul">:</td>
    <td width="65%" class="judul"><?php echo strtoupper($alumni->alumni_nama); ?></td>
  </tr>
  <tr>
    <td class="judul">2.</td>
    <td class="judul">N.I.M</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $alumni->alumni_nim; ?></td>
  </tr>
  <tr>
    <td class="judul">3.</td>
    <td class="judul">Fakultas, Program Studi</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $alumni->fakultas_name; ?>, <?php echo $alumni->progdi_name; ?></td>
  </tr>
  <tr>
    <td class="judul">7.</td>
    <td class="judul">No. Telp/HP</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $alumni->alumni_hp; ?></td>
  </tr>
  <tr>
    <td class="judul">8.</td>
    <td class="judul">Email</td>
    <td class="judul">:</td>
    <td class="judul"><?php echo $alumni->alumni_email; ?></td>
  </tr>
  <tr>
    <td colspan="4" class="judul">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" class="judul">Telah melakukan pengisian kuesioner Dikti melalui website alumni.umk.ac.id pada Tanggal : <?php echo tgl_indo($detail->dikti_date_update); ?></td>
    </tr>
  </table>
<br />
<table class="judul" width="100%" border="0" cellspacing="2" cellpadding="2" align="center">
  <tr>
    <td width="60%" class="judul">
      <div align="center">
      Mengetahui, <br />Ka. PKPA UMK<br />
      <img src="<?php echo base_url(); ?>img/ttd.jpg" width="70" />
      <br />
      <b>Muhammad Arifin, M.Kom</b><br />
      <b>NIDN : 0621048301</b>
      </div>
    </td>
    <td width="40%" class="judul">
    <div align="center">Kudus, <?php echo tgl_indo(date('Y-m-d')); ?><br /><br /><br /><br /><br />( <b><?php echo $alumni->alumni_nama; ?></b> )</div>
    </td>
  </tr>
</table>

	<div align="left" style="font-size:15px">
    	<b>Catatan :</b>
        <ol>
             <li>Dokumen ini sebagai bukti pengisian kuesioner oleh Alumni yang bersangkutan.</li>
             <li>Sebagai syarat pengambilan ijazah.</li>
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
/* Location: ./application/views/printdaftarwisuda_pdf_v.php */
?>