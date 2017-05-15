<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kualitas extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template_account');		
		$this->load->model('kualitas_model');		
		$this->load->model('menu_model');      
	}
	
	public function index() {
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));	
		$user_id = $this->session->userdata('user_id');	
		$nim = $this->session->userdata('nim');
		$data['detail'] = $this->kualitas_model->select_kualitas($nim)->row();		
    	$this->template_account->display('kualitas_v', $data);
	}

	public function insertdata() {												
		$this->kualitas_model->insert_data_kualitas();
		$this->session->set_flashdata('notification','SUKSES !! Data Kualitas Pembelajaran Berhasil Di Simpan.');
 		redirect(site_url('kualitas'));		
	}

	public function updatedata() {												
		$this->kualitas_model->update_data_kualitas();
		$this->session->set_flashdata('notification','SUKSES !! Data Kualitas Pembelajaran Berhasil Di Update.');
 		redirect(site_url('kualitas'));		
	}
}
/* Location: ./application/controller/kualitas.php */
?>