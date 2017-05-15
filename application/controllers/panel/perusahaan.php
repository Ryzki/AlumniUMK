<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perusahaan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/perusahaan_model');	
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['daftar_perusahaan'] = $this->perusahaan_model->select_all()->result();
			$this->template->display('panel/perusahaan_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function editperusahaan($perusahaan_id) {
		$data['fakultas'] = $this->perusahaan_model->select_fakultas()->result();
		$data['progdi'] = $this->perusahaan_model->select_progdi()->result();
		$data['jenis'] = $this->perusahaan_model->select_jenis()->result();
		$data['gaji'] = $this->perusahaan_model->select_gaji()->result();
		$data['info'] = $this->perusahaan_model->select_info()->result();
		$data['skala'] = $this->perusahaan_model->select_skala()->result();

		$data['perusahaan'] = $this->perusahaan_model->select_by_id($perusahaan_id)->row();
		
		$this->template->display('panel/editperusahaan_v', $data);
	}	
}
/* Location: ./application/controllers/panel/perusahaan.php */
?>