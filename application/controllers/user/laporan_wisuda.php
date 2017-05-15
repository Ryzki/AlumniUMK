<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_wisuda extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template_user');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('user/laporan_model');
		$this->load->model('user/menu_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['progdi'] = $this->laporan_model->select_progdi()->result();			

			$this->template_user->display('user/lapwisuda_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function preview($status = false, $progdi = false, $tgl1 = false, $tgl2 = false) {  
		$status 	= $this->input->post('lstStatus');
		$progdi 	= $this->input->post('lstProgdi');
		$tgl1		= $this->input->post('tgl1');
		$tgl2		= $this->input->post('tgl2');

		if ($status == 'all' && $progdi <> 'all') { // Jika Semua Status dan Progdi By ID			
			$data = array(
					'lstProgdi' => $progdi,
					'tgl1' => $tgl1,
					'tgl2' => $tgl2,
					'lstStatus' => ''									
				);
		} elseif ($status <> 'all' && $progdi <> 'all' ) { // Jika Status by ID dan Progdi by ID			
			$data = array(
					'lstStatus' => $status,
					'lstProgdi' => $progdi,
					'tgl1' => $tgl1,
					'tgl2' => $tgl2					
				);		
		}		
		
       	$data['preview'] = $this->laporan_model->preview_wisuda($data);		
		$data['lastPost'] = $data;		
		$this->template_user->display('user/tampil_report_wisuda_v', $data);
	}
	
	/*public function cetak_all() {
		$data['preview'] = $this->laporan_model->cetak_all_alumni();
		$this->load->view('panel/r_print_alumni_html', $data); 
	}*/

	/*public function cetak_by_kegiatan($kegiatan = '') {
		$kegiatan 	= $this->uri->segment(4);
		
		$data = array(
				'lstKegiatan' => $kegiatan
			);

		$data['preview'] = $this->laporan_model->cetak_kegiatan_alumni($data);
		$this->load->view('panel/r_print_alumni_html', $data); 
	}*/

	public function cetak_by_progdi($progdi = '') {
		$progdi 	= $this->uri->segment(4);
		$tgl1 		= $this->uri->segment(5);
		$tgl2 		= $this->uri->segment(6);		
				
		$data = array(
				'lstProgdi' => $progdi,
				'tgl1' => $tgl1,
				'tgl2' => $tgl2
			);

		$data['preview'] = $this->laporan_model->cetak_progdi_wisuda($data);
		$this->load->view('user/r_print_wisuda_html', $data); 
	}

	public function cetak_by_id($progdi = '', $status = '') {
		$progdi 	= $this->uri->segment(4);
		$tgl1 		= $this->uri->segment(5);
		$tgl2 		= $this->uri->segment(6);
		$status 	= $this->uri->segment(7);
		
		$data = array(
				'lstProgdi' => $progdi,
				'tgl1' => $tgl1,
				'tgl2' => $tgl2,
				'lstStatus' => $status
			);

		$data['preview'] = $this->laporan_model->cetak_wisuda_by_id($data);
		$this->load->view('user/r_print_wisuda_html', $data); 
	}

	/*public function cetak($progdi = '', $kegiatan = '') {
		$progdi 	= $this->uri->segment(4);
		$kegiatan 	= $this->uri->segment(5);
		
		if (empty($progdi) && empty($kegiatan)) {
			$data = array();
		} elseif (empty($progdi) && !empty($kegiatan)) {
			$data = array(
				'lstKegiatan' => $kegiatan,
				'lstProgdi' => ''
				);
		} elseif (!empty($progdi) && empty($kegiatan)) {
			$data = array(
				'lstProgdi' => $progdi,
				'lstKegiatan' => ''
				);
		} elseif (!empty($progdi) && !empty($kegiatan)) {
			$data = array(
				'lstProgdi' => $progdi,
				'lstKegiatan' => $kegiatan
				);
		}
		
		$data['preview'] = $this->laporan_model->cetak_alumni($data);
		$this->load->view('panel/r_print_alumni_html', $data); 
	} */

}
/* Location: ./application/controllers/user/laporan_wisuda.php */
?>