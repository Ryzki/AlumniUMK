<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gaji extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/gaji_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_gaji'] = $this->gaji_model->select_all()->result();
			$this->template->display('panel/gaji_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addgaji() {
		$this->template->display('panel/addgaji_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('desc','<b>Gaji Desc</b>','trim|required|min_length[5]|max_length[50]|is_unique[umk_gaji.gaji_desc]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addgaji_v');  
		} else {
			$this->gaji_model->insert_data();
 			redirect(site_url().'panel/gaji');
		}
	}
	
	public function editgaji($gaji_id) {
		$data['gaji'] = $this->gaji_model->select_by_id($gaji_id)->row();
		$this->template->display('panel/editgaji_v', $data);
	}
	
	public function updatedata() {
		$this->gaji_model->update_data();
 		redirect(site_url().'panel/gaji');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/gaji');
		} else {
			$this->gaji_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/gaji\">";
		}
	}
}
/* Location: ./application/controllers/panel/gaji.php */
?>