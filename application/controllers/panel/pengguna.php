<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/pengguna_model');	
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_pengguna'] = $this->pengguna_model->select_all()->result();
			$this->template->display('panel/pengguna_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function detailpengguna($pengguna_id) {
		$data['pengguna'] = $this->pengguna_model->select_by_id($pengguna_id)->row();	
		$this->template->display('panel/detailpengguna_v', $data);
	}
}
/* Location: ./application/controllers/panel/pengguna.php */
?>