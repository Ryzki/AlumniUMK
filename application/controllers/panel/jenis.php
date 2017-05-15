<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/jenis_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_jenis'] = $this->jenis_model->select_all()->result();
			$this->template->display('panel/jenis_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addjenis() {
		$this->template->display('panel/addjenis_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('desc','<b>Jenis Perusahaan Desc</b>','trim|required|min_length[3]|max_length[50]|is_unique[umk_jenis_perusahaan.jenis_desc]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addjenis_v');  
		} else {
			$this->jenis_model->insert_data();
 			redirect(site_url().'panel/jenis');
		}
	}
	
	public function editjenis($jenis_id) {
		$data['jenis'] = $this->jenis_model->select_by_id($jenis_id)->row();
		$this->template->display('panel/editjenis_v', $data);
	}
	
	public function updatedata() {
		$this->jenis_model->update_data();
 		redirect(site_url().'panel/jenis');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/jenis');
		} else {
			$this->jenis_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/jenis\">";
		}
	}
}
/* Location: ./application/controllers/panel/jenis.php */
?>