<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_alumni extends CI_Controller{
	
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

			$this->template_user->display('user/lapalumni_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function preview($progdi = false) {  		
		$progdi 	= $this->input->post('lstProgdi');
				
		$data = array(
					'lstProgdi' => $progdi					
				);		
		
       	$data['preview'] = $this->laporan_model->preview_alumni($data);		
		$data['lastPost'] = $data;		
		$this->template_user->display('user/tampil_report_alumni_v', $data);
	}

	public function cetak_by_progdi($progdi = '') {
		$progdi 	= $this->uri->segment(4);	
				
		$data = array(
				'lstProgdi' => $progdi
			);

		$data['preview'] = $this->laporan_model->cetak_progdi_alumni($data);
		$this->load->view('user/r_print_alumni_html', $data); 
	}
}
/* Location: ./application/controllers/user/laporan_alumni.php */
?>