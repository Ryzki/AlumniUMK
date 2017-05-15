<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_umk')) redirect(base_url());
		$this->load->library('template');
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('panel/alumni_model');	
	}

	public function index(){
		if($this->session->userdata('logged_in_umk')) {
			$data['progdi'] = $this->alumni_model->select_progdi()->result();							
			$this->template->display('panel/carialumni_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function caridataalumni() {
		$Progdi = $this->input->post('lstProgdi');
		$Tahun1 = $this->input->post('tahun1');
		$Tahun2 = $this->input->post('tahun2');

		if ($Progdi == 'all') {
			$data = array(
					'Tahun1' => $Tahun1,
					'Tahun2' => $Tahun2
				);
					
			$data['daftar_alumni'] = $this->alumni_model->select_alumni_all($data);			
			$this->template->display('panel/alumni_v', $data);
		}
		else 
		{		
			$data['daftar_alumni'] = $this->alumni_model->select_alumni()->result();			
			$this->template->display('panel/alumni_v', $data);
		}
	}

	public function editmember($alumni_nim) {
		$data['fakultas'] = $this->alumni_model->select_fakultas()->result();
		$data['progdi'] = $this->alumni_model->select_progdi()->result();
		$data['kegiatan'] = $this->alumni_model->select_kegiatan()->result();
		$data['alumni'] = $this->alumni_model->select_by_id($alumni_nim)->row();
		
		$this->template->display('panel/editalumni_v', $data);
	}
	
	public function updatedata() {
		$this->alumni_model->update_data();
 		redirect(site_url().'panel/member');
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url().'panel/member');
		} else {
			$this->alumni_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."panel/member\">";
		}
	}
}
/* Location: ./application/controllers/panel/member.php */
?>