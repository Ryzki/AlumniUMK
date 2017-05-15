<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kompetensi extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template_account');		
		$this->load->model('kompetensi_model');		
		$this->load->model('menu_model');      
	}
	
	public function index() {
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));	
		$user_id = $this->session->userdata('user_id');	
		$nim = $this->session->userdata('nim');
		$data['detail'] = $this->kompetensi_model->select_kompetensi($nim)->row();		
    	$this->template_account->display('kompetensi_v', $data);
	}

	public function insertdata() {												
		$this->kompetensi_model->insert_data_kompetensi();
		$this->session->set_flashdata('notification','SUKSES !! Data Kompetensi Berhasil Di Simpan.');
 		redirect(site_url('kompetensi'));		
	}

	public function updatedata() {												
		$this->kompetensi_model->update_data_kompetensi();
		$this->session->set_flashdata('notification','SUKSES !! Data Kompetensi Berhasil Di Update.');
 		redirect(site_url('kompetensi'));		
	}
}
/* Location: ./application/controller/kompetensi.php */
?>