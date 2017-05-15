<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mfakultas extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/mfakultas_model');	
	}
	
	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_fakultas'] = $this->mfakultas_model->select_all()->result();
			$this->template->display('panel/mfakultas_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function addfakultas() {
		$this->template->display('panel/addmfakultas_v'); 
	}
	
	public function savedata() {								
		$this->form_validation->set_rules('name','<b>Fakultas Name</b>','trim|required|min_length[4]|max_length[30]|is_unique[umk_m_fakultas.fakultas_name]');		
		
		if ($this->form_validation->run() == FALSE) {
			$this->template->display('panel/addmfakultas_v');  
		} else {
			$this->mfakultas_model->insert_data();
 			redirect(site_url().'panel/mfakultas');
		}
	}
	
	public function editfakultas($fakultas_id) {
		$data['fakultas'] = $this->mfakultas_model->select_by_id($fakultas_id)->row();
		$this->template->display('panel/editmfakultas_v', $data);
	}
	
	public function updatedata() {
		$this->mfakultas_model->update_data();
 		redirect(site_url().'panel/mfakultas');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/mfakultas');
		} else {
			$this->mfakultas_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/mfakultas\">";
		}
	}
}
/* Location: ./application/controllers/panel/mfakultas.php */
?>