<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wisuda extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/wisuda_model');	
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['progdi'] = $this->wisuda_model->select_progdi()->result();			
			$this->template->display('panel/cariwisuda_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function caridatawisuda() {
		$Progdi = $this->input->post('lstProgdi');
		$Tgl1 = $this->input->post('tgl1');
		$Tgl2 = $this->input->post('tgl2');

		if ($Progdi == 'all') {			
			$data['daftar_wisuda'] = $this->wisuda_model->select_wisuda_all()->result();
			$this->template->display('panel/wisuda_v', $data);
		}
		else 
		{		
			$data['daftar_wisuda'] = $this->wisuda_model->select_wisuda()->result();			
			$this->template->display('panel/wisuda_v', $data);
		}
	}

	public function baru(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_wisuda'] = $this->wisuda_model->select_wisuda_baru()->result();
			$this->template->display('panel/wisudabaru_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function editwisudabaru($wisuda_id) {
		$data['fakultas'] = $this->wisuda_model->select_fakultas()->result();
		$data['progdi'] = $this->wisuda_model->select_progdi()->result();
		$data['detail'] = $this->wisuda_model->select_by_id($wisuda_id)->row();
		
		$this->template->display('panel/editwisudabaru_v', $data);
	}
	
	public function updatedatabaru() {			
		// Update Proses Data Wisuda
		$this->wisuda_model->update_data_baru();
 		redirect(site_url().'panel/wisuda/baru');
	}
	
	public function deletedatabaru($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/wisuda/baru');
		} else {
			$this->wisuda_model->delete_data_baru($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/wisuda/baru\">";
		}
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/wisuda');
		} else {
			$this->wisuda_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/wisuda\">";
		}
	}

	public function editwisuda($wisuda_id) {
		$data['fakultas'] = $this->wisuda_model->select_fakultas()->result();
		$data['progdi'] = $this->wisuda_model->select_progdi()->result();
		$data['detail'] = $this->wisuda_model->select_by_id($wisuda_id)->row();
		
		$this->template->display('panel/editwisuda_v', $data);
	}

	public function updatedata() {				
		$this->wisuda_model->update_data();
 		redirect(site_url().'panel/wisuda');
	}
}
/* Location: ./application/controllers/panel/wisuda.php */
?>