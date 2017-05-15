<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Link extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/link_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_link'] = $this->link_model->select_all()->result();
			$this->template->display('panel/link_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addlink() {
		$this->template->display('panel/addlink_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('title','<b>Link Title</b>','trim|required|min_length[5]|max_length[30]|is_unique[umk_link.link_title]');
		$this->form_validation->set_rules('url','<b>Link URL</b>','trim|required|min_length[5]|max_length[50]');		
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addlink_v');  
		} else {
			$this->link_model->insert_data();
 			redirect(site_url().'panel/link');
		}
	}
	
	public function editlink($link_id) {
		$data['link'] = $this->link_model->select_by_id($link_id)->row();
		$this->template->display('panel/editlink_v', $data);
	}
	
	public function updatedata() {
		$this->link_model->update_data();
 		redirect(site_url().'panel/link');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/link');
		} else {
			$this->link_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/link\">";
		}
	}
}
/* Location: ./application/controllers/panel/link.php */
?>