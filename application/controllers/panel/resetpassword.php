<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resetpassword extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/reset_model');	
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {			
			$this->template->display('panel/caripasswordalumni_v');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function caridataalumni() {
		$Nim = trim($this->input->post('nim'));		
		$data['daftar_alumni'] = $this->reset_model->select_alumni($Nim)->result();			
		$this->template->display('panel/resetpassword_v', $data);		
	}

	public function editpassword($alumni_nim) {
		$data['detail'] = $this->reset_model->select_by_id($alumni_nim)->row();		
		$this->template->display('panel/editpassword_v', $data);
	}
	
	public function updatedata() {		
		$this->reset_model->update_password();
		
 		redirect(site_url().'panel/resetpassword');
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/resetpassword');
		} else {
			$this->reset_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/resetpassword\">";
		}
	}	
}
/* Location: ./application/controllers/panel/resetpassword.php */
?>