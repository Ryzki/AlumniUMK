<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skala extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/skala_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_skala'] = $this->skala_model->select_all()->result();
			$this->template->display('panel/skala_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addskala() {
		$this->template->display('panel/addskala_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('desc','<b>Skala Desc</b>','trim|required|min_length[5]|max_length[50]|is_unique[umk_skala.skala_desc]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addskala_v');  
		} else {
			$this->skala_model->insert_data();
 			redirect(site_url().'panel/skala');
		}
	}
	
	public function editskala($skala_id) {
		$data['skala'] = $this->skala_model->select_by_id($skala_id)->row();
		$this->template->display('panel/editskala_v', $data);
	}
	
	public function updatedata() {
		$this->skala_model->update_data();
 		redirect(site_url().'panel/skala');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/skala');
		} else {
			$this->skala_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/skala\">";
		}
	}
}
/* Location: ./application/controllers/panel/skala.php */
?>