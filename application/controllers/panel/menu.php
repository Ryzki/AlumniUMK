<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/menu_model');	
	}
	
	public function index($content_id = 1){
		if($this->session->userdata('logged_in_umk')) {
			$data['menu'] = $this->menu_model->select_menu($content_id)->row();
			$this->template->display('panel/menu_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}
	
	public function updatedata() {
		$this->menu_model->update_data();
 		redirect(site_url().'panel/menu');
	}	
}
/* Location: ./application/controllers/panel/menu.php */
?>