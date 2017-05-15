<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());		
		$this->load->library('template_user');
		$this->load->model('user/home_model');
		$this->load->model('user/menu_model');		
	}
	
	public function index() {
		if($this->session->userdata('logged_in_umk')) {			
			$data['kotak'] = $this->home_model->select_hak_akses()->result();
	    	$this->template_user->display('user/home_v', $data);
    	} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function logout() {
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-chace');
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
/* Location: ./application/controller/user/home.php */
?>