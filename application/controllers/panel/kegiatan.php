<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/kegiatan_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_kegiatan'] = $this->kegiatan_model->select_all()->result();
			$this->template->display('panel/kegiatan_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addkegiatan() {
		$this->template->display('panel/addkegiatan_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('desc','<b>Kegiatan Desc</b>','trim|required|min_length[5]|max_length[50]|is_unique[umk_kegiatan.kegiatan_desc]');
		$this->form_validation->set_rules('next','<b>Kegiatan Next Link</b>','required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addkegiatan_v');  
		} else {
			$this->kegiatan_model->insert_data();
 			redirect(site_url().'panel/kegiatan');
		}
	}
	
	public function editkegiatan($kegiatan_id) {
		$data['kegiatan'] = $this->kegiatan_model->select_by_id($kegiatan_id)->row();
		$this->template->display('panel/editkegiatan_v', $data);
	}
	
	public function updatedata() {
		$this->kegiatan_model->update_data();
 		redirect(site_url().'panel/kegiatan');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/kegiatan');
		} else {
			$this->kegiatan_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/kegiatan\">";
		}
	}
}
/* Location: ./application/controllers/panel/kegiatan.php */
?>