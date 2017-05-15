<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sumberinfo extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/sumberinfo_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_sumber'] = $this->sumberinfo_model->select_all()->result();
			$this->template->display('panel/sumberinfo_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addsumberinfo() {
		$this->template->display('panel/addsumberinfo_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('desc','<b>Sumber Info Desc</b>','trim|required|min_length[5]|max_length[50]|is_unique[umk_sumber_info.info_desc]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addsumberinfo_v');  
		} else {
			$this->sumberinfo_model->insert_data();
 			redirect(site_url().'panel/sumberinfo');
		}
	}
	
	public function editsumberinfo($info_id) {
		$data['info'] = $this->sumberinfo_model->select_by_id($info_id)->row();
		$this->template->display('panel/editsumberinfo_v', $data);
	}
	
	public function updatedata() {
		$this->sumberinfo_model->update_data();
 		redirect(site_url().'panel/sumberinfo');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/sumberinfo');
		} else {
			$this->sumberinfo_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/sumberinfo\">";
		}
	}
}
/* Location: ./application/controllers/panel/sumberinfo.php */
?>