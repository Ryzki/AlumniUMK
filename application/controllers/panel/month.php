<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Month extends CI_Controller{

	function __construct(){
		parent::__construct();			
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/statistik_model');		
	}

	public function index() {
		// Lama Tunggu
		$daftar_alumni_kerja = $this->statistik_model->select_bekerja()->result(); // Data Alumni yang Bekerja
		
		$alumni_by_month = [];

		foreach($daftar_alumni_kerja as $k) {			
			$tgl_lulus = $k->alumni_tgl_lulus;
			$tgl_kerja = $k->perusahaan_tgl_masuk;

			$d1 = new DateTime($tgl_lulus);
			$d2 = new DateTime($tgl_kerja);
			$months = 0;

			$d1->add(new \DateInterval('P1M'));
			while ($d1 <= $d2){
			    $months ++;
			    $d1->add(new \DateInterval('P1M'));
			}

			echo $months.' Bulan'; // Lama Bulan Tunggu
			echo "<br>";
			// Cari Jumlah Alumni by Bulan Tunggu			
			if ( ! isset( $alumni_by_month[$months] ) )
			{
			$alumni_by_month[$months] = 1;
			}
			else
			{
			$alumni_by_month[$months]++;
			}

			print_r($alumni_by_month);
		}
	}
	
}
/* Location: ./application/controllers/panel/about.php */
?>