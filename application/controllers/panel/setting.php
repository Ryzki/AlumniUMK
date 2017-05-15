<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/setting_model');	
	}
	
	public function index($setting_id = 1){
		if($this->session->userdata('logged_in_umk')) {
			$data['setting'] = $this->setting_model->select_setting($setting_id)->row();
			$this->template->display('panel/setting_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}
	
	public function updatedata() {		
		$this->setting_model->update_data();
 		redirect(site_url().'panel/setting');
	}	
}
/* Location: ./application/controllers/panel/setting.php */
?>