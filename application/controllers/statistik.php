<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistik extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_fo');
		$this->load->model('statistik_model');
		$this->load->model('menu_model');      
	}
	
	public function index() {		
		$data['progdi'] = $this->statistik_model->select_progdi()->result();

		// Per Kegiatan
		$data['daftar_kegiatan'] = $this->statistik_model->select_kegiatan()->result();
 		$kegiatan = $this->statistik_model->select_kegiatan()->result();
 		
 		$labelserapan_array  = array();
 		$jumlahserapan_array = array();        
 
		foreach ($kegiatan as $row) {
        	$labelserapan_array[]  = $row->kegiatan_desc;        	           
			$jumlahserapan_array[] = (int)$this->statistik_model->select_by_kegiatan($row->kegiatan_id)->row()->total;                
        }
 		
 		$data['labelserapan']  = json_encode($labelserapan_array);
	    $data['jumlahserapan'] = json_encode($jumlahserapan_array);
		// Akhir Kegiatan
		
		// Skala Relevansi
		$data['daftar_skala'] = $this->statistik_model->select_skala()->result();
		$skala = $this->statistik_model->select_skala()->result();

 		$labelskala_array  = array();
 		$jumlahskala_array = array();        
 
		foreach ($skala as $row) {
        	$labelskala_array[]  = $row->skala_desc;              
			$jumlahskala_array[] = (int)$this->statistik_model->select_by_skala($row->skala_id)->row()->total;                
        }
 		
 		$data['labelskala'] = json_encode($labelskala_array);
	    $data['jumlahskala'] = json_encode($jumlahskala_array);
		// Akhir Skala

		// Gaji ALumni
		$data['daftar_gaji'] = $this->statistik_model->select_gaji()->result();
		$gaji = $this->statistik_model->select_gaji()->result();

 		$labelgaji_array  = array();
 		$jumlahgaji_array = array();        
 
		foreach ($gaji as $row) {
        	$labelgaji_array[]  = $row->gaji_desc;              
			$jumlahgaji_array[] = (int)$this->statistik_model->select_by_gaji($row->gaji_id)->row()->total;                
        }
 		
 		$data['labelgaji']  = json_encode($labelgaji_array);
	    $data['jumlahgaji'] = json_encode($jumlahgaji_array);
		// Akhir Gaji

		// Jenis Perusahaan
		$data['daftar_jenis'] = $this->statistik_model->select_jenis()->result();
		$jenis = $this->statistik_model->select_jenis()->result();

 		$labeljenis_array  = array();
 		$jumlahjenis_array = array();        
 
		foreach ($jenis as $row) {
        	$labeljenis_array[]  = $row->jenis_desc;              
			$jumlahjenis_array[] = (int)$this->statistik_model->select_by_jenis($row->jenis_id)->row()->total;                
        }
 		
 		$data['labeljenis']  = json_encode($labeljenis_array);
	    $data['jumlahjenis'] = json_encode($jumlahjenis_array);
		// Akhir Jenis 		

	    // Lama Tunggu
		$daftar_alumni_kerja = $this->statistik_model->select_bekerja()->result(); // Data Alumni yang Bekerja		
		$alumni_by_month = array();

		foreach($daftar_alumni_kerja as $k) 
		{			
			$tgl_lulus = $k->alumni_tgl_lulus;
			$tgl_kerja = $k->perusahaan_tgl_masuk;

			$d1 = new DateTime($tgl_lulus);
			$d2 = new DateTime($tgl_kerja);
			$months = 0;

			$d1->add(new \DateInterval('P1M'));
			while ($d1 <= $d2)
			{				
			    $months ++; // Jumlah Lama Tunggu Bulan
			    $d1->add(new \DateInterval('P1M'));
			}
			if ($months == 0) continue;			

			// Cari Jumlah Alumni by Bulan Tunggu			
			if (!isset($alumni_by_month[$months]))
			{
				$alumni_by_month[$months] = 1;
			}
			else
			{
				$alumni_by_month[$months]++;
			}			

			$labelbulan_array[] = $months;
			$jumlahdata_array[] = (int)$alumni_by_month;
		}
		ksort($alumni_by_month);		

	    $data['labeltunggu'] = json_encode(array_keys($alumni_by_month)); // Nilai Bulan Lama Tunggu
		$data['jumlahtunggu'] = json_encode(array_values($alumni_by_month)); // Nilai Data per Bulan		
		// Akhir Lama Tunggu

		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
		$data['daftar_lowongan'] = $this->menu_model->select_lowongan()->result();			

    	$this->template_fo->display('statistik_v', $data);
	}

	public function statistik_by_progdi() {	
		$data['progdi'] = $this->statistik_model->select_progdi()->result();
		$progdi_id = $this->input->post('lstProgdi', 'true');
		$Tahun1 = $this->input->post('tahun1', 'true');
		$Tahun2 = $this->input->post('tahun2', 'true');

		$data['namaprogdi'] = $this->statistik_model->select_progdi_by_id($progdi_id)->row();		

		// Per Kegiatan / Progdi
		$data['daftar_kegiatan'] = $this->statistik_model->select_kegiatan()->result();
 		$kegiatan = $this->statistik_model->select_kegiatan()->result();
 		
 		$labelserapan_array  = array();
 		$jumlahserapan_array = array();        
 
		foreach ($kegiatan as $row) {
			$kegiatan_id = $row->kegiatan_id;
        	$labelserapan_array[]  = $row->kegiatan_desc;        	           
			$jumlahserapan_array[] = (int)$this->statistik_model->select_by_kegiatan_progdi($kegiatan_id)->row()->total;						             
        }
 		
 		$data['labelserapan']  = json_encode($labelserapan_array);
	    $data['jumlahserapan'] = json_encode($jumlahserapan_array);
		// Akhir Kegiatan
		
		// Skala Relevansi / Progdi
		$data['daftar_skala'] = $this->statistik_model->select_skala()->result();
		$skala = $this->statistik_model->select_skala()->result();

 		$labelskala_array  = array();
 		$jumlahskala_array = array();        
 
		foreach ($skala as $row) {
			$skala_id = $row->skala_id;
        	$labelskala_array[]  = $row->skala_desc;              
			$jumlahskala_array[] = (int)$this->statistik_model->select_by_skala_progdi($skala_id)->row()->total;                
        }
 		
 		$data['labelskala'] = json_encode($labelskala_array);
	    $data['jumlahskala'] = json_encode($jumlahskala_array);
		// Akhir Skala

		// Gaji ALumni
		$data['daftar_gaji'] = $this->statistik_model->select_gaji()->result();

		$gaji = $this->statistik_model->select_gaji()->result();

 		$labelgaji_array  = array();
 		$jumlahgaji_array = array();        
 
		foreach ($gaji as $row) {
			$gaji_id = $row->gaji_id;
        	$labelgaji_array[]  = $row->gaji_desc;              
			$jumlahgaji_array[] = (int)$this->statistik_model->select_by_gaji_progdi($gaji_id)->row()->total;                
        }
 		
 		$data['labelgaji']  = json_encode($labelgaji_array);
	    $data['jumlahgaji'] = json_encode($jumlahgaji_array);
		// Akhir Gaji

		// Jenis Perusahaan
		$data['daftar_jenis'] = $this->statistik_model->select_jenis()->result();

		$jenis = $this->statistik_model->select_jenis()->result();

 		$labeljenis_array  = array();
 		$jumlahjenis_array = array();        
 
		foreach ($jenis as $row) {
			$jenis_id = $row->jenis_id;
        	$labeljenis_array[]  = $row->jenis_desc;              
			$jumlahjenis_array[] = (int)$this->statistik_model->select_by_jenis_progdi($jenis_id)->row()->total;                
        }
 		
 		$data['labeljenis']  = json_encode($labeljenis_array);
	    $data['jumlahjenis'] = json_encode($jumlahjenis_array);
		// Akhir Jenis

		// Lama Tunggu
		$daftar_alumni_kerja = $this->statistik_model->select_bekerja_2()->result(); // Data Alumni yang Bekerja		
		$alumni_by_month = array();

		foreach($daftar_alumni_kerja as $k) 
		{			
			$tgl_lulus = $k->alumni_tgl_lulus;
			$tgl_kerja = $k->perusahaan_tgl_masuk;

			$d1 = new DateTime($tgl_lulus);
			$d2 = new DateTime($tgl_kerja);
			$months = 0;

			$d1->add(new \DateInterval('P1M'));
			while ($d1 <= $d2)
			{				
			    $months ++; // Jumlah Lama Tunggu Bulan
			    $d1->add(new \DateInterval('P1M'));
			}
			if ($months == 0) continue;			

			// Cari Jumlah Alumni by Bulan Tunggu			
			if (!isset($alumni_by_month[$months]))
			{
				$alumni_by_month[$months] = 1;
			}
			else
			{
				$alumni_by_month[$months]++;
			}			

			$labelbulan_array[] = $months;
			$jumlahdata_array[] = (int)$alumni_by_month;
		}
		ksort($alumni_by_month);		

	    $data['labeltunggu'] = json_encode(array_keys($alumni_by_month)); // Nilai Bulan Lama Tunggu
		$data['jumlahtunggu'] = json_encode(array_values($alumni_by_month)); // Nilai Data per Bulan		
		// Akhir Lama Tunggu		

		$data['daftar_seputar_semat'] = $this->menu_model->select_seputar()->result();
		$data['daftar_agenda_semat'] = $this->menu_model->select_agenda()->result();
		$data['daftar_lowongan'] = $this->menu_model->select_lowongan()->result();			

    	$this->template_fo->display('statistikprogdi_v', $data);
	}
}
/* Location: ./application/controller/statistik.php */
?>