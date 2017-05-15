<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Progdi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/progdi_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_progdi'] = $this->progdi_model->select_all()->result();
			$this->template->display('panel/progdi_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addprogdi() {
		$data['fakultas'] = $this->progdi_model->select_fakultas()->result();
		$this->template->display('panel/addprogdi_v', $data); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('lstFakultas','<b>Fakultas Name</b>','required');
		$this->form_validation->set_rules('code','<b>Progdi Code</b>','trim|required|min_length[2]|max_length[2]|is_unique[umk_progdi.progdi_code]');
		$this->form_validation->set_rules('name','<b>Progdi Name</b>','trim|required|min_length[4]|max_length[30]|is_unique[umk_progdi.progdi_name]');
		
		if ($this->form_validation->run() == FALSE) {
			$data['fakultas'] = $this->progdi_model->select_fakultas()->result();
			$this->template->display('panel/addprogdi_v', $data);   
		} else {
			$this->progdi_model->insert_data();
 			redirect(site_url().'panel/progdi');
		}
	}
	
	public function editprogdi($progdi_id) {
		$data['fakultas'] = $this->progdi_model->select_fakultas()->result();
		$data['progdi'] = $this->progdi_model->select_by_id($progdi_id)->row();
		$this->template->display('panel/editprogdi_v', $data);
	}
	
	public function updatedata() {
		$this->progdi_model->update_data();
 		redirect(site_url().'panel/progdi');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/progdi');
		} else {
			$this->progdi_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/progdi\">";
		}
	}
}
/* Location: ./application/controllers/panel/progdi.php */
?>