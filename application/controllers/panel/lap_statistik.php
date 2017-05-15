<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lap_statistik extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/statistik_model');
		$this->load->model('panel/laporan_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['progdi'] = $this->laporan_model->select_progdi()->result();
			$this->template->display('panel/lapstatistik_v', $data);	    	
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function preview() {		
		$progdi_id = $this->input->post('lstProgdi', 'true');
		$tgl1 = $this->input->post('tgl1', 'true');
		$tgl2 = $this->input->post('tgl2', 'true');
		
		$data['namaprogdi'] = $this->statistik_model->select_progdi_by_id($progdi_id)->row();

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

		$this->template->display('panel/lapstatistikbyprogdi_v', $data);
	} 
}
/* Location: ./application/controllers/panel/lap_statistik.php */
?>