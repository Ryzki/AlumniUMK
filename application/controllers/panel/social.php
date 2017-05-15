<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/social_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_social'] = $this->social_model->select_all()->result();
			$this->template->display('panel/social_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addsocial() {
		$this->template->display('panel/addsocial_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('name','<b>Link Title</b>','trim|required|min_length[5]|max_length[30]|is_unique[umk_social.social_name]');
		$this->form_validation->set_rules('url','<b>Social URL</b>','trim|required|min_length[5]|max_length[50]');	
		$this->form_validation->set_rules('icon','<b>Social Icon</b>','trim|required|min_length[5]|max_length[50]');		
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addsocial_v');  
		} else {
			$this->social_model->insert_data();
 			redirect(site_url().'panel/social');
		}
	}
	
	public function editsocial($social_id) {
		$data['social'] = $this->social_model->select_by_id($social_id)->row();
		$this->template->display('panel/editsocial_v', $data);
	}
	
	public function updatedata() {
		$this->social_model->update_data();
 		redirect(site_url().'panel/social');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/social');
		} else {
			$this->social_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/social\">";
		}
	}
}
/* Location: ./application/controllers/panel/social.php */
?>