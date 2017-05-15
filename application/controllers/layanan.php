<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layanan extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('template_account');		
		$this->load->model('layanan_model');		
		$this->load->model('menu_model');      
	}
	
	public function index() {
		if(!$this->session->userdata('logged_in_alumni_tracer')) redirect(site_url('daftar'));	
		$user_id = $this->session->userdata('user_id');	
		$nim = $this->session->userdata('nim');
		$data['detail'] = $this->layanan_model->select_layanan($nim)->row();		
    	$this->template_account->display('layanan_v', $data);
	}

	public function insertdata() {												
		$this->layanan_model->insert_data_layanan();
		$this->session->set_flashdata('notification','SUKSES !! Data Layanan untuk Alumni Berhasil Di Simpan.');
 		redirect(site_url('layanan'));		
	}

	public function updatedata() {												
		$this->layanan_model->update_data_layanan();
		$this->session->set_flashdata('notification','SUKSES !! Data Layanan untuk Alumni Berhasil Di Update.');
 		redirect(site_url('layanan'));		
	}
}
/* Location: ./application/controller/layanan.php */
?>