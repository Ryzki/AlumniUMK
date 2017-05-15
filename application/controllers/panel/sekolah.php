<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sekolah extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/sekolah_model');	
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_sekolah'] = $this->sekolah_model->select_all()->result();
			$this->template->display('panel/sekolah_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function editsekolah($sekolah_id) {
		$data['fakultas'] = $this->sekolah_model->select_fakultas()->result();
		$data['progdi']  = $this->sekolah_model->select_progdi()->result();
		$data['sekolah'] = $this->sekolah_model->select_by_id($sekolah_id)->row();
		
		$this->template->display('panel/editsekolah_v', $data);
	}	
}
/* Location: ./application/controllers/panel/sekolah.php */
?>