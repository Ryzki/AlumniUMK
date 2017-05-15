<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wisuda extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template_user');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('user/wisuda_model');	
		$this->load->model('user/menu_model');
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {			
			$data['daftar_wisuda'] = $this->wisuda_model->select_all()->result();
			$this->template_user->display('user/wisuda_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function baru($progdi_id){
		if($this->session->userdata('logged_in_umk')) {
			$progdi_id = $this->uri->segment(4);
			$data['progdi'] = $this->wisuda_model->select_progdi2($progdi_id)->row();
			$data['daftar_wisuda'] = $this->wisuda_model->select_wisuda_baru($progdi_id)->result();
			$this->template_user->display('user/wisudabaru_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function progdi($progdi_id){		
		$progdi_id = $this->uri->segment(4);
		$data['progdi'] = $this->wisuda_model->select_progdi2($progdi_id)->row();
		$data['daftar_wisuda'] = $this->wisuda_model->select_wisuda_progdi($progdi_id)->result();
		$this->template_user->display('user/wisudaprogdi_v', $data);		
	}

	public function editwisudabaru($wisuda_id) {
		$wisuda_id = $this->uri->segment(5);		
		$data['fakultas'] = $this->wisuda_model->select_fakultas()->result();
		$data['progdi'] = $this->wisuda_model->select_progdi()->result();
		$data['detail'] = $this->wisuda_model->select_by_id($wisuda_id)->row();
		
		$this->template_user->display('user/editwisudabaru_v', $data);
	}
	
	public function updatedatabaru() {		
		$this->wisuda_model->update_data_baru();
 		redirect(site_url().'user/wisuda/baru'.'/'.$this->uri->segment(4));
	}
	
	public function deletedatabaru($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url().'user/wisuda/baru'.'/'.$this->uri->segment(4));
		} else {
			$this->wisuda_model->delete_data_baru($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."user/wisuda/baru".'/'.$this->uri->segment(4)."\">";
		}
	}

	public function editwisuda($wisuda_id) {
		$wisuda_id = $this->uri->segment(5);
		$data['fakultas'] = $this->wisuda_model->select_fakultas()->result();
		$data['progdi'] = $this->wisuda_model->select_progdi()->result();
		$data['detail'] = $this->wisuda_model->select_by_id($wisuda_id)->row();
		
		$this->template_user->display('user/editwisuda_v', $data);
	}

	public function updatedata() {				
		$this->wisuda_model->update_data();
 		redirect(site_url().'user/wisuda/progdi'.'/'.$this->uri->segment(4));
	}
}
/* Location: ./application/controllers/user/wisuda.php */
?>