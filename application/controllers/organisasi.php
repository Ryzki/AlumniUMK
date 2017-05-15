<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organisasi extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template_account');		
		$this->load->model('organisasi_model');		
		$this->load->model('menu_model');      
	}
	
	public function index() {
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));	
		$user_id = $this->session->userdata('user_id');	
		$nim = $this->session->userdata('nim');		
		$data['detail'] = $this->organisasi_model->select_detail_organisasi($nim)->row();
		$data['data_organisasi'] = $this->organisasi_model->select_organisasi($nim)->result();
    	$this->template_account->display('organisasi_v', $data);
	}

	public function insertdata() {												
		$this->organisasi_model->insert_data_pengalaman();
		$this->session->set_flashdata('notification','SUKSES !! Data Pengalaman Akademik Anda Berhasil Di Simpan.');
 		redirect(site_url('organisasi'));		
	}

	public function updatedata() {												
		$this->organisasi_model->update_data_pengalaman();
		$this->session->set_flashdata('notification','SUKSES !! Data Pengalaman Akademik Anda Berhasil Di Update.');
 		redirect(site_url('organisasi'));		
	}

	public function savedata() {		
		$this->organisasi_model->insert_data_organisasi();
		$this->session->set_flashdata('notification','SUKSES !! Data Organisasi Anda Berhasil Di Simpan.');
 		redirect(site_url('organisasi'));
	}

	public function updatedataorganisasi() {		
		$this->organisasi_model->update_data_organisasi();
		$this->session->set_flashdata('notification','SUKSES !! Data Organisasi Anda Berhasil Di Update.');
 		redirect(site_url('organisasi'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));
		
		if ($kode == null) {
			redirect(site_url('organisasi'));
		} else {
			$this->organisasi_model->delete_data($kode);
			echo "<meta http-equiv=refresh content=0;url=\"".site_url()."organisasi\">";
		}
	}
}
/* Location: ./application/controller/organisasi.php */
?>