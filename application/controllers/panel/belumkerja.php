<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Belumkerja extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/belumkerja_model');	
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_belum'] = $this->belumkerja_model->select_all()->result();
			$this->template->display('panel/belumkerja_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function editbelumkerja($kerja_id) {
		$data['fakultas'] = $this->belumkerja_model->select_fakultas()->result();
		$data['progdi'] = $this->belumkerja_model->select_progdi()->result();	
		$data['aktifitas'] = $this->belumkerja_model->select_aktifitas()->result();		
		$data['kerja'] = $this->belumkerja_model->select_by_id($kerja_id)->row();
		
		$this->template->display('panel/editbelumkerja_v', $data);
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/belumkerja');
		} else {
			$this->belumkerja_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/belumkerja\">";
		}
	}
}
/* Location: ./application/controllers/panel/belumkerja.php */
?>