<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/contact_model');	
	}
	
	public function index($contact_id = 1){
		if($this->session->userdata('logged_in_umk')) {	
			$data['contact'] = $this->contact_model->select_contact($contact_id)->row();
			$this->template->display('panel/contact_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function updatedata() {		
		$this->contact_model->update_data();
 		redirect(site_url().'panel/contact');
	}	
}
/* Location: ./application/controllers/panel/contact.php */
?>