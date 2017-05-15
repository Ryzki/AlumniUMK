<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fasilitas extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/fasilitas_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_fasilitas'] = $this->fasilitas_model->select_all()->result();
			$this->template->display('panel/fasilitas_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addfasilitas() {
		$this->template->display('panel/addfasilitas_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('title','<b>Link Title</b>','trim|required|min_length[5]|max_length[30]|is_unique[umk_fasilitas.fasilitas_title]');
		$this->form_validation->set_rules('url','<b>Link URL</b>','trim|required|min_length[5]|max_length[50]');		
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addfasilitas_v');  
		} else {
			$this->fasilitas_model->insert_data();
 			redirect(site_url().'panel/fasilitas');
		}
	}
	
	public function editfasilitas($fasilitas_id) {
		$data['fasilitas'] = $this->fasilitas_model->select_by_id($fasilitas_id)->row();
		$this->template->display('panel/editfasilitas_v', $data);
	}
	
	public function updatedata() {
		$this->fasilitas_model->update_data();
 		redirect(site_url().'panel/fasilitas');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/fasilitas');
		} else {
			$this->fasilitas_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/fasilitas\">";
		}
	}
}
/* Location: ./application/controllers/panel/fasilitas.php */
?>