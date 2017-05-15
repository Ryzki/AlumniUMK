<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fakultas extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/fakultas_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_fakultas'] = $this->fakultas_model->select_all()->result();
			$this->template->display('panel/fakultas_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addfakultas() {
		$this->template->display('panel/addfakultas_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('title','<b>Link Title</b>','trim|required|min_length[4]|max_length[30]|is_unique[umk_fakultas.fakultas_title]');
		$this->form_validation->set_rules('url','<b>Link URL</b>','trim|required|min_length[5]|max_length[50]');		
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addfakultas_v');  
		} else {
			$this->fakultas_model->insert_data();
 			redirect(site_url().'panel/fakultas');
		}
	}
	
	public function editfakultas($fakultas_id) {
		$data['fakultas'] = $this->fakultas_model->select_by_id($fakultas_id)->row();
		$this->template->display('panel/editfakultas_v', $data);
	}
	
	public function updatedata() {
		$this->fakultas_model->update_data();
 		redirect(site_url().'panel/fakultas');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/fakultas');
		} else {
			$this->fakultas_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/fakultas\">";
		}
	}
}
/* Location: ./application/controllers/panel/fakultas.php */
?>