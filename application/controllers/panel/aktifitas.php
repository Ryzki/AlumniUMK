<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aktifitas extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/aktifitas_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_aktifitas'] = $this->aktifitas_model->select_all()->result();
			$this->template->display('panel/aktifitas_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addaktifitas() {
		$this->template->display('panel/addaktifitas_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('desc','<b>Aktifitas Desc</b>','trim|required|min_length[5]|max_length[50]|is_unique[umk_aktifitas.aktifitas_desc]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addaktifitas_v');  
		} else {
			$this->aktifitas_model->insert_data();
 			redirect(site_url().'panel/aktifitas');
		}
	}
	
	public function editaktifitas($aktifitas_id) {
		$data['aktifitas'] = $this->aktifitas_model->select_by_id($aktifitas_id)->row();
		$this->template->display('panel/editaktifitas_v', $data);
	}
	
	public function updatedata() {
		$this->aktifitas_model->update_data();
 		redirect(site_url().'panel/aktifitas');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/aktifitas');
		} else {
			$this->aktifitas_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/aktifitas\">";
		}
	}
}
/* Location: ./application/controllers/panel/aktifitas.php */
?>